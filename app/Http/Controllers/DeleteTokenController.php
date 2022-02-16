<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteTokenController extends Controller
{
    public function deleteToken() {
        Auth::user()->token()->delete;
        return "Eliminado con éxito";
    }
}
