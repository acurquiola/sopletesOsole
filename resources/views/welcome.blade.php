<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">    
	<title> HOME | Sopletes Liga </title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
</head>

<body>

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
				<a href="#" class="brand-logo">
					<img id="logo" src="images/logo.fw.png" alt="">
				</a>
				<ul class="right hide-on-med-and-down secciones-nav-ul">
					<li><a href="#">EMPRESA</a></li>
					<li><a href="">PRODUCTOS</a></li>
					<li><a href="#">DESCARGAS</a></li>
					<li><a href="#">CALIDAD</a></li>
					<li><a href="#">SERVICIO</a></li>
					<li><a href="#">CONTACTO</a></li>
				</ul>
			</div>
		</nav>
	</nav> 

	<!-- Slider  -->
	<div class="slider">
		<ul class="slides"  id="slider-home">
			<li>
				<img src="images/page1.fw.png"> <!-- random image -->
				<div class="caption caption-home" >
					<h5 class="title-text-slider">ALTA TECNOLOGÍA AL SERVICIO DE LA INDUSTRIA</h5>
					<h3 class="content-text-slider">50 años en el rubro, fabricantes de sopletes </h3>
				</div>
			</li>
			<li>
				<img src="images/page2.fw.png"> <!-- random image -->
				<div class="caption caption-home" >
					<h5 class="title-text-slider">ALTA TECNOLOGÍA AL SERVICIO DE LA INDUSTRIA</h5>
					<h3 class="content-text-slider">Equipos medicinales para oxígonosterapia</h3>
				</div>
			</li>
		</ul>
	</div>	


	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
		    $('.slider').slider({
		    	height: 690
		    })
	  });

        
	</script>
</body>
</html>