@extends('master')
@section('title', 'View a event')
@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="well well bs-component">
			<div class="content">
				<h2 class="header">{!! $event->title !!}</h2>
				<p><strong>Departmento</strong>: {{ $event->department }}</p>
				<p><strong>Concepto</strong>: {{ $event->concept }}</p>
				<p><strong>Objetivos</strong>: {{ $event->objetives }}</p>
				<p><strong>Estudiantes/Maestros</strong>: {{ $event->impact_studTeach }}</p>
				<p><strong>Fecha del Evento</strong>: {{ $event->date_event }}</p>
				<p><strong>Inicio del Evento</strong>: {{ $event->time_event }}</p>
				<p><strong>Final del Evento</strong>: {{ $event->end_event }}</p>
				<p><strong>Descripcion</strong>: {{ $event->description }}</p>
				<p><strong>Creacion del Evento</strong>: {{ $event->creation_at }} </p>

				<legend>Flayer de evetno</legend>
				<div class="form-group">
					<label for="picture" class="col-lg-2 control-label">Imagen</label>
					<img src="/files_uploaded/{{$event->picture}}" alt="Put an image" width="400" height="550">
				</div>
			</div>
			@if(Auth::user()->hasRole('manager'))
			<div class="row">
				<div class="col-sm-8">
					<div class="row">
						<div class="col-md-4">
							<a href="{!! action('EventsController@edit', $event->id) !!}" class="btn btn-info" >Editar</a>
						</div>
						<div class="col-md-4">
							<a href="{!! action('EventsController@changeStatus', array('id' => $event->id, 'status' => 2)) !!}" class="btn btn-info" >Aprovar</a>
						</div>
						<div class="col-md-4">
							<a href="{!! action('EventsController@changeStatus', array('id' => $event->id, 'status' => 3) ) !!}" class="btn btn-info" >Denegar</a>
						</div>
					</div>
				</div>
				<div class="col-sm-2 col-sm-offset-1">
					<a href="{!! action('EventsController@destroy', $event->id) !!}" class="btn btn-warning">Delete</a>
				</div>
			</div>
			@endif
			<div class="clearfix"></div>
		</div>	
	</div>
</div>


@endsection