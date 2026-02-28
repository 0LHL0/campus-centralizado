
@extends('layouts.app')

@section('title', 'Inicio')

@section('page-title', 'Inicio')

@section('content')



{{-- Título principal --}}

<div style="margin-bottom:32px;">

    <h2 style="font-family:'Playfair Display',serif; font-size:1.6rem; font-weight:700; color:var(--text-primary); margin:0;">Panel de Inicio</h2>

    <p style="font-size:0.85rem; color:var(--text-secondary); margin:6px 0 0;">Noticias y comunicados clasificados por nivel educativo</p>

</div>



{{-- Si no hay ciclos registrados --}}

@if($cycles->isEmpty())

    <div style="background:var(--card); border-radius:16px; border:1px solid #E8EDF5; padding:48px; text-align:center; color:var(--text-muted); font-size:0.9rem;">

        No hay ciclos ni noticias registradas todavía.

    </div>

@else

    {{-- Iteramos cada ciclo y mostramos sus noticias --}}

    @foreach($cycles as $cycle)

        <div style="margin-bottom:36px;">



            {{-- Encabezado del ciclo --}}

            <div style="display:flex; align-items:center; gap:10px; margin-bottom:16px;">

                {{-- Ícono según el nombre del ciclo --}}

                <div style="width:36px; height:36px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:1.1rem;

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

                <div>

                    {{-- Nombre del ciclo como título de sección --}}

                    <h3 style="font-family:'Playfair Display',serif; font-size:1.1rem; font-weight:700; color:var(--text-primary); margin:0;">{{ $cycle->name }}</h3>

                    <span style="font-size:0.75rem; color:var(--text-muted);">{{ $cycle->news->count() }} noticia(s)</span>

                </div>

                <div style="flex:1; height:1px; background:#E8EDF5; margin-left:8px;"></div>

            </div>



            {{-- Noticias del ciclo --}}

            @if($cycle->news->isEmpty())

                <div style="background:var(--card); border-radius:12px; border:1px solid #E8EDF5; padding:20px 24px; color:var(--text-muted); font-size:0.85rem;">

                    Sin noticias publicadas para este ciclo.

                </div>

            @else

                <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:14px;">

                    @foreach($cycle->news as $news)

                        {{-- Card de noticia --}}

                        <div style="background:var(--card); border-radius:14px; border:1px solid #E8EDF5; padding:20px 22px; transition:box-shadow 0.2s, transform 0.2s; cursor:pointer;"

                             onmouseover="this.style.boxShadow='0 6px 20px rgba(0,0,0,0.07)';this.style.transform='translateY(-2px)'"

                             onmouseout="this.style.boxShadow='none';this.style.transform='translateY(0)'">



                            {{-- Título de la noticia --}}

                            <div style="font-size:0.92rem; font-weight:600; color:var(--text-primary); margin-bottom:8px; line-height:1.4;">

                                {{ $news->title }}

                            </div>



                            {{-- Contenido o descripción --}}

                            @if(isset($news->content))

                                <div style="font-size:0.8rem; color:var(--text-secondary); line-height:1.5; margin-bottom:12px;">

                                    {{-- Muestra solo los primeros 100 caracteres --}}

                                    {{ Str::limit($news->content, 100) }}

                                </div>

                            @endif



                            {{-- Fecha de publicación --}}

                            <div style="font-size:0.72rem; color:var(--text-muted);">

                                📅 {{ $news->created_at->format('d/m/Y') }}

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    @endforeach

@endif



@endsection

