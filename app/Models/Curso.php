<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_curso'];
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
        return $this->hasMany(Alumno::class, 'cursos_id');
    }

}
