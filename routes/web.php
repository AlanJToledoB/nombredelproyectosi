<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\AnioController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\Admin\AdminController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/', [AnioController::class, 'pichichu'])->name('indice');
Route::get('/materias/{anio_id}', [MateriaController::class, 'index'])->name('materias');
Route::get('/inscribir/{materia_id}', 'MateriaController@inscribir')->name('inscribir');
Route::get('/formulario', [FormularioController::class, 'mostrarFormulario'])->name('formulario');
Route::post('/formulario', [FormularioController::class, 'procesarFormulario'])->name('formulario.procesar');
Route::get('/inscripciones', [FormularioController::class, 'mostrarInscripciones'])->name('inscripciones');
Route::get('buscar/cursos', [BuscadorController::class, 'alumnos'])->name('buscador.alumnos');
Route::post('/buscar-materia',[BuscadorController::class, 'buscar'])->name('buscar.materia');





Route::get('/css/estilos.css', function () {
    return response(file_get_contents(public_path('css/style.css')), 200)
        ->header('Content-Type', 'text/css');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
