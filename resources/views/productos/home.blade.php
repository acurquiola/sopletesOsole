@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones">
		<h5 class="title-home ">
			PRODUCTOS
		</h5>
	</div>
	<div class="container">
		<div class="row" style="margin-top: 5%">
			@foreach ($familias as $f)
			<div class="col s12 m6 l4" >
				<a href=" {{ action('SeccionProductoController@show', $f->id)}}">
					<div class="card hoverable card-familias-div">
						<div class="card-image card-familias">
							<img src=" {{ asset('images/productos/familias/'.$f->file_image)}} " class="responsive-img"> 
							<div class="cont-image"></div>
						</div>
					</div>
					<div class="title-text-familias">
						<span> {!! $f->nombre !!} </span>		
					</div>	
				</a>
			</div>
			@endforeach
		</div>
	</div>
</div>


@endsection

</body>
</html>