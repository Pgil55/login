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
        
        if($request->email){
        $data = $request->validate([ 
            'email'=> 'required|email:rfc',
            'password'=>'required'
        ]);
        }else{
            $data = $request->validate([ 
                'name'=> 'required|string',
                'password'=>'required'
            ]);
        }
        if (Auth::attempt($data))   {
            $user = Auth::user();
                
            $token = $user->createToken('api_token')->accessToken; 
                
            return response()->json([
                'token' => $token
            ]);
        }
        
        return 'Usuario no logueado';
    

    }
    public function register(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email' =>'required|email:rfc|unique:users',
            'password' =>'required'
        ]);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        return response()->json([
            'message' => 'Usuario creado'
        ]);
    }
    public function logout(){
        $user = Auth::guard('api')->user();
        
        foreach ($user->tokens as $token ) {
        $token->delete();
        }
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
