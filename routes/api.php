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
Route::group(['prefix' => 'auth'],function (){

    Route::get('categories', 'ApiCategoryController@getList');

    Route::get('category/{id}', 'ApiCategoryController@getProductsList');


    Route::post('login', 'ApiUserController@login');
    Route::post('register', 'ApiUserController@register');

    Route::group(['middleware'=>'auth:api'], function (){
        Route::get('logout', 'ApiUserController@logout');
        Route::get('profile', 'ApiUserController@profile');
    });
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
