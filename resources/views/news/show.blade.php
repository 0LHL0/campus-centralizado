@extends('layouts.app')
@section('title', 'Detalle de Noticia')
@section('page-title', 'Detalle de Noticia')
@section('content')

<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:32px;">
    <div style="display:flex; align-items:center; gap:12px;">
        <a href="{{ route('news.index') }}" style="width:34px; height:34px; border-radius:9px; background:var(--card); border:1px solid #E2E8F0; display:flex; align-items:center; justify-content:center; color:var(--text-secondary); text-decoration:none; flex-shrink:0;">←</a>
        <div>
            <h2 style="font-family:'Playfair Display',serif; font-size:1.3rem; font-weight:700; color:var(--text-primary); margin:0;">{{ $news->title }}</h2>
            <p style="font-size:0.8rem; color:var(--text-secondary); margin:3px 0 0;">Publicado el {{ $news->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
    <a href="{{ route('news.edit', $news) }}" style="padding:9px 20px; background:var(--accent); color:#fff; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600;">✏️ Editar</a>
</div>

<div style="max-width:760px; display:flex; flex-direction:column; gap:20px;">

    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:28px;">
        <div style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:600; color:var(--text-primary); margin-bottom:16px; padding-bottom:12px; border-bottom:1px solid #F1F5F9;">
            Contenido
        </div>
        <p style="font-size:0.9rem; color:var(--text-secondary); line-height:1.8; margin:0;">{{ $news->content }}</p>
    </div>

    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:28px;">
        <div style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:600; color:var(--text-primary); margin-bottom:16px; padding-bottom:12px; border-bottom:1px solid #F1F5F9;">
            Ciclos vinculados
        </div>
        <div style="display:flex; flex-wrap:wrap; gap:8px;">
            @forelse($news->cycles as $cycle)
                <span style="padding:6px 14px; border-radius:20px; background:#EDE9FE; color:#5B21B6; font-size:0.82rem; font-weight:500;">
                    {{ $cycle->name }} — {{ $cycle->institution->name }}
                </span>
            @empty
                <span style="font-size:0.85rem; color:var(--text-muted);">Sin ciclos vinculados.</span>
            @endforelse
        </div>
    </div>

</div>

@endsection
