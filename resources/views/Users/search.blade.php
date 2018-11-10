<form action="{{ url('ver_usuario') }}" method="POST">
{{ method_field('GET') }}

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText"  placeholder="Ingrese el nombre del  usuario" value="{{$searchText}}">

		<span class="input-group-btn" style="margin-left: 10px">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>

	</div>
</div>


</form>
