@extends('master')
@section('title', 'Panel de Director')
@section('content')
<div class="container">
	<div class="row banner">
		<div class="col-md-12">
			<div class="list-group">

				<div class ="list-group-item">
					<div class="row-action-primary">
						<i class="mdi-social-person"></i>
					</div>
					<div class="row-content">
						<div class="action-secondary"><i class="mdi-social-info"></i></div>
						<h4 class="list-group-item-heading">Lista de Usuarios</h4>
						<a href="/direcuser" class="btn btn-default btn-raised">Todos Usuarios</a>
					</div>
				</div>

				<div class="list-group-item">
					<div class="row-action-primary">
						<i class="mdi-file-folder"></i>
					</div>
					<div class="row-content">
						<div class="action-secondary"><i class="mdi-material-info"></i></div>
						<h4 class="list-group-item-heading">Ver lista Actividades</h4>
						<a href="eventslist" class="btn btn-default btn-raised" >Todos Actividdades</a>
						
					</div>
				</div>
				<div class="list-group-separator"></div>
			</div>
		</div>
	</div>
</div>

@endsection
