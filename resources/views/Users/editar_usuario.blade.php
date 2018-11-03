@extends("layouts.admin")


@section("title_menu", "Editar Usuario del Sistema")

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



    <div class="form_container">
        <form action="{{ url('guardar_usuario') }}" method="POST" >
            {{@csrf_field()}}
            {{ method_field('POST') }}
            
            <input type="hidden" name="id" value="{{$login->id}}">

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="{{$login->nombre}}" id="nombre" required placeholder="Nombre" class="form-control">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido"  value="{{$login->apellido}}"  id="apellido"   required placeholder="Apellido" class="form-control">
            </div>


            <div class="form-group">
                <label for="nombre">Email</label>
                <input type="email" name="email" id="email" value="{{$login->email}}" required placeholder="Email" class="form-control">
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
