<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        Message::firstOrCreate(
            ['title' => 'Recordatorio de matrícula'],
            [
                'content'        => 'Se les recuerda a todos los padres de familia que el período de matrícula para el próximo ciclo escolar estará abierto del 1 al 15 de abril. Por favor acercarse a la institución con los documentos requeridos.',
                'recipient_type' => 'cycle',
                'sent_at'        => now(),
            ]
        );

        Message::firstOrCreate(
            ['title' => 'Suspensión de lecciones'],
            [
                'content'        => 'Se informa que el día viernes 20 de marzo no habrá lecciones debido a una actividad institucional. Los estudiantes deben presentarse el lunes siguiente normalmente.',
                'recipient_type' => 'grade',
                'grade'          => 'Primero',
                'sent_at'        => now(),
            ]
        );

        Message::firstOrCreate(
            ['title' => 'Entrega de boletines'],
            [
                'content'        => 'Los boletines del primer trimestre estarán disponibles para retiro a partir del próximo lunes. Los padres deben firmar y devolver el comprobante de recibido.',
                'recipient_type' => 'cycle',
                'sent_at'        => now(),
            ]
        );

        Message::firstOrCreate(
            ['title' => 'Actividad deportiva intercolegial'],
            [
                'content'        => 'Los estudiantes de secundaria participarán en el torneo intercolegial el próximo sábado. Se requiere autorización firmada por los padres para poder asistir.',
                'recipient_type' => 'grade',
                'grade'          => 'Sétimo',
                'sent_at'        => now(),
            ]
        );

        Message::firstOrCreate(
            ['title' => 'Reunión de profesores'],
            [
                'content'        => 'Se convoca a todos los docentes a reunión ordinaria el día miércoles a las 3:00 pm en la sala de profesores. La asistencia es obligatoria.',
                'recipient_type' => 'cycle',
                'sent_at'        => now(),
            ]
        );
    }
}
