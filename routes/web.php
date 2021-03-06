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

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::group(['middleware' => ['role:Superadmin']], function () {
        Route::resource('users', 'UserController');
        Route::get('roles','UserController@roles')->name('roles');
        Route::post('roles','UserController@setRoles')->name('setRoles');
        Route::get('permissions','UserController@permissions')->name('permissions');
        Route::post('permissions','UserController@setPermissions')->name('setPermissions');
        Route::get('register','Auth\RegisterController@create')->name('register');
    });
    Route::resource('bills', 'BillController');
    Route::resource('categories', 'CategoryController');
    Route::resource('images', 'ImageController');
    Route::resource('products', 'ProductController');
});

Route::get('/get-products', 'HomeController@getProducts');
Route::get('/get-categories', 'HomeController@getCategories');
Route::get('/get-product/{product}', 'HomeController@getProduct');
Route::get('/get-products-by-category/{category}', 'HomeController@getProductsByCategory');

Route::get('/{vue_capture?}', function () {
    return view('welcome');
})->where('vue_capture', '[\/\w\.-]*');
