<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;

class CarreraController extends ApiController

{
    
public function index()
{
    $carreras = Carrera::all();
    return response()->json(['data'=>$carreras],200);
    //return $this->showAll($carreras);
}

public function store(Request $request)
{
     $rules=[
        'nom_especialidad'=>'required',
        
        
        
    ];
    //$this->validate($request,$rules);
    $campos['nom_especialidad']=$request->nom_especialidad;
    
    
    

    $carrera =  Carrera::create($campos);
    return response()->json(['data'=>$carrera],201);
    //return response()->json('error');

}

 public function destroy($id){
 $carreras = Carrera::findorFail($id);
 $carreras->delete();
 return response()->json(['data'=>$carreras],200);
 
    //
 }

}