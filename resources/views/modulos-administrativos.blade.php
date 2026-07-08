@extends('layouts.app')

@section('title', 'Módulos Administrativos')

@push('styles')
<style>
    .modules-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.75rem;
        margin-top: 1rem;
    }

    .module-card {
        border-radius: 22px;
        padding: 2rem 1.75rem 3rem;
        text-align: center;
    }

    .module-icon {
        width: 60px;
        height: 60px;
        border-radius: 16px;
        background: var(--cream-deep);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.1rem;
        font-size: 1.5rem;
        color: var(--maroon);
    }

    .module-card h3 {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        color: var(--maroon-dark);
        font-size: 1.15rem;
        margin-bottom: .65rem;
    }

    .module-card p {
        color: var(--ink);
        opacity: .8;
        font-size: .88rem;
        line-height: 1.6;
        margin: 0;
    }

    /* Conector + bloque isométrico */
    .module-track {
        position: relative;
        margin-top: -1.6rem;
        display: flex;
        justify-content: center;
    }

    .module-track::before {
        content: "";
        position: absolute;
        top: 0;
        left: 50%;
        width: 2px;
        height: 34px;
        border-left: 2px dotted rgba(74, 34, 51, 0.4);
    }

    .module-pin {
        margin-top: 34px;
        width: 46px;
        height: 46px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.25rem;
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.25);
        border: 2px solid rgba(255, 255, 255, 0.6);
        position: relative;
        z-index: 2;
    }

    .module-block {
        margin-top: -18px;
        height: 60px;
        width: 100%;
        border-radius: 10px;
        position: relative;
    }

    .module-block::after {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 10px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0));
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

<div class="page-header" style="margin-bottom: 1.75rem;">
    <h1 style="font-family:'Playfair Display', serif; font-weight:800; color:var(--maroon-dark); font-size:1.9rem; border-left:5px solid var(--maroon); padding-left:1rem; margin:0;">
        Módulos Administrativos
    </h1>
</div>

<div class="modules-grid">

    {{-- ÁREA DIRECTIVA --}}
    <div>
        <a href="{{ url('/area-directiva') }}" class="text-decoration-none">
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
        <a href="{{ url('/control-diseno-produccion') }}" class="text-decoration-none">
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
        <a href="{{ url('/catalogo-diseno') }}" class="text-decoration-none">
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