@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones">
		<h5 class="title-home ">
			CONTACTO
		</h5>
	</div>

	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13127.637969215488!2d-58.6103759!3d-34.6569886!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc775be4805a3%3A0x81424aff10a7d080!2sSOPLETE+LIGA!5e0!3m2!1ses!2sve!4v1531789221815" width="1351" height="390" frameborder="0" style="border:0" allowfullscreen></iframe>


	<div class="container" id="container-fluid-secciones">

	
		<div class="row" style="margin-top: 5%">
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
			<form method="POST"  enctype="multipart/form-data" action="{{action('ContactoController@store')}}" class="col s12">
				{{ csrf_field() }}

				<div class="row">
					<div class="input-field col s6">
						<input id="icon_prefix" type="text" class="validate" name="nombre"  value="{{ old('nombre') }}">
						<label for="icon_prefix">Nombre</label>
					</div>
					<div class="input-field col s6">
						<input id="telefono" type="tel" name="telefono" class="validate"  value="{{ old('telefono') }}">
						<label for="telefono">Teléfono</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input  id="empresa" type="text" name="empresa" class="validate"  value="{{ old('empresa') }}">
						<label for="empresa">Empresa</label>
					</div>
					<div class="input-field col s6">
						<input id="email" type="email"  name="email" class="validate"  value="{{ old('email') }}">
						<label for="email">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input id="mensaje" type="text" name="mensaje" class="validate"  value="{{ old('mensaje') }}">
						<label for="mensaje">Mensaje</label>
					</div>
					<div class="input-field col s6">
						<div class="g-recaptcha" data-sitekey="6LeWhGQUAAAAAMpId_NtdriN-rHICCRgLdqgkuWc"></div>
					</div>
				</div>
				<div class="right button-ficha-producto">
					<button class="btn waves-effect waves-default" style="background-color: #EF5350 ;" type="submit" name="action">Enviar
						<i class="material-icons right">send</i>
					</button>
				</div>
			</form>


		</div>
	</div>
</div>

@endsection


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

