@extends('layouts.app')
@section('title', 'Detalle de Estudiante')
@section('page-title', 'Detalle de Estudiante')
@section('content')

<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:32px;">
    <div style="display:flex; align-items:center; gap:12px;">
        <a href="{{ route('students.index') }}" style="width:34px; height:34px; border-radius:9px; background:var(--card); border:1px solid #E2E8F0; display:flex; align-items:center; justify-content:center; color:var(--text-secondary); text-decoration:none; flex-shrink:0;">←</a>
        <div>
            <h2 style="font-family:'Playfair Display',serif; font-size:1.3rem; font-weight:700; color:var(--text-primary); margin:0;">{{ $student->name }} {{ $student->last_name }}</h2>
            <p style="font-size:0.8rem; color:var(--text-secondary); margin:3px 0 0;">Detalle del estudiante</p>
        </div>
    </div>
    <a href="{{ route('students.edit', $student) }}" style="padding:9px 20px; background:var(--accent); color:#fff; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600;">✏️ Editar</a>
</div>

<div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; max-width:900px;">

    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:28px;">
        <div style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:600; color:var(--text-primary); margin-bottom:20px; padding-bottom:12px; border-bottom:1px solid #F1F5F9;">
            Información personal
        </div>

        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Nombre completo</div>
            <div style="font-size:0.92rem; color:var(--text-primary); font-weight:500;">{{ $student->name }} {{ $student->last_name }}</div>
        </div>

        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Fecha de nacimiento</div>
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ $student->birthday ? \Carbon\Carbon::parse($student->birthday)->format('d/m/Y') : '—' }}</div>
        </div>

        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Registrado el</div>
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ $student->created_at->format('d/m/Y') }}</div>
        </div>
    </div>

    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:28px;">
        <div style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:600; color:var(--text-primary); margin-bottom:20px; padding-bottom:12px; border-bottom:1px solid #F1F5F9;">
            Información académica
        </div>

        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Salón</div>
            <div style="font-size:0.92rem; color:var(--text-primary); font-weight:500;">{{ $student->classroom->name }}</div>
        </div>

        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Ciclo</div>
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ $student->classroom->cycle->name }}</div>
        </div>

        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Institución</div>
            <div style="font-size:0.92rem; color:var(--accent); font-weight:500;">{{ $student->classroom->cycle->institution->name }}</div>
        </div>
    </div>
</div>

@endsection
