@extends('layouts.app')

@section('title', 'Archivos')

@section('content')

    <div class="page-heading">
        <h1><span class="title-bar"></span> Archivos</h1>
        <p>Actas, contratos y documentos oficiales de la asociación.</p>
    </div>

    <div class="files-toolbar glass">
        <div class="header-search catalog-search">
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Buscar archivo...">
        </div>
        <select class="filter-select">
            <option>Todas las carpetas</option>
            <option>Actas</option>
            <option>Contratos</option>
            <option>Reportes</option>
        </select>
        <button class="btn-add"><i class="bi bi-upload"></i> Subir archivo</button>
    </div>

    <div class="files-grid">
        @php
            $archivos = [
                ['nombre' => 'Acta N° 014 — Asamblea General', 'tipo' => 'pdf', 'tamano' => '1.2 MB', 'fecha' => '10 Jul 2026'],
                ['nombre' => 'Contrato — Feria de Puno 2026', 'tipo' => 'pdf', 'tamano' => '640 KB', 'fecha' => '05 Jul 2026'],
                ['nombre' => 'Padrón de socias actualizado', 'tipo' => 'xlsx', 'tamano' => '310 KB', 'fecha' => '01 Jul 2026'],
                ['nombre' => 'Reporte financiero — Junio 2026', 'tipo' => 'xlsx', 'tamano' => '480 KB', 'fecha' => '28 Jun 2026'],
                ['nombre' => 'Acta N° 013 — Junta Directiva', 'tipo' => 'pdf', 'tamano' => '980 KB', 'fecha' => '15 Jun 2026'],
                ['nombre' => 'Catálogo de diseños 2026', 'tipo' => 'docx', 'tamano' => '2.1 MB', 'fecha' => '02 Jun 2026'],
            ];

            $iconos = ['pdf' => 'bi-filetype-pdf', 'xlsx' => 'bi-filetype-xlsx', 'docx' => 'bi-filetype-docx'];
            $colores = ['pdf' => '#B3273D', 'xlsx' => '#2E7D4F', 'docx' => '#1E6496'];
        @endphp

        @foreach ($archivos as $f)
            <div class="file-card glass">
                <div class="file-icon" style="color: {{ $colores[$f['tipo']] }};">
                    <i class="bi {{ $iconos[$f['tipo']] }}"></i>
                </div>
                <div class="file-body">
                    <h3>{{ $f['nombre'] }}</h3>
                    <span class="file-meta">{{ strtoupper($f['tipo']) }} &middot; {{ $f['tamano'] }} &middot; {{ $f['fecha'] }}</span>
                </div>
                <a href="#" class="file-download" title="Descargar"><i class="bi bi-download"></i></a>
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

    .files-toolbar {
        margin-top: 1.6rem;
        margin-bottom: 1.4rem;
        border-radius: 16px;
        padding: .9rem 1.1rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: .7rem;
    }

    .catalog-search {
        max-width: 260px;
        flex: 1;
    }

    .catalog-search input {
        background: var(--cream-deep);
    }

    .filter-select {
        border: 1px solid rgba(110, 30, 54, 0.18);
        border-radius: 10px;
        padding: .5rem .7rem;
        font-size: .74rem;
        font-weight: 700;
        color: var(--ink);
        background: #fff;
    }

    .btn-add {
        margin-left: auto;
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
        white-space: nowrap;
    }

    .btn-add:hover {
        background: var(--maroon-dark);
    }

    .files-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .file-card {
        border-radius: 14px;
        padding: 1rem 1.2rem;
        display: flex;
        align-items: center;
        gap: .9rem;
    }

    .file-icon {
        font-size: 1.7rem;
        width: 42px;
        text-align: center;
    }

    .file-body {
        flex: 1;
        min-width: 0;
    }

    .file-body h3 {
        font-size: .82rem;
        font-weight: 800;
        color: var(--ink);
        margin: 0 0 .2rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .file-meta {
        font-size: .68rem;
        color: rgba(74, 34, 51, 0.55);
        font-weight: 700;
    }

    .file-download {
        width: 34px;
        height: 34px;
        min-width: 34px;
        border-radius: 50%;
        background: var(--cream-deep);
        color: var(--maroon);
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
    }

    .file-download:hover {
        background: var(--maroon);
        color: #fff;
    }

    @media (max-width: 768px) {
        .files-grid {
            grid-template-columns: 1fr;
        }

        .btn-add {
            margin-left: 0;
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush