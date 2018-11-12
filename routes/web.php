<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return  view("login");
})->name("login");
Route::get("User/{id}",[
    "uses" => "Controller@other_user",
    "as" => "User"
] );
Route::post("/Inicio", "Controller@validate_user")->name("validate_user");

// RUTA DE USUARIOS

    Route::get("/Home", "PersonaController@show_home")->name("index");
    Route::get("/filter_requests", "PersonaController@filter_requests")->name("filter_requests");
    Route::get("/filter_alll_requests", "PersonaController@filter_alll_requests")->name("filter_alll_requests");
    Route::get("/delete_person/{id}", "PersonaController@delete_person")->name("delete_person");
    Route::get("/Request", "PersonaController@all_request")->name("all_request");
    Route::get("/Edit-Person/{id}", "PersonaController@edit_person_form")->name("edit_person_form");
    Route::post("/get_information_for_id", "PersonaController@get_information_for_id")->name("get_information_for_id");
    Route::post("/sendMail_carta", "PersonaController@sendMail_carta")->name("sendMail_carta");
    Route::get("/reload_mail/{id}", "PersonaController@reload_mail")->name("reload_mail");
    Route::post("update_persona", "PersonaController@update_persona")->name("update_persona");


    Route::get("/form_register",  "Controller@form_register");
    Route::get("/logout",  "Controller@logout")->name("logout");
    Route::post("/valid_email",  "Controller@valid_email");
    Route::post("/user_create", "Controller@user_create");
    Route::get("/ver_usuario","Controller@ver_usuario");
    Route::get("/editar_usuario/{id}","Controller@editar_usuario");
    Route::post("/guardar_usuario","Controller@guardar_usuario");
    Route::get('/eliminar_usuario/{id}',"Controller@eliminar_usuario");


    Route::get("Perfil/{id}", "UsuarioController@show_information")->name("show_information");
    Route::post("other_edit", "UsuarioController@other_edit")->name("other_edit");

