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

Route::get('/descargasView/{file}', function ($file) {
    return Storage::response("descargas/$file");
})->name('descargas-view');

Route::get('/descargasDown/{file}', function ($file) {
    return Storage::download("descargas/$file");
})->name('descargas-down');

Route::get('/calidadDown/{file}', function ($file) {
    return Storage::download("calidad/$file");
})->name('calidad-down');


// Sección Home

Route::get('/', 'HomeController@index');

Route::get('/empresa', 'SeccionEmpresaController@index');
Route::get('/descargas', 'SeccionDescargaController@index');
Route::get('/calidad', 'SeccionCalidadController@index');


// Sección Servicios

Route::get('/servicios', function () {
    return view('servicios.home');
});

//Sección de Administrador

//Login
Route::get('/adm', function() {
    return view('admin.login');
    
});


// Admin Home
Route::prefix('adm/home/')->group(function () {
    Route::resource('slider', 'SliderController');
    Route::resource('destacados', 'DestacadoController');
    Route::resource('informacion', 'TextController');
});

// Admin Empresa
Route::prefix('adm/empresa/')->group(function () {
    Route::resource('contenido', 'EmpresaController');
});

// Admin Descarga
Route::prefix('adm/descargas/')->group(function () {
    Route::resource('contenido', 'DescargaController');
});

// Admin Calidad
Route::prefix('adm/calidad/')->group(function () {
    Route::resource('contenido', 'CalidadController');
	Route::resource('descargas', 'CalidadDescargaController');
});



Route::get('adm/home', function() {
    //
    return view('admin.home');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
