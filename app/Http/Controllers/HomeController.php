<?php

namespace App\Http\Controllers;

use App\Models\Cycle;

class HomeController extends Controller
{
    public function index()
    {
        // Traemos todos los ciclos con sus noticias en una sola consulta
        $cycles = Cycle::with('news')->get();

        return view('home', compact('cycles'));
    }
}