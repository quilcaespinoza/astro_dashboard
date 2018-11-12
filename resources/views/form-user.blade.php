@extends("layouts.admin")


@section("title_menu", "Mi perfil")

@section("content")
    <link rel="stylesheet" href="{{asset("css/users/form_register.css")}}">

    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                @endforeach
            </ul>
        </div>
    @endif

{{--{{dump($user)}}--}}
    <div class="form_container">
        <form action="{{route("other_edit")}}" method="POST" >
            {{@csrf_field()}}
            {{ method_field('POST') }}

            <input type="hidden" name="id" value="{{$user[0]->id}}">
            <input type="hidden" name="persona_id" value="{{$user[0]->persona_id}}">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="{{$user[0]->nombre}}" id="nombre" required placeholder="Nombre" class="form-control">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido"  value="{{$user[0]->apellido}}"  id="apellido"   required placeholder="Apellido" class="form-control">
            </div>


            <div class="form-group">
                <label for="nombre">Email</label>
                <input type="email" name="email" id="email" value="{{$user[0]->user_nick}}" required placeholder="Email" class="form-control">
                <p id="msj_email" ></p>
            </div>
            <div class="form-group">
                <label for="nombre">Lugar Nacimiento</label>
                <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" value="{{$user[0]->lugar_nacimiento}}" required placeholder="Email" class="form-control">
                <p id="msj_email" ></p>
            </div>
            <div class="form-group">
                <label for="nombre">Fecha Nacimiento</label>
                <input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$user[0]->fecha_nacimiento}}" required placeholder="Email" class="form-control">
                <p id="msj_email" ></p>
            </div>
            <div class="form-group">
                <label for="nombre">Hora Nacimiento</label>
                <input type="text" name="hora_nacimiento" id="hora_nacimiento" value="{{$user[0]->hora_nacimiento}}" required placeholder="Email" class="form-control">
                <p id="msj_email" ></p>
            </div>


            <div class="form-group">
                <label for="nombre">Contraseña</label>
                <input type="password" name="password" id="password"  required placeholder="Contraseña" class="form-control">
            </div>




            <div class="form-group" align="center">
                <input type="submit" value="Guardar"  class="btn btn-success" id="btn_send">
            </div>


        </form>
    </div>
@endsection
