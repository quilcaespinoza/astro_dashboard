<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{

    public function show_home(){

//        $persons = Persona::whereNotIn("id", $arraUses)->orderBy("id","DSC")->paginate(15);
        $persons = DB::select("SELECT * FROM persona where id NOT in (select persona_id from usuario)");
        return view("home", compact('persons'));
//          dd($persons);
    }

    public  function all_request() {
        $persons = Persona::orderBy("id","DSC")->paginate(15);
        return view("request", compact('persons'));

    }

}
