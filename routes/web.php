<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build add great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/search/products/{word}', 'SearchController@autocomplete');

Route::resource('sales', 'SalesController');
Route::resource('products', 'ProductsController');