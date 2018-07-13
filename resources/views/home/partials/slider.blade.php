
	<div class="slider">
		<ul class="slides" id="slider-home" >
			@foreach ($sliders as $s)
			<li>
				<img src="{{ asset('images/'.$s->file) }}"> 
				<div class="caption caption-home"  >
					<h5 class="title-text-slider">{!! $s->titulo !!} </h5>
					<h3 class="content-text-slider">{!! $s->subtitulo !!} </h3>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
