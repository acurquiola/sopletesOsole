@extends('app')

@section('content')


<body>

	<!-- Slider  -->
	@include('home.partials.slider')
	
	<!-- Productos destacados  -->

	@include('home.partials.destacados')
	

	<!-- La empresa -->

	@include('home.partials.trayectoria')



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