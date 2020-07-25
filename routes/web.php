<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Middleware for Admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'AdminController@index')->name('admin.index');

    Route::resource('/admin/categories', 'AdminCategoryController', ['names'=>[
        'index'=>'admin.categories.index',
        'show'=>'admin.categories.show',
        'edit'=>'admin.categories.edit',
        'store'=>'admin.categories.store',
        'destroy'=>'admin.categories.destroy',
    ]]);

    Route::resource('/admin/products', 'AdminProductController', ['names'=>[
        'index'=>'admin.products.index',
        'show'=>'admin.products.show',
        'edit'=>'admin.products.edit',
        'create'=>'admin.products.create',
        'store'=>'admin.products.store',
        'destroy'=>'admin.products.destroy',
    ]]);

    Route::resource('/admin/orders', 'AdminOrderController', ['names'=>[
        'index'=>'admin.orders.index',
    ]]);

    Route::resource('/admin/users', 'AdminUserController', ['names'=>[
        'index'=>'admin.users.index',
        'show'=>'admin.users.show',
        'edit'=>'admin.users.edit',
        'create'=>'admin.users.create',
        'store'=>'admin.users.store',
        'destroy'=>'admin.users.destroy',
    ]]);
});
