@extends("layouts.admin")

@section("title_menu", "Editar Usuario")

@section("content")

    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                @endforeach
            </ul>
        </div>
    @endif


    <div class="col-sm-6" style="margin-left: auto; margin-right: auto;">
    <div class="form_container">
        <form action="{{route("update_persona")}}" method="post" >
            {{@csrf_field()}}

            <input type="hidden" name="id" value="{{$person["id"]}}">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="{{$person["nombre"]}}" id="nombre" required placeholder="Nombre" class="form-control">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido"  value="{{$person["apellido"]}}"  id="apellido"   required placeholder="Apellido" class="form-control">
            </div>


            <div class="form-group">
                <label for="nombre">Email</label>
                <input type="email" name="email" id="email" value="{{$person["email"]}}" required placeholder="Email" class="form-control">
                <p id="msj_email" ></p>
            </div>




            <div class="form-group">
                <label for="nombre">Lugar de Nacimiento</label>
                <input type="text" name="lugar_nacimiento" id="pais" value="{{$person["nacimiento"]}}" required placeholder="Pais" class="form-control">
            </div>


            <div class="form-group">
                <label for="nombre">Hora de Nacimiento</label>
                <input type="text" name="hora_nacimiento" id="email" value="{{$person["hora"]}}" required placeholder="Ciudad" class="form-control">
            </div>
            {{--<div class="form-group">--}}
                {{--<label for="nombre">Contraseña</label>--}}
                {{--<input type="password" name="password" id="password"  required placeholder="Contraseña" class="form-control">--}}
            {{--</div>--}}



            <div class="form-group" align="center">
                <input type="submit" value="Actualizar"  class="btn btn-success" id="btn_send">
            </div>

        </form>
    </div>
    </div>



@endsection