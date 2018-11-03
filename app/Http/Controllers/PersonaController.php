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

    public function show_home(){

//        $persons = Persona::whereNotIn("id", $arraUses)->orderBy("id","DSC")->paginate(15);
        $persons = DB::select("SELECT * FROM persona where id NOT in (select persona_id from usuario)");
        return view("home", compact('persons'));
//        return view("home");
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
            $file = $request->file("img_carta");
            $nombre = $file->getClientOriginalName();
            $nombre_storage = date("YY_hh_mm_ss").".".$file->getClientOriginalExtension();
            Storage::disk("local")->put($nombre_storage, \Illuminate\Support\Facades\File::get($file));

            $carta = new MailCarta();
            $carta->persona_id = $request->input("id");
            $carta->imagen = $nombre;
            $carta->imagen2 = $nombre_storage;
            $carta->user_nick = $request->input("email");
            $carta->perfil_id = 1;
            $carta->user_pass = $request->input("email");
            $carta->save();
            $url  = storage_path("app"). "/".$nombre_storage;
            $user = [
                "nombre" => $request->input("nombre"),
                "email" => $request->input("email"),
                "imagen" => $nombre_storage
            ];
            Mail::send("carta.plantilla", $user, function ($message) use ($request, $url){
                $message->from("admin@prueba.com");
                $message->to($request->input("email"));
                $message->subject("Prueba 01");
            });
//            return response()->json(["status" => 200, "message" => "Se envió el correo con éxito"]);
            return back()->with("success", "Se envió el correo con éxito");
//            return back()->with("message", "Se envió el correo con éxito");
        }
    }
    public  function delete_person($id) {
        $person = Persona::find($id);
        $person->delete();
        return back();
    }
}
