<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Cycle;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Muestra todas las noticias
    public function index()
    {
        // with('cycles.institution') carga los ciclos y su institución
        $news = News::with('cycles.institution')->orderBy('created_at', 'desc')->get();
        return view('news.index', compact('news'));
    }

    // Formulario para crear una noticia
    public function create()
    {
        // Traemos ciclos con institución para el select múltiple
        $cycles = Cycle::with('institution')->orderBy('name')->get();
        return view('news.create', compact('cycles'));
    }

    // Guarda la noticia en la BD
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required|string|max:255',
            'content'   => 'required|string',
            // array — el campo cycles viene como array de ids
            'cycles'    => 'required|array',
            // each id debe existir en la tabla cycles
            'cycles.*'  => 'exists:cycles,id',
        ]);

        // Creamos la noticia
        $newsItem = News::create([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        // sync() vincula los ciclos seleccionados en la tabla pivote cycle_news
        $newsItem->cycles()->sync($request->cycles);

        return redirect()->route('news.index')->with('success', 'Noticia creada correctamente.');
    }

    // Detalle de una noticia
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    // Formulario de edición
    public function edit(News $news)
    {
        $cycles = Cycle::with('institution')->orderBy('name')->get();
        return view('news.edit', compact('news', 'cycles'));
    }

    // Actualiza la noticia
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'cycles'   => 'required|array',
            'cycles.*' => 'exists:cycles,id',
        ]);

        $news->update([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        // sync() actualiza los ciclos — agrega nuevos y elimina los desmarcados
        $news->cycles()->sync($request->cycles);

        return redirect()->route('news.index')->with('success', 'Noticia actualizada correctamente.');
    }

    // Elimina la noticia
    public function destroy(News $news)
    {
        // Al eliminar, el cascadeOnDelete en cycle_news limpia los registros pivote
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Noticia eliminada correctamente.');
    }
}
