@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones">
		<h5 class="title-home ">
			SERVICIOS
		</h5>
	</div>
	<div class="container" id="container-fluid-secciones" >
		<div class="row" style="margin-top: 5%">
			<div class="col s12">
				@foreach ($servicios as $s)
				<div class="col s12 m4 l4 center">
					<img src=" {{asset('images/'.$s->icono)}} " alt="">
					<h5 class="title-text-servicios"> {!! $s->titulo !!} </h5>
				</div>
				@endforeach
			</div>
		</div>
		@foreach($servicios as $s)
		<div class="row">
			<div class="col s12">
				@if($s->id%2==0)
					<div class="col s12 m6 l6 title-servicios">
						<h3>{!! $s->titulo !!} </h3>
						<div class="divider"></div>

						<p>{!! $s->contenido !!} </p>
					</div>
					<div class="col s12 m6 l6" class="img-servicios">
						<img src=" {{ asset('images/'.$s->file_image)}} " class="responsive-img" alt="" >
					</div>
				@else
					<div class="col s12 m6 l6" class="img-servicios">
						<img src=" {{ asset('images/'.$s->file_image)}} " class="responsive-img" alt="" >
					</div>
					<div class="col s12 m6 l6 title-servicios">
						<h3>{!! $s->titulo !!} </h3>
						<div class="divider"></div>

						<p>{!! $s->contenido !!} </p>
					</div>
				@endif
			</div>
		</div>
		<div class="divider divider-secciones"></div>
		@endforeach
	</div>
</div>


@endsection

</body>
</html>