<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Http\Resources\ClassroomResource;
use Illuminate\Http\Request;

class ClassroomApiController extends Controller
{
    public function index() {
        $classrooms = Classroom::with('cycle.institution')->get();
        return ClassroomResource::collection($classrooms);
    }

    public function store(Request $request) {
        request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|string|max:100',
            'section' => 'required|string|max:10',
            'capacity' => 'required|integer|min:1',
            'cycle_id' => 'required|exists:cycles,id',
        ]);

        $classroom = Classroom::create($request->all());
        return new ClassroomResource($classroom->load('cycle.institution'));

    }

    public function show(Classroom $classroom) {
        $classroom->load('cycle.institution');
        return new ClassroomResource($classroom);
    }
    public function update (Request $request, string $id) {
        $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|string|max:100',
            'section' => 'required|string|max:10',
            'capacity' => 'required|integer|min:1',
            'cycle_id' => 'required|exists:cycles,id',
        ]);

        $classroom->update($request->all());
        return new ClassroomResource($classroom->load('cycle.institution'));

    }

    public function destroy (classroom $classroom) {
        $classroom->delete();
        return response()->json(['Mensaje' => 'Aula eliminada correctamente.'], 200);

    }
    
}
