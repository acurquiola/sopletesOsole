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


//Autenticación
	Auth::routes();

//Autenticación con Facebook
	Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
	Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');



//Visualización y descarga de archivos
	//Descarga-Seccion
		Route::get('/descargasView/{file}', function ($file) {
			return Storage::response("descargas/$file");
		})->name('descargas-view');

		Route::get('/descargasDown/{file}', function ($file) {
			return Storage::download("descargas/$file");
		})->name('descargas-down');

//Calidad-Seccion
	Route::get('/calidadDown/{file}', function ($file) {
		return Storage::download("calidad/$file");
	})->name('calidad-down');

//Precios-Seccion
	Route::get('/preciosView/{file}', function ($file) {
		return Storage::response("precios/$file");
	})->name('precios-view');

	Route::get('/preciosDown/{file}', function ($file) {
		return Storage::download("precios/$file");
	})->name('precios-down');

// Vista de Usuarios
	Route::get('/', 'HomeController@index')->name('home.auth');
	Route::get('/search', 'HomeController@buscador');

	Route::resource('/contacto', 'ContactoController');

	Route::get('/empresa', 'SeccionEmpresaController@index');

	Route::get('/descargas', 'SeccionDescargaController@index');

	Route::get('/calidad', 'SeccionCalidadController@index');

	Route::get('/precios', 'SeccionPrecioController@index');

	Route::get('/servicios', 'SeccionServicioController@index');

	Route::prefix('/productos/')->group(function () {
		Route::get('familias', 'SeccionProductoController@index');
		Route::get('familias/show/{id}', 'SeccionProductoController@show');
		Route::get('familias/show/producto/{id}', 'SeccionProductoController@showProducto');
		Route::get('familias/show/producto/tag/{id}', 'SeccionProductoController@ShowEtiquetas');
	});

//Vista de Administrador
	Route::prefix('adm/')->group(function () {

	//Autenticación de Administradores 
	    // Authentication Routes...
	    Route::get('/', 'Admin\LoginController@showLoginForm')->name('admin.login');
	    Route::post('login', 'Admin\LoginController@login');
	    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');


	    // Admin Home
			Route::get('home/', function(){
				return view('admin.home');
			})->middleware('auth', 'admin');
			Route::resource('slider', 'SliderController');
			Route::get('slider/delete/{id}', 'SliderController@eliminar');
			Route::resource('destacados', 'DestacadoController');
			Route::resource('informacion', 'TextController');

	    // Admin Empresa
			Route::prefix('empresa/')->group(function () {
				Route::resource('contenido', 'EmpresaController');
			});

	    // Admin Descarga
			Route::prefix('descargas/')->group(function () {
				Route::resource('contenido', 'DescargaController');
				Route::get('delete/{id}', 'DescargaController@eliminar');
			});

	    // Admin Calidad
			Route::prefix('calidad/')->group(function () {
				Route::resource('contenido', 'CalidadController');
				Route::resource('descargas', 'CalidadDescargaController');
				Route::get('descargas/delete/{id}', 'CalidadDescargaController@eliminar');
			});

	    // Admin Servicios
			Route::prefix('servicios/')->group(function () {
				Route::resource('contenido', 'ServicioController');
				Route::get('delete/{id}', 'ServicioController@eliminar');
			});

	    // Admin Servicios
			Route::prefix('precios/')->group(function () {
				Route::resource('contenido', 'PrecioController');
				Route::get('delete/{id}', 'PrecioController@eliminar');
			});

	    // Admin Usuarios
			Route::prefix('usuarios/')->group(function () {
				Route::resource('contenido', 'UserController')->except(['show']);
				Route::get('contenido/delete/{id}', 'UserController@eliminar');
			});

	    // Admin Productos
			Route::prefix('productos/')->group(function () {
				Route::resource('familias', 'FamiliaController');
				Route::get('/familias/delete/{id}', 'FamiliaController@eliminar');
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
	});
