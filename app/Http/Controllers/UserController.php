<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

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
        'nombre'=>'required',
        'apellidos'=>'required',
        'num_emp'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:8|confirmed',
        'administrador'=>'required|min:8|unique:users',
        
        
    ];
    //$this->validate($request,$rules);
    $campos['nombre']=$request->nombre;
    $campos['apellidos']=$request->apellidos;
    $campos['num_emp']=$request->num_emp;
    $campos['email']=$request->email;
    $campos['password']=bcrypt($request->password);
    $campos['administrador']=$request->administrador;
    
    

    $usuario = User::create($campos);
    return response()->json(['data'=>$usuario],201);
    //return response()->json('error');

}

public function login(Request $request){

    $validator = Validator::make($request->all(), [
        'email' => 'required',
        'password'=> 'required'
    ]);
    if ($validator->fails()) {
        return response()->json($validator->errors());
    }
    $credentials = $request->only('email', 'password');
    try {
        if (! $token =  JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
    } catch ( JWTException $e) {
        return response()->json(['error' => 'could_not_create_token'], 500);
    }
    return response()->json(compact('token'));
}



 public function destroy($id){
 $users = User::findorFail($id);
 $users->delete();
 return response()->json(['data'=>$users],200);
 
    //
 }


 public function update(Request $request, $id)
 {
     //Buscar al usuario por ID
     $user = User::findorFail($id);

       $rules=[
         'email' => 'email|unique:users,email,' . $user->id,
         'password' => 'min:8|confirmed',
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
       
         if(!$user->isDirty()){
           return $this->errorResponse('Se debe especificar el menos un valor para actualizar',422);
         }

         $user->save();

         return $this->showOne($user);
 }

 public function me(Request $request)
    {

        //$user = $request->user();
        $user = auth()->user();
        return $this->showOne($user);

    }

    public function __construct()
    {
        $this->middleware('jwt.auth')->only(['index','me']);
    }

    


}
