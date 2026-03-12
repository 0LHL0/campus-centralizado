@extends('layouts.app')
@section('title', 'Noticias')
@section('page-title', 'Noticias')
@section('content')

<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
    <div>
        <h2 style="font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:700; color:var(--text-primary); margin:0;">Noticias</h2>
        <p style="font-size:0.82rem; color:var(--text-secondary); margin:4px 0 0;">{{ $news->count() }} noticia(s) publicada(s)</p>
    </div>
    <a href="{{ route('news.create') }}" style="display:flex; align-items:center; gap:8px; background:var(--accent); color:#fff; padding:10px 20px; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600;">
        <span>➕</span> Nueva Noticia
    </a>
</div>

@if(session('success'))
    <div style="background:#D1FAE5; border:1px solid #6EE7B7; color:#065F46; padding:12px 18px; border-radius:10px; margin-bottom:20px; font-size:0.85rem;">
        ✅ {{ session('success') }}
    </div>
@endif

<div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(340px, 1fr)); gap:20px;">
    @forelse($news as $item)
        <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:24px; box-shadow:0 2px 12px rgba(0,0,0,0.04);">

            {{-- Título --}}
            <h3 style="font-family:'Playfair Display',serif; font-size:1.05rem; font-weight:700; color:var(--text-primary); margin:0 0 10px;">{{ $item->title }}</h3>

            {{-- Contenido truncado --}}
            <p style="font-size:0.84rem; color:var(--text-secondary); margin:0 0 16px; line-height:1.6;">
                {{ Str::limit($item->content, 120) }}
            </p>

            {{-- Ciclos vinculados --}}
            <div style="display:flex; flex-wrap:wrap; gap:6px; margin-bottom:16px;">
                @foreach($item->cycles as $cycle)
                    <span style="padding:3px 10px; border-radius:20px; background:#EDE9FE; color:#5B21B6; font-size:0.72rem; font-weight:500;">
                        {{ $cycle->name }} — {{ $cycle->institution->name }}
                    </span>
                @endforeach
            </div>

            {{-- Fecha y acciones --}}
            <div style="display:flex; align-items:center; justify-content:space-between;">
                <span style="font-size:0.75rem; color:var(--text-muted);">{{ $item->created_at->format('d/m/Y') }}</span>
                <div style="display:flex; gap:8px;">
                    <a href="{{ route('news.show', $item) }}" style="padding:6px 12px; border-radius:8px; background:#DBEAFE; color:#1D4ED8; font-size:0.75rem; font-weight:500; text-decoration:none;">Ver</a>
                    <a href="{{ route('news.edit', $item) }}" style="padding:6px 12px; border-radius:8px; background:#FEF3C7; color:#B45309; font-size:0.75rem; font-weight:500; text-decoration:none;">Editar</a>
                    <form action="{{ route('news.destroy', $item) }}" method="POST" onsubmit="return confirm('¿Seguro que querés eliminar esta noticia?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="padding:6px 12px; border-radius:8px; background:#FEE2E2; color:#B91C1C; font-size:0.75rem; font-weight:500; border:none; cursor:pointer;">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div style="grid-column:1/-1; background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:48px; text-align:center; color:var(--text-muted); font-size:0.88rem;">
            No hay noticias publicadas.
            <a href="{{ route('news.create') }}" style="color:var(--accent); font-weight:500;">Crear la primera →</a>
        </div>
    @endforelse
</div>

@endsection
