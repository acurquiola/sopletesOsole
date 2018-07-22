@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones">
		<h5 class="title-home ">
			RESULTADOS
		</h5>
	</div>
	<div class="container">
		<div class="row" style="margin-top: 5%">
			@if($resultado->count()>0)
			@foreach($resultado as $p)
				<div class="col s12 m6 l6">
					<a href="{{ action('SeccionProductoController@showProducto', $p->id) }}">
						<div class="card hoverable card-familias-div center">
							<div class="card-image card-familias">
								<img class="responsive-img" style="width: 75%"src="{{ asset('/images/productos/'.$p->file_image) }}"> 
								<div class="cont-image"></div>
							</div>
						</div>
						<div class="title-text-familias">
							<span> {!!strtoupper( $p->nombre )!!} </span>		
						</div>	
					</a>
				</div>
				@endforeach
			@else
			<div class="col s12 " >
				<div class="button-ficha-producto center-align">
					<h4>
						No se encontraron resultados. 
					</h4>
					<a href="{{action('HomeController@index')}}" class="waves-effect waves-light btn">VOLVER</a>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>


@endsection


@include('partials.script')
</body>
</html>