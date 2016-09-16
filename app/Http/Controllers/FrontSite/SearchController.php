<?php

namespace App\Http\Controllers\FrontSite;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /*
     * Page with search results/
     */
    public function searchResultsPage(Request $request)
    {

        $searchTerm = $request->term;

        if (strlen($searchTerm) > 2) {

            //
            $products = Product::whereRaw('MATCH (title) AGAINST (?)', array($searchTerm))->paginate(env('PAGINATION_PRODUCT_PER_PAGE'));
        } else {

            //
            $products = Product::where('title', $searchTerm)->paginate(env('PAGINATION_PRODUCT_PER_PAGE'));
        }

        //Page's title
        $pageTitle = "Результати пошуку на запит \"$searchTerm\" :: Ретро байк";

        //
        return view('pages.frontsite.search-results', [
            'products' => $products,
            'searchTerm' => $searchTerm,
            'routeName' => 'search',
            'routeParams' => ['term' => $searchTerm],
            'pageTitle' => $pageTitle
        ]);
    }
}
