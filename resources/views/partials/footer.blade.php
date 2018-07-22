<footer class="page-footer" id="footer">
	<div class="container" id="container-fluid-secciones" >
		<div class="row" style="padding-bottom: 5%">
			<div class="col s12 m6 l3">
				<img src="{{ asset('images/logoFooter1.png')}}" alt="" class="responsive-img" style="margin-top: 25%">
			</div>
			<div class="col s12 m6 l2">
				<img src="{{ asset('images/logoFooter2.png')}}" alt="" class="responsive-img">
				<img src="{{ asset('images/logoFooter3.png')}}" alt="" class="responsive-img">
			</div>
			<div class="col s12 m6 l3">
				<h5>SITE MAP</h5>
				<div class="col s12 m6 l6">
					<ul>
						<li><a class="footer-text" href=" {{ url('/') }}">Inicio</a></li>
						<li><a class="footer-text" href=" {{ url('/empresa')}} " >Empresa</a></li>
						<li><a class="footer-text" href=" {{ url('/productos/familias')}} ">Productos</a></li>
						<li><a class="footer-text" href=" {{ url('/descargas')}} " >Descargas</a></li>
					</ul>
				</div>
				<div class="col s12 m6 l6">
					<ul>
						<li><a class="footer-text" href=" {{ url('/calidad')}} " >Calidad</a></li>
						<li><a class="footer-text" href=" {{ url('/servicios')}} ">Servicios</a></li>
						<li><a class="footer-text" href=" {{ url('/contacto')}} " >Contacto</a></li>
					</ul>
				</div>
			</div>
			<div class="col s12 m6 l4">
				<h5>SOPLETES LIGA</h5>
				<ul>
					<li><a class="footer-text" href="#!"><i class="material-icons">edit_location</i>Antonio Aberastain 239, Morón, Buenos Aires</a></li>
					<li><a class="footer-text" href="#!"><i class="material-icons">call</i>(54 11) 4696-2577</a></li>
					<li><a class="footer-text" href="#!"><i class="material-icons">email</i>ventas@sopletesliga.com.ar</a></li>
				</ul>					
			</div>
		</div>
	</div>
</footer>

