@extends("layouts.admin")
@section("title_menu", "Lista de Usuarios")
@section("content")
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Usuarios Logueados al Sistema <a href="/create"><button class="btn btn-primary">Crear Nuevo</button></a></h3>
		@include('Users.search')
		
	</div>
</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Email</th>
					<th>Opciones</th>
				</thead>

				@foreach($logins as $logi)
				<tr>
					<td>{{$logi->nombre}}</td>
					<td>{{$logi->apellido}}</td>
					<td>{{$logi->email}}</td>
					<td>
						<a href=""><button class="btn btn-info">Editar</button></a>
						<a href=""><button class="btn btn-info">Eliminar</button></a>

					</td>
				</tr>
				@endforeach


			</table>
		</div>
		{{$logins->render()}}
	</div>
</div>
@endsection

