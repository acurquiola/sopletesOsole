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
						<a href="{{ url('adm/productos/contenido' )}}" class="breadcrumb">Productos</a>
						<a href="#!" class="breadcrumb">Editar</a>
					</div>
				</div>
			</nav>	
			<div class="col s12">
				<form method="POST"  enctype="multipart/form-data" action="{{action('ProductoController@update', $producto->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}
					{{ method_field('PUT')}}  

					<div class="row">
						<h5>Editar Producto</h5>					
						<div class="divider"></div>
						<div class="file-field input-field s6">
							<div class="btn">
								<span>Ficha</span>
								<input type="file" name="file">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						<div class="file-field input-field s6">
							<div class="btn">
								<span>Imagen</span>
								<input type="file" name="file_image">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						<h6 for="textarea1">Nombre</h6>
						<div class="input-field col s12">							
							<input id="icon_prefix" type="text" class="validate" name="nombre" value="{{$producto->nombre}} ">
						</div>
						<h6 for="textarea1">Descripción</h6>
						<div class="input-field col s12">
							<textarea id="textarea1" class="summernote" name="descripcion">{{$producto->descripcion}}"</textarea>
						</div>
						<div class="input-field col s3">
							<i class="material-icons prefix">text_rotation_none</i>
							<input id="icon_prefix" type="text" class="validate" name="orden"  value="{{$producto->orden}}">
							<label for="icon_prefix">Orden</label>
						</div>
						<div class="input-field col s9">
							<select name="familia_id" readonly>
								@foreach($familias as $f)
								<option value="{{ $f->id }}" @if($f->id==$producto->familia->id) selected @endif>  {{$f->nombre}} </option>
								@endforeach
							</select>
						</div>
						<div class="right">
							<a href="{{action('ProductoController@index')}}"  class="waves-effect waves-light btn">Cancelar</a>
							<button class="btn waves-effect waves-light" type="submit" name="action">Submit
								<i class="material-icons right">send</i>
							</button>
						</div>
					</div>
				</form>
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