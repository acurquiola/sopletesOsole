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
				<h5>Archivos - Calidad</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Título</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($descargas->count()>0)
							@foreach($descargas as $d)
								<tr>
									<td>{!! $d->titulo !!}</td>
									<td><a href=" {{ action('CalidadDescargaController@edit', $d->id)}} "><i class="material-icons">edit</i></a></td>
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