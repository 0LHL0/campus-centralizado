<?php

namespace App\Http\Controllers;
use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{

 // Método index — se ejecuta cuando alguien visita /institutions. Su trabajo es traer todas las instituciones y mandárselas a la vista

    public function index() {
        
       $institutions = Institution::orderBy('name')->get();

         return view('institutions.index', compact('institutions'));
    }

// Método create — muestra el formulario para crear una institución nueva

    public function create() {
        return view('institutions.create');
    }

// Método store — recibe los datos del formulario y los guarda en la base de datos

    public function store(Request $request) 
    {
        $request -> validate ([

            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:institutions',
            'phone' => 'required|string',
            'address' => 'nullable|string|max:255']);

            Institution::create($request->all());

            return redirect()->route('institutions.index')->with('success', 'Institution created successfully.');
    }
    
// Método show — muestra el detalle de una institución específica
    public function show (Institution $institution) {
    return view('institutions.show', compact('institution'));

    }

// Método edit — muestra el formulario para editar una institución existente
    public function edit(Institution $institution) {
        return view('institutions.edit', compact('institution'));
    }

    public function update(Request $request, Institution $institution) 
    {
        $request -> validate ([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:institutions,email,' . $institution->id,
            'phone' => 'required|string',
            'address' => 'nullable|string|max:255']);

        $institution->update($request->all());

        return redirect()->route('institutions.index')->with('success', 'Institution updated successfully.');
    }

    public function destroy(Institution $institution) {
        $institution->delete();
        return redirect()->route('institutions.index')->with('success', 'Institution deleted successfully.');
    }
}

