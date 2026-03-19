<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    public function index()
    {
        $students = Student::with('classroom.cycle.institution')->get();
        // StudentResource::collection formatea toda la colección
        return StudentResource::collection($students);
    }

    public function show(Student $student)
    {
        $student->load('classroom.cycle.institution');
        return new StudentResource($student);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'birthday'     => 'nullable|date',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student = Student::create($request->all());
        return new StudentResource($student);
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'         => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'birthday'     => 'nullable|date',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student->update($request->all());
        return new StudentResource($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(['mensaje' => 'Estudiante eliminado correctamente.'], 200);
    }
}
