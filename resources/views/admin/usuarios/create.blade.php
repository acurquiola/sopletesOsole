@extends('layouts.app')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')
<main>
	<div class="container" id="container-fluid">
		<div class="row">
			<nav>
				<div class="nav-wrapper" id="nav-breadcrumb">
					<div class="col s12">
						<a href="{{ url('adm/home/' )}}" class="breadcrumb">Home</a>
						<a href="{{ url('adm/usuarios/contenido' )}}" class="breadcrumb">Usuarios</a>
						<a href="!#" class="breadcrumb">Crear</a>
					</div>
				</div>
			</nav>	
			<div class="col s12">
				@if ($errors->any())
				<div class="card-panel alert-error">
					<ul><li><i class="material-icons">error_outline</i><b>ALERTA: </b></li>
						@foreach ($errors->all() as $error)
						<li>{{ $error }} </li>
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
		<form method="POST"  enctype="multipart/form-data" action="{{action('UserController@store')}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
			{{ csrf_field() }}    

			<div class="row">
				<h5>Crear Usuario</h5>					
				<div class="divider"></div>
				<div class="input-field col s4">
					<i class="material-icons prefix">keyboard_arrow_right</i>
					<input id="icon_prefix" type="text" class="validate" name="username"  value="{{ old('username') }}" >
					<label for="icon_prefix">Username</label>
				</div>
				<div class="input-field col s4">
					<i class="material-icons prefix">keyboard_arrow_right</i>
					<input id="icon_prefix" type="text" class="validate" name="nombre"  value="{{ old('nombre') }}" >
					<label for="icon_prefix">Nombre</label>
				</div>
				<div class="input-field col s4">
					<i class="material-icons prefix">keyboard_arrow_right</i>
					<input id="icon_prefix" type="text" class="validate" name="apellido"   value="{{ old('apellido') }}" >
					<label for="icon_prefix">Apellido</label>
				</div>
				<div class="input-field col s4">
					<i class="material-icons prefix">keyboard_arrow_right</i>
					<input id="icon_prefix" type="password" class="validate" name="password"   >
					<label for="icon_prefix">Contraseña</label>
				</div>
				<div class="input-field col s4">
					<i class="material-icons prefix">keyboard_arrow_right</i>
					<input id="icon_prefix" type="email" class="validate" name="email"  value="{{ old('email') }}" >
					<label for="icon_prefix">Email</label>
				</div>
				<div class="input-field col s4">
					<select name="tipo_usuario_id">
						@foreach($tipos as $t)
						<option value="{{ $t->id }}"> {{$t->nombre}} </option>
						@endforeach
					</select>
				</div>
				<div class="right">
					<a  href="{{action('UserController@index')}}"  class="waves-effect waves-light btn">Cancelar</a>
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