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
Route::post("/validate_user", "Controller@validate_user");

// RUTA DE USUARIOS

    Route::get("/Home", "PersonaController@show_home")->name("index");
    Route::get("/Request", "PersonaController@all_request")->name("all_request");


    Route::get("/form_register",  "Controller@form_register");
    Route::get("/logout",  "Controller@logout");
    Route::post("/valid_email",  "Controller@valid_email");
    Route::post("/user_create", "Controller@user_create");
    Route::get("/ver_usuario","Controller@ver_usuario");
    Route::get("/editar_usuario/{id}","Controller@editar_usuario");
    Route::post("/guardar_usuario","Controller@guardar_usuario");
    Route::get('/eliminar_usuario/{id}',"Controller@eliminar_usuario");

