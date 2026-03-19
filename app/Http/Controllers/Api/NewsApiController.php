<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
    public function index()
    {
        $news = News::with('cycles.institution')->get();
        return NewsResource::collection($news);
    }

    public function show(News $news)
    {
        $news->load('cycles.institution');
        return new NewsResource($news);
    }

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
        return new NewsResource($newsItem->load('cycles.institution'));
    }

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
        return new NewsResource($news->load('cycles.institution'));
    }

    public function destroy(News $news)
    {
        $news->delete();
        return response()->json(['mensaje' => 'Noticia eliminada correctamente.'], 200);
    }
}
