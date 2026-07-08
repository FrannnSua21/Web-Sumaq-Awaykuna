@extends('layouts.app')

@section('title', 'Control de Diseño y Producción')

@push('styles')
<style>
    .page-header {
        margin-bottom: 1.75rem;
    }

    .page-header h1 {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        color: var(--maroon-dark);
        font-size: 1.9rem;
        border-left: 5px solid var(--maroon);
        padding-left: 1rem;
        margin: 0;
    }

    .process-card {
        border-radius: 24px;
        padding: 1.75rem 2rem;
    }

    .process-card h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--maroon-dark);
        font-size: 1.3rem;
        margin-bottom: .75rem;
    }

    .process-card>p {
        color: var(--ink);
        opacity: .85;
        line-height: 1.65;
        font-size: .95rem;
        margin-bottom: 1.5rem;
    }

    .checklist {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .checklist li {
        display: flex;
        gap: .85rem;
        padding: .85rem 0;
        border-top: 1px solid rgba(110, 30, 54, 0.08);
    }

    .checklist li:first-child {
        border-top: none;
    }

    .checklist i {
        color: var(--maroon);
        font-size: 1.05rem;
        margin-top: .15rem;
        flex-shrink: 0;
    }

    .checklist strong {
        color: var(--maroon-dark);
        font-weight: 800;
    }

    .checklist span {
        color: var(--ink);
        opacity: .85;
        font-size: .92rem;
        line-height: 1.5;
    }

    /* GALERÍA */
    .gallery-card {
        border-radius: 24px;
        overflow: hidden;
        padding: .6rem;
        display: grid;
        grid-template-rows: 1.4fr 1fr;
        gap: .6rem;
        height: 100%;
        min-height: 480px;
    }

    .gallery-main img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 18px;
        display: block;
    }

    .gallery-sub {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: .6rem;
    }

    .gallery-sub img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 16px;
        display: block;
    }

    /* PALETA DE COLORES (yarns) */
    .yarn-flags {
        display: flex;
        gap: .6rem;
        margin-top: 2rem;
    }

    .yarn-flag {
        width: 46px;
        height: 58px;
        clip-path: polygon(0 0, 100% 0, 100% 78%, 50% 100%, 0 78%);
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.18);
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
            min-height: 340px;
            margin-top: 1.5rem;
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
                <img src="{{ asset('images/tejido-1.jpg') }}" alt="Tejido artesanal"
                    onerror="this.src='https://placehold.co/600x400/6E1E36/F8F2E7?text=Sumaq+Awaykuna'">
            </div>
            <div class="gallery-sub">
                <img src="{{ asset('images/tejido-2.jpg') }}" alt="Detalle de tejido"
                    onerror="this.src='https://placehold.co/300x220/C7952F/F8F2E7?text=Detalle'">
                <img src="{{ asset('images/tejido-3.jpg') }}" alt="Detalle de tejido"
                    onerror="this.src='https://placehold.co/300x220/6E1E36/F8F2E7?text=Detalle'">
            </div>
        </div>
    </div>

</div>

@endsection