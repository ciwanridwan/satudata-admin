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

// API City
Route::get('/api/city/', 'InfograpikController@getCity');

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

// Publikasi
Route::group(['prefix' => 'publikasi'], function (){
    Route::post('/update/{id}', 'PublikasiController@update')->name('update-publikasi-admin');
    Route::post('/store', 'PublikasiController@store')->name('store-publikasi-admin');
    Route::post('/delete/{id}', 'PublikasiController@destroy')->name('delete-publikasi-admin');
    Route::get('/create', 'PublikasiController@create')->name('create-publikasi-admin');
    Route::get('/index', 'PublikasiController@index')->name('index-publikasi-admin');
    Route::get('/edit/{judul}', 'PublikasiController@edit')->name('edit-publikasi-admin');
});

// Infograpis
Route::group(['prefix' => 'infograpik'], function (){
    Route::post('/update/{id}', 'InfoGrapikController@update')->name('update-infograpik-admin');
    Route::post('/store', 'InfoGrapikController@store')->name('store-infograpik-admin');
    Route::post('/delete/{id}', 'InfoGrapikController@destroy')->name('delete-infograpik-admin');
    Route::get('/create', 'InfoGrapikController@create')->name('create-infograpik-admin');
    Route::get('/index', 'InfoGrapikController@index')->name('index-infograpik-admin');
    Route::get('/edit/{judul}', 'InfoGrapikController@edit')->name('edit-infograpik-admin');
});

// Ketenagakerjaan
Route::group(['prefix' => 'ketenagakerjaan'], function (){
    Route::post('/update/{id}', 'KetenagakerjaanController@update')->name('update-ketenagakerjaan-admin');
    Route::post('/store', 'KetenagakerjaanController@store')->name('store-ketenagakerjaan-admin');
    Route::post('/delete/{id}', 'KetenagakerjaanController@destroy')->name('delete-ketenagakerjaan-admin');
    Route::get('/create', 'KetenagakerjaanController@create')->name('create-ketenagakerjaan-admin');
    Route::get('/index', 'KetenagakerjaanController@index')->name('index-ketenagakerjaan-admin');
    Route::get('/edit/{judul}', 'KetenagakerjaanController@edit')->name('edit-ketenagakerjaan-admin');
});



Route::group(['prefix' => 'user'], function (){
    Route::get('login', 'PublicUsersController@formLogin')->name('users-login');
    Route::get('register', 'PublicUsersController@formRegister')->name('users-register');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
