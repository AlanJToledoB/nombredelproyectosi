<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AnioController extends Controller
{
    public function pichichu()
    {
        $anios = Anio::all();
        $user = Auth::user();
        return view('index', compact('anios', 'user'));
    }
    // Otros métodos del controlador (create, store, edit, update, destroy)
}

