<?php

namespace App\Http\Controllers;

use App\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminImagesController extends Controller
{
    /*
     * Page with list of images
     */
    public function images()
    {

        //Getting all images
        $images = Image::all();

        return view('pages.admin.images.images', [
            'images' => $images
        ]);
    }

    /*
     * Create image page
     */
    public function create()
    {
        return view('pages.admin.images.create');
    }

    /*
     * Store image page
     */
    public function store(Request $request)
    {

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Storing new image
            $image = new Image();
            $image->title = $request->title;

            $urls = self::getPathForNewPhoto('photo', $request);
            self::saveImages($request, $urls);

            $image->img_600_url = $urls['img_600_url'];
            $image->origin_url = $urls['origin_url'];
            $image->save();
        }

        return $this->create();
    }

    /*
     * Edit image page
     */
    public function edit($id)
    {

        $image = Image::find($id);

        return view('pages.admin.images.edit', [
            'image' => $image
        ]);
    }

    /*
     * Update existing image
     */
    public function update(Request $request, $id)
    {

        //Finding image by id
        $image = Image::find($id);

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Updating image
            $image->title = $request->title;

            if (!is_null($request->file('image_file'))) {
                $urls = self::getPathForNewPhoto('photo', $request);
                self::saveImages($request, $urls);
                $image->img_600_url = $urls['img_600_url'];
                $image->origin_url = $urls['origin_url'];
            }

            $image->save();
        }

        return $this->edit($id);
    }

    /*
     * Delete image
     */
    public function delete($id)
    {

        $image = Image::find($id);
        $image->delete();

        return $this->images();
    }

    /*
     * VALIDATION
     */

    /**
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'between:2,250',
            'image_file' => 'image|max:10000',
        ]);
    }

    /*
     * Отримання відносних шляхів для збереження фотографій.
     * Створення ієрахії директорій в разі необхідності.
     */
    public static function getPathForNewPhoto($fileName, Request $request)
    {

        $now = Carbon::now();

        //check images path
        $urlPath = '/images';
        if (!File::exists(public_path() . $urlPath)) {

            File::makeDirectory(public_path() . $urlPath);
        }

        //check year path
        $urlPath .= '/' . $now->year;
        if (!File::exists(public_path() . $urlPath)) {

            File::makeDirectory(public_path() . $urlPath);
        }

        //check month path
        $urlPath .= '/' . $now->month;
        if (!File::exists(public_path() . $urlPath)) {

            File::makeDirectory(public_path() . $urlPath);
        }

        //check day path
        $urlPath .= '/' . $now->day;
        if (!File::exists(public_path() . $urlPath)) {

            File::makeDirectory(public_path() . $urlPath);
        }

        //add fileName with time()
        $urlPath .= '/' . $fileName . '-' . time();

        //add extension
        $extension = '.unknown';
        $mimeType = $request->file('image_file')->getMimeType();

        //todo - Realize compression and file size checking.
        //dd($mimeType);

        switch ($mimeType) {
            case 'image/jpeg':
                $extension = '.jpg';
                break;
            case 'image/png':
                $extension = '.png';
                break;
            case 'image/gif':
                $extension = '.gif';
                break;
            default:
                $extension = '.jpg';
                break;
        }

        //Відносні шляхи для photo різної роздільності.
        $urls = [
            'img_600_url' => $urlPath . '-600' . $extension,
            'origin_url' => $urlPath . '-hd' . $extension];

        return $urls;
    }

    /*
     * Зберігання зображень.
     */
    private static function saveImages($request, $urls)
    {
        //Зберігання в файлову систему фото (600 x 480).
        $thumb600 = \Intervention\Image\Facades\Image::make($request->file('image_file'));

        $w_ratio = $thumb600->width() / 600;
        $h_ratio = $thumb600->height() / 480;

        $newWidth = $thumb600->width() / $h_ratio;
        $newHeight = $thumb600->height() / $w_ratio;

        if ($newWidth > 600) $newWidth = 600;
        if ($newHeight > 480) $newHeight = 480;

        $thumb600->resize($newWidth, $newHeight);
        $thumb600->resizeCanvas(600 - $thumb600->width(), 480 - $thumb600->height(), 'center', true);
        $thumb600->save(public_path() . $urls['img_600_url']);

        //Зберігання в файлову систему HD фото
        $thumbHd = \Intervention\Image\Facades\Image::make($request->file('image_file'));

        $thumbHd->save(public_path() . $urls['origin_url']);
    }
}
