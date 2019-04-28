<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;

class SolicitudController extends ApiController

{
    
public function index()
{
    $solicituds = Solicitud::all();
    return response()->json(['data'=>$solicituds],200);
    //return $this->showAll($users);
}

public function store(Request $request)
{
     $rules=[
        'visita_conferencia'=>'required',
        'fecha_solicitud'=>'required',
        'carrera'=>'required',
        'grupo'=>'required',
        'num_alumnos'=>'required',
        'prof_solicitante'=>'required',
        'materia'=>'required',
        'nom_empresa'=>'required',
        'domicilio'=>'required',
        'telefono'=>'required',
        'fecha_act'=>'required',
        'objetivos_g'=>'required',
        'objetivos_e'=>'required',
        'asesor_r'=>'required',
        'estado'=>'required',
    ];
    //$this->validate($request,$rules);
    $campos['visita_conferencia']=$request->visita_conferencia;
    $campos['fecha_solicitud']=$request->fecha_solicitud;
    $campos['carrera']=$request->carrera;
    $campos['grupo']=$request->grupo;
    $campos['num_alumnos']=$request->num_alumnos;
    $campos['prof_solicitante']=$request->prof_solicitante;
    $campos['materia']=$request->materia;
    $campos['nom_empresa']=$request->nom_empresa;
    $campos['domicilio']=$request->domicilio;
    $campos['telefono']=$request->telefono;
    $campos['fecha_act']=$request->fecha_act;
    $campos['objetivos_g']=$request->objetivos_g;
    $campos['objetivos_e']=$request->objetivos_e;
    $campos['asesor_r']=$request->asesor_r;
    $campos['estado']=$request->estado;

    $solicitud = Solicitud::create($campos);
    return response()->json(['data'=>$solicitud],201);
    //return response()->json('error');

}
    public function destroy($id){
        $solicitud = Solicitud::findorFail($id);
        $solicitud->delete();
        return response()->json(['data'=>$solicitud],200);
    }

    public function update(Request $request, $id)
    {
        //Buscar al usuario por ID
        $solicitud = Solicitud::findorFail($id);

          $rules=[
             $solicitud->id,
            
          ];
          
            $solicitud->save();

            return $this->showOne($solicitud);
    }

}
