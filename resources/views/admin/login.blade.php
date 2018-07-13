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
									<img src="images/logo.png" alt="" class="responsive-img">
									
								</div>

								<div class="section"><i class="mdi-alert-error red-text"></i></div>

								<div class='row'>
									<div class='input-field col s12'>
										<input class='validate' type="text" name='username' id='email' required />
										<label for='email'>Username</label>
									</div>
								</div>
								<div class='row'>
									<div class='input-field col m12'>
										<input class='validate' type='password' name='password' id='password' required />
										<label for='password'>Password</label>
									</div>
									<label style='float: right;'>
										<a><b style="color: #F5F5F5;">Forgot Password?</b></a>
									</label>
								</div>
								<br/>
								<center>
									<div class='row'>
										<button style="margin-left:65px;"  type='submit' name='btn_login' class='col  s6 btn btn-small red white-text  waves-effect z-depth-1 y-depth-1'>Login</button>
									</div>
								</center>

							</div>
						</div>
					</center>
				</main>
			</div>
		</div>
	</body>
</html>