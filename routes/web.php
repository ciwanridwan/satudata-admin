<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

// KATEGORI INFOGRAPIK DAN GALERY
Route::group(['prefix' => 'kategori'], function (){
    Route::get('galery', 'Kategori\GaleryController@index')->name('index-kategori-galery');
    Route::get('galery/create', 'Kategori\GaleryController@create')->name('create-kategori-galery');
    Route::post('galery/store', 'Kategori\GaleryController@store')->name('store-kategori-galery');
    Route::get('galery/edit/{nama}', 'Kategori\GaleryController@edit')->name('edit-kategori-galery');
    Route::post('galery/update/{id}', 'Kategori\GaleryController@update')->name('update-kategori-galery');
    Route::post('galery/delete/{id}', 'Kategori\GaleryController@destroy')->name('delete-kategori-galery'); 

    Route::get('infograpik', 'Kategori\InfograpikController@index')->name('index-kategori-infograpik');
    Route::get('infograpik/create', 'Kategori\InfograpikController@create')->name('create-kategori-infograpik');
    Route::post('infograpik/store', 'Kategori\InfograpikController@store')->name('store-kategori-infograpik');
    Route::get('infograpik/edit/{nama}', 'Kategori\InfograpikController@edit')->name('edit-kategori-infograpik');
    Route::post('infograpik/update/{id}', 'Kategori\InfograpikController@update')->name('update-kategori-infograpik');
    Route::post('infograpik/delete/{id}', 'Kategori\InfograpikController@destroy')->name('delete-kategori-infograpik');
});

Route::group(['prefix' => 'user'], function (){
    Route::get('login', 'PublicUsersController@formLogin')->name('users-login');
    Route::get('register', 'PublicUsersController@formRegister')->name('users-register');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
