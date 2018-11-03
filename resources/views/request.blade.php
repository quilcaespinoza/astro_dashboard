@extends("layouts.admin")

@section("title_menu", "Solicitudes Pendientes de Carta Astral")

@section("content")
    {{--<div style="background: red">--}}
    <form action="filter_requests"  method="get">
        <div class="form-group" style="width: 500px;">
            <div class="input-group">
                <input type="search" name="query" class="form  form-control" placeholder="Buscar por Email">
                <input type="submit" class="btn btn-primary">
            </div>
        </div>
    </form>
    @if(count($persons) >0)
        <table  align="center" class="table-striped" style=" width: 100%">
            <tr align="center">
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Fecha Nacimiento</th>
                <th>Lugar Nacimiento</th>
                <th>Hora Nacimiento</th>
                <th>Opciones</th>
            </tr>
            @foreach($persons as $person)
                <tr>
                    <td>{{utf8_decode($person->nombre)}}</td>
                    <td>{{utf8_decode($person->apellido)}}</td>
                    <td>{{utf8_decode($person->email)}}</td>
                    <td>{{utf8_decode($person->fecha_nacimiento)}}</td>
                    <td class="td_lugar">{{utf8_decode($person->lugar_nacimiento)}}</td>
                    <td>{{utf8_decode($person->hora_nacimiento)}}</td>
                    <td align="center">
                        {{--<button class="btn btn-success"><i class="fa fa-user"></i></button>--}}
                        <button class="btn btn-primary btnCarta" id="{{$person->id}}"  data-toggle="modal" data-target="#modalFile"><i class="fa fa-file"></i></button>
{{--                        <a href="{{route("delete_person", [$person->id])}}"  class="btn btn-danger"><i class="fa fa-trash"></i></a>--}}

                    </td>
                </tr>

            @endforeach

        </table>
        {{$persons->render("layouts.pagination")}}
    @else
        <h1>No hay solicitudes pendientes</h1>

    @endif



@endsection


@section("modal")
    <div class="modal fade" id="modalFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Imagen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="sendMail_carta" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id_user">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" required id="nombre" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellido</label>
                            <input type="text" id="apellido" required name="apellido" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="files">Fecha Nacimiento</label>
                            <input type="text" id="fecha"  required name="fecha" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="files">Hora Nacimiento</label>
                            <input type="text" id="hora" required name="hora" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="files">Lugar Nacimiento</label>
                            <input type="text" id="lugar" required name="lugar" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="files">Email</label>
                            <input type="text" id="email" required name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="files">Seleccionar Imagen</label>
                            <input type="file" id="file" required name="img_carta" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                        </div>
                    </form>

                </div>


            </div>
        </div>
    </div>

@endsection
@section("after_scripts")
    <script src="{{asset("js/carta.js")}}"></script>
    <script src="{{asset("js/loading_carta.js")}}"></script>
@endsection