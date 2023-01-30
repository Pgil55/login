<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class loginController extends Controller
{
    //
    public function login(Request $request){

        $data = $request->validate([
            'email'=> 'required|email:rfc',
            'password'=>'required'
        ]);

        if (Auth::attempt($data)) {
            return response()->json([
                'token' => Auth::user()->createToken("token")->plainTextToken
            ]);
        }
        return 'Usuario no logueado';
    

    }

    public function whoIam(){
        $token = User::forget('token');
        return response()->json([
            'message' => 'Logueado correctamente',
            Auth::user()]);
    }
}
