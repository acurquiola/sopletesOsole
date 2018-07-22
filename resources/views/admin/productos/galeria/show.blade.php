@extends('layouts.app')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')
<main>
	<div class="container" id="container-fluid">
		<div class="row">
			@if ($errors->any())
			<div class="card-panel alert-error">
				<ul>
					<li><i class="material-icons">error_outline</i><b>ALERTA: </b></li>
					@foreach ($errors->all() as $error)
					<li>{{ $error }} </li>
					@endforeach
				</ul>
			</div>
			@endif

			@if (session('alert'))
			<div class="card-panel alert-success">
				<ul>
					<li>ALERTA:
						{{ session('alert') }}				
					</li>
				</ul>
			</div>
			@endif
			<nav>
				<div class="nav-wrapper" id="nav-breadcrumb">
					<div class="col s12">
						<a href="{{ url('adm/home/' )}}" class="breadcrumb">Home</a>
						<a href="{{ url('adm/productos/contenido' )}}" class="breadcrumb">Productos</a>
						<a href="!#" class="breadcrumb">Galeria</a>
					</div>
				</div>
			</nav>	
			<div class="col s12">
				<h5>Galeria de Imágenes | Producto: {!! $producto->nombre !!}</h5>	
				<div class="divider"></div>

				<div class="col s12" style="margin-top: 5%">
				@foreach($producto->galerias as $g)
					<div class="col s12 m2 center galeria">
						<img src=" {{ asset('images/productos/galeria/'.$g->file_image)}} " alt="">
						<div>
							<a href="{{ action('ProductoController@galeriaDelete', $g->id)}}"><i class="material-icons">delete</i></a>
						</div>
					</div>
				@endforeach
				</div>
				<div class="right">
					<a href="{{ action('ProductoController@index')}}" class="waves-effect waves-light btn">Volver</a>
				</div>
			</div>
		</div>
	</div>
	
</main>

@include('partials.script')

<script>

	$(document).ready(function(){		
		M.AutoInit();
		$('.collapsible').collapsible();
		$('select').formSelect();  
		$('.summernote').summernote({
			minHeight: 100, 

		});

	});
</script>

</body>
</html>