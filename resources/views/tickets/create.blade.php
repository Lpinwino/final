@extends('master')
@section('title', 'Contact')
@section('content')
<div class="container col-md-8 col-md-offset-2">
	<div class="well well bs-component">
		<form class="form-horizontal" method="post">
		@foreach ($errors->all() as $error)
			<p class="alert alert-danger">{{ $error }}</p>
		@endforeach

		@if (Session::has('status'))
		<div class="alert alert-success">
			{{ session('status') }}
			entra aqui
		</div>
		@endif

		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			<fieldset>
				<legend>Enviar un ticket</legend>
				<div class ="form-group">
					<label for="title" class="col-lg-2 control-label">Titutlo</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="title" placeholder="Titulo" name="title">
					</div>
				</div>
				<div class ="form-group">
					<label for="content" class="col-lg-2 control-label">Contenido</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="content" name="content"></textarea>
						<span class="help-block">Sientete libre de preguntar.</span>
					</div>
				</div>
				<div class ="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button class="btn btn-default">Cancelar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
@endsection
