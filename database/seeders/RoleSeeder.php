<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAlumno = Role::create(['name' => 'alumno']);
        $rolePreceptor = Role::create(['name' => 'preceptor']);


        //roles alumnos

        //roles admin

        Permission::create(['name' => 'admin.materias.inscripciones'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin.usuarios.index'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin.settings.inscripciones'])->assignRole($roleAdmin);

        //roles conjuntos
        Permission::create(['name' => 'admin.index'])->syncRoles([$rolePreceptor, $roleAdmin]); 
        Permission::create(['name' => 'admin.alumnos.inscripciones'])->assignRole([$rolePreceptor,$roleAdmin]);
        //roles preceptor
        
    }
}
//lo que yo quiero hacer es darle a los alumnos un roll para poder ingresar al panel de ayuda, para que de esta forma se puedan comunicar con el sevicio tecnico
