@extends('master')
@section('title', 'View all events')
@section('content')
<div class="container col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2> Events </h2>
			@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif

		</div>
		@if ($events->isEmpty())
		<p> No hay Eventos.</p>
		@else
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Titutlo</th>
					<th>Usuario</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach($events as $event)
				<tr>
					<td>{!! $event->id !!} </td>
					<td>
						<a href="{!! action('EventsController@show', $event->id) !!}">{!! $event->title !!}</a>
					</td>
					<td>{!! $event->user->name !!}</td>
					
					<td>{!! $event->status !!}</td>
				</tr>
				@endforeach

			</tbody>
		</table>
		@endif
	</div>
</div>
@endsection