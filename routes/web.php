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

Route::get('/dashboard/{id?}', function () {
    return view('dashpanti');
})->middleware('auth');

Route::get('detailpanti', function () {
    return view('detailpanti');
});

// Route::get('galerypanti/{email_user?}', 'PantiController@galeri')->name('galeri_panti');

Route::get('tambahpotopanti', function () {
    return view('tambahpotopanti');
});



Route::get('dashboards', function () {
    return view('lembaga/dashperusahaan');
});


Route::get('galerypanti/{id?}', 'PantiController@galeri')->name('galeri_panti');

Route::get('profile_panti/{id?}', 'PantiController@index')->middleware('auth')->name('profile.view');
Route::post('dashboard', 'PantiController@upload_photo')->middleware('auth')->name('upload_photo');

Route::post('profiles_panti/{id?}', 'PantiController@store')->middleware('auth')->name('upload');
Route::post('profile_panti/{id?}', 'PantiController@edit')->middleware('auth')->name('edit');
Route::get('panti/{id?}', 'PantiController@view_detail')->name('tampil_panti');
Route::get('/listpanti', 'PantiController@listview');

 Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('home');
Route::get('/', 'PantiController@viewpanti');
// Route::get('/', function () {
//     return view('body/landingpage');
// });


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
