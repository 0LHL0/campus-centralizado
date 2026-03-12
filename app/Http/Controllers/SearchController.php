<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\News;
use App\Models\Classroom;
use App\Models\Institution;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Tomamos el texto que escribió el usuario
        $query = $request->get('q');

        // Si no escribió nada redirigimos al home
        if (!$query) {
            return redirect()->route('home');
        }

        // Buscamos en estudiantes — nombre o apellido que contenga el texto
        // LIKE '%texto%' busca coincidencias en cualquier posición
        $students = Student::with('classroom.cycle.institution')
            ->where('name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->get();

        // Buscamos en noticias — título o contenido
        $news = News::with('cycles.institution')
            ->where('title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->get();

        // Buscamos en instituciones — por nombre
        $institutions = Institution::where('name', 'LIKE', "%{$query}%")->get();

        // Buscamos en salones — por nombre
        $classrooms = Classroom::with('cycle.institution')
            ->where('name', 'LIKE', "%{$query}%")
            ->get();

        return view('search', compact('query', 'students', 'news', 'institutions', 'classrooms'));
    }
}
