@extends('layouts.app')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')
<main>
	<div class="container" id="container-fluid">
		<div class="row">
			<div class="col s12">
				<form method="POST"  enctype="multipart/form-data" action="{{action('CalidadController@update', $calidad->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}    
					{{ method_field('PUT')}}  

					<div class="row">
						<h5>Editar Calidad</h5>					
						<div class="divider"></div>
						<div class="col s12">
							<h6 for="textarea1">Título</h6>
						</div>
						<div class="input-field col s12">
							<textarea id="textarea1" class="summernote" name="titulo"> {{ $calidad->titulo}} </textarea>
						</div>
						<div class="col s12">
							<h6 for="textarea1">Texto</h6>
						</div>
						<div class="input-field col s12">
							<textarea id="textarea1" class="summernote" name="texto"> {{ $calidad->texto}} </textarea>
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