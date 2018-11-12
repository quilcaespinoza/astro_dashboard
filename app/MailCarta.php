<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailCarta extends Model
{
    //
    protected $table = "usuario";
    protected $fillable = ["id","persona_id", "imagen", "user_nick", "user_pass", "perfil_id"];

}
