@extends('layouts.app')
@section('title', 'Ciclos')
@section('page-title', 'Ciclos')
@section('content')

{{-- Encabezado con botón de crear --}}
<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:24px;">
    <div>
        <h2 style="font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:700; color:var(--text-primary); margin:0;">Listado de Ciclos</h2>
        {{-- count() muestra cuántos ciclos hay en total --}}
        <p style="font-size:0.82rem; color:var(--text-secondary); margin:4px 0 0;">{{ $cycles->count() }} ciclo(s) registrado(s)</p>
    </div>
    <a href="{{ route('cycles.create') }}" style="display:flex; align-items:center; gap:8px; background:var(--accent); color:#fff; padding:10px 20px; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600;">
        <span>➕</span> Nuevo Ciclo
    </a>
</div>

{{-- Mensaje de éxito después de crear, editar o eliminar --}}
@if(session('success'))
    <div style="background:#D1FAE5; border:1px solid #6EE7B7; color:#065F46; padding:12px 18px; border-radius:10px; margin-bottom:20px; font-size:0.85rem;">
        ✅ {{ session('success') }}
    </div>
@endif

{{-- Tabla de ciclos --}}
<div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; overflow:hidden;">
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="background:var(--surface); border-bottom:1px solid #E8EDF5;">
                <th style="padding:14px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">#</th>
                <th style="padding:14px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Nombre</th>
                {{-- Institución a la que pertenece el ciclo --}}
                <th style="padding:14px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Institución</th>
                <th style="padding:14px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Registrado</th>
                <th style="padding:14px 20px; text-align:center; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cycles as $cycle)
                <tr style="border-bottom:1px solid #F1F5F9;" onmouseover="this.style.background='#FAFBFD'" onmouseout="this.style.background='transparent'">
                    <td style="padding:14px 20px; font-size:0.82rem; color:var(--text-muted);">{{ $cycle->id }}</td>
                    <td style="padding:14px 20px;">
                        <div style="display:flex; align-items:center; gap:10px;">
                            <div style="width:34px; height:34px; border-radius:10px; background:#D1FAE5; display:flex; align-items:center; justify-content:center; font-size:0.9rem; flex-shrink:0;">📋</div>
                            <span style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">{{ $cycle->name }}</span>
                        </div>
                    </td>
                    {{-- $cycle->institution->name accede a la institución relacionada --}}
                    <td style="padding:14px 20px; font-size:0.82rem; color:var(--text-secondary);">{{ $cycle->institution->name }}</td>
                    <td style="padding:14px 20px; font-size:0.82rem; color:var(--text-secondary);">{{ $cycle->created_at->format('d/m/Y') }}</td>
                    <td style="padding:14px 20px; text-align:center;">
                        <div style="display:flex; align-items:center; justify-content:center; gap:8px;">
                            <a href="{{ route('cycles.show', $cycle) }}" style="padding:6px 12px; border-radius:8px; background:#DBEAFE; color:#1D4ED8; font-size:0.75rem; font-weight:500; text-decoration:none;">Ver</a>
                            <a href="{{ route('cycles.edit', $cycle) }}" style="padding:6px 12px; border-radius:8px; background:#FEF3C7; color:#B45309; font-size:0.75rem; font-weight:500; text-decoration:none;">Editar</a>
                            <form action="{{ route('cycles.destroy', $cycle) }}" method="POST" onsubmit="return confirm('¿Seguro que querés eliminar este ciclo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding:6px 12px; border-radius:8px; background:#FEE2E2; color:#B91C1C; font-size:0.75rem; font-weight:500; border:none; cursor:pointer;">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="padding:48px; text-align:center; color:var(--text-muted); font-size:0.88rem;">
                        No hay ciclos registrados.
                        <a href="{{ route('cycles.create') }}" style="color:var(--accent); font-weight:500;">Crear el primero →</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
