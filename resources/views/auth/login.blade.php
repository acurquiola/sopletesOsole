

@extends('layouts.app')

<body>

	<div class="container">
		<div class="row">
			<div class="section"></div>
			<main>
				<center>
					<div class="container">
						<div  class="z-depth-3 y-depth-3 x-depth-3 grey green-text lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE;">
							<div class="section">
								<img src='{{ asset("images/logo.png") }}' alt="" class="responsive-img">

							</div>

							<div class="section"><i class="mdi-alert-error red-text"></i></div>
							<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
								@csrf
								<div class='row'>
									<label class="left" for="">USERNAME</label>
									<div class='input-field col s12'>
										<input class='validate' placeholder="USERNAME" type="text" name='username' id='username' required />
									</div>
								</div>
								<div class='row'>
									<label class="left" for="">CONTRASEÑA</label>
									<div class='input-field col m12'>
										<input class='validate' type='password' placeholder="CONTRASEÑA" name='password' id='password' required />
									</div>
								</div>
								<br/>
								<center>
									<div class='row'>
										<button  type='submit' name='btn_login' class='col s12 btn btn-small red white-text  waves-effect z-depth-1 y-depth-1'>Login</button>
									</div>
								</center>
							</form>
						</div>
					</div>
				</center>
			</main>
		</div>
	</div>
</body>
</html>