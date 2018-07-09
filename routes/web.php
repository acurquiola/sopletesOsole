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

// Sección Home

Route::get('/', function () {
    return view('home.home');
});

// Sección Empresa

Route::get('/empresa', function () {
    return view('empresa.home');
});

// Sección Decargas

Route::get('/descargas', function () {
    return view('descargas.home');
});

// Sección Calidad

Route::get('/calidad', function () {
    return view('calidad.home');
});

// Sección Servicios

Route::get('/servicios', function () {
    return view('servicios.home');
});

//Sección de Administrador

Route::get('/adm', function() {
    return view('admin.login');
});


