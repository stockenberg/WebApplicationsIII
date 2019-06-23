<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Support\Facades\App;

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


Route::get('channels-users', function() {
    return \App\Channel::with('users')->get();
});

Route::get('channels', function() {
    return \App\Channel::all();
});

Route::get('users', function() {
    return \App\User::all();
});

Route::delete('products/{id}', function ($id) {
    //    $product = \App\Product::find($id);
    //    $product->destroy();
    return \App\Product::destroy($id);
});

Route::post('addUserToChannel', 'ChannelController@store');
Route::post('removeUserFromChannel', 'ChannelController@detach');

Route::post('products', function (Request $request) {
    $request->validate([
        'title' => 'required',
        'image' => 'required',
        'price' => 'required'
    ]);

    $product = new \App\Product();
    $product->title = $request->title;
    $product->img = $request->image;
    $product->price = $request->price;
    if ($product->save()) {
        return response('Successfully saved', 200);
    }
});
