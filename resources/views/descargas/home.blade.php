@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones">
		<h5 class="title-home ">
			DESCARGAS
		</h5>
	</div>
	<div class="container">
		<div class="row" style="margin-top: 5%">
			@foreach ($descargas as $d)
			<div class="col s12 m6 l3" >
				<div class="card hoverable card-descargas-div">
					<div class="card-image card-descargas">
						<img src=" {{ asset('images/'.$d->file_image)}} " class="responsive-img"> 
					</div>
				</div>
				<div class="title-text-descarga">
					<span> {!! $d->titulo !!} </span>		
				</div>	
				<div class="inline">
					
					<a href=" {{route('descargas-down', $d->file)}}" target="_blank"><i class="material-icons small iconos-descargas down-icon center">vertical_align_bottom</i></a>
					<a href=" {{route('descargas-view', $d->file)}}" target="_blank"><i class="material-icons small iconos-descargas view-icon center">visibility</i></a>
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