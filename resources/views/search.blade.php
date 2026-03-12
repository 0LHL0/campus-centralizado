@extends('layouts.app')
@section('title', 'Búsqueda')
@section('page-title', 'Búsqueda')
@section('content')

<div style="margin-bottom:28px;">
    <h2 style="font-family:'Playfair Display',serif; font-size:1.4rem; font-weight:700; color:var(--text-primary); margin:0;">Resultados para: <span style="color:var(--accent);">{{ $query }}</span></h2>
    <p style="font-size:0.82rem; color:var(--text-secondary); margin:4px 0 0;">
        {{ $students->count() + $news->count() + $institutions->count() + $classrooms->count() }} resultado(s) encontrado(s)
    </p>
</div>

{{-- Estudiantes --}}
@if($students->count())
<div style="margin-bottom:28px;">
    <h3 style="font-size:0.85rem; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:12px;">🎓 Estudiantes ({{ $students->count() }})</h3>
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; overflow:hidden;">
        @foreach($students as $student)
            <a href="{{ route('students.show', $student) }}" style="display:flex; align-items:center; gap:14px; padding:14px 20px; border-bottom:1px solid #F1F5F9; text-decoration:none;" onmouseover="this.style.background='#FAFBFD'" onmouseout="this.style.background='transparent'">
                <div style="width:34px; height:34px; border-radius:50%; background:linear-gradient(135deg,#667eea,#764ba2); display:flex; align-items:center; justify-content:center; font-size:0.75rem; font-weight:700; color:#fff; flex-shrink:0;">
                    {{ strtoupper(substr($student->name,0,1)) }}{{ strtoupper(substr($student->last_name,0,1)) }}
                </div>
                <div>
                    <div style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">{{ $student->name }} {{ $student->last_name }}</div>
                    <div style="font-size:0.75rem; color:var(--text-muted);">{{ $student->classroom->name }} · {{ $student->classroom->cycle->name }} · {{ $student->classroom->cycle->institution->name }}</div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endif

{{-- Noticias --}}
@if($news->count())
<div style="margin-bottom:28px;">
    <h3 style="font-size:0.85rem; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:12px;">📰 Noticias ({{ $news->count() }})</h3>
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; overflow:hidden;">
        @foreach($news as $item)
            <a href="{{ route('news.show', $item) }}" style="display:flex; align-items:center; gap:14px; padding:14px 20px; border-bottom:1px solid #F1F5F9; text-decoration:none;" onmouseover="this.style.background='#FAFBFD'" onmouseout="this.style.background='transparent'">
                <div style="width:34px; height:34px; border-radius:10px; background:#EDE9FE; display:flex; align-items:center; justify-content:center; font-size:1rem; flex-shrink:0;">📰</div>
                <div>
                    <div style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">{{ $item->title }}</div>
                    <div style="font-size:0.75rem; color:var(--text-muted);">{{ Str::limit($item->content, 80) }}</div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endif

{{-- Instituciones --}}
@if($institutions->count())
<div style="margin-bottom:28px;">
    <h3 style="font-size:0.85rem; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:12px;">🏫 Instituciones ({{ $institutions->count() }})</h3>
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; overflow:hidden;">
        @foreach($institutions as $institution)
            <a href="{{ route('institutions.show', $institution) }}" style="display:flex; align-items:center; gap:14px; padding:14px 20px; border-bottom:1px solid #F1F5F9; text-decoration:none;" onmouseover="this.style.background='#FAFBFD'" onmouseout="this.style.background='transparent'">
                <div style="width:34px; height:34px; border-radius:10px; background:#DBEAFE; display:flex; align-items:center; justify-content:center; font-size:1rem; flex-shrink:0;">🏫</div>
                <div style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">{{ $institution->name }}</div>
            </a>
        @endforeach
    </div>
</div>
@endif

{{-- Salones --}}
@if($classrooms->count())
<div style="margin-bottom:28px;">
    <h3 style="font-size:0.85rem; font-weight:700; color:var(--text-muted); text-transform:uppercase; letter-spacing:0.08em; margin-bottom:12px;">🏛️ Salones ({{ $classrooms->count() }})</h3>
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; overflow:hidden;">
        @foreach($classrooms as $classroom)
            <a href="{{ route('classrooms.show', $classroom) }}" style="display:flex; align-items:center; gap:14px; padding:14px 20px; border-bottom:1px solid #F1F5F9; text-decoration:none;" onmouseover="this.style.background='#FAFBFD'" onmouseout="this.style.background='transparent'">
                <div style="width:34px; height:34px; border-radius:10px; background:#FEF3C7; display:flex; align-items:center; justify-content:center; font-size:1rem; flex-shrink:0;">🏛️</div>
                <div>
                    <div style="font-size:0.88rem; font-weight:500; color:var(--text-primary);">{{ $classroom->name }}</div>
                    <div style="font-size:0.75rem; color:var(--text-muted);">{{ $classroom->cycle->name }} · {{ $classroom->cycle->institution->name }}</div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endif

{{-- Sin resultados --}}
@if($students->count() === 0 && $news->count() === 0 && $institutions->count() === 0 && $classrooms->count() === 0)
    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:48px; text-align:center; color:var(--text-muted); font-size:0.88rem;">
        No se encontraron resultados para <strong>{{ $query }}</strong>
    </div>
@endif

@endsection
