<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Anio;

class MateriaCrudController extends Controller
{
    public function index(Request $request)
    {
        $textoBusqueda = $request->input('texto');

        // Realizar la búsqueda utilizando el término ingresado
        $materias = Materia::where('nombre_materia', 'LIKE', '%' . $textoBusqueda . '%')->get();
        $anios = Anio::all();

        return view('admin.crudMaterias.index', compact('materias', 'anios'));
    }
    
    public function autocomplete(Request $request)
    {
        $query = $request->input('query');

        // Lógica para obtener las opciones de autocompletado
        $options = Materia::where('nombre_materia', 'LIKE', "%{$query}%")->pluck('nombre_materia');

        return response()->json($options);
    }


    public function create()
    {
        $anios = Anio::all();
        return view('admin.crudMaterias.create', compact('anios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_materia' => 'required',
            'anios_id' => 'required',
        ]);

        Materia::create($request->all());

        return redirect()->route('admin.materias.inscripciones')->with('success', 'Materia creada exitosamente');
    }

    public function edit(Materia $materia)
    {
        $anios = Anio::all();

        return view('admin.crudMaterias.edit', compact('materia', 'anios'));
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre_materia' => 'required',
            'anios_id' => 'required',
        ]);

        $materia->update($request->all());

        return redirect()->route('admin.materias.inscripciones')->with('success', 'Materia actualizada exitosamente');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();

        return redirect()->route('admin.materias.inscripciones')->with('success', 'Materia eliminada exitosamente');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $materias = Materia::where('nombre_materia', 'LIKE', '%' . $search . '%')->get();

        return view('admin.crudMaterias.index', compact('materias'));
    }
}
