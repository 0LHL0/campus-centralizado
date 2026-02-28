<?php

namespace App\Http\Controllers;


use App\Models\Cycle;

use App\Models\Institution;

use Illuminate\Http\Request;



class CycleController extends Controller

{

    public function index()

    {

        // Traemos instituciones con sus ciclos agrupados

        // así podemos iterar institución por institución en la vista

        $institutions = Institution::with('cycles')->orderBy('name')->get();

        return view('cycles.index', compact('institutions'));

    }



    public function create()

    {

        $institutions = Institution::orderBy('name')->get();

        return view('cycles.create', compact('institutions'));

    }



    public function store(Request $request)

    {

        $request->validate([

            'name'           => 'required|string|max:255',

            'institution_id' => 'required|exists:institutions,id',

        ]);

        Cycle::create($request->all());

        return redirect()->route('cycles.index')->with('success', 'Ciclo creado correctamente.');

    }



    public function show(Cycle $cycle)

    {

        return view('cycles.show', compact('cycle'));

    }



    public function edit(Cycle $cycle)

    {

        $institutions = Institution::orderBy('name')->get();

        return view('cycles.edit', compact('cycle', 'institutions'));

    }



    public function update(Request $request, Cycle $cycle)

    {

        $request->validate([

            'name'           => 'required|string|max:255',

            'institution_id' => 'required|exists:institutions,id',

        ]);

        $cycle->update($request->all());

        return redirect()->route('cycles.index')->with('success', 'Ciclo actualizado correctamente.');

    }



    public function destroy(Cycle $cycle)

    {

        $cycle->delete();

        return redirect()->route('cycles.index')->with('success', 'Ciclo eliminado correctamente.');

    }

}

