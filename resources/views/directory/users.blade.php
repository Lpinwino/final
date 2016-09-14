@extends('master')
@section('title', 'Directory')
@section('content')
<div class="container col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2> Directory </h2>
		</div>
		@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
		@endif
		@if ($users->isEmpty())
		<p> No hay usuarios.</p>
		@else
		<table class="table">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Departamento</th>
					<th>Email</th>
					<th>Telefono</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					<td>
						<a href="{!! action('UsersController@show', $user->id) !!}">{!! $user->name !!} </a>
					</td>
					<td>{!! $user->department !!}</td>
					<td>{!! $user->email !!}</td>
					<td>{!! $user->phone !!}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
</div>
@endsection
