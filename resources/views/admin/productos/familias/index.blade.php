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
						<a href="{{ url('adm/productos/contenido' )}}" class="breadcrumb">Productos</a>
						<a href="#!" class="breadcrumb">Familias</a>
					</div>
				</div>
			</nav>	
			<div class="col s12">
				<h5>Familias</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Nombre</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($familias->count()>0)
							@foreach($familias as $f)
								<tr>
									<td><img src="{{ asset('images/productos/familias/'.$f->file_image) }}"></td>
									<td>{!! $f->nombre !!}</td>
									<td>
										<a href=" {{ action('FamiliaController@edit', $f->id)}} "><i class="material-icons">edit</i></a>
										<a onclick="return confirm('¿Realmente desea eliminar este registro?')" href=" {{ action('FamiliaController@eliminar', $f->id)}} "><i class="material-icons">delete</i></a>
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