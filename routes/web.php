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



// Route::get('/home', 'HomeController@index')->name('home');
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

    //middleware kedua nested karena untuk cek logged in user punya role admin atau tidak, kalau punya user bisa akses route /admin
    // Route::group(['middleware' => ['admin']], function () {
    //     Route::get('/adminPage','ProductController@adminProduct');
    // });
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/adminPanel','ProductController@adminHome');
        Route::get('/adminListProduct','ProductController@listProduct');
        Route::get('/adminListProduct/{id}','ProductController@listProduct');
    });
});