<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index($anios_id)
    {
        $materias = Materia::where('anios_id', $anios_id)->get();
        return view('materias', compact('materias'));

    }

    // Otros métodos del controlador (create, store, edit, update, delete)...
}