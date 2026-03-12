<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            InstitutionSeeder::class,
            CycleSeeder::class,
            ClassroomSeeder::class,
            StudentSeeder::class,
            NewsSeeder::class,
            UserSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
