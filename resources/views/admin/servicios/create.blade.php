@extends('layouts.app')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')
<main>
	<div class="container" id="container-fluid">
		<div class="row">
			<div class="col s12">
				<form method="POST"  enctype="multipart/form-data" action="{{action('ServicioController@store')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}    

					<div class="row">
						<h5>Creae Servicio</h5>					
						<div class="divider"></div>
						<div class="file-field input-field s6">
							<div class="btn">
								<span>Logo</span>
								<input type="file" name="icono">
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
						<div class="col s12">
							<h6 for="textarea1">Título</h6>
						</div>
						<div class="input-field col s12">
							<textarea id="textarea1" class="summernote" name="titulo"> </textarea>
						</div>
						<div class="col s12">
							<h6 for="textarea1">Contenido</h6>
						</div>
						<div class="input-field col s12">
							<textarea id="textarea1" class="summernote" name="contenido"> </textarea>
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