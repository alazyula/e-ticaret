<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('category','CategoryController@store');
Route::get('category','CategoryController@index');
Route::get('category/{id}','ProductController@categorize');
Route::post('product','ProductController@store');
Route::get('product/{product}','ProductController@show');
Route::post('basket/{id}','BasketController@store');