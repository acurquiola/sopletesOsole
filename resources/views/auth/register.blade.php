@extends('app')

@section('content')


<body>
    <div class="cabecera-secciones">
        <h5 class="title-home ">
            CREAR NUEVA CUENTA
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

        @if (session('alert'))
        <div class="card-panel alert-success">
            <ul>
                <li>ALERTA:
                    {{ session('alert') }}              
                </li>
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
            @csrf

            <div class="form-group row">
                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                <div class="col-md-6">
                    <input id="username" placeholder="Ingrese el username con el que desea ingresar" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                    @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input id="nombre" placeholder="Ingrese su nombre y apellido" type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>

                    @if ($errors->has('nombre'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input  placeholder="Ingrese su dirección de correo electrónico" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

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
                    <input id="password"  placeholder="Ingrese una Contraseña"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <input type="hidden" name="tipo_usuario_id" value="2" required>


            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar la contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm"  placeholder="Ingrese su contraseña nuevamente"  type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Registrar') }}
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

