@extends('layouts.app')

@section('title', 'Diseños de Ropa y Prendas')

@push('styles')
<style>
    .catalog-flags {
        display: flex;
        gap: .5rem;
        margin-bottom: 1.4rem;
        position: relative;
    }

    .catalog-flags::before {
        content: "";
        position: absolute;
        top: 18px;
        left: 0;
        right: 0;
        height: 1px;
        background: rgba(110, 30, 54, 0.18);
        z-index: 0;
    }

    .catalog-flags .yarn-flag {
        width: 36px;
        height: 44px;
        clip-path: polygon(0 0, 100% 0, 100% 78%, 50% 100%, 0 78%);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.14);
        position: relative;
        z-index: 1;
    }

    .catalog-flags .yarn-flag:nth-child(1) {
        background: #E7A93B;
    }

    .catalog-flags .yarn-flag:nth-child(2) {
        background: #9AA83A;
    }

    .catalog-flags .yarn-flag:nth-child(3) {
        background: #5B9A4B;
    }

    .catalog-flags .yarn-flag:nth-child(4) {
        background: #16866B;
    }

    .catalog-flags .yarn-flag:nth-child(5) {
        background: #1F6F5C;
    }

    .catalog-title {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        color: var(--maroon-dark);
        font-size: 1.55rem;
        margin-bottom: .4rem;
    }

    .catalog-subtitle {
        color: var(--maroon);
        font-weight: 800;
        font-size: .9rem;
        margin-bottom: .85rem;
    }

    .catalog-text p {
        color: var(--ink);
        opacity: .82;
        line-height: 1.65;
        font-size: .8rem;
        margin-bottom: 1rem;
    }

    .catalog-footer {
        margin-top: 1.6rem;
        padding-top: .85rem;
        border-top: 1px solid rgba(110, 30, 54, 0.13);
        font-size: .68rem;
        letter-spacing: .4px;
        color: var(--maroon);
        font-weight: 700;
        text-transform: uppercase;
    }

    /* GALERÍA CON ETIQUETAS */
    .tag-gallery {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: .5rem;
        border-radius: 18px;
        padding: .5rem;
        height: 100%;
        min-height: 420px;
    }

    .tag-item {
        position: relative;
        border-radius: 14px;
        overflow: hidden;
    }

    .tag-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .tag-badge {
        position: absolute;
        left: 10px;
        bottom: 10px;
        background: rgba(110, 30, 54, 0.88);
        color: #fff;
        font-size: .6rem;
        font-weight: 800;
        letter-spacing: .6px;
        padding: .32rem .7rem;
        border-radius: 30px;
        text-transform: uppercase;
        border: 1px solid rgba(255, 255, 255, 0.25);
    }

    @media (max-width: 991px) {
        .tag-gallery {
            min-height: 300px;
            margin-top: 1.25rem;
        }
    }
</style>
@endpush

@section('content')

<div class="row g-4">

    {{-- COLUMNA TEXTO --}}
    <div class="col-lg-6">
        <div class="glass" style="border-radius: 18px; padding: 1.6rem 1.85rem;">

            <div class="catalog-flags">
                <div class="yarn-flag"></div>
                <div class="yarn-flag"></div>
                <div class="yarn-flag"></div>
                <div class="yarn-flag"></div>
                <div class="yarn-flag"></div>
            </div>

            <h1 class="catalog-title">Diseños de Ropa y Prendas</h1>
            <div class="catalog-subtitle">Catálogo Exclusivo de Punto</div>

            <div class="catalog-text">
                <p>Nuestra colección de prendas tejidas a mano utiliza exclusivamente lana fina de alpaca y oveja,
                    integrando patrones ancestrales en siluetas contemporáneas orientadas a mercados selectos de
                    comercio justo.</p>

                <p>Cada prenda es documentada en este catálogo interno para asegurar el control de calidad estético,
                    la correcta asignación de precios y la aprobación unánime de la Junta Directiva antes de su
                    presentación en ferias comunales e internacionales.</p>
            </div>

            <div class="catalog-footer">
                Gestión 2026 — Catálogo Interno
            </div>
        </div>
    </div>

    {{-- GALERÍA CON ETIQUETAS --}}
    <div class="col-lg-6">
        <div class="tag-gallery glass">

            <div class="tag-item">
                <img src="{{ asset('images/tejidos/tejido1.jpeg') }}" alt="Tejido 1">
                <span class="tag-badge">Tejido 1</span>
            </div>

            <div class="tag-item">
                <img src="{{ asset('images/tejidos/tejido2.jpeg') }}" alt="Tejido 2">
                <span class="tag-badge">Tejido 2</span>
            </div>

            <div class="tag-item">
                <img src="{{ asset('images/tejidos/tejido3.jpeg') }}" alt="Tejido 3">
                <span class="tag-badge">Tejido 3</span>
            </div>

            <div class="tag-item">
                <img src="{{ asset('images/tejidos/tejido4.jpeg') }}" alt="Tejido 4">
                <span class="tag-badge">Tejido 4</span>
            </div>

        </div>
    </div>

</div>

@endsection