<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bootstrap\BootProviders;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function validate_user(Request $request)
    {
        if (Auth::attempt(["email" => $request->input("email"), "password" => $request->input("password")])) {

            $user = Auth::user();
            Auth::login($user);
//        if( count($user )> 0) {
//            Auth::login($user);
            return redirect("Home");
        } else {
            return back();
        }
    }

    public function form_register()
    {
//        dump(Auth::user()->nombre);
        return view("Users.form_user");
    }

    public function user_create(Request $request)
    {
        $user = new User();
        $user->nombre = $request->input("nombre");
        $user->apellido = $request->input("apellido");
        $user->email = $request->input("email");
        $user->password = bcrypt($request->input("password"));
        $user->save();
//        return back();
        return response()->json(["value" => "Se creó el ususario con éxito"]);
    }

    public function valid_email(Request $request)
    {
        $email = $request->input("email");
        $user = User::where("email", $email)->get();

        if (count($user) > 0) {
            $response = [
                "value" => "Email ya registrado",
                "status" => 500
            ];
        } else {
            $response = ["value" => "Email disponible", "status" => 200];
        }

        return response()->json($response);

    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    }
}
