@extends('layouts.app')
@section('title', 'Nuevo Mensaje')
@section('page-title', 'Nuevo Mensaje')
@section('content')

<div style="display:flex; align-items:center; gap:12px; margin-bottom:32px;">
    <a href="{{ route('messages.index') }}" style="width:34px; height:34px; border-radius:9px; background:var(--card); border:1px solid #E2E8F0; display:flex; align-items:center; justify-content:center; color:var(--text-secondary); text-decoration:none; flex-shrink:0;">←</a>
    <div>
        <h2 style="font-family:'Playfair Display',serif; font-size:1.3rem; font-weight:700; color:var(--text-primary); margin:0;">Nuevo Mensaje</h2>
        <p style="font-size:0.8rem; color:var(--text-secondary); margin:3px 0 0;">Redactá y enviá un mensaje</p>
    </div>
</div>

<div style="display:flex; justify-content:center;">
    <div style="width:100%; max-width:680px;">
        <div style="background:var(--card); border-radius:20px; border:1px solid #E8EDF5; padding:36px; box-shadow:0 4px 24px rgba(0,0,0,0.05);">

            @if($errors->any())
                <div style="background:#FEE2E2; border:1px solid #FCA5A5; color:#B91C1C; padding:12px 18px; border-radius:10px; margin-bottom:24px; font-size:0.85rem;">
                    <strong>Corregí los siguientes errores:</strong>
                    <ul style="margin:6px 0 0; padding-left:18px;">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('messages.store') }}" method="POST">
                @csrf

                <div style="margin-bottom:16px;">
                    <label style="display:block; font-size:0.8rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">Asunto <span style="color:red;">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" placeholder="Ej: Reunión de padres de familia"
                           style="width:100%; padding:10px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.85rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none;"
                           onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='#E2E8F0'">
                </div>

                <div style="margin-bottom:28px;">
                    <label style="display:block; font-size:0.8rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">Mensaje <span style="color:red;">*</span></label>
                    <textarea name="content" rows="6" placeholder="Escribí el contenido del mensaje..."
                              style="width:100%; padding:10px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.85rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none; resize:vertical;"
                              onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='#E2E8F0'">{{ old('content') }}</textarea>
                </div>

                <div style="display:flex; gap:12px;">
                    <button type="submit" style="padding:11px 28px; background:var(--accent); color:#fff; border:none; border-radius:10px; font-size:0.88rem; font-weight:600; cursor:pointer; font-family:'Plus Jakarta Sans',sans-serif;">✉️ Enviar mensaje</button>
                    <a href="{{ route('messages.index') }}" style="padding:11px 28px; background:var(--surface); color:var(--text-secondary); border:1px solid #E2E8F0; border-radius:10px; font-size:0.88rem; font-weight:500; text-decoration:none;">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
