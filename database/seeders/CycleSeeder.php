<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cycle;

class CycleSeeder extends Seeder
{
    public function run(): void
    {
        // Recorremos los ids 1, 2 y 3 que corresponden a las 3 instituciones creadas
        foreach ([1, 2, 3] as $institutionId) {
            Cycle::firstOrCreate(['name' => 'Kinder',     'institution_id' => $institutionId]);
            Cycle::firstOrCreate(['name' => 'Primaria',   'institution_id' => $institutionId]);
            Cycle::firstOrCreate(['name' => 'Secundaria', 'institution_id' => $institutionId]);
        }
    }
}
