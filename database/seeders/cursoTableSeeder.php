<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoTableSeeder extends Seeder
{
    public function run(): void
    {
        $cursos = [
            ['nombre_curso' => '1ro 1ra'],
            ['nombre_curso' => '1ro 2da'],
            ['nombre_curso' => '1ro 3ra'],
            ['nombre_curso' => '1ro 4ta'],
            ['nombre_curso' => '2do 1ra'],
            ['nombre_curso' => '2do 2da'],
            ['nombre_curso' => '2do 3ra'],
            ['nombre_curso' => '3ro 1ra'],
            ['nombre_curso' => '3ro 2da'],
            ['nombre_curso' => '3ro 3ra'],
            ['nombre_curso' => '4to 1ra'],
            ['nombre_curso' => '4to 2da'],
            ['nombre_curso' => '5to 1ra'],
            ['nombre_curso' => '5to 2da'],
            ['nombre_curso' => '6to 1ra'],
            ['nombre_curso' => '6to 2da'],
        ];

        DB::table('cursos')->insert($cursos);
    }
}