<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
    // GET /api/news
    public function index()
    {
        $news = News::with('cycles.institution')->get();
        return response()->json($news, 200);
    }

    // GET /api/news/{id}
    public function show(News $news)
    {
        $news->load('cycles.institution');
        return response()->json($news, 200);
    }

    // POST /api/news
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'cycles'   => 'required|array',
            'cycles.*' => 'exists:cycles,id',
        ]);

        $newsItem = News::create([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        $newsItem->cycles()->sync($request->cycles);

        return response()->json($newsItem->load('cycles'), 201);
    }

    // PUT /api/news/{id}
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

        $news->cycles()->sync($request->cycles);

        return response()->json($news->load('cycles'), 200);
    }

    // DELETE /api/news/{id}
    public function destroy(News $news)
    {
        $news->delete();
        return response()->json(['message' => 'Noticia eliminada correctamente.'], 200);
    }
}
