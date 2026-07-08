@extends('layouts.app')

@section('title', 'Diseños de Ropa y Prendas')

@push('styles')
<style>
    .catalog-flags {
        display: flex;
        gap: .6rem;
        margin-bottom: 1.75rem;
        position: relative;
    }

    .catalog-flags::before {
        content: "";
        position: absolute;
        top: 22px;
        left: 0;
        right: 0;
        height: 1px;
        background: rgba(110, 30, 54, 0.2);
        z-index: 0;
    }

    .catalog-flags .yarn-flag {
        width: 44px;
        height: 54px;
        clip-path: polygon(0 0, 100% 0, 100% 78%, 50% 100%, 0 78%);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.18);
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
        font-size: 2rem;
        margin-bottom: .5rem;
    }

    .catalog-subtitle {
        color: var(--maroon);
        font-weight: 800;
        font-size: 1.05rem;
        margin-bottom: 1rem;
    }

    .catalog-text p {
        color: var(--ink);
        opacity: .85;
        line-height: 1.7;
        font-size: .93rem;
        margin-bottom: 1.1rem;
    }

    .catalog-footer {
        margin-top: 2rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(110, 30, 54, 0.15);
        font-size: .78rem;
        letter-spacing: .5px;
        color: var(--maroon);
        font-weight: 700;
        text-transform: uppercase;
    }

    /* GALERÍA CON ETIQUETAS */
    .tag-gallery {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: .6rem;
        border-radius: 24px;
        padding: .6rem;
        height: 100%;
        min-height: 480px;
    }

    .tag-item {
        position: relative;
        border-radius: 18px;
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
        left: 12px;
        bottom: 12px;
        background: rgba(110, 30, 54, 0.9);
        color: #fff;
        font-size: .68rem;
        font-weight: 800;
        letter-spacing: 1px;
        padding: .4rem .8rem;
        border-radius: 30px;
        text-transform: uppercase;
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    @media (max-width: 991px) {
        .tag-gallery {
            min-height: 340px;
            margin-top: 1.5rem;
        }
    }
</style>
@endpush

@section('content')

<div class="row g-4">

    {{-- COLUMNA TEXTO --}}
    <div class="col-lg-6">
        <div class="glass" style="border-radius: 24px; padding: 2rem 2.25rem;">

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
                <img src="{{ asset('images/crochet.jpg') }}" alt="Crochet"
                    onerror="this.src='https://placehold.co/400x300/6E1E36/F8F2E7?text=Crochet'">
                <span class="tag-badge">Crochet</span>
            </div>
            <div class="tag-item">
                <img src="{{ asset('images/texturas.jpg') }}" alt="Texturas únicas"
                    onerror="this.src='https://placehold.co/400x300/C7952F/F8F2E7?text=Texturas'">
                <span class="tag-badge">Texturas únicas</span>
            </div>
            <div class="tag-item">
                <img src="{{ asset('images/dos-agujas.jpg') }}" alt="A dos agujas"
                    onerror="this.src='https://placehold.co/400x300/551327/F8F2E7?text=Dos+Agujas'">
                <span class="tag-badge">A dos agujas</span>
            </div>
            <div class="tag-item">
                <img src="{{ asset('images/maquina.jpg') }}" alt="A máquina"
                    onerror="this.src='https://placehold.co/400x300/6E1E36/F8F2E7?text=A+Maquina'">
                <span class="tag-badge">A máquina</span>
            </div>
        </div>
    </div>

</div>

@endsection