
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>

<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '{your-app-id}',
			cookie     : true,
			xfbml      : true,
			version    : '{api-version}'
		});

		FB.AppEvents.logPageView();   

	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "https://connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	$(document).ready(function(){  
    	$('.sidenav').sidenav();
		$(".dropdown-trigger").dropdown({
			constrainWidth: false,
			closeOnClick: false
		});


	});


</script>




