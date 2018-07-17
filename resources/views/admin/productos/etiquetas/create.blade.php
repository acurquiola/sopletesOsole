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
				<form method="POST"  enctype="multipart/form-data" action="{{action('ProductoController@etiquetaStore')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}

					<div class="row">
						<h5>Crear Etiqueta del Producto {!! $producto->nombre !!}</h5>					
						<div class="divider"></div>
						<div class="file-field input-field col s12">
							<div class="btn">
								<span>Imagen</span>
								<input type="file" name="file_image">
							</div>
							<label for=""></label>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Cargue una o varias imágenes">
							</div>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">label</i>
							<input id="icon_prefix" type="text" class="validate" name="codigo">
							<label for="icon_prefix">Código</label>
						</div>
						<div class="input-field col s6">
							<select name="familia_etiqueta_id" readonly>
								<option value="" disabled selected>Seleccionar Familia</option>
								@foreach($familias as $f)
								<option value="{{ $f->id }}">  {{$f->nombre}} </option>
								@endforeach
							</select>
						</div>
						<h6 for="textarea1">Descripción</h6>
						<div class="input-field col s12">
							<textarea id="textarea1" class="summernote" name="descripcion"></textarea>
						</div>
						<h6 for="textarea1">Características</h6>
						<div class="input-field col s12">
							<textarea id="textarea1" class="summernote" name="caracteristicas"></textarea>
						</div>
						<input type="hidden" name="producto_id" value="{{$producto->id}}">
						<div class="right">
							<a href="{{action('ProductoController@etiquetaCreate', ['producto' => $producto->id ])}}" class="waves-effect waves-light btn">Cancelar</a>
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