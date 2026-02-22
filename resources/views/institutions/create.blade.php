@extends('layouts.app')

@section('title', 'Nueva Institución')
@section('page-title', 'Nueva Institución')

@section('content')

{{-- Encabezado con botón de regreso --}}
<div style="display:flex; align-items:center; gap:12px; margin-bottom:28px;">
    <a href="{{ route('institutions.index') }}"
       style="width:36px; height:36px; border-radius:10px; background:var(--card); border:1px solid #E2E8F0; display:flex; align-items:center; justify-content:center; color:var(--text-secondary); text-decoration:none; transition:all 0.15s;"
       onmouseover="this.style.borderColor='var(--accent)';this.style.color='var(--accent)'"
       onmouseout="this.style.borderColor='#E2E8F0';this.style.color='var(--text-secondary)'">
        ←
    </a>
    <div>
        <h2 style="font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:700; color:var(--text-primary); margin:0;">
            Nueva Institución
        </h2>
        <p style="font-size:0.82rem; color:var(--text-secondary); margin:4px 0 0;">
            Completá los datos para registrar una nueva institución
        </p>
    </div>
</div>

{{-- Formulario --}}
<div style="max-width:680px;">
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:32px;">

        {{-- Errores de validación --}}
        @if($errors->any())
            <div style="background:#FEE2E2; border:1px solid #FCA5A5; color:#B91C1C; padding:12px 18px; border-radius:10px; margin-bottom:24px; font-size:0.85rem;">
                <strong>Corregí los siguientes errores:</strong>
                <ul style="margin:6px 0 0; padding-left:18px;">
                    @foreach($errors->all() as $error)
                        {{-- Muestra cada error de validación --}}
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- action apunta a institutions.store que es el método store() del controlador --}}
        {{-- method POST porque estamos enviando datos nuevos --}}
        <form action="{{ route('institutions.store') }}" method="POST">
            @csrf {{-- Token obligatorio de seguridad en todo formulario Laravel --}}

            {{-- Campo Nombre --}}
            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:0.82rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">
                    Nombre de la institución <span style="color:var(--danger);">*</span>
                </label>
                <input type="text" name="name" value="{{ old('name') }}"
                       placeholder="Ej: Colegio San José"
                       style="width:100%; padding:10px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.88rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none; transition:border-color 0.18s;"
                       onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='#E2E8F0'">
                {{-- old('name') recupera el valor si el formulario falló, para no perder lo escrito --}}
            </div>

            {{-- Campo Email --}}
            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:0.82rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">
                    Correo electrónico <span style="color:var(--danger);">*</span>
                </label>
                <input type="email" name="email" value="{{ old('email') }}"
                       placeholder="Ej: info@colegio.edu"
                       style="width:100%; padding:10px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.88rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none; transition:border-color 0.18s;"
                       onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='#E2E8F0'">
            </div>

            {{-- Campo Teléfono --}}
            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:0.82rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">
                    Teléfono <span style="color:var(--danger);">*</span>
                </label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                       placeholder="Ej: +506 2222-3333"
                       style="width:100%; padding:10px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.88rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none; transition:border-color 0.18s;"
                       onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='#E2E8F0'">
            </div>

            {{-- Campo Dirección (opcional) --}}
            <div style="margin-bottom:28px;">
                <label style="display:block; font-size:0.82rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">
                    Dirección <span style="color:var(--text-muted); font-weight:400;">(opcional)</span>
                </label>
                <input type="text" name="address" value="{{ old('address') }}"
                       placeholder="Ej: 200m norte del parque central"
                       style="width:100%; padding:10px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.88rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none; transition:border-color 0.18s;"
                       onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='#E2E8F0'">
            </div>

            {{-- Botones --}}
            <div style="display:flex; gap:12px;">
                {{-- Botón guardar — envía el formulario --}}
                <button type="submit"
                        style="padding:10px 24px; background:var(--accent); color:#fff; border:none; border-radius:10px; font-size:0.88rem; font-weight:600; cursor:pointer; font-family:'Plus Jakarta Sans',sans-serif; transition:opacity 0.15s;"
                        onmouseover="this.style.opacity='0.85'" onmouseout="this.style.opacity='1'">
                    Guardar institución
                </button>

                {{-- Botón cancelar — regresa al listado sin guardar --}}
                <a href="{{ route('institutions.index') }}"
                   style="padding:10px 24px; background:var(--surface); color:var(--text-secondary); border:1px solid #E2E8F0; border-radius:10px; font-size:0.88rem; font-weight:500; text-decoration:none; transition:all 0.15s;"
                   onmouseover="this.style.borderColor='var(--accent)'" onmouseout="this.style.borderColor='#E2E8F0'">
                    Cancelar
                </a>
            </div>

        </form>
    </div>
</div>

@endsection