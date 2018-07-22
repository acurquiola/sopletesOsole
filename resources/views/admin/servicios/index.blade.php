@extends('layouts.app')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')
<main>
	<div class="container" id="container-fluid">
		<div class="row">
			@if (session('errors'))
			<div class="card-panel alert-error">
				<ul><li>ALERTA:
					 {{ $errors }}
					</li>
				</ul>
			</div>
			@endif

			@if (session('alert'))
			<div class="card-panel alert-success">
				<ul><li>ALERTA:
						{{ session('alert') }}				
					</li>
				</ul>
			</div>
			@endif
			<nav>
				<div class="nav-wrapper" id="nav-breadcrumb">
					<div class="col s12">
						<a href="{{ url('adm/home/' )}}" class="breadcrumb">Home</a>
						<a href="!#" class="breadcrumb">Servicios</a>
					</div>
				</div>
			</nav>	
			<div class="col s12">
				<h5>Servicios</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Logo</th>
							<th>Imagen</th>
							<th>Contenido</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($servicios->count()>0)
							@foreach($servicios as $s)
								<tr>
									<td> {!! $s->titulo!!} </td>
									<td><img id="img-logo" src="{{ asset('images/'.$s->icono) }}"></td>
									<td><img src="{{ asset('images/'.$s->file_image) }}"></td>
									<td>{!! substr($s->contenido, 0, 100) !!}...</td>
									<td>
										<a href=" {{ action('ServicioController@edit', $s->id)}} "><i class="material-icons">edit</i></a>
										<a onclick="return confirm('¿Realmente desea eliminar este registro?')" href=" {{ action('ServicioController@eliminar', $s->id)}} "><i class="material-icons">delete</i></a>

									</td>
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