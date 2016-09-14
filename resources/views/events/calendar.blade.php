@extends('master2')
@section('title', 'Calendario de eventos')
@section('content')

<div class="container col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="{{ action('EventsController@create') }}" class="btn btn-default">Crear Evento</a>
		</div>
	</div>

	<br>

	<div class="hero-unit">
		<h1>Calendario de Eventos</h1>

		<p>Eventos registrados en el sistemas.</p>

		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
		</script>
	</div>

	<div class="page-header">

		<div class="pull-right form-inline">
			<div class="btn-group">
				<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
				<button class="btn" data-calendar-nav="today">Hoy</button>
				<button class="btn btn-primary" data-calendar-nav="next"> Sig >></button>
			</div>
			<div class="btn-group">
				<button class="btn btn-warning" data-calendar-view="year">Año</button>
				<button class="btn btn-warning active" data-calendar-view="month">Mes</button>
				<button class="btn btn-warning" data-calendar-view="week">Semana</button>
				<button class="btn btn-warning" data-calendar-view="day">Dia</button>
			</div>
		</div>

		<h3></h3>
		</div>

	<div class="row">
		<div class="col-xs-12">
			<div id="calendar"></div>
		</div>
		

	<div id="disqus_thread"></div>
	<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

	<div class="modal hide fade" id="events-modal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Event</h3>
		</div>
		<div class="modal-body" style="height: 400px">
		</div>
		<div class="modal-footer">
			<a href="#" data-dismiss="modal" class="btn">Cerrar</a>
		</div>
	</div>
</div>
<style>
.navbar {
	margin-bottom:0px;
	color:white;
}
.navbar a{
	color:white!important;    box-shadow: none!important;
    text-shadow: none!important;
}
.container {
	background-color:white;
	padding-top:20px;
	padding-bottom:20px;
}
.navbar .navbar-nav>.active>a, .navbar .navbar-nav>.active>a:focus, .navbar .navbar-nav>.active>a:hover {
    color: inherit;
    background-color: rgba(255,255,255,.1);
    box-shadow: none;
    text-shadow: none;
}
.navbar .dropdown-menu li>a:focus, .navbar .dropdown-menu li>a:hover, .navbar.navbar-default .dropdown-menu li>a:focus, .navbar.navbar-default .dropdown-menu li>a:hover {
    color: #009688;
    background-color: #eee;
}

.navbar, .navbar.navbar-default {
    background-color: #009688;
    color: rgba(255,255,255,.84);
        border-radius: 0px;
    border: none;
}
@media (max-width: 1199px) {
.navbar .navbar-nav>li>a {
    padding-top: 15px;
    padding-bottom: 15px;
}
}

body {
      background-color: #EEE;
}

</style>
@endsection
