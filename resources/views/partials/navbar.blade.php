<!-- Cabecera de la página -->
	<nav class="nav-extended">
		<div class="nav-wrapper" id="cabecera-rrss">
			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<span > ACCESO CLIENTES</span>
				<a class="btn-floating btn-small waves-effect waves-light red "><i class="material-icons">perm_identity</i></a>
				<a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">add</i></a>
				<a class="btn-floating btn-small waves-effect waves-light red"><i class="material-icons">search</i></a>
			</ul>
		</div>
		<nav id="cabecera">
			<div class="nav-wrapper">
				<a href="{{ url('/') }}" class="brand-logo">
					<img id="logo" src="images/logo.png" alt="">
				</a>
				<ul class="right hide-on-med-and-down secciones-nav-ul">
					<li><a href=" {{ url('/empresa')}} " {{ (\Request::is('empresa*'))?"id=seccion-active":"" }}>EMPRESA</a></li>
					<li><a href=" {{ url('/productos')}} " {{ (\Request::is('productos*'))?"id=seccion-active":"" }}>PRODUCTOS</a></li>
					<li><a href=" {{ url('/descargas')}} " {{ (\Request::is('descargas*'))?"id=seccion-active":"" }}>DESCARGAS</a></li>
					<li><a href=" {{ url('/calidad')}} " {{ (\Request::is('calidad*'))?"id=seccion-active":"" }}>CALIDAD</a></li>
					<li><a href=" {{ url('/servicio')}} " {{ (\Request::is('servicio*'))?"id=seccion-active":"" }}>SERVICIO</a></li>
					<li><a href=" {{ url('/contacto')}} " {{ (\Request::is('contacto*'))?"id=seccion-active":"" }}>CONTACTO</a></li>
				</ul>
			</div>
		</nav>
	</nav> 