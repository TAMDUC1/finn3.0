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

//-----------------------------------------

    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('admin.login');
        });

        Route::get('/index', 'AdminController@index')->name('admin.index');

        Route::post('/DashBoard', 'AdminController@login')->name('adminLogin');
      //  Route::post()


    });

Route::resource('admin','AdminController');

Route::get('/uploadProducts', 'ProductsController@getUpload')->name('uploadProducts');
Route::post('/upload', 'ProductsController@postUpload')->name('upload');

Route::resource('product','ProductsController');


//-----------------------------------------

