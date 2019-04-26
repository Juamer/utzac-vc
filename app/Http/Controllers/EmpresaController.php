<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends ApiController

{
    
public function index()
{
    $empresas = Empresa::all();
    return response()->json(['data'=>$empresas],200);
    //return $this->showAll($users);
}

public function store(Request $request)
{
     $rules=[
        'nombre_empresa'=>'required',
        'domicilio'=>'required',
        'telefono'=>'required',
        
        
        
    ];
    //$this->validate($request,$rules);
    $campos['nombre_empresa']=$request->nombre_empresa;
    $campos['domicilio']=$request->domicilio;
    $campos['telefono']=$request->telefono;
    
    

    $empresa = Empresa::create($campos);
    return response()->json(['data'=>$empresa],201);
    //return response()->json('error');

}

 public function destroy($id){
 $empresas = Empresa::findorFail($id);
 $empresas->delete();
 return response()->json(['data'=>$empresas],200);
 
    //
 }

}
