<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inscripcion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Alumno;
use App\Models\Materia;


class AdminController extends Controller
{
    public function profile()
    {

        $alumnosCount = Alumno::count();
        $materiaCount = Materia::count();
        $inscripcionesCount = Inscripcion::count();
        $inscripciones = Inscripcion::with('alumno', 'materia')->latest()->paginate(5);

        return view('admin.index', compact('inscripciones', 'alumnosCount', 'materiaCount', 'inscripcionesCount'));
    }

    public function index(): View
    {
        $inscripciones = Inscripcion::with('alumno', 'materia')->latest()->paginate(5);

        return view('admin.settings', ['inscripciones' => $inscripciones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $alumnos = Alumno::all();
        $materias = Materia::all();

        return view('Admin.create', compact('alumnos', 'materias'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'alumnos_id' => 'required',
            'materias_id' => 'required'
        ]);

        $inscripcion = new Inscripcion();
        $inscripcion->alumnos_id = $request->input('alumnos_id');
        $inscripcion->materias_id = $request->input('materias_id');
        $inscripcion->save();

        return redirect()->route('admin.settings.inscripciones')->with('success', 'Nueva inscripción creada exitosamente');
    }


    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscripcion $inscripcion): View
    {
        $alumnos = Alumno::all();
        $materias = Materia::all();

        return view('admin.edit', compact('inscripcion', 'alumnos', 'materias'));
    }


    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Inscripcion $inscripcion): RedirectResponse
    // {
    //     $inscripcion->alumnos_id = $request->input('alumno_id');
    //     $inscripcion->materias_id = $request->input('materia_id');
    //     $inscripcion->save();

    //     return redirect()->route('admin.settings.inscripciones')->with('success', 'Inscripción editada exitosamente');
    // }

    public function update(Request $request, Inscripcion $inscripcion): RedirectResponse
    {
        $inscripcion->alumnos_id = $request->input('users_id');
        $inscripcion->materias_id = $request->input('materia_id');
        $inscripcion->save();

        return redirect()->route('admin.settings.inscripciones')->with('success', 'Inscripción editada exitosamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscripcion $inscripcion): RedirectResponse
    {
        $inscripcion->delete();

        $inscripciones = Inscripcion::with('alumno', 'materia')->latest()->paginate(5);
        return redirect()->route('admin.settings.inscripciones', ['inscripciones' => $inscripciones])->with('success', 'Inscripción eliminada');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
    
        $inscripciones = Inscripcion::with('alumno', 'materia')
            ->whereHas('alumno', function ($query) use ($search) {
                $query->where('DNI', 'like', '%' . $search . '%');
            })
            ->get();
    
        return view('admin.settings', ['inscripciones' => $inscripciones]);
    }
    

    public function autocomplete(Request $request)
    {
        $query = $request->input('query');

        $alumnos = Alumno::where('DNI', 'like', '%' . $query . '%')->pluck('DNI');

        return response()->json($alumnos);
    }



    public function ayuda(Inscripcion $inscripcion): View
    {
        return view('admin.ayuda');
    }
}
