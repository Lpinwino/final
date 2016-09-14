@extends('master')
@section('name', 'Edit a user')
@section('content')
<div class="container col-md-6 col-md-offset-3">
	<div class="well well bs-component">
		<form class="form-horizontal" method="post">
			@foreach ($errors->all() as $error)
			<p class="alert alert-danger">{{ $error }}</p>
			@endforeach
			@if (session('status'))
			<div class ="alert alert-success">
				{{ session('status') }}
			</div>
			@endif
			{!! csrf_field() !!}
			<fieldset>
				<legend>Profile</legend>
				<div class="form-group">
					<label for="picture" class="col-lg-2 control-label">Imagen</label>
					<img src="/files_uploaded/{{$user->picture}}" alt="Put an image" width="100" height="110">
				</div>
				<div class ="form-group">
					<label for="name" class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10">
					{{ $user->name }}
					</div>
				</div>
				<div class ="form-group">
					<label for="department" class="col-lg-2 control-label">Departmento</label>
					<div class="col-lg-10">
					{{ $user->department }}
					</div>
				</div>
				<div class ="form-group">
					<label for="email" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						{{ $user->email }}
					</div>
				</div>
				<div class ="form-group">
					<label for="phone" class="col-lg-2 control-label">Telefono</label>
					<div class="col-lg-10">
						{{ $user->phone }}
					</div>
				</div>

				@if(Auth::user()->id == $user->id)
				<div class ="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<a href="{{ action('UsersController@edit', ['id' => $user->id]) }}" class="btn btn-info" >Editar Perfil</a>
					</div>
				</div>
				@endif
			</fieldset>
		</form>
		</div>
</div>
@endsection