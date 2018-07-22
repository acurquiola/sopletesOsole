@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones">
		<h5 class="title-home ">
			RECUPERAR CONTRASEÑA 
		</h5>
	</div>

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

		@if (session('status'))
		<div class="card-panel alert-success">
			<ul>
				<li>
					{{ session('status') }}              
				</li>
			</ul>
		</div>
		@endif
		<form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
			@csrf
			<h6>Rellena el formulario para recuperar tu contraseña</h6>

			<input type="hidden" name="token" value="{{ $token }}">

			<div class="form-group row">
				<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

				<div class="col-md-6">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

					@if ($errors->has('email'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

				<div class="col-md-6">
					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

					@if ($errors->has('password'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
					@endif
				</div>
			</div>

			<div class="form-group row">
				<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

				<div class="col-md-6">
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
				</div>
			</div>

			<div class="form-group row mb-0">
				<div class="col-md-6 offset-md-4">
					<button type="submit" class="btn btn-primary">
						{{ __('REINICIAR') }}
					</button>
				</div>
			</div>
		</form>


	</div>
</div>

@endsection


@include('partials.script')

<script>

	$(document).ready(function(){   
		$('.collapsible').collapsible();
		$('select').formSelect();  
		$('.summernote').summernote({
			minHeight: 100, 

		});

	});
</script>


</body>
</html>

