@extends('layouts.app')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')
<main>
	<div class="container" id="container-fluid">
		<div class="row">
			<div class="col s12">
				<form method="POST"  enctype="multipart/form-data" action="{{action('SliderController@update', $slider->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}    
					{{ method_field('PUT')}}  

					<div class="row">
						<h5>Editar Slider</h5>					
						<div class="divider"></div>
						<div class="file-field input-field s6">
							<div class="btn">
								<span>Imagen</span>
								<input type="file" name="file">
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text">
							</div>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">text_rotation_none</i>
							<input id="icon_prefix" type="text" class="validate" name="orden" value=" {{ $slider->orden}} ">
							<label for="icon_prefix">Orden</label>
						</div>
						<div class="input-field col s6">
							<select name="section_id">
								@foreach ($secciones as $seccion)
									<option value="{{ $seccion->id }}" @if($seccion->id == $slider->section->id) selected @endif >{{ $seccion->nombre }}</option>
								@endforeach
							</select>
						</div>
						<h6 for="textarea1">Título</h6>
						<div class="input-field col s12">
							<textarea id="textarea1" class="summernote" name="titulo"> {{ $slider->titulo}} </textarea>
						</div>
						<div class="input-field col s12">
							<h6 for="textarea1">Sub-título</h6>
							<textarea id="textarea2" class="summernote" name="subtitulo"> {{ $slider->subtitulo}} </textarea>
						</div>
						<div class="right">
							<a class="waves-effect waves-light btn">Cancelar</a>
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