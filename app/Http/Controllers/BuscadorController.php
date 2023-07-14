<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;

class buscadorController extends Controller
{
    public function alumnos(Request $request)
    {
        $term = $request->get('term');

        $querys = Inscripcion::whereHas('materia', function ($query) use ($term) {
            $query->where('nombre_materia', 'LIKE', '%' . $term . '%');
        })->with('materia')->get();

        $data = [];

        foreach ($querys as $query) {
            $data[] = [
                "label" => $query->materia->nombre_materia
            ];
        }

        return response()->json($data);
    }

    public function buscar(Request $request)
    {
        
        $search = $request->input('search');
        // Aquí puedes implementar la lógica de búsqueda en base al valor ingresado en el formulario

        return view('resultado-busqueda', ['search' => $search]);
    }
}