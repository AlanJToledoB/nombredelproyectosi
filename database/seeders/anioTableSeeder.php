<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Define los datos de ejemplo para los años
        $anios = [
            ['nombre_anio' => '1ro'],
            ['nombre_anio' => '2do'],
            ['nombre_anio' => '3ro'],
            ['nombre_anio' => '4to'],
            ['nombre_anio' => '5to'],
            ['nombre_anio' => '6to'],
        ];

        // // Inserta los datos en la tabla 'anios'
        DB::table('anios')->insert($anios);

        // seeder de la tabla "alumnos"
        $alumnos = [
            ['apellido' => 'ALEGRE ROMERO', 'DNI' => '12345678', 'celular' => 1122334455, 'cursos_id' => 4],
            ['apellido' => 'ALVAREZ', 'DNI' => '23456789', 'celular' => 2233445566, 'cursos_id' => 4],
            ['apellido' => 'AYALA CODIGONI', 'DNI' => '34567890', 'celular' => 3344556677, 'cursos_id' => 4],
            ['apellido' => 'BRIZUELA FALCÓN', 'DNI' => '45678901', 'celular' => 4455667788, 'cursos_id' => 4],
            ['apellido' => 'CABALLERO', 'DNI' => '56789012', 'celular' => 5566778899, 'cursos_id' => 4],
            ['apellido' => 'CASTRO', 'DNI' => '67890123', 'celular' => 6677889900, 'cursos_id' => 4],
            ['apellido' => 'CORONEL', 'DNI' => '78901234', 'celular' => 7788990011, 'cursos_id' => 4],
            ['apellido' => 'ESPINDOLA VARGAS', 'DNI' => '89012345', 'celular' => 8899001122, 'cursos_id' => 4],
            ['apellido' => 'FALCON AGUIRRE', 'DNI' => '90123456', 'celular' => 9900112233, 'cursos_id' => 4],
            ['apellido' => 'FALCON BUBANS', 'DNI' => '01234567', 'celular' => 1122334455, 'cursos_id' => 4],
            ['apellido' => 'FERNÁNDEZ GONZÁLEZ', 'DNI' => '12345678', 'celular' => 2233445566, 'cursos_id' => 4],
            ['apellido' => 'GARCÍA', 'DNI' => '23456789', 'celular' => 3344556677, 'cursos_id' => 4],
            ['apellido' => 'GIMENEZ OJEDA', 'DNI' => '34567890', 'celular' => 4455667788, 'cursos_id' => 4],
            ['apellido' => 'GODOY ZACARIAS', 'DNI' => '45678901', 'celular' => 5566778899, 'cursos_id' => 4],
            ['apellido' => 'GODOY', 'DNI' => '56789012', 'celular' => 6677889900, 'cursos_id' => 4],
            ['apellido' => 'KOVALEK PINTOS', 'DNI' => '67890123', 'celular' => 7788990011, 'cursos_id' => 4],
            ['apellido' => 'LAFFONT MEZA', 'DNI' => '78901234', 'celular' => 8899001122, 'cursos_id' => 4],
            ['apellido' => 'LEIVA', 'DNI' => '89012345', 'celular' => 9900112233, 'cursos_id' => 4],
            ['apellido' => 'LEIZ', 'DNI' => '90123456', 'celular' => 1122334455, 'cursos_id' => 4],
            ['apellido' => 'LEZCANO', 'DNI' => '01234567', 'celular' => 2233445566, 'cursos_id' => 4],
            ['apellido' => 'MONTIEL', 'DNI' => '12345678', 'celular' => 3344556677, 'cursos_id' => 4],
            ['apellido' => 'PUCHETA CENTURION', 'DNI' => '23456789', 'celular' => 4455667788, 'cursos_id' => 4],
            ['apellido' => 'RODRÍGUEZ FAIJÓ', 'DNI' => '34567890', 'celular' => 5566778899, 'cursos_id' => 4],
            ['apellido' => 'ROMERO WAKAHAYASHI', 'DNI' => '45678901', 'celular' => 6677889900, 'cursos_id' => 4],
            ['apellido' => 'ROMERO', 'DNI' => '56789012', 'celular' => 7788990011, 'cursos_id' => 4],
            ['apellido' => 'RUIDÍAZ NAVARRO', 'DNI' => '67890123', 'celular' => 8899001122, 'cursos_id' => 4],
            ['apellido' => 'USINGER LEIZ', 'DNI' => '78901234', 'celular' => 9900112233, 'cursos_id' => 4],
            ['apellido' => 'VARGAS', 'DNI' => '89012345', 'celular' => 1122334455, 'cursos_id' => 4],
            ['apellido' => 'ZIBELMAN', 'DNI' => '90123456', 'celular' => 9900112233, 'cursos_id' => 4],

            

            
            

        ];

        // Inserta los registros en la base de datos
        DB::table('alumnos')->insert($alumnos);
    }
}
