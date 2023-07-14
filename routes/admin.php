<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AlumnoController;
use App\Http\Controllers\Admin\MateriaCrudController;
use App\Http\Controllers\Admin\userController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminController::class, 'profile'])->name('admin.index');
Route::get('/admin/ayuda', [AdminController::class, 'ayuda'])->name('admin.ayuda');

// para el controlador de inscripciones
Route::get('/admin/settings', [AdminController::class, 'index'])->name('admin.settings.inscripciones');
Route::get('/admin/settings/inscripciones/create', [AdminController::class, 'create'])->name('admin.settings.inscripciones.create');
Route::post('/admin/settings/inscripciones', [AdminController::class, 'store'])->name('inscripciones.store');
Route::get('/admin/inscripciones/{inscripcion}/edit', [AdminController::class, 'edit'])->name('inscripciones.edit');
Route::put('/admin/inscripciones/{inscripcion}', [AdminController::class, 'update'])->name('inscripciones.update');
Route::delete('/admin/inscripciones/{inscripcion}', [AdminController::class, 'destroy'])->name('inscripciones.destroy');
Route::get('/admin/inscripciones/search', [AdminController::class, 'search'])->name('admin.inscripciones.search');
Route::get('/admin/alumnos/autocomplete', [AdminController::class, 'autocomplete'])->name('admin.alumnos.autocomplete');

// para el controlador de alumnos
Route::get('/admin/Alumnos', [AlumnoController::class, 'index'])->name('admin.alumnos.inscripciones');
Route::get('/settings/inscripciones/create', [AlumnoController::class, 'create'])->name('admin.alumnos.create');
Route::post('/settings/inscripciones', [AlumnoController::class, 'store'])->name('admin.alumnos.store');
Route::get('/inscripciones/{alumno}/edit', [AlumnoController::class, 'edit'])->name('admin.alumnos.edit');
Route::put('/inscripciones/{alumno}', [AlumnoController::class, 'update'])->name('admin.alumnos.update');
Route::delete('/inscripciones/{alumno}', [AlumnoController::class, 'destroy'])->name('admin.alumnos.destroy');
Route::get('/admin/alumnos/search', [AlumnoController::class, 'search'])->name('admin.alumnos.search');
Route::get('/admin/alumnos/autocomplete', [AlumnoController::class, 'autocomplete'])->name('admin.alumnos.autocomplete');

// rutas para el crud de las materias
Route::get('/admin/Materias', [MateriaCrudController::class, 'index'])->name('admin.materias.inscripciones');
Route::get('/admin/materias/create', [MateriaCrudController::class, 'create'])->name('admin.materias.create');
Route::post('/admin/materias', [MateriaCrudController::class, 'store'])->name('admin.materias.store');
Route::get('/admin/materias/{materia}/edit', [MateriaCrudController::class, 'edit'])->name('admin.materias.edit');
Route::put('/admin/materias/{materia}', [MateriaCrudController::class, 'update'])->name('admin.materias.update');
Route::delete('/admin/materias/{materia}', [MateriaCrudController::class, 'destroy'])->name('admin.materias.destroy');
Route::get('/admin/materias/autocomplete', [MateriaCrudController::class, 'autocomplete'])->name('admin.materias.autocomplete');
Route::get('/admin/materias/search', [MateriaCrudController::class, 'search'])->name('admin.materias.search');

// crud para los usuarios
// Rutas para el controlador UserController
Route::get('/admin/usuarios', [UserController::class, 'index'])->name('admin.usuarios.index');
Route::get('/admin/usuarios/create', [UserController::class, 'create'])->name('admin.usuarios.create');
Route::post('/admin/usuarios', [UserController::class, 'store'])->name('admin.usuarios.store');
Route::get('/admin/usuarios/{user}/edit', [UserController::class, 'edit'])->name('admin.usuarios.edit');
Route::put('/admin/usuarios/{user}', [UserController::class, 'update'])->name('admin.usuarios.update');
Route::delete('/admin/usuarios/{user}', [UserController::class, 'destroy'])->name('admin.usuarios.destroy');
