@extends('layouts.app')

@section('title', 'Comunicados')

@section('content')

    <div class="page-heading">
        <h1><span class="title-bar"></span> Comunicados</h1>
        <p>Avisos y anuncios internos para todas las socias.</p>
    </div>

    <div class="comm-toolbar">
        <button class="btn-add"><i class="bi bi-megaphone-fill"></i> Nuevo comunicado</button>
    </div>

    <div class="comm-list">
        @php
            $comunicados = [
                ['titulo' => 'Convocatoria a Asamblea General', 'autor' => 'Junta Directiva', 'fecha' => '12 Jul 2026', 'texto' => 'Se convoca a todas las socias a la asamblea general ordinaria el próximo 20 de julio a las 4:00 p.m. en el local comunal.', 'tag' => 'Importante', 'tagColor' => 'red'],
                ['titulo' => 'Feria de Puno — inscripciones abiertas', 'autor' => 'Ventas y Marketing', 'fecha' => '08 Jul 2026', 'texto' => 'Ya están abiertas las inscripciones para participar con stand propio en la feria regional de Puno del mes de agosto.', 'tag' => 'Ferias', 'tagColor' => 'amber'],
                ['titulo' => 'Nuevo lote de lana de alpaca disponible', 'autor' => 'Diseño y Producción', 'fecha' => '05 Jul 2026', 'texto' => 'Se recibió un nuevo lote de 40 kg de lana de alpaca baby. Las artesanas interesadas pueden pasar por el almacén A.', 'tag' => 'Producción', 'tagColor' => 'green'],
                ['titulo' => 'Taller de teñido natural', 'autor' => 'Capacitaciones', 'fecha' => '01 Jul 2026', 'texto' => 'Este sábado se dictará un taller práctico de teñido con cochinilla y añil para todas las socias que deseen participar.', 'tag' => 'Capacitación', 'tagColor' => 'blue'],
            ];
        @endphp

        @foreach ($comunicados as $c)
            <div class="comm-card glass">
                <div class="comm-icon"><i class="bi bi-envelope-paper-fill"></i></div>
                <div class="comm-body">
                    <div class="comm-top">
                        <h3>{{ $c['titulo'] }}</h3>
                        <span class="comm-tag tag-{{ $c['tagColor'] }}">{{ $c['tag'] }}</span>
                    </div>
                    <span class="comm-meta">{{ $c['autor'] }} &middot; {{ $c['fecha'] }}</span>
                    <p>{{ $c['texto'] }}</p>
                </div>
            </div>
        @endforeach
    </div>


@endsection

@push('styles')
<style>
    .page-heading h1 {
        display: flex;
        align-items: center;
        gap: .7rem;
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        color: var(--maroon-dark);
        font-size: 1.55rem;
        margin: 0;
    }

    .title-bar {
        width: 5px;
        height: 26px;
        background: var(--maroon);
        border-radius: 3px;
        display: inline-block;
    }

    .page-heading p {
        color: rgba(74, 34, 51, 0.6);
        font-size: .82rem;
        margin: .3rem 0 0 1.2rem;
    }

    .comm-toolbar {
        margin: 1.6rem 0 1.2rem;
        display: flex;
        justify-content: flex-end;
    }

    .btn-add {
        border: none;
        background: var(--maroon);
        color: #fff;
        font-size: .74rem;
        font-weight: 800;
        padding: .55rem 1.1rem;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        gap: .35rem;
    }

    .btn-add:hover {
        background: var(--maroon-dark);
    }

    .comm-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .comm-card {
        border-radius: 16px;
        padding: 1.2rem 1.4rem;
        display: flex;
        gap: 1rem;
    }

    .comm-icon {
        width: 42px;
        height: 42px;
        min-width: 42px;
        border-radius: 12px;
        background: var(--cream-deep);
        color: var(--maroon);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
    }

    .comm-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: .8rem;
        flex-wrap: wrap;
    }

    .comm-body h3 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: .95rem;
        color: var(--maroon-dark);
        margin: 0;
    }

    .comm-tag {
        font-size: .62rem;
        font-weight: 800;
        padding: .22rem .55rem;
        border-radius: 20px;
        white-space: nowrap;
    }

    .tag-red {
        background: rgba(179, 39, 61, 0.08);
        color: #B3273D;
    }

    .tag-amber {
        background: rgba(199, 149, 47, 0.14);
        color: #A5771E;
    }

    .tag-green {
        background: rgba(46, 125, 79, 0.1);
        color: #2E7D4F;
    }

    .tag-blue {
        background: rgba(30, 100, 150, 0.1);
        color: #1E6496;
    }

    .comm-meta {
        display: block;
        font-size: .68rem;
        color: rgba(74, 34, 51, 0.5);
        font-weight: 700;
        margin: .25rem 0 .55rem;
    }

    .comm-body p {
        font-size: .8rem;
        color: rgba(74, 34, 51, 0.75);
        margin: 0;
        line-height: 1.55;
    }
</style>
@endpush    