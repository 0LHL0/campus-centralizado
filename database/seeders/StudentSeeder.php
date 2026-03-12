<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        // Estudiantes del Colegio San José
        // Kinder — classroom_id 1
        Student::firstOrCreate(['name' => 'Sofía',    'last_name' => 'Ramírez',   'classroom_id' => 1], ['birthday' => '2020-03-12']);
        Student::firstOrCreate(['name' => 'Mateo',    'last_name' => 'González',  'classroom_id' => 1], ['birthday' => '2020-07-05']);
        Student::firstOrCreate(['name' => 'Valeria',  'last_name' => 'Mora',      'classroom_id' => 1], ['birthday' => '2020-11-20']);

        // Primaria — classroom_id 2
        Student::firstOrCreate(['name' => 'Diego',    'last_name' => 'Vargas',    'classroom_id' => 2], ['birthday' => '2015-04-18']);
        Student::firstOrCreate(['name' => 'Luciana',  'last_name' => 'Jiménez',   'classroom_id' => 2], ['birthday' => '2015-09-30']);

        // Secundaria — classroom_id 3
        Student::firstOrCreate(['name' => 'Andrés',   'last_name' => 'Solís',     'classroom_id' => 3], ['birthday' => '2010-02-14']);
        Student::firstOrCreate(['name' => 'Camila',   'last_name' => 'Rojas',     'classroom_id' => 3], ['birthday' => '2010-06-22']);

        // Estudiantes de la Escuela Santa Ana
        // Kinder — classroom_id 4
        Student::firstOrCreate(['name' => 'Samuel',   'last_name' => 'Castro',    'classroom_id' => 4], ['birthday' => '2020-01-08']);
        Student::firstOrCreate(['name' => 'Isabella', 'last_name' => 'Herrera',   'classroom_id' => 4], ['birthday' => '2020-05-17']);

        // Primaria — classroom_id 5
        Student::firstOrCreate(['name' => 'Sebastián','last_name' => 'Méndez',    'classroom_id' => 5], ['birthday' => '2015-08-25']);
        Student::firstOrCreate(['name' => 'Gabriela', 'last_name' => 'Quesada',   'classroom_id' => 5], ['birthday' => '2015-12-03']);

        // Secundaria — classroom_id 6
        Student::firstOrCreate(['name' => 'José',     'last_name' => 'Arias',     'classroom_id' => 6], ['birthday' => '2010-03-29']);

        // Estudiantes del Liceo de Alajuela
        // Kinder — classroom_id 7
        Student::firstOrCreate(['name' => 'Daniela',  'last_name' => 'Núñez',     'classroom_id' => 7], ['birthday' => '2020-09-14']);

        // Primaria — classroom_id 8
        Student::firstOrCreate(['name' => 'Carlos',   'last_name' => 'Blanco',    'classroom_id' => 8], ['birthday' => '2015-06-07']);
        Student::firstOrCreate(['name' => 'Mariana',  'last_name' => 'Pereira',   'classroom_id' => 8], ['birthday' => '2015-10-19']);

        // Secundaria — classroom_id 9
        Student::firstOrCreate(['name' => 'Felipe',   'last_name' => 'Chinchilla','classroom_id' => 9], ['birthday' => '2010-01-31']);
        Student::firstOrCreate(['name' => 'Andrea',   'last_name' => 'Vega',      'classroom_id' => 9], ['birthday' => '2010-07-16']);
    }
}
