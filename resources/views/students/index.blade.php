@extends('layouts.app')
@section('title', 'Estudiantes')
@section('page-title', 'Estudiantes')
@section('content')

<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
    <div>
        <h2 style="font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:700; color:var(--text-primary); margin:0;">Listado de Estudiantes</h2>
        <p style="font-size:0.82rem; color:var(--text-secondary); margin:4px 0 0;">{{ $students->count() }} estudiante(s) registrado(s)</p>
    </div>
    <a href="{{ route('students.create') }}" style="display:flex; align-items:center; gap:8px; background:var(--accent); color:#fff; padding:10px 20px; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600;">
        <span>➕</span> Nuevo Estudiante
    </a>
</div>

@if(session('success'))
    <div style="background:#D1FAE5; border:1px solid #6EE7B7; color:#065F46; padding:12px 18px; border-radius:10px; margin-bottom:20px; font-size:0.85rem;">
        ✅ {{ session('success') }}
    </div>
@endif

<div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; overflow:hidden;">
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:var(--surface); border-bottom:1px solid #E8EDF5;">
                <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">#</th>
                <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Nombre</th>
                <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Apellido</th>
                <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Salón</th>
                <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Sección</th>
                <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Ciclo</th>
                <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Institución</th>
                <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Nacimiento</th>
                <th style="padding:12px 20px; text-align:center; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr style="border-bottom:1px solid #F1F5F9;" onmouseover="this.style.background='#FAFBFD'" onmouseout="this.style.background='transparent'">
                    <td style="padding:12px 20px; font-size:0.82rem; color:var(--text-muted);">{{ $student->id }}</td>
                    <td style="padding:12px 20px;">
                        <div style="display:flex; align-items:center; gap:10px;">
                            <div style="width:32px; height:32px; border-radius:50%; background:linear-gradient(135deg, #667eea, #764ba2); display:flex; align-items:center; justify-content:center; font-size:0.72rem; font-weight:700; color:#fff; flex-shrink:0;">
                                {{ strtoupper(substr($student->name, 0, 1)) }}{{ strtoupper(substr($student->last_name, 0, 1)) }}
                            </div>
                            <span style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">{{ $student->name }}</span>
                        </div>
                    </td>
                    <td style="padding:12px 20px; font-size:0.88rem; color:var(--text-primary);">{{ $student->last_name }}</td>
                    {{-- Nombre del salón --}}
                    <td style="padding:12px 20px; font-size:0.82rem; color:var(--text-secondary);">{{ $student->classroom->name }}</td>
                    {{-- Sección del salón --}}
                    <td style="padding:12px 20px; font-size:0.82rem; color:var(--text-secondary);">{{ $student->classroom->section }}</td>
                    {{-- Ciclo del salón --}}
                    <td style="padding:12px 20px; font-size:0.82rem; color:var(--text-secondary);">{{ $student->classroom->cycle->name }}</td>
                    {{-- Institución del ciclo --}}
                    <td style="padding:12px 20px; font-size:0.82rem; color:var(--text-secondary);">{{ $student->classroom->cycle->institution->name }}</td>
                    <td style="padding:12px 20px; font-size:0.82rem; color:var(--text-secondary);">{{ $student->birthday ? \Carbon\Carbon::parse($student->birthday)->format('d/m/Y') : '—' }}</td>
                    <td style="padding:12px 20px; text-align:center;">
                        <div style="display:flex; align-items:center; justify-content:center; gap:8px;">
                            <a href="{{ route('students.show', $student) }}" style="padding:6px 12px; border-radius:8px; background:#DBEAFE; color:#1D4ED8; font-size:0.75rem; font-weight:500; text-decoration:none;">Ver</a>
                            <a href="{{ route('students.edit', $student) }}" style="padding:6px 12px; border-radius:8px; background:#FEF3C7; color:#B45309; font-size:0.75rem; font-weight:500; text-decoration:none;">Editar</a>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" onsubmit="return confirm('¿Seguro que querés eliminar este estudiante?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding:6px 12px; border-radius:8px; background:#FEE2E2; color:#B91C1C; font-size:0.75rem; font-weight:500; border:none; cursor:pointer;">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="padding:48px; text-align:center; color:var(--text-muted); font-size:0.88rem;">
                        No hay estudiantes registrados.
                        <a href="{{ route('students.create') }}" style="color:var(--accent); font-weight:500;">Registrar el primero →</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
