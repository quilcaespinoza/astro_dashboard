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
                <td>
                    <button class="btn btn-success"><i class="fa fa-user"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-save"></i></button>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </td>
            </tr>

        @endforeach

    </table>
    {!! $persons->links("layouts.pagination") !!}
    {{--</div>--}}
    {{--@if ($persons->hasMorePages())--}}
    {{--<li><a href="{{ $persons->nextPageUrl() }}" rel="next">&raquo;</a></li>--}}
    {{--@else--}}
    {{--<li class="disabled"><span>&raquo;</span></li>--}}
    {{--@endif--}}

@endsection

@section("after_scripts")
    <script src="{{asset("js/carta.js")}}"></script>
@endsection