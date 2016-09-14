@extends('master')
@section('title', 'Event')
@section('content')
<div class="container col-md-8 col-md-offset-2">
	<div class="well well bs-component">
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
		@foreach ($errors->all() as $error)
			<p class="alert alert-danger">{{ $error }}</p>
		@endforeach

		@if (Session::has('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
		@endif
		{!! csrf_field() !!}
			<fieldset>
				<legend>Ingresar nuevo evento</legend>
				<div class ="form-group">
					<label for="title" class="col-lg-2 control-label">Titulo</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ old('title') }}">
					</div>
				</div>
				<div class ="form-group">
					<label for="department" class="col-lg-2 control-label">Departmento</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="department" name="department">{{ old('department') }}</textarea>
						<span class="help-block">Department.</span>
					</div>
				</div>

				<div class ="form-group">
					<label for="concept" class="col-lg-2 control-label">Concepto</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="concept" name="concept">{{ old('concept') }}</textarea>
						<span class="help-block">Objetives of the event.</span>
					</div>
				</div>

				<div class ="form-group">
					<label for="objetives" class="col-lg-2 control-label">Objetivo</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="objetives" name="objetives"></textarea>
						<span class="help-block">Objetives of the event.</span>
					</div>
				</div>
				<div class ="form-group">
					<label for="impact_studTeach" class="col-lg-2 control-label">Numero Estudiantes</label>
					<div class="col-lg-10">
						<input type="number" class="form-control" rows="3" id="impact_studTeach" name="impact_studTeach" value="{{ old('impact_studTeach') }}"> 
						<span class="help-block">Cantidad de alumnos.</span>
					</div>
				</div>

				<div class ="form-group">
					<label for="impact_studTeach" class="col-lg-2 control-label">Numero Maestros</label>
					<div class="col-lg-10">
						<input type="number" class="form-control" rows="3" id="teacherEnvol" name="teacherEnvol" value="{{ old('teacherEnvol') }}"> 
						<span class="help-block">Cantidad de maestros involucrados.</span>
					</div>
				</div>

				<div class ="form-group">
					<label for="date_event" class="col-lg-2 control-label">Fecha inicio evento</label>
					<div class="col-lg-10">
						<input type="date" class="form-control" rows="3" id="date_event" name="date_event" value="{{ old('date_event') }}"> 
						<span class="help-block">Dia que inicia el evento.</span>
					</div>
				</div>
				<div class ="form-group">
					<label for="time_event" class="col-lg-2 control-label">Hora inicio evento</label>
					<div class="col-lg-10">
						<input type="time" class="form-control" rows="3" id="time_event" name="time_event" value="{{ old('time_event') }}"> 
						<span class="help-block">Horario en que inicia el evento.</span>
					</div>
				</div>

				<div class ="form-group">
					<label for="date_event" class="col-lg-2 control-label">Fecha finaliza evento</label>
					<div class="col-lg-10">
						<input type="date" class="form-control" rows="3" id="end_event" name="end_event" value="{{ old('end_event') }}"> 
						<span class="help-block">Dia que finaliza el evento.</span>
					</div>
				</div>
				<div class ="form-group">
					<label for="time_event" class="col-lg-2 control-label">Hora finaliza evento</label>
					<div class="col-lg-10">
						<input type="time" class="form-control" rows="3" id="end_time" name="end_time" value="{{ old('end_time') }}"> 
						<span class="help-block">Horario en que finaliza el evento.</span>
					</div>
				</div>


				<div class ="form-group">
					<label for="description" class="col-lg-2 control-label">Description</label>
					<div class="col-lg-10">
						<textarea class="form-control" rows="3" id="description" name="description">{{ old('description') }}</textarea>
						<span class="help-block">Description of the event.</span>
					</div>
				</div>
					{!! csrf_field() !!}
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
						<button class="btn btn-default">Cancelar</button>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</div>

			
			</fieldset>
		</form>
	</div>
</div>
@endsection
