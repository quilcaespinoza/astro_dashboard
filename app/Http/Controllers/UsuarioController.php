<?php

namespace App\Http\Controllers;

use App\MailCarta;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    //
    public  function show_information($id){
        try{
            $decryp = Crypt::decrypt($id);
            $user = DB::select("select usuario.id,nombre, apellido, persona_id, user_nick,lugar_nacimiento,fecha_nacimiento,
                          hora_nacimiento from usuario inner join  persona ON 
                  persona.id = usuario.persona_id where usuario.persona_id = $decryp");
            return view("form-user", compact('user'));
        }catch (\Exception $ex) {
           return back();
        }

    }
    public  function other_edit(Request $request) {
        $user = MailCarta::find($request->input("id"));
        $user->user_nick = $request->input("email");
        $user->user_pass = $request->input("password");
        $user->save();


        $persona = Persona::find($request->input("persona_id"));
        $persona->nombre = $request->input("nombre");
        $persona->apellido = $request->input("apellido");
        $persona->email = $request->input("email");
        $persona->lugar_nacimiento = $request->input("lugar_nacimiento");
        $persona->fecha_nacimiento = $request->input("fecha_nacimiento");
        $persona->hora_nacimiento = $request->input("hora_nacimiento");
        $persona->save();
        return back();
    }

}
