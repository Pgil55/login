<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class loginController extends Controller
{
    //
    public function login(Request $request){

        $data = $request->validate([ 
            'email'=> 'required|email:rfc',
            'password'=>'required'
        ]);
        
        if (Auth::attempt($data))   {
            $user = Auth::user();
            if($user->api_token){
                return response()->json([
                    'message' => 'Ya esta logeado'
                ]);
            }
            $token = Str::random(70);
            $user->api_token = $token;
            $user->save();
        return response()->json([
            'token' => $token
        ]);
        }
        
        return 'Usuario no logueado';
    

    }
    public function logout(){
        $user = Auth::guard('api')->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'message' => 'Sesion cerrada'
        ]);
    }

    public function whoIam(){
        
        return response()->json([
            Auth::guard('api')->user()]);
    }

    public function mostrar(Request $request){
        $users = User::all();

        $response = [
            'success' => true,
            'message' => 'Estos son  todos los usuarios',
            'data' => $users
        ];

        return response()->json($response);

    }
}
