@extends("layouts.admin")


@section("title_menu", "Crear Nuevo Usuario")

@section("content")

    <link rel="stylesheet" href="{{asset("css/users/form_register.css")}}">

    <div class="form_container">
        <form action="user_create" method="post" id="frm_create">
            {{@csrf_field()}}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required placeholder="Nombre" class="form-control">
            </div>

            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" required placeholder="Apellido" class="form-control">
            </div>


            <div class="form-group">
                <label for="nombre">Email</label>
                <input type="email" name="email" id="email" required placeholder="Email" class="form-control">
                <p id="msj_email" ></p>
            </div>


            <div class="form-group">
                <label for="nombre">Contraseña</label>
                <input type="password" name="password" id="password" required placeholder="Contraseña" class="form-control">
            </div>


            <div class="form-group">
                <label for="nombre">Confirmar Contraseña</label>
                <input type="password" name="pwd_confirm" id="pwd_confirm" required placeholder="Confirmación de Contraseña" class="form-control">
                <p class="msj_error" id="msj_pwd">Las contraseñas no coinciden</p>
            </div>
            <div class="form-group" align="center">
                    <input type="submit" value="Registrar" disabled class="btn btn-success" id="btn_send">
            </div>


        </form>
    </div>
@endsection
@section("after_scripts")
<script src="{{asset("js/user/form_create.js")}}"></script>

    @endsection