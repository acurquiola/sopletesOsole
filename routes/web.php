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

// Ruta para el inicio

Route::get('/', function () {
    return view('home.home');
});

// Ruta para el inicio

Route::get('/empresa', function () {
    return view('empresa.home');
});
