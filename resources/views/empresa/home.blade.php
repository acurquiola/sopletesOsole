@extends('app')

@section('content')


<body>
	<div class="cabecera-secciones">
		<h5 class="title-home ">
			QUIENES SOMOS
		</h5>
	</div>
	@if($empresa)
		<img src="{{ asset('images/'.$empresa->file_image) }}" class="responsive-img"> 		
		<div class="container" id="container-fluid-secciones">
			<div class="row" style="margin-top: 5%">
				<div class="col s12">
					<div class="col s12 m6 l6">
						<span>
							{!! $empresa->texto !!}
						</span>
					</div>
					<div class="col s12 m6 l6">
						<div class="video-container">
							<iframe width="853" height="480" src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endif

	</div>


@endsection

</body>
</html>