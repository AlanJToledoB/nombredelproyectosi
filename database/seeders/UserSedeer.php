<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::create([
            'name' => 'alan joel toledo',
            'email' => 'victorarana@gmail.com',
            'password' => bcrypt('12345678') 
        ])->assignRole('alumno');

        User::create([
            'name' => 'secretaria',
            'email' => 'escuelallano@gmail.com',
            'password' => bcrypt('12345678') 
        ])->assignRole('admin');

        User::create([
            'name' => 'mariela',
            'email' => 'soypreceptor@gmail.com',
            'password' => bcrypt('12345678') 
        ])->assignRole('preceptor');

    }
}
