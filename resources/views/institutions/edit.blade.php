@extends('layouts.app')
@section('title', 'Editar Institución')
@section('page-title', 'Editar Institución')
@section('content')

{{-- Encabezado fijo arriba a la izquierda --}}
<div style="display:flex; align-items:center; gap:12px; margin-bottom:32px;">
    <a href="{{ route('institutions.index') }}" style="width:34px; height:34px; border-radius:9px; background:var(--card); border:1px solid #E2E8F0; display:flex; align-items:center; justify-content:center; color:var(--text-secondary); text-decoration:none; flex-shrink:0;">←</a>
    <div>
        <h2 style="font-family:'Playfair Display',serif; font-size:1.3rem; font-weight:700; color:var(--text-primary); margin:0;">Editar Institución</h2>
        <p style="font-size:0.8rem; color:var(--text-secondary); margin:3px 0 0;">Editando: <strong style="color:var(--accent);">{{ $institution->name }}</strong></p>
    </div>
</div>

{{-- Formulario centrado --}}
<div style="display:flex; justify-content:center;">
    <div style="width:100%; max-width:620px;">
        <div style="background:var(--card); border-radius:20px; border:1px solid #E8EDF5; padding:36px; box-shadow:0 4px 24px rgba(0,0,0,0.05);">
            @if($errors->any())
                <div style="background:#FEE2E2; border:1px solid #FCA5A5; color:#B91C1C; padding:12px 18px; border-radius:10px; margin-bottom:24px; font-size:0.85rem;">
                    <strong>Corregí los siguientes errores:</strong>
                    <ul style="margin:6px 0 0; padding-left:18px;">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('institutions.update', $institution) }}" method="POST">
                @csrf
                @method('PUT')
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:16px;">
                    <div>
                        <label style="display:block; font-size:0.8rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">Nombre <span style="color:var(--danger);">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $institution->name) }}" style="width:100%; padding:10px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.85rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none;">
                    </div>
                    <div>
                        <label style="display:block; font-size:0.8rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">Correo electrónico <span style="color:var(--danger);">*</span></label>
                        <input type="email" name="email" value="{{ old('email', $institution->email) }}" style="width:100%; padding:10px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.85rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none;">
                    </div>
                </div>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:28px;">
                    <div>
                        <label style="display:block; font-size:0.8rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">Teléfono <span style="color:var(--danger);">*</span></label>
                        <input type="text" name="phone" value="{{ old('phone', $institution->phone) }}" style="width:100%; padding:10px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.85rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none;">
                    </div>
                    <div>
                        <label style="display:block; font-size:0.8rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">Dirección <span style="color:var(--text-muted); font-weight:400;">(opcional)</span></label>
                        <input type="text" name="address" value="{{ old('address', $institution->address) }}" style="width:100%; padding:10px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.85rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none;">
                    </div>
                </div>
                <div style="display:flex; gap:12px;">
                    <button type="submit" style="padding:11px 28px; background:var(--accent); color:#fff; border:none; border-radius:10px; font-size:0.88rem; font-weight:600; cursor:pointer; font-family:'Plus Jakarta Sans',sans-serif;">Guardar cambios</button>
                    <a href="{{ route('institutions.index') }}" style="padding:11px 28px; background:var(--surface); color:var(--text-secondary); border:1px solid #E2E8F0; border-radius:10px; font-size:0.88rem; font-weight:500; text-decoration:none;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
