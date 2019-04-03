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
        'fecha'=>'required',
        'tipo_sol'=>'required',
        'materia'=>'required',
        'fecha_de_v'=>'required',
        'objetivo_G'=>'required',
        'objetivo_E'=>'required',
        'status'=>'required',
    ];
    //$this->validate($request,$rules);
    $campos['fecha']=$request->name;
    $campos['tipo_sol']=$request->apellidos;
    $campos['materia']=$request->nom_usu;
    $campos['fecha_de_v']=$request->email;
    $campos['objetivo_G']=$request->matricula;
    $campos['objetivo_E']=$request->solicitud;
    $campos['status']=bcrypt($request->password);

    $solicitud = Solicitud::create($campos);
    return response()->json(['data'=>$solicitud],201);
    //return response()->json('error');

}
    //

}
