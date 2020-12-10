<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/register',function(){
//     return view('register');
// });

Auth::routes();

// Route::get('/login',function(){
//     return view('login');
// });

Route::get('/', 'ProductController@allProduct');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/detail_product/{id}', 'ProductController@productDetail');
    Route::get('/homepage', 'HomeController@index')->name('home');

});

Route::group(['middleware' => ['admin']], function () {
    Route::get('/adminPanel','ProductController@adminHome');
    Route::get('/adminPanel/adminListProduct','ProductController@listProduct');
    Route::get('/adminPanel/adminListProduct/{id}','ProductController@deleteProduct');
    Route::get('/adminPanel/adminAddProduct','ProductController@indexAddProduct');
    Route::post('/adminPanel/adminAddProduct/addProducts', 'ProductController@addProducts');
    Route::get('/adminPanel/adminListCategory', 'ProductController@indexListCategory');
    Route::get('/adminPanel/adminListCategory/{id}', 'ProductController@listProductByCategory');
    Route::get('/adminPanel/adminAddCategory', 'ProductController@indexAddCategory');
    Route::post('/adminPanel/adminAddCategory/addCategory', 'ProductController@addCategory');
});