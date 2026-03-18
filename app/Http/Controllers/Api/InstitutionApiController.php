<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionApiController extends Controller
{
    // GET /api/institutions
    public function index()
    {
        $institutions = Institution::with('cycles')->get();
        return response()->json($institutions, 200);
    }

    // GET /api/institutions/{id}
    public function show(Institution $institution)
    {
        $institution->load('cycles.classrooms');
        return response()->json($institution, 200);
    }

    // POST /api/institutions
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $institution = Institution::create($request->all());
        return response()->json($institution, 201);
    }

    // PUT /api/institutions/{id}
    public function update(Request $request, Institution $institution)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $institution->update($request->all());
        return response()->json($institution, 200);
    }

    // DELETE /api/institutions/{id}
    public function destroy(Institution $institution)
    {
        $institution->delete();
        return response()->json(['message' => 'Institución eliminada correctamente.'], 200);
    }
}
