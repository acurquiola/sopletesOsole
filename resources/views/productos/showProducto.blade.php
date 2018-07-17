@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones" style="margin-bottom: 5%">
		<h5 class="title-home ">
			PRODUCTOS | {{strtoupper($producto->familia->nombre)}} | {{strtoupper($producto->nombre)}} 
		</h5>
	</div>
	<div class="container" id="container-fluid-secciones">
		<div class="row">
			
			<div class="col s12 m4 l4">
				<ul id="nav-mobile" class="side-nav fixed nav-familias" style="position: relative; box-shadow: none; display: inline">
					@foreach($familias as $f)
					<ul class="collapsible collapsible-accordion  collapsible-familia" style="box-shadow: none;" >
						<li class="bold">
							<a href="{{ action('SeccionProductoController@show', $f->id)}}" class="hover collapsible-header collapsible-familia-header  {{($f->id == $producto->familia->id)?"active":""}}">{{ $f->nombre }}<i class="material-icons rigth " style="margin: 0px;">expand_more</i></a>
							<div class="collapsible-body" {{($f->id == $producto->familia->id)?"style=display:block":""}}>
								<ul>
									@foreach($f->productos as $p)
									<li><a class="hover producto {{($p->id == $producto->id)?"active":""}}" href="{{ action('SeccionProductoController@showProducto', $p->id) }}" >{{ $p->nombre }}</a></li>
									@endforeach
								</ul>
							</div>
						</li>
					</ul>
					@endforeach
				</ul>

			</div>
			<div class="row">
				<div class="col s12 m8 l8">
					<div class="col s12 m6 l6">
						<div class='imagen-producto-zoom center'>
							<img id='bg-imagen' class="materialboxed" src="{{ asset('/images/productos/'.$producto->file_image) }}"> 

						</div>
						<div class="row" style="margin-top: 5%">
							<div class="col s6 m4">
								<div class="miniatura-img" data-srcImage="{{ asset('/images/productos/'.$producto->file_image) }}">
									<img src="{{ asset('/images/productos/'.$producto->file_image) }}" alt="" >
								</div>
							</div>
							@foreach($producto->galerias as $g)
							<div class="col s6 m4">
								<div class="miniatura-img" data-srcImage="{{ asset('/images/productos/galeria/'.$g->file_image) }}">
									<img src="{{ asset('/images/productos/galeria/'.$g->file_image) }}" alt="" >
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<div class="col s12 m6 l6">
						<div class="text-title-producto">
							{!! $producto->nombre !!}
						</div>
						<div class="text-descripcion-producto" style='margin-top:5%'>
							{!! $producto->descripcion !!}
						</div>
						@if($producto->file!=null)
						<div class="button-ficha-producto" style='margin-top:5%'>
							<a href=" {{route('descargas-down', $producto->file)}}" target="_blank" class="waves-effect waves-light btn">DESCARGAR FICHA</a>
						</div>
						@endif
					</div>
				</div>
				

				@if($producto->etiquetas!=null)

				<div class="col s12 m8 l8">
					
					<div class="col s12">
						<ul class="tabs">						
							@foreach($familiaEtiquetas as $f)

							<li class="tab col s3"><a href="#{{$f->id}}">{{$f->nombre}}</a></li>
							
							@endforeach
						</ul>
					</div>
					
					@foreach($etiquetas as $f)

					<div id="{{$f->familia_etiqueta_id}}" class="col s12" style="display: none"> 
						<table>
							<thead>
								<tr>
									<th>Imagen</th>
									<th>Código</th>
									<th>Descripción</th>
									<th>Características</th>
								</tr>
							</thead>
							@foreach($etiquetas as $ff)
							@if($ff->familia_etiqueta_id==$f->familia_etiqueta_id)
							<tbody>
								<tr>
									<td><img style="width: 100px" src="{{ asset('images/productos/etiquetas/'.$ff->file_image)}}" alt="" class="responsive-img"></td>
									<td>{!! $ff->codigo !!}</td>
									<td>{!! $ff->descripcion !!}</td>
									<td>{!! $ff->caracteristicas !!}</td>
								</tr>
							</tbody>
							@endif
							@endforeach
						</table>
					</div>

					@endforeach

					@endif

				</div>
			</div>
		</div>


		@endsection


		@include('partials.script')

		<script>
			$(document).ready(function(){  
				$('.materialboxed').materialbox();
				$( ".miniatura-img" ).click(function() {
					var src = $(this).data("srcimage");
					$("#bg-imagen").attr("src", src);
				});
				$('.tabs').tabs();
				$('.sidenav').sidenav();        
				$('.button-collapse').sideNav();


			});


		</script>


	</body>
	</html>
