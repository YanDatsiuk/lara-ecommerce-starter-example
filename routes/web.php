<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('pages.frontsite.index');
});

/*
 * Auth routes
 */
Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('/admin', function () {
    return view('pages.admin.index');
})->middleware('auth', 'administrator');

/*
 * Admin panel - manage categories.
 */
Route::group(['prefix' => '/admin/categories','middleware' => ['auth', 'administrator']], function () {

    Route::get('/', [
        'uses' => 'AdminCategoriesController@categories'
    ]);

    Route::get('/create', [
        'uses' => 'AdminCategoriesController@create'
    ]);

    Route::post('/create', [
        'uses' => 'AdminCategoriesController@store'
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'AdminCategoriesController@edit'
    ]);

    Route::post('/edit/{id}', [
        'uses' => 'AdminCategoriesController@update'
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'AdminCategoriesController@delete'
    ]);

});

/*
 * Admin panel - manage category relations.
 */
Route::group(['prefix' => '/admin/category-relations','middleware' => ['auth', 'administrator']], function () {

    Route::get('/', [
        'uses' => 'AdminCategoryRelationsController@categoryRelations'
    ]);

    Route::get('/create', [
        'uses' => 'AdminCategoryRelationsController@create'
    ]);

    Route::post('/create', [
        'uses' => 'AdminCategoryRelationsController@store'
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'AdminCategoryRelationsController@edit'
    ]);

    Route::post('/edit/{id}', [
        'uses' => 'AdminCategoryRelationsController@update'
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'AdminCategoryRelationsController@delete'
    ]);

});

/*
 * Admin panel - manage products.
 */
Route::group(['prefix' => '/admin/products','middleware' => ['auth', 'administrator']], function () {

    Route::get('/', [
        'uses' => 'AdminProductsController@products'
    ]);

    Route::get('/create', [
        'uses' => 'AdminProductsController@create'
    ]);

    Route::post('/create', [
        'uses' => 'AdminProductsController@store'
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'AdminProductsController@edit'
    ]);

    Route::post('/edit/{id}', [
        'uses' => 'AdminProductsController@update'
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'AdminProductsController@delete'
    ]);

});

/*
 * Admin panel - manage images.
 */
Route::group(['prefix' => '/admin/images','middleware' => ['auth', 'administrator']], function () {

    Route::get('/', [
        'uses' => 'AdminImagesController@images'
    ]);

    Route::get('/create', [
        'uses' => 'AdminImagesController@create'
    ]);

    Route::post('/create', [
        'uses' => 'AdminImagesController@store'
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'AdminImagesController@edit'
    ]);

    Route::post('/edit/{id}', [
        'uses' => 'AdminImagesController@update'
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'AdminImagesController@delete'
    ]);

});

/*
 * Admin panel - manage product images.
 */
Route::group(['prefix' => '/admin/product-images','middleware' => ['auth', 'administrator']], function () {

    Route::get('/', [
        'uses' => 'AdminProductImagesController@productImages'
    ]);

    Route::get('/create', [
        'uses' => 'AdminProductImagesController@create'
    ]);

    Route::post('/create', [
        'uses' => 'AdminProductImagesController@store'
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'AdminProductImagesController@edit'
    ]);

    Route::post('/edit/{id}', [
        'uses' => 'AdminProductImagesController@update'
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'AdminProductImagesController@delete'
    ]);

});

/*
 * Admin panel - manage currency rate.
 */
Route::group(['prefix' => '/admin/currency-rates','middleware' => ['auth', 'administrator']], function () {

    Route::get('/', [
        'uses' => 'AdminCurrencyRatesController@currencyRates'
    ]);

    Route::get('/create', [
        'uses' => 'AdminCurrencyRatesController@create'
    ]);

    Route::post('/create', [
        'uses' => 'AdminCurrencyRatesController@store'
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'AdminCurrencyRatesController@edit'
    ]);

    Route::post('/edit/{id}', [
        'uses' => 'AdminCurrencyRatesController@update'
    ]);

    Route::get('/delete/{id}', [
        'uses' => 'AdminCurrencyRatesController@delete'
    ]);

});

/********************
 * Front site routes.
 ********************/

Route::get('/category', [
    'uses' => 'FrontSite\CategoriesController@allCategoriesPage',
    'as' => 'category',
]);

Route::get('/category/{slug}', [
    'uses' => 'FrontSite\CategoriesController@categoryPage'
]);

Route::get('/product/{slug}', [
    'uses' => 'FrontSite\ProductsController@productPage'
]);

Route::get('/search', [
    'uses' => 'FrontSite\SearchController@searchResultsPage',
    'as' => 'search',
]);

