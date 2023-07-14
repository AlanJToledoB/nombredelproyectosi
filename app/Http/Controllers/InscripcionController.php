<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view('inscripciones.index', compact('inscripciones'));
    }

    // Otros métodos del controlador (create, store, edit, update, delete)...
}