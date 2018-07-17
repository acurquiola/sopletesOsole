@extends('layouts.app')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')
<main>
	<div class="container" id="container-fluid">
		<div class="row">
			@if (session('alert'))
			<div class="col s12">
				<div class="toast" id="toast-container">
					{{ session('alert') }}
				</div>
			</div>
			@endif 
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