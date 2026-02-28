
@extends('layouts.app')

@section('title', 'Ciclos')

@section('page-title', 'Ciclos')

@section('content')



{{-- Encabezado --}}

<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">

    <div>

        <h2 style="font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:700; color:var(--text-primary); margin:0;">Ciclos por Institución</h2>

        <p style="font-size:0.82rem; color:var(--text-secondary); margin:4px 0 0;">{{ $institutions->count() }} institución(es) registrada(s)</p>

    </div>

    <a href="{{ route('cycles.create') }}" style="display:flex; align-items:center; gap:8px; background:var(--accent); color:#fff; padding:10px 20px; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600;">

        <span>➕</span> Nuevo Ciclo

    </a>

</div>



@if(session('success'))

    <div style="background:#D1FAE5; border:1px solid #6EE7B7; color:#065F46; padding:12px 18px; border-radius:10px; margin-bottom:20px; font-size:0.85rem;">

        ✅ {{ session('success') }}

    </div>

@endif



{{-- Iteramos cada institución --}}

@forelse($institutions as $institution)

    <div style="margin-bottom:28px;">



        {{-- Encabezado de la institución --}}

        <div style="display:flex; align-items:center; gap:10px; margin-bottom:14px;">

            <div style="width:34px; height:34px; border-radius:10px; background:#EDE9FE; display:flex; align-items:center; justify-content:center; font-size:1rem; flex-shrink:0;">🏫</div>

            <div>

                <h3 style="font-family:'Playfair Display',serif; font-size:1rem; font-weight:700; color:var(--text-primary); margin:0;">{{ $institution->name }}</h3>

                <span style="font-size:0.75rem; color:var(--text-muted);">{{ $institution->cycles->count() }} ciclo(s)</span>

            </div>

            {{-- Línea separadora --}}

            <div style="flex:1; height:1px; background:#E8EDF5; margin-left:8px;"></div>

        </div>



        {{-- Ciclos de esta institución --}}

        @if($institution->cycles->isEmpty())

            <div style="background:var(--card); border-radius:12px; border:1px solid #E8EDF5; padding:18px 22px; color:var(--text-muted); font-size:0.85rem;">

                Sin ciclos registrados para esta institución.

            </div>

        @else

            <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; overflow:hidden;">

                <table style="width:100%; border-collapse:collapse;">

                    <thead>

                        <tr style="background:var(--surface); border-bottom:1px solid #E8EDF5;">

                            <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">#</th>

                            <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Nombre</th>

                            <th style="padding:12px 20px; text-align:left; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Registrado</th>

                            <th style="padding:12px 20px; text-align:center; font-size:0.72rem; font-weight:600; color:var(--text-muted); letter-spacing:0.08em; text-transform:uppercase;">Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($institution->cycles as $cycle)

                            <tr style="border-bottom:1px solid #F1F5F9;" onmouseover="this.style.background='#FAFBFD'" onmouseout="this.style.background='transparent'">

                                <td style="padding:12px 20px; font-size:0.82rem; color:var(--text-muted);">{{ $cycle->id }}</td>

                                <td style="padding:12px 20px;">

                                    <div style="display:flex; align-items:center; gap:10px;">

                                        <div style="width:30px; height:30px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:0.85rem;

                                            {{ stripos($cycle->name, 'kinder') !== false ? 'background:#FCE7F3;' : '' }}

                                            {{ stripos($cycle->name, 'primaria') !== false ? 'background:#DBEAFE;' : '' }}

                                            {{ stripos($cycle->name, 'secundaria') !== false ? 'background:#D1FAE5;' : '' }}

                                            {{ stripos($cycle->name, 'kinder') === false && stripos($cycle->name, 'primaria') === false && stripos($cycle->name, 'secundaria') === false ? 'background:#EDE9FE;' : '' }}

                                        ">

                                            {{ stripos($cycle->name, 'kinder') !== false ? '🧒' : '' }}

                                            {{ stripos($cycle->name, 'primaria') !== false ? '📘' : '' }}

                                            {{ stripos($cycle->name, 'secundaria') !== false ? '🎓' : '' }}

                                            {{ stripos($cycle->name, 'kinder') === false && stripos($cycle->name, 'primaria') === false && stripos($cycle->name, 'secundaria') === false ? '📋' : '' }}

                                        </div>

                                        <span style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">{{ $cycle->name }}</span>

                                    </div>

                                </td>

                                <td style="padding:12px 20px; font-size:0.82rem; color:var(--text-secondary);">{{ $cycle->created_at->format('d/m/Y') }}</td>

                                <td style="padding:12px 20px; text-align:center;">

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

                        @endforeach

                    </tbody>

                </table>

            </div>

        @endif

    </div>



@empty

    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:48px; text-align:center; color:var(--text-muted); font-size:0.88rem;">

        No hay instituciones registradas.

        <a href="{{ route('institutions.create') }}" style="color:var(--accent); font-weight:500;">Crear la primera →</a>

    </div>

@endforelse



@endsection

