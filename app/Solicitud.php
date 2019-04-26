<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'visita_conferencia','fecha_solicitud', 'carrera', 'grupo',  'num_alumnos', 'prof_solicitante', 'materia',
          'nom_empresa', 'domicilio', 'telefono', 'fecha_act', 'objetivos_g', 'objetivos_e', 'asesor_r', 'estado', 
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    

    
}