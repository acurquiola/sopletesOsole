<!-- Cabecera de la página -->

<div id="dropdown1" class="dropdown-content" id="login">
	<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" style="padding: 25px; width: 300px; height: 270px">
		@csrf
		<div class="col s6">
			<input placeholder="Usuario" name="username" type="text" class="validate">
		</div>

		<div class="col s6">
			<input placeholder="Contraseña" name="password" type="password" class="validate">
		</div>

		<center>
			<div class='row' style="padding-top: 20px; ">
				<button style="background-color: #3241C4; border: 1px solid #3241C4;color:#FFFFFF ; width: 165px; height: 45px" id="btn-login" type='submit' name='btn_login' >ENVIAR</button>
			</div>
		</center>
		<a href="{{ route('password.request') }}"><h6 class="center" style="color: #6D6D6D" for="">Olvidé mi contraseña </h6></a>

	</form>
	<div class="divider"></div>
	<a href="{{ route('register') }}"><h5 class="center" style="color: #DF1319" for="">CREAR UNA CUENTA NUEVA</h5></a>
</div>

<div id="dropdown2" class="dropdown-content" id="login">
	<form method="Get" action="{{ action('HomeController@buscador') }}" style="padding: 5px; width: 300px; height: 50px; overflow: hidden">
		@csrf
		<div class="row">
			<div class="col s12">
				<div class="col s10 m10 l10">
					<input placeholder="Busca un producto" name="nombre" type="text" class="validate">
				</div>
				<div class="col s2 m2 l2">
					<button  style="margin-top: 10px" class="btn-floating btn-small waves-effect waves-light red" type='submit' name='btn_login' ><i class="material-icons">search</i></button>
				</div>
			</div>
			
		</div>
	</form>
</div>

<nav class="nav-extended">
	<div class="nav-wrapper" id="cabecera-rrss">
		@auth
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><span > BIENVENIDO, {{ strtoupper(Auth::user()->username) }} </span></li>
			<li><a class="btn-floating btn-small waves-effect waves-light red " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="material-icons">exit_to_app</i></a></li>
			<li><a class="btn-floating btn-small waves-effect waves-light red dropdown-trigger" href="#!" data-target="dropdown2"><i class="material-icons">search</i></a></li>
		</ul>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
			{{ csrf_field() }}
		</form>
		@endauth
		@guest
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><span > ACCESO CLIENTES</span></li>
			<li><a class="btn-floating btn-small waves-effect waves-light red dropdown-trigger" href="#!" data-target="dropdown1" ><i class="material-icons">perm_identity</i></a></li>
			<li><a href="{{ route('social.auth', 'facebook') }}" class="btn-floating btn-small waves-effect waves-light red"><img style="margin-top: 8px" src="{{ asset('images/fb-logo.png') }}" alt=""></a></li>
			<li><a class="btn-floating btn-small waves-effect waves-light red dropdown-trigger" href="#!" data-target="dropdown2"><i class="material-icons">search</i></a></li>
		</ul>
		@endguest
	</div>

	<nav id="cabecera">
		<div class="nav-wrapper">
			<a href="{{ url('/') }}" class="brand-logo">
				<img id="logo" src="{{ asset('images/logo.png')}}" alt="">
				<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons" style="color: #3E3F41">menu</i></a>
			</a>
			<ul class="right hide-on-med-and-down secciones-nav-ul">
				<li><a href=" {{ url('/empresa')}} " {{ (\Request::is('empresa*'))?"id=seccion-active":"" }}>EMPRESA</a></li>
				<li><a href=" {{ url('/productos/familias')}} " {{ (\Request::is('productos*'))?"id=seccion-active":"" }}>PRODUCTOS</a></li>
				<li><a href=" {{ url('/descargas')}} " {{ (\Request::is('descargas*'))?"id=seccion-active":"" }}>DESCARGAS</a></li>
				<li><a href=" {{ url('/calidad')}} " {{ (\Request::is('calidad*'))?"id=seccion-active":"" }}>CALIDAD</a></li>
				<li><a href=" {{ url('/servicios')}} " {{ (\Request::is('servicios*'))?"id=seccion-active":"" }}>SERVICIOS</a></li>
				<li><a href=" {{ url('/contacto')}} " {{ (\Request::is('contacto*'))?"id=seccion-active":"" }}>CONTACTO</a></li>
				@auth
				<li><a href=" {{ url('/precios')}} " {{ (\Request::is('precios*'))?"id=seccion-active":"" }}>LISTADO DE PRECIOS</a></li>
				@endauth

			</ul>
		</div>
	</nav>
</nav> 

<ul class="sidenav" id="mobile-demo">
	<li><a href=" {{ url('/empresa')}} " {{ (\Request::is('empresa*'))?"id=seccion-active":"" }}>EMPRESA</a></li>
	<li><a href=" {{ url('/productos/familias')}} " {{ (\Request::is('productos*'))?"id=seccion-active":"" }}>PRODUCTOS</a></li>
	<li><a href=" {{ url('/descargas')}} " {{ (\Request::is('descargas*'))?"id=seccion-active":"" }}>DESCARGAS</a></li>
	<li><a href=" {{ url('/calidad')}} " {{ (\Request::is('calidad*'))?"id=seccion-active":"" }}>CALIDAD</a></li>
	<li><a href=" {{ url('/servicios')}} " {{ (\Request::is('servicios*'))?"id=seccion-active":"" }}>SERVICIOS</a></li>
	<li><a href=" {{ url('/contacto')}} " {{ (\Request::is('contacto*'))?"id=seccion-active":"" }}>CONTACTO</a></li>
	@auth
	<li><a href=" {{ url('/precios')}} " {{ (\Request::is('precios*'))?"id=seccion-active":"" }}>LISTADO DE PRECIOS</a></li>
	@endauth
</ul>