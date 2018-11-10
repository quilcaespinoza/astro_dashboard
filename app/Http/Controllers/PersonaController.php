<?php

namespace App\Http\Controllers;

use App\MailCarta;
use App\Persona;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PersonaController extends Controller
{

    public function show_home() {
        $persons = DB::select("SELECT * FROM persona where id NOT in (select persona_id from usuario)");
        return view("home", compact('persons'));
    }

    public  function filter_requests(Request $request) {
        $data = $request->input("query");
        $persons = DB::select("SELECT * FROM persona where id NOT in (select persona_id from usuario) and 
        email like '%$data%'");
        return view("home", compact('persons'));
    }
    public  function all_request() {
        $persons = Persona::orderBy("id","DSC")->paginate(15);
        return view("request", compact('persons'));

    }
    public  function get_information_for_id(Request $request) {
        if($request->ajax()) {
            $id = $request->input("id");
            $person = Persona::find($id);
            return response()->json(  $person);
        }
    }
    public  function  sendMail_carta( Request $request) {

        if($request->hasFile("img_carta")) {


            $person = Persona::find($request->input("id"));
            $person->email = $request->input("email");
            $person->nombre = $request->input("nombre");
            $person->apellido = $request->input("apellido");
            $person->fecha_nacimiento = $request->input("fecha");
            $person->lugar_nacimiento = $request->input("lugar");
            $person->hora_nacimiento = $request->input("hora");
            $person->save();
            $file = $request->file("img_carta");
            $nombre_storage = date("YY_hh_mm_ss").".".$file->getClientOriginalExtension();
            Storage::disk("local")->put($nombre_storage, \Illuminate\Support\Facades\File::get($file));

            $carta_c = MailCarta::where("persona_id", $request->input("id"))->get();

            if( count($carta_c) > 0 ) {
               MailCarta::where("persona_id", $request->input("id"))->update([
                    "persona_id" => $request->input("id"),
                     "imagen" => $nombre_storage,
                     "user_nick" =>$request->input("email"),
                      "perfil_id"=> 1,
                      "user_pass" => $request->input("email")
                ]);
            }  else {
                $carta = new MailCarta();
                $carta->persona_id = $request->input("id");
                $carta->imagen = $nombre_storage;
                $carta->user_nick = $request->input("email");
                $carta->perfil_id = 1;
                $carta->user_pass = $request->input("email");
                $carta->save();
            }


            $user = [
                "nombre" => $request->input("nombre"),
                "email" => $request->input("email"),
                "imagen" => $nombre_storage
            ];
            try{

                Mail::send("carta.plantilla", $user, function ($message) use ($request){
                    $message->from("admin@prueba.com");
                    $message->to($request->input("email"));
                    $message->subject("Prueba 01");

                });
                return back()->with("success", "Se envió el correo con éxito");
            }catch (\Exception $exception) {
                return back()->with("success", "Se envió el correo con éxito");

            }



        }
    }
    public  function delete_person($id) {
        $person = Persona::find($id);
        $person->delete();
        return back();
    }

    public function filter_alll_requests(Request $request) {
        $data = $request->input("query");
        $persons = Persona::where('email','LIKE','%'.$data.'%')->paginate(15);

        return view("request", compact('persons'));
    }

    public function edit_person_form($id) {
        $data = Persona::find($id);
        foreach ($data as $da ){
            $person = [
                "id" => $data["attributes"]["id"],
                "email" =>$data["attributes"]["email"],
                "nombre" =>$data["attributes"]["nombre"],
                "apellido" =>$data["attributes"]["apellido"],
                "nacimiento" =>$data["attributes"]["lugar_nacimiento"],
                "hora" =>$data["attributes"]["hora_nacimiento"],
            ];
        }

        return view("edit-person", compact("person"));
    }
    public function update_persona(Request $request) {
        Persona::find($request->id)->update([
            "nombre" => $request->input("nombre"),
            "apellido" => $request->input("apellido"),
            "email" => $request->input("email"),
            "lugar_nacimiento" => $request->input("lugar_nacimiento"),
            "hora_nacimiento" => $request->input("hora_nacimiento"),
        ]);
        return redirect()->route("all_request");
    }

    public  function reload_mail($id) {
        $data = DB::select("select nombre, email, imagen from persona inner join usuario ON 
                                        persona.id = usuario.persona_id where persona.id = $id");
        $user = [
            "nombre" => $data[0]->nombre,
            "email" =>  $data[0]->email,
            "imagen" =>  $data[0]->imagen
        ];
        try{
            Mail::send("carta.plantilla", $user, function ($message) use ($data){
                $message->from("admin@prueba.com");
                $message->to($data[0]->email);
                $message->subject("Prueba 01");
            });
            return back();
        }catch (\Exception $exception) {
            return back();
        }

//        return back();
    }
}
