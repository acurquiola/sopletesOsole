	<div class="container"  id="container-fluid-empresa">
		<div class="row">
			<div class="col s12 m12 l12 center-align">
				<img src="images/logoIndustriaArgentina.png" class="responsive-img">
			</div>
			<div class="col s12">
				<div class="col s12 m12 l12 center-align">
					<span class="flow-text" id="title-empresa">{!! $informacion->titulo !!}</span>
				</div>
				<div class="col s12 m8 l8 push-l2 push-m2 center-align" style="margin-bottom: 5%">
					<span class="flow-text" id="content-empresa">{!! $informacion->contenido !!}</span>
				</div>
			</div>
			<div class="col s12">
				<div class="button-ficha-producto center-align">
					<a href="{{action('SeccionEmpresaController@index')}}" class="waves-effect waves-light btn">CONOCÉ MÁS</a>
				</div>
			</div>
		</div>
	</div>
