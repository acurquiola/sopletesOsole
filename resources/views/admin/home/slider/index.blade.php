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
				<h5>Listado de Sliders</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table centered">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Título</th>
							<th>Subtítulo</th>
							<th>Orden</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($sliders->count()>0)
							@foreach ($sliders as $s)
							<tr>
								<td><img src="{{ asset('images/'.$s->file) }}"></td>
								<td>{!! $s->titulo !!}</td>
								<td>{!! $s->subtitulo !!}</td>
								<td>{{ $s->orden }}</td>
								<td><a href=" {{ action('SliderController@edit', $s->id)}} "><i class="material-icons">edit</i></a></td>
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