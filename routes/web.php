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

// API City
Route::get('/api/city/', 'InfoGrapikController@getCity');

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test','HomeController@visitor');

// Ketenagakerjaan
Route::group(['middleware' => 'auth'], function (){

    Route::group(['prefix' => 'ketenagakerjaan'], function (){
        Route::post('/update/{id}', 'KetenagakerjaanController@update')->name('update-ketenagakerjaan-admin');
        Route::post('/store', 'KetenagakerjaanController@store')->name('store-ketenagakerjaan-admin');
        Route::post('/delete/{id}', 'KetenagakerjaanController@destroy')->name('delete-ketenagakerjaan-admin');
        Route::get('/create', 'KetenagakerjaanController@create')->name('create-ketenagakerjaan-admin');
        Route::get('/index', 'KetenagakerjaanController@index')->name('index-ketenagakerjaan-admin');
        Route::get('/edit/{nama}', 'KetenagakerjaanController@edit')->name('edit-ketenagakerjaan-admin');
    });

// Infograpis
    Route::group(['prefix' => 'infografik'], function (){
        Route::post('/update/{id}', 'InfoGrapikController@update')->name('update-infograpik-admin');
        Route::post('/store', 'InfoGrapikController@store')->name('store-infograpik-admin');
        Route::post('/delete/{id}', 'InfoGrapikController@destroy')->name('delete-infograpik-admin');
        Route::get('/create', 'InfoGrapikController@create')->name('create-infograpik-admin');
        Route::get('/index', 'InfoGrapikController@index')->name('index-infograpik-admin');
        Route::get('/edit/{judul}', 'InfoGrapikController@edit')->name('edit-infograpik-admin');
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


// Data
    Route::group(['prefix' => 'data'], function (){
        Route::post('/update/{id}', 'DataController@update')->name('update-data-admin');
        Route::post('/store', 'DataController@store')->name('store-data-admin');
        Route::post('/delete/{id}', 'DataController@destroy')->name('delete-data-admin');
        Route::get('/create', 'DataController@create')->name('create-data-admin');
        Route::get('/index', 'DataController@index')->name('index-data-admin');
        Route::get('/edit/{judul}', 'DataController@edit')->name('edit-data-admin');
        Route::get('/download/{file}', 'DataController@unduhFile')->name('download-file-data');
    });

// News Flash
    Route::group(['prefix' => 'news-flash'], function (){
        Route::post('/update/{id}', 'NewflashController@update')->name('update-newflash-admin');
        Route::post('/store', 'NewflashController@store')->name('store-newflash-admin');
        Route::post('/delete/{id}', 'NewflashController@destroy')->name('delete-newflash-admin');
        Route::get('/create', 'NewflashController@create')->name('create-newflash-admin');
        Route::get('/index', 'NewflashController@index')->name('index-newflash-admin');
        Route::get('/edit/{judul}', 'NewflashController@edit')->name('edit-newflash-admin');
    });

// GALERY
    Route::group(['prefix' => 'galeri'], function (){
        Route::post('/update/{id}', 'GaleryController@update')->name('update-galeri-admin');
        Route::post('/store', 'GaleryController@store')->name('store-galeri-admin');
        Route::post('/delete/{id}', 'GaleryController@destroy')->name('delete-galeri-admin');
        Route::get('/create', 'GaleryController@create')->name('create-galeri-admin');
        Route::get('/index', 'GaleryController@index')->name('index-galeri-admin');
        Route::get('/edit/{judul}', 'GaleryController@edit')->name('edit-galeri-admin');
        Route::post('images/delete/{id}', 'GaleryController@deleteImage')->name('galeri.delete.image');
    });

// KATEGORI INFOGRAPIK DAN GALERY
    Route::group(['prefix' => 'kategori'], function (){
        Route::get('galery', 'Kategori\GaleryController@index')->name('index-kategori-galery');
        Route::get('galery/create', 'Kategori\GaleryController@create')->name('create-kategori-galery');
        Route::post('galery/store', 'Kategori\GaleryController@store')->name('store-kategori-galery');
        Route::get('galery/edit/{nama}', 'Kategori\GaleryController@edit')->name('edit-kategori-galery');
        Route::post('galery/update/{id}', 'Kategori\GaleryController@update')->name('update-kategori-galery');
        Route::post('galery/delete/{id}', 'Kategori\GaleryController@destroy')->name('delete-kategori-galery'); 

        Route::get('infograpik', 'Kategori\InfoGrapikController@index')->name('index-kategori-infograpik');
        Route::get('infograpik/create', 'Kategori\InfoGrapikController@create')->name('create-kategori-infograpik');
        Route::post('infograpik/store', 'Kategori\InfoGrapikController@store')->name('store-kategori-infograpik');
        Route::get('infograpik/edit/{nama}', 'Kategori\InfoGrapikController@edit')->name('edit-kategori-infograpik');
        Route::post('infograpik/update/{id}', 'Kategori\InfoGrapikController@update')->name('update-kategori-infograpik');
        Route::post('infograpik/delete/{id}', 'Kategori\InfoGrapikController@destroy')->name('delete-kategori-infograpik');
    });

    // Route::get('1nf0-' . date('Ym'), function() {
    //     phpinfo();
    // });
});