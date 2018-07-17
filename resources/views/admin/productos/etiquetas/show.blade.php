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
				<h5>Etiquetas</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Código</th>
							<th>Descripción</th>
							<th>Características</th>
							<th>Familia</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($etiquetas->count()>0)
							@foreach($etiquetas as $f)
								<tr>
									<td><img src="{{ asset('images/productos/etiquetas/'.$f->file_image) }}"></td>
									<td>{{ $f->codigo }}</td>
									<td>{!! $f->descripcion !!}</td>
									<td>{!! $f->caracteristicas !!}</td>
									<td>{!! $f->familia_etiqueta->nombre !!}</td>
									<td><a href="{{action('ProductoController@etiquetaDelete', ['producto' => $f->id])}}"><i class="material-icons">delete</i></a></td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="4">No existen registros</td>
							</tr>
						@endif
					</tbody>
				</table>

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