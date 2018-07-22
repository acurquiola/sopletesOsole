@extends('layouts.app')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')
<main>
	<div class="container" id="container-fluid">
		<div class="row">
			@if($errors->count()>0)
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
						<a href="{{ url('adm/descargas/contenido' )}}" class="breadcrumb">Descargas</a>
					</div>
				</div>
			</nav>	
			<div class="col s12">
				<h5>Descargas</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Texto</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($descargas->count()>0)
						@foreach($descargas as $d)
						<tr>
							<td><img src="{{ asset('images/'.$d->file_image) }}"></td>
							<td>{!! $d->titulo !!}</td>
							<td>
								<a href=" {{ action('DescargaController@edit', $d->id)}} "><i class="material-icons">edit</i></a>
								<a onclick="return confirm('¿Realmente desea eliminar este registro?')" href=" {{ action('DescargaController@eliminar', $d->id)}} "><i class="material-icons">delete</i></a>

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