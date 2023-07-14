<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Curso;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();

        return view('admin.indexAlumnos', compact('alumnos'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('admin.userCrud.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'DNI' => 'required',
            'apellido' => 'required',
            'celular' => 'required',
            'cursos_id' => 'required',
        ]);

        Alumno::create($request->all());

        return redirect()->route('admin.alumnos.index')->with('success', 'Alumno creado exitosamente');
    }

    public function edit(Alumno $alumno)
    {
        $alumnos = Alumno::all();
        $cursos = Curso::all();

        return view('admin.editAlumnos', compact('alumno', 'cursos'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'DNI' => 'required',
            'apellido' => 'required',
            'celular' => 'required',
            'cursos_id' => 'required',
        ]);

        $alumno->update($request->all());

        return redirect()->route('admin.alumnos.inscripciones')->with('success', 'Alumno actualizado exitosamente');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->route('admin.alumnos.index')->with('success', 'Alumno eliminado exitosamente');
    }

    public function search(Request $request)
    {
        $search = $request->input('texto');

        $alumnos = Alumno::where('DNI', 'like', '%' . $search . '%')->get();

        return view('admin.indexAlumnos', compact('alumnos'));
    }

    public function autocomplete(Request $request)
    {
        $query = $request->input('query');

        $alumnos = Alumno::where('DNI', 'like', '%' . $query . '%')->pluck('DNI');

        return response()->json($alumnos);
    }
}
