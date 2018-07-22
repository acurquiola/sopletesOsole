@extends('layouts.app')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')
<main>
	<div class="container" id="container-fluid">
		<div class="row">
			<nav>
				<div class="nav-wrapper" id="nav-breadcrumb">
					<div class="col s12">
						<a href="{{ url('adm/home/' )}}" class="breadcrumb">Home</a>
						<a href="{{ url('adm/usuarios/contenido' )}}" class="breadcrumb">Usuarios</a>
						<a href="#!" class="breadcrumb">Crear</a>
					</div>
				</div>
			</nav>		

			<div class="col s12">
			@if ($errors->any())
			<div class="card-panel alert-error">
				<ul><li>ALERTA:
					@foreach ($errors->all() as $error)
					 {{ $error }}
					@endforeach
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
				<h5>Usuarios</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Correo</th>
							<th>Tipo</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($usuarios->count()>0)
						@foreach($usuarios as $u)
						<tr>
							<td>{{ $u->username }}</td>
							<td>{{ $u->nombre }}</td>
							<td>{{ $u->apellido }}</td>
							<td>{{ $u->email }}</td>
							<td>{{ $u->tipo->nombre }}</td>
							<td><a href=" {{ action('UserController@edit', $u->id)}} "><i class="material-icons">edit</i></a>
								<a onclick="return confirm('¿Realmente desea eliminar este registro?')" href=" {{ action('UserController@eliminar', $u->id)}} "><i class="material-icons">delete</i></a>
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