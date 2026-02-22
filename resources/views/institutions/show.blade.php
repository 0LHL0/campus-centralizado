@extends('layouts.app')
@section('title', 'Detalle de Institución')
@section('page-title', 'Detalle de Institución')
@section('content')

{{-- Encabezado arriba a la izquierda --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:32px;">
    <div style="display:flex; align-items:center; gap:12px;">
        <a href="{{ route('institutions.index') }}" style="width:34px; height:34px; border-radius:9px; background:var(--card); border:1px solid #E2E8F0; display:flex; align-items:center; justify-content:center; color:var(--text-secondary); text-decoration:none; flex-shrink:0;">←</a>
        <div>
            <h2 style="font-family:'Playfair Display',serif; font-size:1.3rem; font-weight:700; color:var(--text-primary); margin:0;">{{ $institution->name }}</h2>
            <p style="font-size:0.8rem; color:var(--text-secondary); margin:3px 0 0;">Detalle de la institución</p>
        </div>
    </div>
    {{-- Botón de editar desde la vista de detalle --}}
    <a href="{{ route('institutions.edit', $institution) }}" style="padding:9px 20px; background:var(--accent); color:#fff; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600;">✏️ Editar</a>
</div>

{{-- Grid principal --}}
<div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; max-width:900px;">

    {{-- Card de datos principales --}}
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:28px;">
        <div style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:600; color:var(--text-primary); margin-bottom:20px; padding-bottom:12px; border-bottom:1px solid #F1F5F9;">
            Información general
        </div>

        {{-- Nombre --}}
        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Nombre</div>
            <div style="font-size:0.92rem; color:var(--text-primary); font-weight:500;">{{ $institution->name }}</div>
        </div>

        {{-- Email --}}
        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Correo electrónico</div>
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ $institution->email }}</div>
        </div>

        {{-- Teléfono --}}
        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Teléfono</div>
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ $institution->phone }}</div>
        </div>

        {{-- Dirección --}}
        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Dirección</div>
            {{-- Si no hay dirección muestra un guión --}}
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ $institution->address ?? '—' }}</div>
        </div>

        {{-- Fecha de registro --}}
        <div>
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Registrada el</div>
            {{-- format() convierte la fecha a un formato legible --}}
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ $institution->created_at->format('d/m/Y') }}</div>
        </div>
    </div>

    {{-- Card de estadísticas --}}
    <div style="display:flex; flex-direction:column; gap:16px;">

        {{-- Ciclos --}}
        <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; border-radius:14px; background:#EDE9FE; display:flex; align-items:center; justify-content:center; font-size:1.3rem; flex-shrink:0;">📋</div>
            <div>
                {{-- count() cuenta cuántos ciclos tiene esta institución --}}
                <div style="font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; color:var(--text-primary); line-height:1;">{{ $institution->cycles->count() }}</div>
                <div style="font-size:0.8rem; color:var(--text-secondary); margin-top:2px;">Ciclos registrados</div>
            </div>
        </div>

        {{-- Usuarios --}}
        <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; border-radius:14px; background:#DBEAFE; display:flex; align-items:center; justify-content:center; font-size:1.3rem; flex-shrink:0;">👥</div>
            <div>
                {{-- count() cuenta cuántos usuarios pertenecen a esta institución --}}
                <div style="font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; color:var(--text-primary); line-height:1;">{{ $institution->users->count() }}</div>
                <div style="font-size:0.8rem; color:var(--text-secondary); margin-top:2px;">Usuarios registrados</div>
            </div>
        </div>

        {{-- Última actualización --}}
        <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:24px; display:flex; align-items:center; gap:16px;">
            <div style="width:48px; height:48px; border-radius:14px; background:#D1FAE5; display:flex; align-items:center; justify-content:center; font-size:1.3rem; flex-shrink:0;">🕐</div>
            <div>
                <div style="font-size:0.92rem; font-weight:600; color:var(--text-primary); line-height:1.3;">{{ $institution->updated_at->format('d/m/Y H:i') }}</div>
                <div style="font-size:0.8rem; color:var(--text-secondary); margin-top:2px;">Última actualización</div>
            </div>
        </div>

    </div>
</div>

@endsection