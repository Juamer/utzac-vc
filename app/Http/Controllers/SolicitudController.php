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
        $solicituds = Solicitud::findorFail($id);
        $solicituds->delete();
        return response()->json(['data'=>$solicituds],200);
    }

    public function update(Request $request, $id)
    {
        //Buscar al usuario por ID
        $user = Solicitud::findorFail($id);

          $rules=[
            'fecha' => 'required,' . $user->id,
            'password' => 'min:6|confirmed',
            'admin' => 'in:'.User::USUARIO_ADMINISTRADOR.','.User::USUARIO_REGULAR,
          ];
          $this->validate($request,$rules);

          if($request->has('name')){
            $user->name=$request->name;
          }
          if($request->has('email') && $user->email != $request->email){
            $user->verified = User::USUARIO_NO_VERIFICADO;
            $user->verification_token = User::generarVerificationToken();
            $user->email = $request->email;
          }
          if($request->has('password')){
            $user->password = bcrypt($request->password);
          }
          /*if(request->has('admin')){
            $this->allowedAdminAction();
          }
            if(!$user->esVerificado()){
              return $this->errorResponse('Unicamente los usuarios verificados pueden cambiar su valor de administrador',409);
            }

            $user->admin = $request->admin;
*/
            if(!$user->isDirty()){
              return $this->errorResponse('Se debe especificar el menos un valor para actualizar',422);
            }

            $user->save();

            return $this->showOne($user);
    }

}
