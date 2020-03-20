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

Route::get('/', function(){
    return view('welcome');
});
Route::get('body/login', function(){
    return view('body/login');
});


Route::get('footer/index', function () {
    return view('footer/index');
});


Route::get('logo/index', function () {
    return view('logo/index');
});

Route::get('header/index', function () {
    return view('header/index');
});

Route::get('body/landingpage', function() {
    return view('body/landingpage');
});

Route::get('footer/index', function () {
    return view('footer/index');
});

Route::get('/listpanti', function(){
    return view('listpanti');
});

Route::get('/dashboard', function(){
    return view('dashpanti');
});

Route::get('/profile_panti', function(){
    return view('isiprofile');
});
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
