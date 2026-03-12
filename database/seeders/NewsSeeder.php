<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // Noticia 1 — vinculada a Kinder de las 3 instituciones (ciclos 1, 4, 7)
        $n1 = News::firstOrCreate(
            ['title' => 'Bienvenida al nuevo ciclo escolar'],
            ['content' => 'Nos complace dar la bienvenida a todos los estudiantes y familias al nuevo ciclo escolar 2026. Este año trabajaremos juntos para lograr los mejores resultados académicos y personales para nuestros niños.']
        );
        $n1->cycles()->sync([1, 4, 7]);

        // Noticia 2 — vinculada a Primaria (ciclos 2, 5, 8)
        $n2 = News::firstOrCreate(
            ['title' => 'Reunión de padres de familia — Primaria'],
            ['content' => 'Se convoca a todos los padres y tutores de los estudiantes de primaria a la reunión informativa del primer trimestre. La reunión se llevará a cabo el próximo viernes a las 6:00 pm en el salón principal.']
        );
        $n2->cycles()->sync([2, 5, 8]);

        // Noticia 3 — vinculada a Secundaria (ciclos 3, 6, 9)
        $n3 = News::firstOrCreate(
            ['title' => 'Exámenes de primer trimestre — Secundaria'],
            ['content' => 'Se informa a los estudiantes de secundaria que los exámenes del primer trimestre se realizarán del 20 al 27 de abril. Se recomienda repasar los temas vistos en clase y consultar con los profesores cualquier duda.']
        );
        $n3->cycles()->sync([3, 6, 9]);

        // Noticia 4 — para todos los ciclos
        $n4 = News::firstOrCreate(
            ['title' => 'Día del estudiante — Celebración especial'],
            ['content' => 'Con motivo del Día del Estudiante, el próximo 22 de mayo se realizarán actividades recreativas y culturales en todas las instituciones. No habrá lecciones regulares ese día.']
        );
        $n4->cycles()->sync([1, 2, 3, 4, 5, 6, 7, 8, 9]);
    }
}
