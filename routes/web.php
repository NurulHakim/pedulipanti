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

use Illuminate\Support\Facades\Route;

Route::get('logo/index', function () {
    return view('logo/index');
});

Route::get('header/index', function () {
    return view('header/index');
});

Route::get('footer/index', function () {
    return view('footer/index');
});

Auth::routes(['verify' => true]);

// ROUTE HALAMAN HOME
Route::get('/home', 'HomeController@index')->name('home');

// ROTE HALAMAN LANDING PAGE
Route::get('/', 'LandingPageController@viewpanti');

// ROUTE HALAMAN DASHBOARD
Route::get('dashboard', 'PantiController@indexDash')->middleware('auth');
Route::post('dashboard/{id?}', 'PantiController@upload_photo')->middleware('auth')->name('upload_photo');

// HAPUS FOTO GALLERY
Route::get('dashboard/{id?}', 'PantiController@deletePhoto')->name('deletePhoto');

// ROUTE HALAMAN PROFILE PANTI/ISI PANTI
Route::get('profile_panti', 'PantiController@index')->middleware('auth')->name('profile.view');
Route::post('profiles_panti/{id?}', 'PantiController@store')->middleware('auth')->name('upload');
Route::post('profile_panti/{id?}', 'PantiController@edit')->middleware('auth')->name('edit');

// ROUTE HALAMAN DETAIL PANTI
Route::get('panti/{email_user?}', 'UserController@view_detail')->name('tampil_panti');

// ROUTE HALAMAN LIST PANTI
Route::get('/listpanti', 'UserController@listview');

// ROUTE HALAMAN GALLERY PANTI
Route::get('galerypanti/{email_user?}', 'UserController@galeri')->name('galeri_panti');

// ROUTE UNTUK MENGHAPUS AKUN
Route::get('delete}', 'PantiController@deleteAccount')->name('deleteAccount');

// ROUTE UNTUK SEARCH PANTI
Route::get('search', 'UserController@searchPanti')->name('searchPanti');


Route::post('/kabupaten', 'PantiController@getKabupaten')->middleware('auth')->name('getKabupaten');
Route::post('/kecamatan', 'PantiController@getKecamatan')->middleware('auth')->name('getKecamatan');
Route::post('/kelurahan', 'PantiController@getKelurahan')->middleware('auth')->name('getKelurahan');