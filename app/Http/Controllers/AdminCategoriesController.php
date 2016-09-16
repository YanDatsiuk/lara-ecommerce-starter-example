<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class AdminCategoriesController extends Controller
{

    /*
     * Page with list of categories
     */
    public function categories()
    {

        //Getting all categories
        $categories = Category::all();

        return view('pages.admin.categories.categories', [
            'categories' => $categories
        ]);
    }

    /*
     * Create category page
     */
    public function create()
    {
        return view('pages.admin.categories.create');
    }

    /*
     * Store category page
     */
    public function store(Request $request)
    {

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Storing new category
            $category = new Category();
            $category->title = $request->title;
            $category->slug = str_slug($request->title);
            $category->save();
        }

        return $this->create();
    }

    /*
     * Edit category page
     */
    public function edit($id){

        $category = Category::find($id);

        return view('pages.admin.categories.edit',[
            'category' => $category
        ]);
    }

    /*
     * Update existing category
     */
    public function update(Request $request, $id){

        //Finding category by id
        $category = Category::find($id);

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Updating category
            $category->title = $request->title;
            $category->slug = str_slug($request->title);
            $category->save();
        }

        return $this->edit($id);
    }

    /*
     * Delete category
     */
    public function delete($id){

        $category = Category::find($id);
        $category->delete();

        return $this->categories();
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
            'title' => 'required|between:2,100',
        ]);
    }
}
