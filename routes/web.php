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

//Visualización y descarga de archivos

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
Route::get('/servicios', 'SeccionServicioController@index');// Admin Home
Route::prefix('/productos/')->group(function () {
    Route::get('familias', 'SeccionProductoController@index');
    Route::get('familias/show/{id}', 'SeccionProductoController@show');
    Route::get('familias/show/producto/{id}', 'SeccionProductoController@showProducto');
    Route::get('familias/show/producto/tag/{id}', 'SeccionProductoController@ShowEtiquetas');
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

// Admin Servicios
Route::prefix('adm/servicios/')->group(function () {
    Route::resource('contenido', 'ServicioController');
});


// Admin Productos
Route::prefix('adm/productos/')->group(function () {
    Route::resource('familias', 'FamiliaController');
    Route::resource('contenido', 'ProductoController');

    Route::get('galeria/{producto}', 'ProductoController@galeriaCreate');
    Route::post('galeria/store', 'ProductoController@galeriaStore');
    Route::get('galeria/view/{producto}', 'ProductoController@galeriaView');
    Route::get('galeria/delete/{id}', 'ProductoController@galeriaDelete');

    Route::get('etiqueta/{producto}', 'ProductoController@etiquetaCreate');
    Route::post('etiqueta/store', 'ProductoController@etiquetaStore');
    Route::get('etiqueta/view/{producto}', 'ProductoController@etiquetaView');
    Route::get('etiqueta/delete/{id}', 'ProductoController@etiquetaDelete');
    
    Route::get('familia/etiqueta/', 'ProductoController@familiaEtiquetaCreate');
    Route::get('familia/view/{producto}', 'ProductoController@familiaView');
    Route::post('familia/etiqueta/store', 'ProductoController@familiaEtiquetaStore');
    Route::get('familia/etiqueta/delete/{id}', 'ProductoController@familiaEtiquetaDelete');
});

// Contacto
Route::resource('/contacto', 'ContactoController');

Route::get('adm/home', function() {
    //
    return view('admin.home');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
