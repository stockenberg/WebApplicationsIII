<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
//});

Route::get('products', function () {
    return \App\Product::all();
});


Route::delete('products/{id}', function ($id) {
//    $product = \App\Product::find($id);
//    $product->destroy();
    return \App\Product::destroy($id);
});