<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Cycle;
use App\Models\Institution;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $institutions = Institution::with(['cycles.classrooms'])->orderBy('name')->get();
        return view('classrooms.index', compact('institutions'));
    }

    public function create()
    {
        $cycles = Cycle::with('institution')->orderBy('name')->get();
        return view('classrooms.create', compact('cycles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'grade'    => 'required|string|max:100',
            'section'  => 'required|string|max:10',
            'capacity' => 'nullable|integer|min:1',
            'cycle_id' => 'required|exists:cycles,id',
        ]);
        Classroom::create($request->all());
        return redirect()->route('classrooms.index')->with('success', 'Salón creado correctamente.');
    }

    public function show(Classroom $classroom)
    {
        return view('classrooms.show', compact('classroom'));
    }

    public function edit(Classroom $classroom)
    {
        $cycles = Cycle::with('institution')->orderBy('name')->get();
        return view('classrooms.edit', compact('classroom', 'cycles'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'grade'    => 'required|string|max:100',
            'section'  => 'required|string|max:10',
            'capacity' => 'nullable|integer|min:1',
            'cycle_id' => 'required|exists:cycles,id',
        ]);
        $classroom->update($request->all());
        return redirect()->route('classrooms.index')->with('success', 'Salón actualizado correctamente.');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return redirect()->route('classrooms.index')->with('success', 'Salón eliminado correctamente.');
    }
}
