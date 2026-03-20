@extends('layouts.app')
@section('title', 'Configuración')
@section('page-title', 'Configuración')
@section('content')

<div style="margin-bottom:32px;">
    <h2 style="font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:700; color:var(--text-primary); margin:0;">Configuración del Sistema</h2>
    <p style="font-size:0.82rem; color:var(--text-secondary); margin:4px 0 0;">Información general de la plataforma</p>
</div>

<div style="display:grid; grid-template-columns:repeat(2,1fr); gap:20px; max-width:900px;">

    {{-- Info del sistema --}}
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:28px;">
        <div style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:600; color:var(--text-primary); margin-bottom:20px; padding-bottom:12px; border-bottom:1px solid #F1F5F9;">
            🛠️ Información del sistema
        </div>

        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Plataforma</div>
            <div style="font-size:0.92rem; color:var(--text-primary); font-weight:500;">EduCore v1.0</div>
        </div>

        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Framework</div>
            <div style="font-size:0.92rem; color:var(--text-primary);">Laravel {{ app()->version() }}</div>
        </div>

        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">PHP</div>
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ phpversion() }}</div>
        </div>

        <div style="margin-bottom:16px;">
            <div style="font-size:0.72rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:4px;">Entorno</div>
            <div style="font-size:0.92rem; color:var(--text-primary);">{{ config('app.env') }}</div>
        </div>
    </div>

    {{-- Roles del sistema --}}
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:28px;">
        <div style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:600; color:var(--text-primary); margin-bottom:20px; padding-bottom:12px; border-bottom:1px solid #F1F5F9;">
            👥 Roles del sistema
        </div>

        <div style="display:flex; flex-direction:column; gap:12px;">
            <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 16px; background:var(--surface); border-radius:10px;">
                <span style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">Admin</span>
                <span style="font-size:0.75rem; color:#5B21B6; background:#EDE9FE; padding:3px 10px; border-radius:20px;">Acceso total</span>
            </div>
            <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 16px; background:var(--surface); border-radius:10px;">
                <span style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">Profesor</span>
                <span style="font-size:0.75rem; color:#1D4ED8; background:#DBEAFE; padding:3px 10px; border-radius:20px;">Gestión académica</span>
            </div>
            <div style="display:flex; align-items:center; justify-content:space-between; padding:12px 16px; background:var(--surface); border-radius:10px;">
                <span style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">Padre</span>
                <span style="font-size:0.75rem; color:#065F46; background:#D1FAE5; padding:3px 10px; border-radius:20px;">Solo mensajes</span>
            </div>
        </div>
    </div>

    {{-- Módulos disponibles --}}
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:28px; grid-column:span 2;">
        <div style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:600; color:var(--text-primary); margin-bottom:20px; padding-bottom:12px; border-bottom:1px solid #F1F5F9;">
            📦 Módulos disponibles
        </div>

        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:12px;">
            @foreach([
                ['icon' => '🏫', 'name' => 'Instituciones', 'color' => '#EDE9FE'],
                ['icon' => '📋', 'name' => 'Ciclos',        'color' => '#DBEAFE'],
                ['icon' => '🏛️', 'name' => 'Salones',       'color' => '#FEF3C7'],
                ['icon' => '🎓', 'name' => 'Estudiantes',   'color' => '#D1FAE5'],
                ['icon' => '📰', 'name' => 'Noticias',      'color' => '#FCE7F3'],
                ['icon' => '✉️', 'name' => 'Mensajes',      'color' => '#E0F2FE'],
            ] as $module)
                <div style="display:flex; align-items:center; gap:12px; padding:14px 16px; background:{{ $module['color'] }}; border-radius:12px;">
                    <span style="font-size:1.2rem;">{{ $module['icon'] }}</span>
                    <span style="font-size:0.85rem; font-weight:500; color:var(--text-primary);">{{ $module['name'] }}</span>
                </div>
            @endforeach
        </div>
    </div>

</div>

@endsection
