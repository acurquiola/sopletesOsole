@extends('layouts.app')
@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')

@include('partials.script')

	<script>
		  $(document).ready(function(){
		    $('.collapsible').collapsible();
		  });
	</script>

</body>
</html>