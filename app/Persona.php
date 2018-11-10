<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = "persona";
    protected $fillable = ["id","nombre", "apellido", "email", "fecha_nacimiento", "lugar_nacimiento", "hora_nacimiento"];
    public $timestamps = false;
}
