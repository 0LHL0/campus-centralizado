@extends('layouts.app')
@section('title', 'Inicio')
@section('page-title', 'Inicio')
@section('content')

{{-- Saludo --}}
<div style="margin-bottom:32px;">
    <h2 style="font-family:'Playfair Display',serif; font-size:1.6rem; font-weight:700; color:var(--text-primary); margin:0;">Bienvenido a EduCore 👋</h2>
    <p style="font-size:0.88rem; color:var(--text-secondary); margin:6px 0 0;">Resumen general de la plataforma</p>
</div>

{{-- Tarjetas de estadísticas --}}
<div style="display:grid; grid-template-columns:repeat(4,1fr); gap:20px; margin-bottom:36px;">

    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:24px; box-shadow:0 2px 12px rgba(0,0,0,0.04);">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:16px;">
            <span style="font-size:0.75rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em;">Instituciones</span>
            <div style="width:36px; height:36px; border-radius:10px; background:#EDE9FE; display:flex; align-items:center; justify-content:center; font-size:1.1rem;">🏫</div>
        </div>
        <div style="font-family:'Playfair Display',serif; font-size:2.2rem; font-weight:700; color:var(--text-primary); line-height:1;">{{ $totalInstitutions }}</div>
        <a href="{{ route('institutions.index') }}" style="font-size:0.78rem; color:var(--accent); text-decoration:none; margin-top:8px; display:inline-block;">Ver todas →</a>
    </div>

    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:24px; box-shadow:0 2px 12px rgba(0,0,0,0.04);">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:16px;">
            <span style="font-size:0.75rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em;">Ciclos</span>
            <div style="width:36px; height:36px; border-radius:10px; background:#DBEAFE; display:flex; align-items:center; justify-content:center; font-size:1.1rem;">📋</div>
        </div>
        <div style="font-family:'Playfair Display',serif; font-size:2.2rem; font-weight:700; color:var(--text-primary); line-height:1;">{{ $totalCycles }}</div>
        <a href="{{ route('cycles.index') }}" style="font-size:0.78rem; color:var(--accent); text-decoration:none; margin-top:8px; display:inline-block;">Ver todos →</a>
    </div>

    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:24px; box-shadow:0 2px 12px rgba(0,0,0,0.04);">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:16px;">
            <span style="font-size:0.75rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em;">Salones</span>
            <div style="width:36px; height:36px; border-radius:10px; background:#FEF3C7; display:flex; align-items:center; justify-content:center; font-size:1.1rem;">🏛️</div>
        </div>
        <div style="font-family:'Playfair Display',serif; font-size:2.2rem; font-weight:700; color:var(--text-primary); line-height:1;">{{ $totalClassrooms }}</div>
        <a href="{{ route('classrooms.index') }}" style="font-size:0.78rem; color:var(--accent); text-decoration:none; margin-top:8px; display:inline-block;">Ver todos →</a>
    </div>

    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:24px; box-shadow:0 2px 12px rgba(0,0,0,0.04);">
        <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:16px;">
            <span style="font-size:0.75rem; font-weight:600; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em;">Estudiantes</span>
            <div style="width:36px; height:36px; border-radius:10px; background:#D1FAE5; display:flex; align-items:center; justify-content:center; font-size:1.1rem;">🎓</div>
        </div>
        <div style="font-family:'Playfair Display',serif; font-size:2.2rem; font-weight:700; color:var(--text-primary); line-height:1;">{{ $totalStudents }}</div>
        <a href="{{ route('students.index') }}" style="font-size:0.78rem; color:var(--accent); text-decoration:none; margin-top:8px; display:inline-block;">Ver todos →</a>
    </div>

</div>

{{-- Últimos estudiantes registrados --}}
<div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; overflow:hidden;">
    <div style="padding:20px 24px; border-bottom:1px solid #F1F5F9; display:flex; align-items:center; justify-content:space-between;">
        <h3 style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:700; color:var(--text-primary); margin:0;">Últimos estudiantes registrados</h3>
        <a href="{{ route('students.index') }}" style="font-size:0.8rem; color:var(--accent); text-decoration:none; font-weight:500;">Ver todos →</a>
    </div>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:var(--surface); border-bottom:1px solid #E8EDF5;">
                <th style="padding:12px 24px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Estudiante</th>
                <th style="padding:12px 24px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Salón</th>
                <th style="padding:12px 24px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Ciclo</th>
                <th style="padding:12px 24px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Institución</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentStudents as $student)
                <tr style="border-bottom:1px solid #F1F5F9;" onmouseover="this.style.background='#FAFBFD'" onmouseout="this.style.background='transparent'">
                    <td style="padding:12px 24px;">
                        <div style="display:flex; align-items:center; gap:10px;">
                            <div style="width:32px; height:32px; border-radius:50%; background:linear-gradient(135deg, #667eea, #764ba2); display:flex; align-items:center; justify-content:center; font-size:0.72rem; font-weight:700; color:#fff; flex-shrink:0;">
                                {{ strtoupper(substr($student->name, 0, 1)) }}{{ strtoupper(substr($student->last_name, 0, 1)) }}
                            </div>
                            <span style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">{{ $student->name }} {{ $student->last_name }}</span>
                        </div>
                    </td>
                    <td style="padding:12px 24px; font-size:0.82rem; color:var(--text-secondary);">{{ $student->classroom->name }}</td>
                    <td style="padding:12px 24px; font-size:0.82rem; color:var(--text-secondary);">{{ $student->classroom->cycle->name }}</td>
                    <td style="padding:12px 24px; font-size:0.82rem; color:var(--text-secondary);">{{ $student->classroom->cycle->institution->name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="padding:36px; text-align:center; color:var(--text-muted); font-size:0.88rem;">
                        No hay estudiantes registrados aún.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
