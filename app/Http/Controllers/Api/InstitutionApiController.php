<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstitutionResource;
use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionApiController extends Controller
{
    public function index()
    {
        $institutions = Institution::with('cycles')->get();
        return InstitutionResource::collection($institutions);
    }

    public function show(Institution $institution)
    {
        $institution->load('cycles.classrooms');
        return new InstitutionResource($institution);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $institution = Institution::create($request->all());
        return new InstitutionResource($institution);
    }

    public function update(Request $request, Institution $institution)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'nullable|email',
            'phone'   => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $institution->update($request->all());
        return new InstitutionResource($institution);
    }

    public function destroy(Institution $institution)
    {
        $institution->delete();
        return response()->json(['mensaje' => 'Institución eliminada correctamente.'], 200);
    }
}
