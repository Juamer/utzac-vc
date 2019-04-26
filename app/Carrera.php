<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use Notifiable;


    protected $fillable = [
        'nom_especialidad',
    ];

    
}
