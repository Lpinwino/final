@extends('master')
@section('title', 'Create A New Post')
@section('content')
<div class="container col-md-8 col-md-offset-2">
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
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			<fieldset>
				<legend>Crear un nuevo Post</legend>
				<div class ="form-group">
					<label for="title" class="col-lg-2 control-label">Titulo</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="title" placeholder="Titulo" name="title">
					</div>
				</div>
				<div class ="form-group">
					<label for="content" class="col-lg-2 control-label">Contenido</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="content" name="content"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="categories" class="col-lg-2 control-label">Categorias</label>
					<div class="col-lg-10">
						<select class="form-control" id="category" name="categories[]" multiple>
							@foreach($categories as $category)
							<option value="{!! $category->id !!}">
								{!! $category->name !!}
							</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="panel-heading">Subir Archivo </div>
 
                @if (Session::has('success-message'))
                    <div class="alert alert-success">{{ Session::get('success-message') }}</div>
                @endif
 
                @if (Session::has('error-message'))
                    <div class="alert alert-danger">{{ Session::get('error-message') }}</div>
                @endif
 
                <div class="panel-body">
                    {!! Form::open(array('url' => 'uploads/save', 'method' => 'post', 'files' => true)) !!}
 
                        <div class="form-group">
                            {!! Form::label('file', 'File') !!}
                            <span class="btn btn-default btn-file">
                               Select a file {!! Form::file('file') !!}
                            </span>
                        </div>
 
                        <div class="form-group">
                            {!! Form::submit('Send', ["class" => "btn btn-success btn-block"]) !!}
                        </div>
 
                    {!! Form::close() !!}

				<div class ="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						<button type="reset" class="btn btn-default">Cancelar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>
<!-- upload file section -->
  <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                
                </div>
            </div>
        </div>
    </div>
@endsection
