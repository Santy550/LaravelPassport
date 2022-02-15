<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteTokenController extends Controller
{
    public function deleteToken(Request $request) {
        $user = Auth::user();
        $user->tokens()->delete();
    }
}
