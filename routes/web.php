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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;

Route::get('/tentangkami', function () {
    return view('tentangkami');
});

Route::get('/landingpage', function () {
    return view('body/landingpage');
});

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
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



Route::get('tambahpotopanti', function () {
    return view('tambahpotopanti');
});



Route::get('dashboards', function () {
    return view('lembaga/dashperusahaan');
});


// Route::get('galerypanti/{id?}', 'PantiController@galeri')->name('galeri_panti');
// ROTE HALAMAN LANDING PAGE
Route::get('/', 'LandingPageController@viewpanti');

// ROUTE HALAMAN DASHBOARD
Route::get('dashboard', 'PantiController@indexDash')->middleware('auth');
Route::post('dashboard/{id?}', 'PantiController@upload_photo')->middleware('auth')->name('upload_photo');
Route::post('tambah_program', 'PantiController@tambah_program')->middleware('auth')->name('tambah_program');
Route::get('program', 'PantiController@listprogram')->name('dash_program');

// HAPUS FOTO GALLERY
Route::get('dashboard/{id?}', 'PantiController@deletePhoto')->name('deletePhoto');


// ROUTE HALAMAN PROFILE PANTI/ISI PANTI
Route::get('profile_panti', 'PantiController@index')->middleware('auth')->name('profile.view');
Route::post('profiles_panti/{id?}', 'PantiController@store')->middleware('auth')->name('upload');
Route::post('profile_panti/{id?}', 'PantiController@edit')->middleware('auth')->name('edit');

//
Route::get('edit_program/{id?}', 'PantiController@editprogget')->middleware('auth')->name('edit_program');
Route::post('edit_programs/{id?}', 'PantiController@editprogram')->middleware('auth')->name('edit_program_post');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');

// ROUTE HALAMAN DETAIL PANTI
Route::get('panti/{id?}', 'UserController@view_detail')->name('tampil_panti');
Route::get('panti/program/{id?}', 'UserController@detail_program')->name('detail_program');
// ROUTE HALAMAN LIST PANTI
Route::get('/listpanti', 'UserController@listview');
Route::post('/listpanti', 'UserController@filter')->name('filter');

// ROUTE HALAMAN GALLERY PANTI
Route::get('galerypanti/{id?}', 'UserController@galeri')->name('galeri_panti');

// menghapus akun
Route::get('delete/{id?}', 'PantiController@deleteAccount')->name('deleteAccount');

Route::post('profile_lembaga', 'PerusahaanController@data')->name('upload.lembaga');
// ROUTE UNTUK MENGHAPUS AKUN
Route::get('delete', 'PantiController@deleteAccount')->name('deleteAccount');

// ROUTE UNTUK SEARCH PANTI
Route::get('search', 'UserController@searchPanti')->name('searchPanti');

Route::post('/kabupatens', 'UserController@getKabupaten')->name('getKabupatens');
Route::post('/kabupaten', 'PantiController@getKabupaten')->middleware('auth')->name('getKabupaten');
Route::post('/kecamatan', 'PantiController@getKecamatan')->middleware('auth')->name('getKecamatan');
Route::post('/kelurahan', 'PantiController@getKelurahan')->middleware('auth')->name('getKelurahan');
// Route::get('delete', 'PantiController@deleteAccount')->name('deleteAccount');
Route::get('tentangkami', function(){
    return view('tentangkami');
});