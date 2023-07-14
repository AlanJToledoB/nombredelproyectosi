<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function pichichu()
    {
        $cursos = Curso::all();
        return view('index', compact('cursos'));
    }

    // Otros métodos del controlador (create, store, edit, update, delete)...
}