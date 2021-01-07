<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AuthController@default');

Route::get('login', 'AuthController@index');
Route::post('login', 'AuthController@login');

Route::get('google', 'AuthController@googleLinkLogin');
Route::get('google/login', 'AuthController@GoogleLogin');

Route::get('daftar', 'AuthController@daftar');
Route::post('daftar', 'AuthController@prosesdaftar');
Route::get('logout', 'AuthController@logout');

// middleware custom

// middleware admin, user
Route::group(['middleware' => ['CekRole:admin,user']], function () {
    Route::get('/home', 'HomeController@index');
});

Route::group(['middleware' => ['CekRole:admin']], function(){
    Route::get('/user', 'UserController@index');
    Route::get('/load_user','UserController@load_user')->name('load_user');
});

