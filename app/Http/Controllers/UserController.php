<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;

class UserController extends ApiController

{
    
public function index()
{
    $users = User::all();
    return response()->json(['data'=>$users],200);
    //return $this->showAll($users);
}

public function store(Request $request)
{
     $rules=[
        'name'=>'required',
        'apellidos'=>'required',
        'nom_usu'=>'required',
        'email'=>'required|email|unique:users',
        'matricula'=>'required|min:8|unique:users',
        'solicitud'=>'required|unique:users',
        'password'=>'required|min:8|confirmed',
    ];
    //$this->validate($request,$rules);
    $campos['name']=$request->name;
    $campos['apellidos']=$request->apellidos;
    $campos['nom_usu']=$request->nom_usu;
    $campos['email']=$request->email;
    $campos['matricula']=$request->matricula;
    $campos['solicitud']=$request->solicitud;
    $campos['password']=bcrypt($request->password);

    $usuario = User::create($campos);
    return response()->json(['data'=>$usuario],201);
    //return response()->json('error');

}
    //

}
