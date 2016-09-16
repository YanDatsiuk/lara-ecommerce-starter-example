<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class AdminProductImagesController extends Controller
{
    /*
     * Page with list of product images.
     */
    public function productImages()
    {

        //Getting all product images
        $productImages = ProductImage::all();

        return view('pages.admin.product-images.product-images', [
            'productImages' => $productImages
        ]);
    }

    /*
     * Create product image page
     */
    public function create()
    {
        $products = Product::all();
        $images = Image::all();

        return view('pages.admin.product-images.create',[
            'products' => $products,
            'images' => $images,
        ]);
    }

    /*
     * Store product image page
     */
    public function store(Request $request)
    {

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Storing new product image
            $productImage = new ProductImage();
            $productImage->product_id = $request->product_id;
            $productImage->image_id = $request->image_id;
            $productImage->save();
        }

        return $this->create();
    }

    /*
     * Edit product image page
     */
    public function edit($id){

        $productImage = ProductImage::find($id);

        $products = Product::all();
        $images = Image::all();

        return view('pages.admin.product-images.edit',[
            'productImage' => $productImage,
            'products' => $products,
            'images' => $images,
        ]);
    }

    /*
     * Update existing product image
     */
    public function update(Request $request, $id){

        //Finding product image by id
        $productImage = ProductImage::find($id);

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Updating product image
            $productImage->product_id = $request->product_id;
            $productImage->image_id = $request->image_id;
            $productImage->save();
        }

        return $this->edit($id);
    }

    /*
     * Delete product image
     */
    public function delete($id){

        $productImage = ProductImage::find($id);
        $productImage->delete();

        return $this->productImages();
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
            'product_id' => 'required|exists:products,id',
            'image_id' => 'required|exists:images,id',
        ]);
    }
}
