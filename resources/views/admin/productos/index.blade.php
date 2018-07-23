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
						<a href="#!" class="breadcrumb">Productos</a>
					</div>
				</div>
			</nav>	
			<div class="col s12">
				<h5>Productos</h5>						
				<a href="{{ action('ProductoController@familiaEtiquetaCreate')}}" class="waves-effect waves-light btn right">Familia Etiquetas</a>				
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Nombre</th>
							<th style="width: 300px">Descripción</th>
							<th>Ficha</th>
							<th>Familia</th>
							<th>Orden</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($productos->count()>0)
						@foreach($productos as $p)
						<tr>
							<td>{!! $p->nombre !!}</td>
							<td  style="width: 300px">{!! substr($p->descripcion, 0, 80) !!}...</td>
							<td> @if($p->file==null) NO @else SI @endif</td>
							<td>{{ $p->familia->nombre }}</td>
							<td>{{ $p->orden }}</td>
							<td><a href=" {{ action('ProductoController@edit', $p->id)}}" class=" btn-floating btn-small"><i title="Editar Registro" class="material-icons">edit</i></a>
								@if($p->galeria=='1')
								<a href=" {{ action('ProductoController@galeriaView', ['producto' => $p->id])}}" class="  btn-floating btn-small"><i title="Ver galeria de imágenes" class="material-icons">photo_library</i></a>
								@else
								<a href=" {{ action('ProductoController@galeriaCreate', ['producto' => $p->id])}}" class=" btn-floating btn-small"><i title="Cargar galeria de imágenes" class="material-icons">library_add</i></a>
								@endif
								@if($p->etiqueta=='1')
								<a class='dropdown-trigger btn-floating btn-small' href='#' data-target='dropdown1'><i title="Etiquetas del producto"  class="material-icons">assignment</i></a>
								<ul id='dropdown1' class='dropdown-content'>
									<li><a href=" {{ action('ProductoController@etiquetaCreate', ['producto' => $p->id])}}">Crear</a></li>
									<li><a href=" {{ action('ProductoController@etiquetaView', ['producto' => $p->id])}}"></i>Ver</a></li>
								</ul>
								@else
								<a href=" {{ action('ProductoController@etiquetaCreate', ['producto' => $p->id])}}" class=" btn-floating btn-small"><i title="Cargar etiqueta de producto" class="material-icons">playlist_add</i></a>
								@endif
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
					<div class="center">
						{{$productos->links('vendor.pagination.materializecss')}}
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
		$('.dropdown-trigger').dropdown();
		$('.summernote').summernote({
			minHeight: 100, 

		});

	});
</script>

</body>
</html>