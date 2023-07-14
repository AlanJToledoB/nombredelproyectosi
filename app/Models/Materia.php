<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_materia', 'anios_id'];

    public function anio()
    {
        return $this->belongsTo(Curso::class, 'anios_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }
}
