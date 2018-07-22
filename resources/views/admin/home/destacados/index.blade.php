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
						<a href="{{ url('adm/home/destacados' )}}" class="breadcrumb">Destacados</a>
					</div>
				</div>
			</nav>	
			<div class="col s12">
				<h5>Listado de Productos Destacados</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table centered">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Título</th>
							<th>Orden</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($destacados->count()>0)
							@foreach ($destacados as $d)
							<tr>
								<td><img src="{{ asset('images/'.$d->file) }}"></td>
								<td>{!! $d->titulo !!}</td>
								<td>{{ $d->orden }}</td>
								<td><a href=" {{ action('DestacadoController@edit', $d->id)}} "><i class="material-icons">edit</i></a></td>
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