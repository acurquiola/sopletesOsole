<div class="container" id="container-fluid">
		<div class="row">
			<div class="col s12">
				<span class="title-home">
					Productos Destacados
				</span>
			</div>
			@foreach($destacados as $destacado)
			<div class="col s12 m6 l3" >
				<div class="card hoverable">
					<div class="card-content card-destacados">
						<img src="{{ asset('images/'.$destacado->file) }}" class="responsive-img"> 
					</div>
					<div class="card-action">
						<span class="card-title card-title-destacados">{!! $destacado->titulo !!}</span>					
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
