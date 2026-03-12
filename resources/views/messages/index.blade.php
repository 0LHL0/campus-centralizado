@extends('layouts.app')
@section('title', 'Mensajes')
@section('page-title', 'Mensajes')
@section('content')

<div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:28px;">
    <div>
        <h2 style="font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:700; color:var(--text-primary); margin:0;">Mensajes</h2>
        <p style="font-size:0.82rem; color:var(--text-secondary); margin:4px 0 0;">{{ $messages->count() }} mensaje(s)</p>
    </div>
    <a href="{{ route('messages.create') }}" style="display:flex; align-items:center; gap:8px; background:var(--accent); color:#fff; padding:10px 20px; border-radius:10px; text-decoration:none; font-size:0.85rem; font-weight:600;">
        <span>✉️</span> Nuevo Mensaje
    </a>
</div>

@if(session('success'))
    <div style="background:#D1FAE5; border:1px solid #6EE7B7; color:#065F46; padding:12px 18px; border-radius:10px; margin-bottom:20px; font-size:0.85rem;">
        ✅ {{ session('success') }}
    </div>
@endif

<div style="display:flex; flex-direction:column; gap:12px;">
    @forelse($messages as $message)
        <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:20px 24px; display:flex; align-items:center; justify-content:space-between; box-shadow:0 2px 8px rgba(0,0,0,0.03);">
            <div style="display:flex; align-items:center; gap:16px;">
                <div style="width:40px; height:40px; border-radius:12px; background:#DBEAFE; display:flex; align-items:center; justify-content:center; font-size:1.1rem; flex-shrink:0;">✉️</div>
                <div>
                    <div style="font-size:0.92rem; font-weight:600; color:var(--text-primary);">{{ $message->title }}</div>
                    <div style="font-size:0.78rem; color:var(--text-muted); margin-top:2px;">
                        {{ Str::limit($message->content, 80) }} · {{ $message->sent_at ? \Carbon\Carbon::parse($message->sent_at)->format('d/m/Y H:i') : '—' }}
                    </div>
                </div>
            </div>
            <div style="display:flex; gap:8px; flex-shrink:0;">
                <a href="{{ route('messages.show', $message) }}" style="padding:6px 12px; border-radius:8px; background:#DBEAFE; color:#1D4ED8; font-size:0.75rem; font-weight:500; text-decoration:none;">Ver</a>
                <a href="{{ route('messages.edit', $message) }}" style="padding:6px 12px; border-radius:8px; background:#FEF3C7; color:#B45309; font-size:0.75rem; font-weight:500; text-decoration:none;">Editar</a>
                <form action="{{ route('messages.destroy', $message) }}" method="POST" onsubmit="return confirm('¿Seguro que querés eliminar este mensaje?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding:6px 12px; border-radius:8px; background:#FEE2E2; color:#B91C1C; font-size:0.75rem; font-weight:500; border:none; cursor:pointer;">Eliminar</button>
                </form>
            </div>
        </div>
    @empty
        <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:48px; text-align:center; color:var(--text-muted); font-size:0.88rem;">
            No hay mensajes registrados.
            <a href="{{ route('messages.create') }}" style="color:var(--accent); font-weight:500;">Enviar el primero →</a>
        </div>
    @endforelse
</div>

@endsection
