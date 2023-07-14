<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\Materia;
use App\Models\Alumno;
use App\Models\Curso;

class FormularioController extends Controller
{
    public function mostrarFormulario()
    {
        $materias = Materia::all();
        $alumnos = Alumno::all();
        $cursos = Curso::all();
        return view('formulario', compact('materias', 'alumnos', 'cursos'));
    }

    public function procesarFormulario(Request $request)
    {
        $inscripcion = new Inscripcion;
        $inscripcion->alumnos_id = $request->input('alumnos_id');
        $inscripcion->materias_id = $request->input('materia_id');
        $inscripcion->save();

        return redirect()->route('formulario')->with('success', 'Formulario enviado correctamente');
    }

    public function mostrarInscripciones()
    {
        $inscripciones = Inscripcion::with('alumno', 'materia')->get();
        return view('inscripciones', compact('inscripciones'));
    }
}

