<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
 public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Administrador',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'), // Usa una contraseña encriptada
                'role' => 'admin',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Usuario',
                'email' => 'user@example.com',
                'password' => Hash::make('password123'), // Usa una contraseña encriptada
                'role' => 'user',
                'email_verified_at' => now(),
            ],
            // Agrega más usuarios si lo deseas
        ]);
    }
}
