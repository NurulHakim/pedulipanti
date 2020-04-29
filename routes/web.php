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



Route::get('tambahpotopanti', function () {
    return view('tambahpotopanti');
});



Route::get('dashboards', function () {
    return view('lembaga/dashperusahaan');
});


Route::get('galerypanti/{id?}', 'PantiController@galeri')->name('galeri_panti');
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

 Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'PantiController@viewpanti');
// Route::get('/', function () {
//     return view('body/landingpage');
// });
// ROUTE HALAMAN DETAIL PANTI
Route::get('panti/{email_user?}', 'UserController@view_detail')->name('tampil_panti');

// ROUTE HALAMAN LIST PANTI
Route::get('/listpanti', 'UserController@listview');

// ROUTE HALAMAN GALLERY PANTI
Route::get('galerypanti/{email_user?}', 'UserController@galeri')->name('galeri_panti');

// menghapus akun
Route::get('delete/{id?}', 'PantiController@deleteAccount')->name('deleteAccount');


// perusahaan
Route::get('detaillembaga', function () {
    return view('lembaga/detaillembaga');
});

Route::get('profile_lembaga', function () {
    return view('lembaga/isiprofilelembaga');
});
Route::post('profile_lembaga', 'PerusahaanController@data')->name('upload.lembaga');
// ROUTE UNTUK MENGHAPUS AKUN
Route::get('delete}', 'PantiController@deleteAccount')->name('deleteAccount');
