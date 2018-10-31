<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{

    public function show_home()  {
        $persons = Persona::orderBy("id","DSC")->paginate(15);
        return view("home", compact('persons'));
    }

}
