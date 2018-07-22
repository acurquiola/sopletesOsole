	<ul id="slide-out" class="sidenav sidenav-fixed">
		<li>
			<div class="logo-admin">
				<img src=" {{asset('images/logo.png')}} ">
			</div>
		</li>
		<div class="divider"></div>

		<li class="no-padding">
			<ul class="collapsible collapsible-accordion">
				<li class="bold"><a class="collapsible-header waves-effect waves-grey" tabindex="0"><i class="material-icons">home</i>Home</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="{{ action('SliderController@create') }}">Crear Slider</a></li>
							<li><a href="{{ action('SliderController@index') }}">Editar Slider</a></li>
							<li><a href="{{ action('DestacadoController@index') }}">Editar Destacados</a></li>
							<li><a href="{{ action('TextController@index') }}">Editar Información</a></li>
						</ul>
					</div>
				</li>
				<li class="bold"><a class="collapsible-header waves-effect waves-grey" tabindex="0"><i class="material-icons">business</i>Empresa</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="{{ action('EmpresaController@index') }}">Editar Contenido</a></li>
						</ul>
					</div>
				</li>
				<li class="bold"><a class="collapsible-header waves-effect waves-grey" tabindex="0"><i class="material-icons">add_shopping_cart</i>Productos</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="{{ action('FamiliaController@create') }}">Crear Familia</a></li>
							<li><a href="{{ action('FamiliaController@index') }}">Editar Familia</a></li>
							<li><a href="{{ action('ProductoController@create') }}">Crear Producto</a></li>
							<li><a href="{{ action('ProductoController@index') }}">Editar Producto</a></li>
						</ul>
					</div>
				</li>

					<!-- 
		<li><a class="waves-effect-grey bold" href="#!"><i class="material-icons">share</i>Redes Sociales</a></li>
		<li><a class="waves-effect-grey bold" href="#!"><i class="material-icons">group</i>Usuarios</a></li> -->

				<li class="bold"><a class="collapsible-header waves-effect waves-grey" tabindex="0"><i class="material-icons">cloud_download</i>Descargas</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="{{ action('DescargaController@create') }}">Crear Descargas</a></li>
							<li><a href="{{ action('DescargaController@index') }}">Editar Descargas</a></li>
						</ul>
					</div>
				</li>
				<li class="bold"><a class="collapsible-header waves-effect waves-grey" tabindex="0"><i class="material-icons">check_circle</i>Calidad</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="{{ action('CalidadController@index') }}">Editar Calidad</a></li>
							<li><a href="{{ action('CalidadDescargaController@create') }}">Crear Descargas</a></li>
							<li><a href="{{ action('CalidadDescargaController@index') }}">Editar Descargas</a></li>
						</ul>
					</div>
				</li>
				<li class="bold"><a class="collapsible-header waves-effect waves-grey" tabindex="0"><i class="material-icons">build</i>Servicios</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="{{ action('ServicioController@create') }}">Crear Servicio</a></li>
							<li><a href="{{ action('ServicioController@index') }}">Editar Servicio</a></li>
						</ul>
					</div>
				</li>
				<li class="bold"><a class="collapsible-header waves-effect waves-grey" tabindex="0"><i class="material-icons">assignment</i>Listado de Precios</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="{{ action('PrecioController@create') }}">Crear Listado de Precios</a></li>
							<li><a href="{{ action('PrecioController@index') }}">Editar Listado de Precios</a></li>
						</ul>
					</div>
				</li>
				<li class="bold"><a class="collapsible-header waves-effect waves-grey" tabindex="0"><i class="material-icons">people</i>Usuarios</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="{{ action('UserController@create') }}">Crear Usuarios</a></li>
							<li><a href="{{ action('UserController@index') }}">Editar Usuarios</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</li>
	</ul>
	<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

</header>