<?php

namespace App\Http\Controllers;


use App\Models\Cycle;
use App\Models\Institution;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    // Muestra todos los ciclos con su institución relacionada
    public function index()
    {
        // with('institution') carga la institución de cada ciclo en la misma consulta
        $cycles = Cycle::with('institution')->orderBy('name')->get();
        return view('cycles.index', compact('cycles'));
    }

    // Muestra el formulario para crear un ciclo nuevo
    public function create()
    {
        // Traemos todas las instituciones para mostrarlas en un select
        $institutions = Institution::orderBy('name')->get();
        return view('cycles.create', compact('institutions'));
    }

    // Recibe los datos del formulario y guarda el nuevo ciclo
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            // exists:institutions,id verifica que el id enviado exista en la tabla institutions
            'institution_id' => 'required|exists:institutions,id',
        ]);

        Cycle::create($request->all());

        return redirect()->route('cycles.index')
                         ->with('success', 'Ciclo creado correctamente.');
    }

    // Muestra el detalle de un ciclo específico
    public function show(Cycle $cycle)
    {
        return view('cycles.show', compact('cycle'));
    }

    // Muestra el formulario de edición con los datos actuales del ciclo
    public function edit(Cycle $cycle)
    {
        $institutions = Institution::orderBy('name')->get();
        return view('cycles.edit', compact('cycle', 'institutions'));
    }

    // Recibe los datos editados y actualiza el ciclo en la base de datos
    public function update(Request $request, Cycle $cycle)
    {
        $request->validate([
            'name'           => 'required|string|max:255',
            'institution_id' => 'required|exists:institutions,id',
        ]);

        $cycle->update($request->all());

        return redirect()->route('cycles.index')
                         ->with('success', 'Ciclo actualizado correctamente.');
    }

    // Elimina un ciclo de la base de datos
    public function destroy(Cycle $cycle)
    {
        $cycle->delete();

        return redirect()->route('cycles.index')
                         ->with('success', 'Ciclo eliminado correctamente.');
    }
}
