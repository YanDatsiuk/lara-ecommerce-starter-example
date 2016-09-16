<?php

namespace App\Http\Controllers;

use App\Category;
use App\CurrencyRate;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class AdminProductsController extends Controller
{
    /*
     * Page with list of products
     */
    public function products()
    {

        //Getting all category products
        $products = Product::all();

        return view('pages.admin.products.products', [
            'products' => $products
        ]);
    }

    /*
     * Create product page
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.admin.products.create', [
            'categories' => $categories
        ]);
    }

    /*
     * Store product page
     */
    public function store(Request $request)
    {

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Storing new product
            $product = new Product();
            $product->category_id = $request->category_id;
            $product->title = $request->title;
            $product->slug = substr(str_slug($request->title), 0, 200);
            $product->description = $request->description;
            $product->status = $request->status;
            $product->condition = $request->condition;

            //Get prices in all currencies
            $prices = CurrencyRate::calcPrices($request->currency, $request->price);

            $product->price_usd = $prices['usd'];
            $product->price_uah = $prices['uah'];
            $product->price_eur = $prices['eur'];
            $product->selected_currency = $request->currency;

            //Storing into database
            try {
                $product->save();
            } catch (\Exception $e) {
                $product->slug .= time();
                $product->save();
            }
        }

        return $this->create();
    }

    /*
     * Edit product page
     */
    public function edit($id)
    {

        $product = Product::find($id);

        //Setting default currency price
        if (!is_null($product->selected_currency)) {
            $price_currency = 'price_' . $product->selected_currency;
            $product->price = $product->$price_currency;
        }else{
            $product->price = null;
        }

        $categories = Category::all();

        return view('pages.admin.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /*
     * Update existing product
     */
    public function update(Request $request, $id)
    {

        //Finding product by id
        $product = Product::find($id);

        // Validating the request...
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException($request, $validator);
        } else {

            //Updating product
            $product->category_id = $request->category_id;
            $product->title = $request->title;
            $product->slug = substr(str_slug($request->title), 0, 200);
            $product->description = $request->description;
            $product->status = $request->status;
            $product->condition = $request->condition;

            //Get prices in all currencies
            $prices = CurrencyRate::calcPrices($request->currency, $request->price);

            $product->price_usd = $prices['usd'];
            $product->price_uah = $prices['uah'];
            $product->price_eur = $prices['eur'];
            $product->selected_currency = $request->currency;

            //Storing into database
            try {
                $product->save();
            } catch (\Exception $e) {
                $product->slug .= time();
                $product->save();
            }
        }

        return $this->edit($id);
    }

    /*
     * Delete product
     */
    public function delete($id)
    {

        $product = Product::find($id);
        $product->delete();

        return $this->products();
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
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|between:2,250',
            'description' => 'between:2,5000',
            'status' => 'required|in:public,archive,private',
            'currency' => 'required|in:usd,uah,eur',
            'condition' => 'required|in:new,used',
        ]);
    }
}
