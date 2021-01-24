<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'AuthController@default');

Route::get('login', 'AuthController@index')->name('login');
Route::post('login', 'AuthController@login')->name('login');

Route::get('google', 'AuthController@googleLinkLogin');
Route::get('google/login', 'AuthController@GoogleLogin');

Route::get('daftar', 'AuthController@daftar');
// Route::post('daftar', 'AuthController@prosesdaftar');
    
Route::group(['middleware' => 'auth'], function () {

    // middleware custom
    // middleaware user
    // Route::group(['middleware' =>['CekRole:user']], function(){
    //     Route::get('/rate', 'RateController@index');
    // });


    // middleware admin, user
    Route::group(['middleware' => ['CekRole:admin,user']], function () {
        Route::get('/home', 'HomeController@index');
        Route::get('logout', 'AuthController@logout');

        Route::get('/rate', 'RateController@index');
        Route::post('/gorating', 'RateController@gorating')->name('gorating');

        // rec product
        Route::get('/rekomendasi', 'CalculateController@list_rekomendasi');
    });

    // midleware admin
    Route::group(['middleware' => ['CekRole:admin']], function(){        
        Route::get('/user', 'UserController@index');
        Route::get('/load_user','UserController@load_user')->name('load_user');
        Route::put('/user', 'UserController@update');
        Route::delete('/user', 'UserController@destroy');
        Route::get('/produk', 'ProductController@index');
        Route::get('/produk/add', 'ProductController@create');
        Route::post('/produk/add', 'ProductController@store');
        Route::get('/load_produk', 'ProductController@load_product')->name('load_produk');
        Route::delete('/produk','ProductController@destroy');
        Route::post('/produk/edit', 'ProductController@edit');
        Route::put('/produk/edit', 'ProductController@update');

        /** Calculate Logic */

        Route::get('/calculate', 'CalculateController@index');
        Route::get('/perhitungan', 'CalculateController@hitung_similarity');
    });
});
