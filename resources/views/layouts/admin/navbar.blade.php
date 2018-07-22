<header>
	<nav>
		<div class="nav-wrapper nav-admin">
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
   					Cerrar Sesión
					</a>
				</li>
			</ul>
		</div>
	</nav>

	<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: one;">
	    {{ csrf_field() }}
	</form>
