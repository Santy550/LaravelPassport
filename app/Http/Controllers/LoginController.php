<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'name' => '',
            'email' => '',
            'password' => ['required'],
        ]);

        if (Auth::check()) {
            return 'Ya estas logeado';
        }

        if (Auth::attempt($credentials)) {
            $identificador_user = session('idUser');
            //return  Auth::user()->toJson();
            return Auth::user()->createToken('tokenUser')->accessToken;
        }
        return 'No estas registrado';
    }

    public function mostrar() {
        return Auth::user();
    }

}
