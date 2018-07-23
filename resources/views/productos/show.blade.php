@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones" style="margin-bottom: 5%">
		<h5 class="title-home ">
			PRODUCTOS | {{strtoupper($familia->nombre)}}
		</h5>
	</div>
	<div class="container" id="container-fluid-secciones">
		<div class="row">
			
			<div class="col s12 m4 l4">
				<ul id="nav-mobile" class="side-nav fixed nav-familias" style="position: relative; box-shadow: none; display: inline; border: 0">
					@foreach($familias as $f)
					<ul class="collapsible collapsible-accordion  collapsible-familia" style="box-shadow: none;" >
						<li class="bold">
							<a href="{{ action('SeccionProductoController@show', $f->id)}}" class="hover collapsible-header collapsible-familia-header  {{($f->id == $familia->id)?"active":""}}">{{ $f->nombre }}<i class="material-icons rigth " style="margin: 0px;">expand_more</i></a>
							<div class="collapsible-body" {{($f->id == $familia->id)?"style=display:block":""}}>
								<ul>
									@foreach($f->productos as $p)
									<li><a class="hover producto " href="{{ action('SeccionProductoController@showProducto', $p->id) }}">{!! $p->nombre !!}</a></li>
									@endforeach
								</ul>
							</div>
						</li>
					</ul>
					@endforeach
				</ul>
			</div>
			<div class="col s12 m8 l8">
				@foreach($productos as $p)
				<div class="col s12 m6 l6">
					<a href="{{ action('SeccionProductoController@showProducto', $p->id) }}">
						<div class="card hoverable card-familias-div center">
							<div class="card-image card-familias">
								<img class="responsive-img" style="width: 75%"src="{{ asset('/images/productos/'.$p->file_image) }}"> 
								<div class="cont-image"></div>
							</div>
						</div>
						<div class="title-text-familias">
							<span>{{strtoupper($p->nombre)}} </span>		
						</div>	
					</a>
				</div>
				@endforeach
				<div class="col s12">
					<div class="center">
						{{$productos->links('vendor.pagination.materializecss')}}
					</div>
				</div>
			</div>


		</div>
	</div>
</div>


@endsection


@include('partials.script')

<script>
	$(document).ready(function(){  
		$('.sidenav').sidenav();        
		$(".button-collapse").sideNav()

	});


</script>


</body>
</html>
