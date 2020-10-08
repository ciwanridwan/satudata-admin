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
// PUBLIC
Route::get('/', function () {
    return view('layouts.dashboards.app');
});

Route::get('data', 'DataController@index')->name('pages-data');
Route::get('publikasi', 'PublikasiController@index')->name('pages-publikasi');
Route::get('galery', 'GaleryController@index')->name('pages-galery');
Route::get('infograpik', 'InfoGrapikController@index')->name('pages-infograpik');

Route::group(['prefix' => 'user'], function (){
    Route::get('login', 'PublicUsersController@formLogin')->name('users-login');
    Route::get('register', 'PublicUsersController@formRegister')->name('users-register');
});

// JENIS DATA 
Route::group(['prefix' => 'jenis-data'], function (){
    Route::get('create', 'JenisDataController@create')->name('create-jenisdata');
    Route::get('index', 'JenisDataController@index')->name('index-jenisdata');
    Route::post('store', 'JenisDataController@store')->name('store-jenisdata');
    Route::get('edit/{nama}', 'JenisDataController@edit')->name('edit-jenisdata');
    Route::post('update/{id}', 'JenisDataController@update')->name('update-jenisdata');
    Route::post('delete/{id}', 'JenisDataController@destroy')->name('delete-jenisdata');
});

// UNIT KERJA 
Route::group(['prefix' => 'unit-kerja'], function (){
    Route::get('create', 'UnitKerjaController@create')->name('create-UnitKerja');
    Route::get('index', 'UnitKerjaController@index')->name('index-UnitKerja');
    Route::post('store', 'UnitKerjaController@store')->name('store-UnitKerja');
    Route::get('edit/{nama}', 'UnitKerjaController@edit')->name('edit-UnitKerja');
    Route::post('update/{id}', 'UnitKerjaController@update')->name('update-UnitKerja');
    Route::post('delete/{id}', 'UnitKerjaController@destroy')->name('delete-UnitKerja');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
