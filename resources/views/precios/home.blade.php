@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones">
		<h5 class="title-home ">
			LISTADO DE PRECIOS
		</h5>
	</div>
	<div class="container">
		<div class="row" style="margin-top: 5%">
			@foreach ($precios as $p)
			<div class="col s12 m6 l3" >
				<div class="card card-descargas-div">
					<div class="card-image card-descargas">
						<img src=" {{ asset('images/imagenListaPrecios.jpg')}} " class="responsive-img"> 
					</div>
				</div>
				<div class="title-text-descarga">
					<span> {!! $p->titulo !!} </span>		
				</div>	
				<div class="inline">
					<a href=" {{route('precios-down', $p->file)}}" target="_blank"><i class="material-icons small iconos-precios down-icon center">vertical_align_bottom</i></a>
					<a href=" {{route('precios-view', $p->file)}}" target="_blank"><i class="material-icons small iconos-precios view-icon center">visibility</i></a>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>


@endsection



@include('partials.script')

</body>
</html>