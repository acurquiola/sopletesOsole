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
				<h5>Empresa</h5>					
				<div class="divider"></div>
				<table class="index-table responsive-table ">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Texto</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody>
						@if($empresa)
							<tr>
								<td><img src="{{ asset('images/'.$empresa->file_image) }}"></td>
								<td>{!! substr($empresa->texto, 0, 200) !!}...</td>
								<td><a href=" {{ action('EmpresaController@edit', $empresa->id)}} "><i class="material-icons">edit</i></a></td>
							</tr>
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