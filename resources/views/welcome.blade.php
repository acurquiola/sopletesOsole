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
					<img id="logo" src="images/logo.png" alt="">
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
				<img src="images/slider1.png"> 
				<div class="caption caption-home" >
					<h5 class="title-text-slider">ALTA TECNOLOGÍA AL SERVICIO DE LA INDUSTRIA</h5>
					<h3 class="content-text-slider">50 años en el rubro, fabricantes de sopletes </h3>
				</div>
			</li>
			<li>
				<img src="images/slider2.png"> 
				<div class="caption caption-home" >
					<h5 class="title-text-slider">ALTA TECNOLOGÍA AL SERVICIO DE LA INDUSTRIA</h5>
					<h3 class="content-text-slider">Equipos medicinales para oxígonosterapia</h3>
				</div>
			</li> 
		</ul>
	</div>	

	<!-- Productos destacados  -->

	<div class="container" id="container-fluid">
		<div class="row">
			<div class="col s12">
				<span class="title-home">
					Productos Destacados
				</span>
			</div>
			<div class="col s12 m6 l3" >
				<div class="card hoverable">
					<div class="card-content card-destacados">
						<img src="images/destacados1.png" class="responsive-img"> 
					</div>
					<div class="card-action">
						<span class="card-title card-title-destacados">SOPLETES TIPO LLUVIA PARA CALENTAMIENTO</span>					
					</div>
				</div>
			</div>
			<div class="col s12 m6 l3" >
				<div class="card hoverable" >
					<div class="card-content card-destacados">
						<img src="images/destacados2.png" class="responsive-img"> 
					</div>
					<div class="card-action">
						<span class="card-title card-title-destacados">SOPLETE NÚMERO 1 JOYERO SIN MANGUERA</span>					
					</div>
				</div>
			</div>
			<div class="col s12 m6 l3" >
				<div class="card hoverable" >
					<div class="card-content card-destacados">
						<img src="images/destacados3.png" class="responsive-img"> 
					</div>
					<div class="card-action">
						<span class="card-title card-title-destacados">MINI SOLDADORA OXI-GAS</span>					
					</div>
				</div>
			</div>
			<div class="col s12 m6 l3" >
				<div class="card hoverable" >
					<div class="card-content card-destacados">
						<img src="images/destacados4.png" class="responsive-img"> 
					</div>
					<div class="card-action">
						<span class="card-title card-title-destacados">REGULADOR VALR327 CO2</span>					
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- La empresa -->

	<div class="container"  id="container-fluid-empresa">
		<div class="row">
			<div class="col s12 m12 l12 center-align">
				<img src="images/logoIndustriaArgentina.png" class="responsive-img">
			</div>
			<div class="col s12">
				<div class="col s12 m12 l12 center-align">
					<span class="flow-text" id="title-empresa">50 Años de Trayectoria</span>
				</div>
				<div class="col s12 m8 l8 push-l2 push-m2 center-align" style="margin-bottom: 5%">
					<span class="flow-text" id="content-empresa">Somos una empresa metalúrgica de origen familiar con más de 50 años de trayectoria en el rubro de fabricación de sopletes para soldadura y accesorios para los mismos como válvulas reguladoras de presión, elementos de seguridad, etc. </span>
				</div>
			</div>
		</div>
	</div>



	
	<!-- Footer -->

	<footer class="page-footer" id="footer">
		<div class="container"   >
			<div class="row" style="padding-bottom: 5%">
				<div class="col s12 m6 l3">
					<img src="images/logoFooter1.png" alt="" class="responsive-img" style="margin-top: 25%">
				</div>
				<div class="col s12 m6 l2">
					<img src="images/logoFooter2.png" alt="" class="responsive-img">
					<img src="images/logoFooter3.png" alt="" class="responsive-img">
				</div>
				<div class="col s12 m6 l3">
					<h5>SITE MAP</h5>
					<div class="col s12 m6 l6">
						<ul>
							<li><a class="footer-text" href="#!">Inicio</a></li>
							<li><a class="footer-text" href="#!">Empresa</a></li>
							<li><a class="footer-text" href="#!">Productos</a></li>
							<li><a class="footer-text" href="#!">Descargas</a></li>
						</ul>
					</div>
					<div class="col s12 m6 l6">
						<ul>
							<li><a class="footer-text" href="#!">Calidad</a></li>
							<li><a class="footer-text" href="#!">Servicios</a></li>
							<li><a class="footer-text" href="#!">Contacto</a></li>
						</ul>
					</div>
				</div>
				<div class="col s12 m6 l4">
					<h5>SOPLETES LIGA</h5>
					<ul>
						<li><a class="footer-text" href="#!"><i class="material-icons">edit_location</i>   Antonio Aberastain 239, Morón, Buenos Aires</a></li>
						<li><a class="footer-text" href="#!"><i class="material-icons">call</i>    (54 11) 4696-2577</a></li>
						<li><a class="footer-text" href="#!"><i class="material-icons">email</i>   ventas@sopletesliga.com.ar</a></li>
					</ul>					
				</div>
			</div>
		</div>
	</footer>





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