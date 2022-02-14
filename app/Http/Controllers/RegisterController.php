<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $validateData['password'] = Hash::make($request->password);

        $users = User::create($validateData);

        $accessToken = $users->createToken('authToken')->accessToken;

        return response([
            'user' => $users,
            'access_token' => $accessToken
        ]);

    }

}
