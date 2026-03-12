<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classroom;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        // Colegio San José
        Classroom::firstOrCreate(['name' => 'Kinder A',   'cycle_id' => 1], ['grade' => 'Kinder',    'section' => 'A', 'capacity' => 20]);
        Classroom::firstOrCreate(['name' => 'Primero A',  'cycle_id' => 2], ['grade' => 'Primero',   'section' => 'A', 'capacity' => 25]);
        Classroom::firstOrCreate(['name' => 'Sétimo A',   'cycle_id' => 3], ['grade' => 'Sétimo',    'section' => 'A', 'capacity' => 30]);

        // Escuela Santa Ana
        Classroom::firstOrCreate(['name' => 'Kinder B',   'cycle_id' => 4], ['grade' => 'Kinder',    'section' => 'B', 'capacity' => 20]);
        Classroom::firstOrCreate(['name' => 'Segundo A',  'cycle_id' => 5], ['grade' => 'Segundo',   'section' => 'A', 'capacity' => 25]);
        Classroom::firstOrCreate(['name' => 'Octavo A',   'cycle_id' => 6], ['grade' => 'Octavo',    'section' => 'A', 'capacity' => 30]);

        // Liceo de Alajuela
        Classroom::firstOrCreate(['name' => 'Kinder C',   'cycle_id' => 7], ['grade' => 'Kinder',    'section' => 'C', 'capacity' => 20]);
        Classroom::firstOrCreate(['name' => 'Tercero A',  'cycle_id' => 8], ['grade' => 'Tercero',   'section' => 'A', 'capacity' => 25]);
        Classroom::firstOrCreate(['name' => 'Noveno A',   'cycle_id' => 9], ['grade' => 'Noveno',    'section' => 'A', 'capacity' => 30]);
    }
}
