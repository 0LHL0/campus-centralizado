@extends('layouts.app')
@section('title', 'Detalle de Ciclo')
@section('page-title', 'Detalle de Ciclo')
@section('content')

{{-- Encabezado arriba a la izquierda --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:32px;">
    <div style="display:flex; align-items:center; gap:12px;">
        <a href="{{ route('cycles.index') }}" style="width:34px; height:34px; border-radius:9px; background:var(--card); border:1px solid #E2E8F0; display:flex; align-items:center; justify-content:center; color:var(--text-secondary); text-decoration:none; flex-shrink:0;">←</a>
        <div>
            <h2 style="font-family:'Playfair Display',serif; font-size:1.3rem; font-weight:700; color:var(--text-primary); margin:0;">{{ $cycle->name }}</h2>
            <p style="font-size:0.8rem; color:var(--text-secondary); margin:3px 0 0;">Detalle del ciclo</p>
        </div>
    </div>
    {{-- Botón de editar desde la vista de detalle --}}
    <a href="{{ route('cycles.edit', $cycle) }}" style="padding:9px 20px; background:var(--accent); color:#fff; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600;">✏️ Editar</a>
</div>

{{-- Grid de información --}}
<div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; max-width:900px;">

    {{-- Card de datos principales --}}
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:28px;">
        <div style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:600; color:var(--text-primary); margin-bottom:20px; padding-bottom:12px; border-bottom:1px solid #F1F5F9;">
            Información general
        </div>

        {{-- Nombre --}}
        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Nombre</div>
            <div style="font-size:0.92rem; color:var(--text-primary); font-weight:500;">{{ $cycle->name }}</div>
        </div>

        {{-- Institución a la que pertenece --}}
        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Institución</div>
            {{-- Accedemos a la institución relacionada a través de la relación belongsTo --}}
            <a href="{{ route('institutions.show', $cycle->institution) }}" style="font-size:0.92rem; color:var(--accent); font-weight:500; text-decoration:none;">{{ $cycle->institution->name }}</a>
        </div>

        {{-- Fecha de registro --}}
        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Registrado el</div>
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ $cycle->created_at->format('d/m/Y') }}</div>
        </div>

        {{-- Última actualización --}}
        <div>
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Última actualización</div>
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ $cycle->updated_at->format('d/m/Y H:i') }}</div>
        </div>
    </div>

    {{-- Card de estadísticas --}}
    <div style="display:flex; flex-direction:column; gap:16px;">

        {{-- Salones --}}
        <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; border-radius:14px; background:#D1FAE5; display:flex; align-items:center; justify-content:center; font-size:1.3rem; flex-shrink:0;">🏫</div>
            <div>
                {{-- count() cuenta cuántos salones tiene este ciclo --}}
                <div style="font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; color:var(--text-primary); line-height:1;">{{ $cycle->classroom->count() }}</div>
                <div style="font-size:0.8rem; color:var(--text-secondary); margin-top:2px;">Salones registrados</div>
            </div>
        </div>

        {{-- Noticias asociadas --}}
        <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; border-radius:14px; background:#EDE9FE; display:flex; align-items:center; justify-content:center; font-size:1.3rem; flex-shrink:0;">📰</div>
            <div>
                {{-- count() cuenta cuántas noticias están asociadas a este ciclo --}}
                <div style="font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; color:var(--text-primary); line-height:1;">{{ $cycle->news->count() }}</div>
                <div style="font-size:0.8rem; color:var(--text-secondary); margin-top:2px;">Noticias asociadas</div>
            </div>
        </div>

    </div>
</div>

@endsection
