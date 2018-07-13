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
				<form method="POST"  enctype="multipart/form-data" action="{{action('SliderController@store')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}

					<div class="row">
						<h5>Crear Slider</h5>					
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
							<input id="icon_prefix" type="text" class="validate" name="orden">
							<label for="icon_prefix">Orden</label>
						</div>
						<div class="input-field col s6">
							<select name="section_id" readonly>
								<option value={{$secciones->id}}>  {{$secciones->nombre}} </option>
							</select>
						</div>
						<h6 for="textarea1">Título</h6>
						<div class="input-field col s12">
							<textarea id="textarea1" class="summernote" name="titulo"></textarea>
						</div>
						<div class="input-field col s12">
							<h6 for="textarea1">Sub-título</h6>
							<textarea id="textarea2" class="summernote" name="subtitulo"></textarea>
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