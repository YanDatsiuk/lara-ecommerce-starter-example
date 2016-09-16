<?php

namespace App\Http\Controllers\FrontSite;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    /*
     * Page with products in selected category todo
     */
    public function categoryPage($slug)
    {

        $category = Category::where('slug', $slug)->first();

        dd($category);
    }

    /*
     * Page with all products
     */
    public function allCategoriesPage()
    {

        //Get public products
        $products = Product::with('images')->where('status', '=', 'public')->paginate(env('PAGINATION_PRODUCT_PER_PAGE'));

        //Page's title
        $pageTitle = 'Каталог товарів :: Ретро байк';

        //
        return view('pages.frontsite.products', [
            'products' => $products,
            'routeName' => 'category',
            'routeParams' => array(),
            'pageTitle' => $pageTitle
        ]);
    }

}
