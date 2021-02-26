<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $fillable = ['name','prenom','email','telephone','adresse','code_postal','ville','commentaire'];
}
