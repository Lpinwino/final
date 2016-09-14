@extends('master')
@section('name', 'Edit a user')
@section('content')
<div class="container col-md-6 col-md-offset-3">
	<div class="well well bs-component">
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
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
				<legend>Editar Usuario</legend>
				<div class ="form-group">
					<label for="name" class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10">
					<input type="text" class="form-control" placeholder="Name" name="name"
					value="{{ $user->name }}">
					</div>
				</div>
				<div class ="form-group">
					<label for="department" class="col-lg-2 control-label">Departamento</label>
					<div class="col-lg-10">
					<input type="text" class="form-control" placeholder="Department" name="department"
					value="{{ $user->department }}">
					</div>
				</div>
				<div class ="form-group">
					<label for="email" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						<input type="email" class="form-control" placeholder="Email" name="email"
					value="{{ $user->email }}">
					</div>
				</div>
				<div class ="form-group">
					<label for="phone" class="col-lg-2 control-label">Telefono</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" placeholder="Phone" name="phone"
					value="{{ $user->phone}}">
					</div>
				</div>

				@if(Auth::user()->roles[0]->name == "manager")
				<div class ="form-group">
					<label for="select" class="col-lg-2 control-label">Rol</label>
					<div class="col-lg-10">
						<select class="form-control" id="role" name="role[]"multiple>
							@foreach($roles as $role)
							<option value="{!! $role->id !!}"
								@if(in_array($role->id, $selectedRoles))
								selected="selected" @endif >{!! $role->display_name !!}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				@else
					<input type="hidden" value="{{ Auth::user()->roles[0]->id }}" name="role[]">
				@endif
				<div class ="form-group">
					<label for="password" class="col-lg-2 control-label">Password</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" name="password">
					</div>
				</div>
				<div class ="form-group">
					<label for="password" class="col-lg-2 control-label">Confirmar password</label>
					<div class="col-lg-10">
						<input type="password" class="form-control" name="password_confirmation">
					</div>
				</div>
				<div class="form-group is-empty is-fileinput">
					<div class="col-xs-12">
						<input type="file" name="picture">
						<div class="input-group">
							<input type="text" readonly="" class="form-control" placeholder="Image">
							<span class="input-group-btn input-group-sm">
								<button type="button" class="btn btn-fab btn-fab-mini">
									<i class="mdi-editor-attach-file"></i>
								</button>
							</span>
						</div>
			            <span class="material-input"></span>
		            </div>
		        </div>
		
				<div class ="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<a href="{{ url('users', $user->id) }}" class="btn btn-default">Cancelar</a>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</div>
			</fieldset>
		</form>
		</div>
</div>
@endsection