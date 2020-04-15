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
});

Route::get('detailpanti', function () {
    return view('detailpanti');
});

Route::get('tambahpotopanti', function () {
    return view('tambahpotopanti');
});

Route::get('galerypanti', function () {
    return view('galerypanti');
});

Route::get('dashlembaga', function () {
    return view('lembaga/detaillembaga');
});



Route::get('profile_panti/{id?}', 'PantiController@index')->middleware('auth')->name('profile.view');

Route::post('profiles_panti/{id?}', 'PantiController@store')->name('upload');
Route::post('profile_panti/{id?}', 'PantiController@edit')->name('edit');
Route::get('/listpanti', 'PantiController@listview');

 Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');