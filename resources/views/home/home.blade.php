@extends('app')

@section('content')


<body>

	<!-- Slider  -->
	@if($sliders->count()>0)
		@include('home.partials.slider')
	@endif

	<!-- Productos destacados  -->
	@if($destacados)
		@include('home.partials.destacados')
	@endif

	

	<!-- La empresa -->
	@if($informacion)
		@include('home.partials.trayectoria')
	@endif




@endsection


@include('partials.script')

	<script>
		$(document).ready(function(){  
			$('.slider').slider({
				height: 690
			})
		});


	</script>


</body>
</html>