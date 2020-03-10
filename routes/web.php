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

use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('welcome');
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
