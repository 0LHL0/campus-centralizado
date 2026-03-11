<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Aqui carga la cadena completa: Estudiante → Salón → Ciclo → Institución
        $students = Student::with('classroom.cycle.institution')->orderBy('last_name')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        // Aqui traemos salones con su ciclo e institución para el select
        $classrooms = Classroom::with('cycle.institution')->orderBy('name')->get();
        return view('students.create', compact('classrooms'));
    }
       //Aqui se guarda el nuevo estudiante en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'birthday'     => 'nullable|date',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);
        Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Estudiante registrado correctamente.');
    }

     // Aqui se muestra el detalle de un estudiante
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }


    // Aqui se muestra el formulario de edición con los datos actuales
    public function edit(Student $student)
    {
        $classrooms = Classroom::with('cycle.institution')->orderBy('name')->get();
        return view('students.edit', compact('student', 'classrooms'));
    }

    // Aqui se ctualiza los datos del estudiante
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'birthday'     => 'nullable|date',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Estudiante actualizado correctamente.');
    }

    // Aqui se elimina un estudiante
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
