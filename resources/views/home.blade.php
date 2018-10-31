@extends("layouts.admin")

@section("title_menu", "Solicitudes Pendientes de Carta Astral")

@section("content")
    {{--<div style="background: red">--}}
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
                 <button class="btn btn-primary" id="{{$person->id}}"  data-toggle="modal" data-target="#modalFile"><i class="fa fa-file"></i></button>
                 <button class="btn btn-danger"><i class="fa fa-trash"></i></button>

             </td>
         </tr>

         @endforeach

    </table>



    @endsection

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
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@section("modal")


    @endsection
@section("after_scripts")
    <script src="{{asset("js/carta.js")}}"></script>
@endsection