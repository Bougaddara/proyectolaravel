<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;



class CrearCuentaController extends BaseController
{
    public function crearCuenta(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password'
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validate Error',$validator->errors() );
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('Passport api')->accessToken;

        $success['name'] = $user->name;
        return $this->sendResponse($success, '¡Usuario registrado exitosamente!' );
    }

    public function IniciarSesion(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            $user = Auth::user();
            $success['token'] = $user->createToken('Passport api')->accessToken;
            $success['name'] = $user->name;
            
            return $this->sendResponse($success, 'Inicio de sesión de usuario con éxito!' );
        }

       else{
            return $this->sendError('No autorizado',['error','No autorizado'] );
        }

    }
}
