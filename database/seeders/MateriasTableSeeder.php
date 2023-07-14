<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define los datos de ejemplo para las materias
        $materias = [
            ['nombre_materia' => 'Lengua', 'anios_id' => 1],
            ['nombre_materia' => 'Lengua Extranjera', 'anios_id' => 1],
            ['nombre_materia' => 'Matemáticas', 'anios_id' => 1],
            ['nombre_materia' => 'Geografia', 'anios_id' => 1],
            ['nombre_materia' => 'Historia', 'anios_id' => 1],
            ['nombre_materia' => 'Biologia', 'anios_id' => 1],
            ['nombre_materia' => 'Formacion Etica y Ciudadana', 'anios_id' => 1],
            ['nombre_materia' => 'Educacion Tecnologica', 'anios_id' => 1],
            ['nombre_materia' => 'Educacion Artistica', 'anios_id' => 1],
            ['nombre_materia' => 'Educacion Fisica', 'anios_id' => 1],
            ['nombre_materia' => 'Dibujo Tecnico', 'anios_id' => 1],
            ['nombre_materia' => 'Lengua', 'anios_id' => 2],
            ['nombre_materia' => 'Lengua Extranjera', 'anios_id' => 2],
            ['nombre_materia' => 'Geografía', 'anios_id' => 2],
            ['nombre_materia' => 'Historia', 'anios_id' => 2],
            ['nombre_materia' => 'Biología', 'anios_id' => 2],
            ['nombre_materia' => 'Física', 'anios_id' => 2],
            ['nombre_materia' => 'Formación Etica y CIudadana', 'anios_id' => 2],
            ['nombre_materia' => 'Educación Tecnológica', 'anios_id' => 2],
            ['nombre_materia' => 'Educación Física', 'anios_id' => 2],
            ['nombre_materia' => 'Dibujo Técnico', 'anios_id' => 2],
            ['nombre_materia' => 'Lengua', 'anios_id' => 3],
            ['nombre_materia' => 'Lengua Extranjera', 'anios_id' => 3],
            ['nombre_materia' => 'Matemática', 'anios_id' => 3],
            ['nombre_materia' => 'Geografía', 'anios_id' => 3],
            ['nombre_materia' => 'Historia', 'anios_id' => 3],
            ['nombre_materia' => 'Química', 'anios_id' => 3],
            ['nombre_materia' => 'Física', 'anios_id' => 3],
            ['nombre_materia' => 'Formación Etica y Ciudadana', 'anios_id' => 3],
            ['nombre_materia' => 'Educación Tecnológica', 'anios_id' => 3],
            ['nombre_materia' => 'Educación Artística', 'anios_id' => 3],
            ['nombre_materia' => 'Educación Física', 'anios_id' => 3],
            ['nombre_materia' => 'Dibujo Técnico - CAD', 'anios_id' => 3],
            ['nombre_materia' => 'Lengua 1', 'anios_id' => 4],
            ['nombre_materia' => 'Ingles Tecnico 1', 'anios_id' => 4],
            ['nombre_materia' => 'Historia', 'anios_id' => 4],
            ['nombre_materia' => 'Educacion Fisica 1', 'anios_id' => 4],
            ['nombre_materia' => 'Matematica Aplicada', 'anios_id' => 4],
            ['nombre_materia' => 'Economia', 'anios_id' => 4],
            ['nombre_materia' => 'Fisica aplicada', 'anios_id' => 4],
            ['nombre_materia' => 'Tecnologia Electronica', 'anios_id' => 4],
            ['nombre_materia' => 'Tecnologia de la Informacion y Comunicacion 1', 'anios_id' => 4],
            ['nombre_materia' => 'Laboratorio de Programacion 1', 'anios_id' => 4],
            ['nombre_materia' => 'Laboratorio de Hardware 1', 'anios_id' => 4],
            ['nombre_materia' => 'Laboratorio de Sistemas Operativos 1', 'anios_id' => 4],
            ['nombre_materia' => 'Laboratorio de Aplicaciones 1', 'anios_id' => 4],
            ['nombre_materia' => 'Lengua 2', 'anios_id' => 5],
            ['nombre_materia' => 'Ingles Técnico 2', 'anios_id' => 5],
            ['nombre_materia' => 'Educación Física 2', 'anios_id' => 5],
            ['nombre_materia' => 'Analisis Matemático', 'anios_id' => 5],
            ['nombre_materia' => 'Geografía Económica y Regional', 'anios_id' => 5],
            ['nombre_materia' => 'Cultura Emprendedora', 'anios_id' => 5],
            ['nombre_materia' => 'Seguridad, Higiene y Protección Ambiental', 'anios_id' => 5],
            ['nombre_materia' => 'Tecnología de la Información y Comunicación 2', 'anios_id' => 5],
            ['nombre_materia' => 'Sistemas Digitales 1', 'anios_id' => 5],
            ['nombre_materia' => 'Laboratorio de Programación 2', 'anios_id' => 5],
            ['nombre_materia' => 'Laboratorio de Hardware 2', 'anios_id' => 5],
            ['nombre_materia' => 'Laboratorio de Sistemas Operativos 2', 'anios_id' => 5],
            ['nombre_materia' => 'Laboratorio de Aplicaciones 2', 'anios_id' => 5],
            ['nombre_materia' => 'Lengua 3', 'anios_id' => 6],
            ['nombre_materia' => 'Ingles Técnico 3', 'anios_id' => 6],
            ['nombre_materia' => 'Educación Física 3', 'anios_id' => 6],
            ['nombre_materia' => 'Estadistica y Probabilidad', 'anios_id' => 6],
            ['nombre_materia' => 'Gestion Organizacional', 'anios_id' => 6],
            ['nombre_materia' => 'Sistemas Digitales 2', 'anios_id' => 6],
            ['nombre_materia' => 'Base de Datos 1', 'anios_id' => 6],
            ['nombre_materia' => 'Seguridad Informatica', 'anios_id' => 6],
            ['nombre_materia' => 'Comercializacion de productos y sistemas Informaticos', 'anios_id' => 6],
            ['nombre_materia' => 'Laboratorio de Programacion 3', 'anios_id' => 6],
            ['nombre_materia' => 'Laboratorio de Hardware 3', 'anios_id' => 6],
            ['nombre_materia' => 'Laboratorio de Sistemas Operativos 3', 'anios_id' => 6],
            ['nombre_materia' => 'Laboratorio de Redes', 'anios_id' => 6],
        ];

        // Inserta los datos en la tabla 'materias'
        DB::table('materias')->insert($materias);
    }
}
