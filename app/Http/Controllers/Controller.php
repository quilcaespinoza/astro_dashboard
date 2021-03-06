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

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LoginFormRequest;
use DB;
use Illuminate\Support\Facades\DB as Database;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



//--------contructor -----------------------
    public function __contructor() {

    }

    public function validate_user(Request $request) {

                $email = $request->input("email");
                $pass = $request->input("password");
                $other = Database::select("select nombre,apellido,persona.id, imagen from usuario inner JOIN  persona on 
                    usuario.persona_id = persona.id where usuario.user_nick = '$email' and usuario.user_pass = '$pass'");
                if (Auth::attempt(["email" => $request->input("email"), "password" => $request->input("password")])) {
                    $user = Auth::user();
                    Auth::login($user);
                    session_start();
                    $nombre =  $user->nombre . " " .$user->apellido;
                    $arr_user = [
                        "id" => $user->id,
                        "nombre" =>$nombre,
                        "perfil" => 1
                    ];
                    $_SESSION["usuario"] = $arr_user;
                    return redirect("Home");
                }
                else if(count($other) > 0){
                    $nombre =   $other[0]->nombre . " " . $other[0]->apellido;
                    $arr_user = [
                        "id" => $other[0]->id,
                        "nombre" =>$nombre,
                        "perfil" => 2
                    ];
                     session_start();
                      $_SESSION["usuario"] = $arr_user;
                    return \redirect()->route("User", Crypt::encrypt([$other[0]->id]));
//                    return \redirect()->route("User", [$other[0]->id]);1

                }
                else {
                    return back();
                }
            }

    public  function other_user($id) {
        try{
            $ids = Crypt::decrypt($id);
            if($ids[0] != "") {
                $other = Database::select("select  imagen from usuario where persona_id =$ids[0]");
            }else {
                $other = Database::select("select  imagen from usuario where persona_id =$ids");
            }
            return view("other_user", compact('other'));
        }catch (\Exception $exception) {
            return back();
        }

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
    public function valid_email(Request $request)  {
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

    public function logout(){

        session_start();
        session_destroy();
//        unset($_SESSION["usuario"]);

        return \redirect()->route("login");
    }
    public  function form_register() {
        return view("Users.form_user");
    }

/*********** Ver usaurio **********************************/
 public  function ver_usuario(Request $request) {
        if ($request) {
            $query=trim($request->get('searchText'));
            $logins=DB::table('login')->where('nombre','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orderBy('id','desc')
            ->paginate(4);
            return view('Users.ver_usuario',["logins"=>$logins,"searchText"=>$query]);
            //dump($query);

        }
    }

/***********Editar usuario  *******************************/
public function editar_usuario(Request $request,$id) {
    $login=User::find($id);
    
    //return view('Users.editar_usuario',compact('login'));
    return view('Users.editar_usuario', ['login'=>$login]);
}

/****************************** Guardar usuario **************************************/
public function guardar_usuario(LoginFormRequest $request) {

    $login=User::where('id','=',$request->input('id'))
    ->update(['nombre'=>$request->input('nombre') ,'apellido'=>$request->input('apellido') , 'email'=>$request->input('email') , 'password'=>bcrypt($request->input('password'))]);
    
            $query=trim($request->get('searchText'));
            $logins=DB::table('login')->where('nombre','LIKE','%'.$query.'%')
            ->where('condicion','=','1')
            ->orderBy('id','desc')
            ->paginate(4);
            return view('Users.ver_usuario',["logins"=>$logins,"searchText"=>$query]);

    
}


/****************************** Elimninar usuario **************************************/
        public function eliminar_usuario($id) {
             $login=User::find($id);
             $login->delete();
             //Session::flash('message','Usuario eliminado');
             return redirect::to('ver_usuario');
        }



}