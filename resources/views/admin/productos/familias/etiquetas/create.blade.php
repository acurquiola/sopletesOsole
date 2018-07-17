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
				<form method="POST"  enctype="multipart/form-data" action="{{action('ProductoController@familiaEtiquetaStore')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
					{{ csrf_field() }}

					<div class="row">
						<h5>Crear Familia de Etiquetas</h5>					
						<div class="divider"></div>
						<div class="input-field col s12">
							<i class="material-icons prefix">label</i>
							<input id="icon_prefix" type="text" class="validate" name="nombre">
							<label for="icon_prefix">Nombre</label>
						</div>
						<div class="right">
							<a class="waves-effect waves-light btn">Cancelar</a>
							<button class="btn waves-effect waves-light" type="submit" name="action">Submit
								<i class="material-icons right">send</i>
							</button>
						</div>
					</div>

					<div class="row">
						<h5>Listado de Familia de Etiquetas</h5>	
						<table>
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								@if($familias->count()>0)
									@foreach($familias as $f)
										<tr>
											<td>{{$f->nombre}}</td>
											<td><a href="{{ action('ProductoController@familiaEtiquetaDelete', $f->id)}}"><i class="material-icons">delete</i></a></td>
										</tr>
									@endforeach
								@else
									<tr>
										<td colspan="2">No hay registros disponibles</td>
									</tr>
								@endif

							</tbody>
						</table>
						
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