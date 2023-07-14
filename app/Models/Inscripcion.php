<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripcion';

    protected $fillable = [
        'users_id',
        'materias_id',
        'fecha',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Relación con el modelo Materia
    public function alumno()
{
    return $this->belongsTo(Alumno::class, 'alumnos_id');
}

public function materia()
{
    return $this->belongsTo(Materia::class, 'materias_id');
}

public function inscripciones()
{
    return $this->hasMany(Inscripcion::class, 'materias_id');
}


}
