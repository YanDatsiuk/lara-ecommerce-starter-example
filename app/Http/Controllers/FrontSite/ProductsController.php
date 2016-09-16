<?php

namespace App\Http\Controllers\FrontSite;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /*
    * Page with product
    */
    public function productPage($slug)
    {

        $product = Product::with('images')->where('slug', $slug)->first();

        //Page's title
        $pageTitle = "$product->title :: Ретро байк";

        return view('pages.frontsite.product', [
                'product' => $product,
                'pageTitle' => $pageTitle
            ]);
    }
}
