@extends('layouts.app')

@section('title', 'Módulos Administrativos')

@push('styles')
<style>
    .modules-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.4rem;
        margin-top: .85rem;
    }

    .module-card {
        border-radius: 16px;
        padding: 1.6rem 1.4rem 2.4rem;
        text-align: center;
    }

    .module-icon {
        width: 50px;
        height: 50px;
        border-radius: 13px;
        background: var(--cream-deep);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto .9rem;
        font-size: 1.25rem;
        color: var(--maroon);
    }

    .module-card h3 {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        color: var(--maroon-dark);
        font-size: .98rem;
        margin-bottom: .5rem;
    }

    .module-card p {
        color: var(--ink);
        opacity: .78;
        font-size: .76rem;
        line-height: 1.55;
        margin: 0;
    }

    /* Conector + bloque isométrico */
    .module-track {
        position: relative;
        margin-top: -1.3rem;
        display: flex;
        justify-content: center;
    }

    .module-track::before {
        content: "";
        position: absolute;
        top: 0;
        left: 50%;
        width: 2px;
        height: 28px;
        border-left: 2px dotted rgba(74, 34, 51, 0.35);
    }

    .module-pin {
        margin-top: 28px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.05rem;
        box-shadow: 0 5px 14px rgba(0, 0, 0, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.55);
        position: relative;
        z-index: 2;
    }

    .module-block {
        margin-top: -15px;
        height: 48px;
        width: 100%;
        border-radius: 9px;
        position: relative;
    }

    .module-block::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 9px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0));
    }

    /* Colores por módulo */
    .mod-directiva .module-pin,
    .mod-directiva .module-block {
        background: #1B5E7A;
    }

    .mod-produccion .module-pin,
    .mod-produccion .module-block {
        background: #4C8C3C;
    }

    .mod-ventas .module-pin,
    .mod-ventas .module-block {
        background: var(--gold);
    }

    @media (max-width: 991px) {
        .modules-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')

<div class="page-header" style="margin-bottom: 1.4rem;">
    <h1 style="font-family:'Playfair Display', serif; font-weight:800; color:var(--maroon-dark); font-size:1.5rem; border-left:4px solid var(--maroon); padding-left:.85rem; margin:0;">
        Módulos Administrativos
    </h1>
</div>

<div class="modules-grid">

    {{-- ÁREA DIRECTIVA --}}
    <div>
        <a href="{{ url('/junta') }}" class="text-decoration-none">
            <div class="module-card glass">
                <div class="module-icon"><i class="bi bi-folder-fill"></i></div>
                <h3>Área Directiva</h3>
                <p>Acceso directo al histórico de actas de asamblea, control de firmas de la junta, padrón oficializado
                    de socias y reportes de gestión interna.</p>
            </div>
        </a>
        <div class="module-track mod-directiva">
            <div class="module-pin"><i class="bi bi-search"></i></div>
        </div>
        <div class="module-block mod-directiva"></div>
    </div>

    {{-- DISEÑO Y PRODUCCIÓN --}}
    <div>
        <a href="{{ url('/produccion') }}" class="text-decoration-none">
            <div class="module-card glass">
                <div class="module-icon"><i class="bi bi-scissors"></i></div>
                <h3>Diseño y Producción</h3>
                <p>Monitoreo diario de avance en telares manuales, tradicionales, asignación de lanas de alpaca,
                    insumos de tintes y control de calidad final.</p>
            </div>
        </a>
        <div class="module-track mod-produccion">
            <div class="module-pin"><i class="bi bi-graph-up"></i></div>
        </div>
        <div class="module-block mod-produccion"></div>
    </div>

    {{-- VENTAS Y MARKETING --}}
    <div>
        <a href="{{ url('/productos') }}" class="text-decoration-none">
            <div class="module-card glass">
                <div class="module-icon"><i class="bi bi-bag-heart-fill"></i></div>
                <h3>Ventas y Marketing</h3>
                <p>Coordinación de ferias regionales, catálogo de diseños de ropa terminada de alpaca y oveja, y
                    estado del inventario físico interno.</p>
            </div>
        </a>
        <div class="module-track mod-ventas">
            <div class="module-pin"><i class="bi bi-laptop"></i></div>
        </div>
        <div class="module-block mod-ventas"></div>
    </div>

</div>

@endsection