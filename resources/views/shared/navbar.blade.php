<style>
	.dropdown-menu>li>a { color: black!important; }
	.navbar .nav > li > .dropdown-menu:before { border:none!important; content:none!important; }
</style>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		 <img src="/images/logo_ITT1.png" alt="HTML5 Icon" width="60" height="60">
	</div>
	<!-- Navbar Right -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav navbar-right">
			<li class="active"><a href="/">Inicio</a></li>
			<li><a href="/about">Sobre Nosotros</a></li>
			<li><a href="/contact">Contacto</a></li>
			<li><a href="/calendary">Eventos</a></li>
			<li><a href="/user/directory">Directorio</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Miembro <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					@if (Auth::check())
						@if(Auth::user()->hasRole('manager'))
							<li><a href="/admin">Admin</a></li>
						@elseif(Auth::user()->hasRole('directivos'))
							<li><a href="/director">Director Panel</a></li>
						@endif
						<li><a href="{{ url('user', Auth::user()->id) }}">Perfil</a></li>
						<li><a href="/users/logout">Logout</a></li>
					@else
						<li><a href="/users/register">Registrar</a></li>
						<li><a href="/users/login">Login</a></li>
					@endif
				</ul>
			</li>
		</ul>
	</div>
</div>
</nav>
