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
							<li><a href="#">Crear Familia</a></li>
							<li><a href="#">Editar Familia</a></li>
							<li><a href="#">Crear Producto</a></li>
							<li><a href="#">Editar Producto</a></li>
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
							<li><a href="#">Crear Servicio</a></li>
							<li><a href="#">Editar Servicio</a></li>
						</ul>
					</div>
				</li>
				<li class="bold"><a class="collapsible-header waves-effect waves-grey" tabindex="0"><i class="material-icons">share</i>Redes Sociales</a>
					<div class="collapsible-body">
						<ul>
							<li><a href="#">Crear Red Social</a></li>
							<li><a href="#">Editar Red Social</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</li>
	</ul>
	<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

</header>