<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use App\Models\Cycle;
use App\Models\Classroom;
use App\Models\Student;

class HomeController extends Controller
{
    public function index()
    {
        // Contamos cada módulo para mostrar en las tarjetas del dashboard
        $totalInstitutions = Institution::count();
        $totalCycles       = Cycle::count();
        $totalClassrooms   = Classroom::count();
        $totalStudents     = Student::count();

        // Traemos los últimos 5 estudiantes registrados
        $recentStudents = Student::with('classroom.cycle.institution')
                                 ->orderBy('created_at', 'desc')
                                 ->take(5)
                                 ->get();

        return view('home', compact(
            'totalInstitutions',
            'totalCycles',
            'totalClassrooms',
            'totalStudents',
            'recentStudents'
        ));
    }
}
