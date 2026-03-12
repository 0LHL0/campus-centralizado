<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin general — institución 1 (Colegio San José)
        User::firstOrCreate(
            ['email' => 'admin@educore.com'],
            [
                'name'           => 'Administrador',
                'password'       => Hash::make('password'),
                'role_id'        => 1, // admin
                'institution_id' => 1,
            ]
        );

        // Profesor — institución 1
        User::firstOrCreate(
            ['email' => 'profesor@educore.com'],
            [
                'name'           => 'Carlos Profesor',
                'password'       => Hash::make('password'),
                'role_id'        => 2, // profesor
                'institution_id' => 1,
            ]
        );

        // Padre — institución 2 (Escuela Santa Ana)
        User::firstOrCreate(
            ['email' => 'padre@educore.com'],
            [
                'name'           => 'María Padre',
                'password'       => Hash::make('password'),
                'role_id'        => 3, // padre
                'institution_id' => 2,
            ]
        );
    }
}
