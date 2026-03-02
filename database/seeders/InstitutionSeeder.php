<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institution;

class InstitutionSeeder extends Seeder
{
    public function run(): void
    {
        // firstOrCreate — crea el registro solo si no existe, evita duplicados
        Institution::firstOrCreate(['email' => 'info@sanjose.edu'],   ['name' => 'Colegio San José',    'phone' => '2222-1111', 'address' => 'San José Centro']);
        Institution::firstOrCreate(['email' => 'info@santaana.edu'],  ['name' => 'Escuela Santa Ana',   'phone' => '2222-2222', 'address' => 'Santa Ana']);
        Institution::firstOrCreate(['email' => 'info@alajuela.edu'],  ['name' => 'Liceo de Alajuela',   'phone' => '2222-3333', 'address' => 'Alajuela Centro']);
    }
}
