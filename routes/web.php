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



Route::get('/', function () {
    return view('welcome');
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

// Route::get('/listpanti', function () {
//     return view('listpanti');
// });

Route::get('/dashboard', function () {
    return view('dashpanti');
});

// Route::get('/profile_panti', function(){
//     return view('isiprofile');
// });

Route::get('/profile_panti', 'PantiController@index');

Route::post('/profile_panti', 'PantiController@store')->name('upload');
Route::get('/listpanti', 'PantiController@listview');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
