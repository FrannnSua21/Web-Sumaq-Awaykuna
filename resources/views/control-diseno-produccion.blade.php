@extends('layouts.app')

@section('title', 'Control de Diseño y Producción')

@push('styles')
<style>
    .page-header {
        margin-bottom: 1.4rem;
    }

    .page-header h1 {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        color: var(--maroon-dark);
        font-size: 1.5rem;
        border-left: 4px solid var(--maroon);
        padding-left: .85rem;
        margin: 0;
    }

    .process-card {
        border-radius: 18px;
        padding: 1.4rem 1.6rem;
    }

    .process-card h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--maroon-dark);
        font-size: 1.05rem;
        margin-bottom: .6rem;
    }

    .process-card>p {
        color: var(--ink);
        opacity: .82;
        line-height: 1.6;
        font-size: .8rem;
        margin-bottom: 1.25rem;
    }

    .checklist {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .checklist li {
        display: flex;
        gap: .7rem;
        padding: .7rem 0;
        border-top: 1px solid rgba(110, 30, 54, 0.07);
    }

    .checklist li:first-child {
        border-top: none;
    }

    .checklist i {
        color: var(--maroon);
        font-size: .9rem;
        margin-top: .12rem;
        flex-shrink: 0;
    }

    .checklist strong {
        color: var(--maroon-dark);
        font-weight: 800;
    }

    .checklist span {
        color: var(--ink);
        opacity: .82;
        font-size: .78rem;
        line-height: 1.5;
    }

    /* GALERÍA */
    .gallery-card {
        border-radius: 18px;
        overflow: hidden;
        padding: .4rem;
        display: grid;
        grid-template-rows: 1.4fr 1fr;
        gap: .4rem;
        width: 88%;
        margin: 0 auto;
        min-height: 360px;
    }

    .gallery-main img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 14px;
        display: block;
    }

    .gallery-sub {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: .5rem;
    }

    .gallery-sub img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 12px;
        display: block;
    }

    /* PALETA DE COLORES (yarns) */
    .yarn-flags {
        display: flex;
        gap: .5rem;
        margin-top: 1.6rem;
    }

    .yarn-flag {
        width: 38px;
        height: 48px;
        clip-path: polygon(0 0, 100% 0, 100% 78%, 50% 100%, 0 78%);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.14);
    }

    .yarn-flag:nth-child(1) {
        background: #1F6F5C;
    }

    .yarn-flag:nth-child(2) {
        background: #16866B;
    }

    .yarn-flag:nth-child(3) {
        background: #5B9A4B;
    }

    .yarn-flag:nth-child(4) {
        background: #9AA83A;
    }

    .yarn-flag:nth-child(5) {
        background: #E7A93B;
    }

    @media (max-width: 991px) {
        .gallery-card {
            min-height: 300px;
            margin-top: 1.25rem;
        }
    }
</style>
@endpush

@section('content')

<div class="page-header">
    <h1>Control de Diseño y Producción</h1>
</div>

<div class="row g-4">

    {{-- COLUMNA TEXTO --}}
    <div class="col-lg-7">
        <div class="process-card glass">
            <h2>Seguimiento del Proceso de Tejido</h2>
            <p>Las mujeres de Sumaq Awaykuna realizan el tejido de nuestras prendas con dedicación y calidad,
                combinando técnicas tradicionales y apoyo de maquinaria, para <strong>transformar la lana en piezas
                    únicas</strong>.</p>

            <ul class="checklist">
                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    <span><strong>Tejido Manual:</strong> Nuestras artesanas tejen a mano cada prenda, cuidando los
                        detalles y acabados que reflejan la calidad de nuestro trabajo.</span>
                </li>
                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    <span><strong>Uso de Maquinaria:</strong> Contamos con máquinas de tejido que nos permiten
                        agilizar la producción sin perder la esencia artesanal que nos caracteriza.</span>
                </li>
                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    <span><strong>Lana de Calidad:</strong> Compramos lana de alta calidad a proveedores confiables
                        para asegurar la durabilidad y suavidad de nuestras prendas.</span>
                </li>
                <li>
                    <i class="bi bi-check-circle-fill"></i>
                    <span><strong>Control de Calidad:</strong> Cada prenda pasa por una revisión detallada para
                        garantizar un tejido uniforme, resistente y con excelentes acabados.</span>
                </li>
            </ul>

            <div class="yarn-flags">
                <div class="yarn-flag"></div>
                <div class="yarn-flag"></div>
                <div class="yarn-flag"></div>
                <div class="yarn-flag"></div>
                <div class="yarn-flag"></div>
            </div>
        </div>
    </div>

    {{-- COLUMNA GALERÍA --}}
    <div class="col-lg-5">
        <div class="gallery-card glass">
            <div class="gallery-main">
                <img src="{{ asset('images/tejidos/tejido1.jpeg') }}"
                    alt="Tejido artesanal">
            </div>

            <div class="gallery-sub">
                <img src="{{ asset('images/tejidos/tejido2.jpeg') }}"
                    alt="Detalle de tejido">

                <img src="{{ asset('images/tejidos/tejido3.jpeg') }}"
                    alt="Detalle de tejido">
            </div>
        </div>
    </div>

</div>

@endsection