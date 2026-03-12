<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduCore — Iniciar Sesión</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="min-height:100vh; background:var(--surface); display:flex; align-items:center; justify-content:center; font-family:'Plus Jakarta Sans',sans-serif;">

<div style="width:100%; max-width:420px; padding:24px;">

    {{-- Logo --}}
    <div style="text-align:center; margin-bottom:36px;">
        <div style="width:52px; height:52px; border-radius:16px; background:var(--accent); display:flex; align-items:center; justify-content:center; margin:0 auto 14px; font-size:1.5rem;">🎓</div>
        <h1 style="font-family:'Playfair Display',serif; font-size:1.6rem; font-weight:700; color:var(--text-primary); margin:0;">EduCore</h1>
        <p style="font-size:0.82rem; color:var(--text-secondary); margin:6px 0 0;">Plataforma académica centralizada</p>
    </div>

    {{-- Card --}}
    <div style="background:var(--card); border-radius:20px; border:1px solid #E8EDF5; padding:36px; box-shadow:0 8px 32px rgba(0,0,0,0.08);">

        <h2 style="font-family:'Playfair Display',serif; font-size:1.2rem; font-weight:700; color:var(--text-primary); margin:0 0 24px;">Iniciar Sesión</h2>

        @if($errors->any())
            <div style="background:#FEE2E2; border:1px solid #FCA5A5; color:#B91C1C; padding:12px 16px; border-radius:10px; margin-bottom:20px; font-size:0.83rem;">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div style="background:#D1FAE5; border:1px solid #6EE7B7; color:#065F46; padding:12px 16px; border-radius:10px; margin-bottom:20px; font-size:0.83rem;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div style="margin-bottom:16px;">
                <label style="display:block; font-size:0.8rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="correo@ejemplo.com"
                       style="width:100%; padding:11px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.85rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none;"
                       onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='#E2E8F0'">
            </div>

            <div style="margin-bottom:20px;">
                <label style="display:block; font-size:0.8rem; font-weight:600; color:var(--text-primary); margin-bottom:6px;">Contraseña</label>
                <input type="password" name="password" placeholder="••••••••"
                       style="width:100%; padding:11px 14px; border-radius:10px; border:1px solid #E2E8F0; font-size:0.85rem; font-family:'Plus Jakarta Sans',sans-serif; color:var(--text-primary); outline:none;"
                       onfocus="this.style.borderColor='var(--accent)'" onblur="this.style.borderColor='#E2E8F0'">
            </div>

            <div style="display:flex; align-items:center; gap:8px; margin-bottom:24px;">
                <input type="checkbox" name="remember" id="remember" style="width:15px; height:15px; accent-color:var(--accent);">
                <label for="remember" style="font-size:0.82rem; color:var(--text-secondary); cursor:pointer;">Recordarme</label>
            </div>

            <button type="submit" style="width:100%; padding:12px; background:var(--accent); color:#fff; border:none; border-radius:10px; font-size:0.9rem; font-weight:600; cursor:pointer; font-family:'Plus Jakarta Sans',sans-serif;">
                Iniciar Sesión
            </button>
        </form>

        {{-- Credenciales de prueba --}}
        <div style="margin-top:24px; padding:14px; background:var(--surface); border-radius:10px; font-size:0.78rem; color:var(--text-muted);">
            <strong style="color:var(--text-secondary);">Credenciales de prueba:</strong><br>
            Admin: admin@educore.com / password<br>
            Profesor: profesor@educore.com / password<br>
            Padre: padre@educore.com / password
        </div>
    </div>
</div>

</body>
</html>
