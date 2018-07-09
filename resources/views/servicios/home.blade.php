@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones">
		<h5 class="title-home ">
			SERVICIOS
		</h5>
	</div>
	<div class="container" id="container-fluid-secciones" >
		<div class="row" style="margin-top: 5%">
			<div class="col s12">
				<div class="col s12 m4 l4 center">
					<img src="images/servicios_logo1.png" alt="">
					<h5 class="title-text-servicios">REPARACIÓN</h5>
				</div>
				<div class="col s12 m4 l4 center">
					<img src="images/servicios_logo2.png" alt="">
					<h5 class="title-text-servicios">POST VENTA</h5>
				</div>
				<div class="col s12 m4 l4 center">
					<img src="images/servicios_logo3.png" alt="">
					<h5 class="title-text-servicios">EQUIPOS</h5>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<div class="col s12 m6 l6" class="img-servicios">
					<img src="images/servicios1.png" class="responsive-img" alt="" >
				</div>
				<div class="col s12 m6 l6 title-servicios">
					<h3>Reparación</h3>
					  <div class="divider"></div>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, ipsam quasi veniam dolor eos perspiciatis possimus 	nesciunt, laboriosam quia. Quis possimus ducimus maiores, doloremque magnam at ipsa odit architecto qui.Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
				</div>
			</div>
		</div>
		<div class="divider divider-secciones"></div>
		<div class="row">
			<div class="col s12">
				<div class="col s12 m6 l6 title-servicios">
					<h3>Post Venta</h3>
					  <div class="divider"></div>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, ipsam quasi veniam dolor eos perspiciatis possimus 	nesciunt, laboriosam quia. Quis possimus ducimus maiores, doloremque magnam at ipsa odit architecto qui.Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
				</div>
				<div class="col s12 m6 l6" class="img-servicios">
					<img src="images/servicios2.png" class="responsive-img" alt="" >
				</div>
			</div>
		</div>
		<div class="divider divider-secciones"></div>
		<div class="row">
			<div class="col s12">
				<div class="col s12 m6 l6" class="img-servicios">
					<img src="images/servicios3.png" class="responsive-img" alt="" >
				</div>
				<div class="col s12 m6 l6 title-servicios">
					<h3>Equipos</h3>
					  <div class="divider"></div>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, ipsam quasi veniam dolor eos perspiciatis possimus 	nesciunt, laboriosam quia. Quis possimus ducimus maiores, doloremque magnam at ipsa odit architecto qui.Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
				</div>
			</div>
		</div>

	</div>
</div>


@endsection

</body>
</html>