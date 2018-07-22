<div class="container" id="container-fluid">
	<div class="row">
		<div class="col s12">
			<span class="title-home">
				Productos Destacados
			</span>
		</div>
		@if($productos->count()>0)
			@foreach($destacados as $destacado)
					@foreach($productos as $producto)
					<div class="col s12 m6 l3" >
						<a href=@if(strtoupper($producto->nombre) == strtoupper($destacado->titulo))"{{action('SeccionProductoController@showProducto', $producto->id)}}"@else"#"@endif>
							<div class="card hoverable">
								<div class="card-content card-destacados">
									<img src="{{ asset('images/'.$destacado->file) }}" class="responsive-img"> 
								</div>
								<div class="card-action">
									<span class="card-title card-title-destacados">{!! $destacado->titulo !!}</span>					
								</div>
							</div>
						</a>
					</div>
				@endforeach
			@endforeach
		@else
			@foreach($destacados as $destacado)
				<div class="col s12 m6 l3" >
					<a href="#">
						<div class="card hoverable">
							<div class="card-content card-destacados">
								<img src="{{ asset('images/'.$destacado->file) }}" class="responsive-img"> 
							</div>
							<div class="card-action">
								<span class="card-title card-title-destacados">{!! $destacado->titulo !!}</span>					
							</div>
						</div>
					</a>
				</div>
			@endforeach
		@endif
	</div>
</div>
