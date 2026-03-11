@extends('layouts.app')
@section('title', 'Salones')
@section('page-title', 'Salones')
@section('content')

<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
    <div>
        <h2 style="font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:700; color:var(--text-primary); margin:0;">Salones por Institución</h2>
        <p style="font-size:0.82rem; color:var(--text-secondary); margin:4px 0 0;">{{ $institutions->count() }} institución(es)</p>
    </div>
    <a href="{{ route('classrooms.create') }}" style="display:flex; align-items:center; gap:8px; background:var(--accent); color:#fff; padding:10px 20px; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600;">
        <span>➕</span> Nuevo Salón
    </a>
</div>

@if(session('success'))
    <div style="background:#D1FAE5; border:1px solid #6EE7B7; color:#065F46; padding:12px 18px; border-radius:10px; margin-bottom:20px; font-size:0.85rem;">
        ✅ {{ session('success') }}
    </div>
@endif

@forelse($institutions as $institution)
    <div style="margin-bottom:32px;">
        <div style="display:flex; align-items:center; gap:10px; margin-bottom:16px;">
            <div style="width:34px; height:34px; border-radius:10px; background:#EDE9FE; display:flex; align-items:center; justify-content:center; font-size:1rem; flex-shrink:0;">🏫</div>
            <h3 style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:700; color:var(--text-primary); margin:0;">{{ $institution->name }}</h3>
            <div style="flex:1; height:1px; background:#E8EDF5; margin-left:8px;"></div>
        </div>

        @foreach($institution->cycles as $cycle)
            <div style="margin-bottom:20px; margin-left:16px;">
                <div style="display:flex; align-items:center; gap:8px; margin-bottom:12px;">
                    <span style="font-size:0.85rem; font-weight:600; color:var(--text-secondary);">{{ $cycle->name }}</span>
                    <span style="font-size:0.72rem; color:var(--text-muted);">· {{ $cycle->classrooms->count() }} salón(es)</span>
                </div>

                @if($cycle->classrooms->isEmpty())
                    <div style="background:var(--card); border-radius:12px; border:1px solid #E8EDF5; padding:16px 20px; color:var(--text-muted); font-size:0.85rem; margin-left:16px;">
                        Sin salones registrados.
                    </div>
                @else
                    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; overflow:hidden; margin-left:16px;">
                        <table style="width:100%; border-collapse:collapse;">
                            <thead>
                                <tr style="background:var(--surface); border-bottom:1px solid #E8EDF5;">
                                    <th style="padding:11px 18px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Nombre</th>
                                    <th style="padding:11px 18px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Grado</th>
                                    <th style="padding:11px 18px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Sección</th>
                                    <th style="padding:11px 18px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Capacidad</th>
                                    <th style="padding:11px 18px; text-align:center; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cycle->classrooms as $classroom)
                                    <tr style="border-bottom:1px solid #F1F5F9;" onmouseover="this.style.background='#FAFBFD'" onmouseout="this.style.background='transparent'">
                                        <td style="padding:11px 18px;">
                                            <div style="display:flex; align-items:center; gap:8px;">
                                                <div style="width:28px; height:28px; border-radius:8px; background:#FEF3C7; display:flex; align-items:center; justify-content:center; font-size:0.8rem;">🏫</div>
                                                <span style="font-size:0.85rem; font-weight:500; color:var(--text-primary);">{{ $classroom->name }}</span>
                                            </div>
                                        </td>
                                        <td style="padding:11px 18px; font-size:0.82rem; color:var(--text-secondary);">{{ $classroom->grade }}</td>
                                        <td style="padding:11px 18px; font-size:0.82rem; color:var(--text-secondary);">{{ $classroom->section }}</td>
                                        <td style="padding:11px 18px; font-size:0.82rem; color:var(--text-secondary);">{{ $classroom->capacity ?? '—' }}</td>
                                        <td style="padding:11px 18px; text-align:center;">
                                            <div style="display:flex; align-items:center; justify-content:center; gap:8px;">
                                                <a href="{{ route('classrooms.show', $classroom) }}" style="padding:5px 11px; border-radius:8px; background:#DBEAFE; color:#1D4ED8; font-size:0.75rem; font-weight:500; text-decoration:none;">Ver</a>
                                                <a href="{{ route('classrooms.edit', $classroom) }}" style="padding:5px 11px; border-radius:8px; background:#FEF3C7; color:#B45309; font-size:0.75rem; font-weight:500; text-decoration:none;">Editar</a>
                                                <form action="{{ route('classrooms.destroy', $classroom) }}" method="POST" onsubmit="return confirm('¿Seguro que querés eliminar este salón?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="padding:5px 11px; border-radius:8px; background:#FEE2E2; color:#B91C1C; font-size:0.75rem; font-weight:500; border:none; cursor:pointer;">Eliminar</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
@empty
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:48px; text-align:center; color:var(--text-muted); font-size:0.88rem;">
        No hay instituciones registradas.
        <a href="{{ route('institutions.create') }}" style="color:var(--accent); font-weight:500;">Crear la primera →</a>
    </div>
@endforelse

@endsection
