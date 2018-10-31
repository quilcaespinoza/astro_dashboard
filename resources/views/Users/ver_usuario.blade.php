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
		<div class="table-responsive" >
			<table style="width: 80%; margin-left: auto; margin-right: auto"  class=" table-striped">
				<tr align="center">
				{{--<thead align="center">--}}
					<th>Nombre</th>
					<th>Apellido</th>
					<th width="200px">Email</th>
					<th>Opciones</th>
				{{--</thead>--}}
				</tr>

				@foreach($logins as $logi)
				<tr>
					<td>{{$logi->nombre}}</td>
					<td>{{$logi->apellido}}</td>
					<td>{{$logi->email}}</td>
					<td align="center">
						<a href=""><button class="btn btn-primary"><i class="fa fa-pencil-alt"></i></button></a>
						<a href=""><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>

					</td>
				</tr>
				@endforeach


			</table>
		</div>
		{{$logins->render()}}
	</div>
</div>
@endsection

