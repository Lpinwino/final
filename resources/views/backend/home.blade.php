@extends('master')
@section('title', 'Admin Control Panel')
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
						<div class="action-secondary" ><i class="mdi-social-info" ></i></div>
						<h4 class="list-group-item-heading" >Administrar Usuarios</h4>
						<a href="/admin/users" class="btn btn-default btn-raised" >Todos Usuarios</a>
					</div>
				</div>
				<div class ="list-group-separator" ></div>
				<div class ="list-group-item" >
					<div class="row-action-primary" >
						<i class="mdi-social-group" ></i>
					</div>
					<div class="row-content">
						<div class="action-secondary"><i class="mdi-material-info"></i></div>
						<h4 class="list-group-item-heading">Administrar Roles</h4>
						<a href="/admin/roles" class="btn btn-default btn-raised" >Todos Roles</a>
						<a href="/admin/roles/create" class="btn btn-primary btn-raised" >Crear un Rol</a>
					</div>
				</div>
				<div class ="list-group-separator"></div>
				<div class ="list-group-item">
					<div class="row-action-primary">
						<i class="mdi-editor-border-color"></i>
					</div>
					<div class="row-content">
						<div class="action-secondary"><i class="mdi-material-info"></i></div>
						<h4 class="list-group-item-heading">Administrar Posts</h4>
						<a href="/admin/posts" class="btn btn-default btn-raised" >Todos Posts</a>
						<a href="/admin/posts/create" class="btn btn-primary btn-raised" >Crear un Post</a>
					</div>
				</div>
				<div class ="list-group-separator"></div>
				<div class="list-group-item">
					<div class="row-action-primary">
						<i class="mdi-file-folder"></i>
					</div>
					<div class="row-content">
						<div class="action-secondary"><i class="mdi-material-info"></i></div>
							<h4 class="list-group-item-heading">Administrar Categorias</h4>
								<a href="/admin/categories" class="btn btn-default btn-raised" >Todas Categorias</a>
								<a href="/admin/categories/create" class="btn btn-primary btn-raised" >Nueva Categoria</a>
							</div>
						</div>
						<div class="list-group-separator"></div>



						<div class="list-group-item" >
							<div class="row-action-primary" >
								<i class="mdi-file-folder" ></i>
							</div>
							<div class="row-content">
								<div class="action-secondary"><i class="mdi-material-info"></i></div>
									<h4 class="list-group-item-heading">Administrar Eventos</h4>
										<a href="/admin/eventslist" class="btn btn-default btn-raised" >Todo Evento</a>
										<a href="{{ action('excelController@actionImprimirEcel') }}" class="btn btn-primary btn-raised" >Concentrado de Evento</a>
									</div>
								</div>
							<div class="list-group-separator"></div>
							<div class ="list-group-item" >
					<div class="row-action-primary" >
						<i class="mdi-social-group" ></i>
					</div>
					<div class="row-content">
						<div class="action-secondary"><i class="mdi-material-info"></i></div>
						<h4 class="list-group-item-heading">Administrar Tickets</h4>
						<a href="/tickets" class="btn btn-default btn-raised" >Todos Tickets</a>
					</div>
				</div>
				<div class ="list-group-separator"></div>
			</div>
		</div>
	</div>
</div>

@endsection
