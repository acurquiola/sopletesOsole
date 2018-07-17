@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones">
		<h5 class="title-home ">
			CALIDAD
		</h5>
	</div>
	<div class="container" id="container-fluid-secciones">
		<div class="row" style="margin-top: 5%">
			<div class="col s12" style="margin-bottom: 5%">
				<div class="col s12 m6 l6 ">
					<p class="flowt-text"> {!! $calidad->texto !!} </p>
				</div>
				<div class="col s12 m6 l6">
					<h5 class="title-calidad">
						 {!! $calidad->titulo !!} 
					</h5>
					<div class="col s6">
						<img src="images/logoCalidad1.png" alt="">
					</div>
					<div class="col s6">
						<img src="images/logoCalidad2.png" alt="">
					</div>
				</div>
			</div>

			@if($descargas->count()>0)
				@foreach($descargas as $d)
				<div class="col s12 m6 l6 calidad-descargable-div" >
					<div class="col s11 inline">
						<div class="text-calidad-desc">
						 	{!! $d->titulo !!} 
						</div>
						<div class="text-calidad-desc">
						 	Ver Certificado
						</div>
					</div>
					<div class="sol s1 inline">
						<a href=" {{route('calidad-down', $d->file)}}" target="_blank"><img src="images/logo_descarga.png" class="inline right" alt="" ></a>
					</div>
				</div>
				@endforeach
			@endif
		</div>
	</div>
</div>


@endsection

</body>
</html>