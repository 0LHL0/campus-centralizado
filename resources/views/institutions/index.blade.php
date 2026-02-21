@extends('layouts.app')

@section('title', 'Instituciones')
@section('page-title', 'Instituciones')

@section('content')

{{-- Encabezado con botón de acción --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
    <div>
        {{-- Título de la sección --}}
        <h2 style="font-family:'Fraunces',serif; font-size:1.4rem; font-weight:700; color:var(--text-primary); margin:0;">
            Listado de Instituciones
        </h2>
        {{-- Subtítulo dinámico que muestra cuántas instituciones hay --}}
        <p style="font-size:0.82rem; color:var(--text-secondary); margin:4px 0 0;">
            {{ $institutions->count() }} institución(es) registrada(s)
        </p>
    </div>

    {{-- Botón para ir al formulario de crear nueva institución --}}
    <a href="{{ route('institutions.create') }}"
       style="display:flex; align-items:center; gap:8px; background:var(--accent); color:#fff; padding:10px 20px; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600; transition:opacity 0.15s;"
       onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
        <span style="font-size:1rem;">➕</span> Nueva Institución
    </a>
</div>

{{-- Mensaje de éxito — aparece solo cuando se crea, edita o elimina una institución --}}
@if(session('success'))
    <div style="background:#D1FAE5; border:1px solid #6EE7B7; color:#065F46; padding:12px 18px; border-radius:10px; margin-bottom:20px; font-size:0.85rem;">
        ✅ {{ session('success') }}
    </div>
@endif

{{-- Tabla de instituciones --}}
<div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; overflow:hidden;">
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:var(--surface); border-bottom:1px solid #E8EDF5;">
                {{-- Encabezados de columna --}}
                <th style="padding:14px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">#</th>
                <th style="padding:14px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Nombre</th>
                <th style="padding:14px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Email</th>
                <th style="padding:14px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Teléfono</th>
                <th style="padding:14px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Dirección</th>
                <th style="padding:14px 20px; text-align:center; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Acciones</th>
            </tr>
        </thead>
        <tbody>

            {{-- Si no hay instituciones mostramos un mensaje --}}
            @forelse($institutions as $institution)
                <tr style="border-bottom:1px solid #F1F5F9; transition:background 0.15s;"
                    onmouseover="this.style.background='#FAFBFD'" onmouseout="this.style.background='transparent'">

                    {{-- ID de la institución --}}
                    <td style="padding:14px 20px; font-size:0.82rem; color:var(--text-muted);">
                        {{ $institution->id }}
                    </td>

                    {{-- Nombre con ícono de institución --}}
                    <td style="padding:14px 20px;">
                        <div style="display:flex; align-items:center; gap:10px;">
                            <div style="width:34px; height:34px; border-radius:10px; background:#EDE9FE; display:flex; align-items:center; justify-content:center; font-size:0.9rem; flex-shrink:0;">🏫</div>
                            <span style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">{{ $institution->name }}</span>
                        </div>
                    </td>

                    {{-- Email --}}
                    <td style="padding:14px 20px; font-size:0.82rem; color:var(--text-secondary);">
                        {{ $institution->email }}
                    </td>

                    {{-- Teléfono --}}
                    <td style="padding:14px 20px; font-size:0.82rem; color:var(--text-secondary);">
                        {{ $institution->phone }}
                    </td>

                    {{-- Dirección, si está vacía muestra un guión --}}
                    <td style="padding:14px 20px; font-size:0.82rem; color:var(--text-secondary);">
                        {{ $institution->address ?? '—' }}
                    </td>

                    {{-- Botones de acción: ver, editar, eliminar --}}
                    <td style="padding:14px 20px; text-align:center;">
                        <div style="display:flex; align-items:center; justify-content:center; gap:8px;">

                            {{-- Ver detalle --}}
                            <a href="{{ route('institutions.show', $institution) }}"
                               style="padding:6px 12px; border-radius:8px; background:#DBEAFE; color:#1D4ED8; font-size:0.75rem; font-weight:500; text-decoration:none; transition:opacity 0.15s;"
                               onmouseover="this.style.opacity='0.75'" onmouseout="this.style.opacity='1'">
                               Ver
                            </a>

                            {{-- Editar --}}
                            <a href="{{ route('institutions.edit', $institution) }}"
                               style="padding:6px 12px; border-radius:8px; background:#FEF3C7; color:#B45309; font-size:0.75rem; font-weight:500; text-decoration:none; transition:opacity 0.15s;"
                               onmouseover="this.style.opacity='0.75'" onmouseout="this.style.opacity='1'">
                               Editar
                            </a>

                            {{-- Eliminar — usa un formulario con DELETE porque HTML solo soporta GET y POST --}}
                            <form action="{{ route('institutions.destroy', $institution) }}" method="POST"
                                  onsubmit="return confirm('¿Seguro que querés eliminar esta institución?')">
                                @csrf      {{-- Token de seguridad obligatorio en Laravel para formularios --}}
                                @method('DELETE') {{-- Le dice a Laravel que es una petición DELETE --}}
                                <button type="submit"
                                        style="padding:6px 12px; border-radius:8px; background:#FEE2E2; color:#B91C1C; font-size:0.75rem; font-weight:500; border:none; cursor:pointer; transition:opacity 0.15s;"
                                        onmouseover="this.style.opacity='0.75'" onmouseout="this.style.opacity='1'">
                                    Eliminar
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>

            {{-- Si no hay ninguna institución registrada --}}
            @empty
                <tr>
                    <td colspan="6" style="padding:48px; text-align:center; color:var(--text-muted); font-size:0.88rem;">
                        No hay instituciones registradas todavía.
                        <a href="{{ route('institutions.create') }}" style="color:var(--accent); font-weight:500;">Crear la primera →</a>
                    </td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>

@endsection