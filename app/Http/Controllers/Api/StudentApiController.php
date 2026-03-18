<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    // GET /api/students — lista todos los estudiantes
    public function index()
    {
        // Cargamos la cadena completa en una sola consulta
        $students = Student::with('classroom.cycle.institution')->get();

        return response()->json($students, 200);
    }

    // GET /api/students/{id} — detalle de un estudiante
    public function show(Student $student)
    {
        $student->load('classroom.cycle.institution');

        return response()->json($student, 200);
    }

    // POST /api/students — crear estudiante
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'birthday'     => 'nullable|date',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student = Student::create($request->all());

        return response()->json($student, 201); // 201 = Creado
    }

    // PUT /api/students/{id} — actualizar estudiante
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'birthday'     => 'nullable|date',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student->update($request->all());

        return response()->json($student, 200);
    }

    // DELETE /api/students/{id} — eliminar estudiante
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'message' => 'Estudiante eliminado correctamente.'
        ], 200);
    }
}
