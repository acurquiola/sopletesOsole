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
				<h5>Servicios</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Título</th>
							<th>Logo</th>
							<th>Imagen</th>
							<th>Contenido</th>
						</tr>
					</thead>
					<tbody>
						@if($empresa->count()>0)
							@foreach($servicios as $s)
								<tr>
									<td>{!! $s->titulo !!}...</td>
									<td><img src="{{ asset('images/'.$s->icono) }}"></td>
									<td><img src="{{ asset('images/'.$s->file_image) }}"></td>
									<td>{!! substr($s->contenido, 0, 200) !!}...</td>
									<td><a href=" {{ action('ServiciosController@edit', $s->id)}} "><i class="material-icons">edit</i></a></td>
								</tr>
							@foreach
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