@extends('layouts.app')

@section('title', 'Panel Principal')

@push('styles')
<style>
    .quote-banner {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.1rem 1.6rem;
        border-radius: 18px;
        margin-bottom: 1.5rem;
    }

    .quote-icon {
        font-size: 1.5rem;
        color: var(--gold);
        flex-shrink: 0;
    }

    .quote-banner p {
        margin: 0;
        font-style: italic;
        font-weight: 700;
        color: var(--maroon-dark);
        font-size: .95rem;
        line-height: 1.5;
    }

    .card-surface {
        border-radius: 24px;
        margin-bottom: 1.5rem;
        overflow: hidden;
    }

    .hero-card .hero-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
        display: block;
    }

    .hero-body {
        padding: 1.75rem 2rem 2rem;
    }

    .hero-body h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        color: var(--maroon-dark);
        font-size: 1.55rem;
        margin-bottom: .65rem;
    }

    .hero-body p {
        margin: 0;
        color: var(--ink);
        opacity: .82;
        line-height: 1.65;
        font-size: .95rem;
    }

    .stats-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        padding: 1.35rem 1.75rem;
        margin-bottom: 0;
    }

    .stats-label {
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
        font-size: .8rem;
        color: var(--maroon-dark);
    }

    .stats-digits {
        display: flex;
        gap: .5rem;
    }

    .stats-digits span {
        width: 44px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        border: 1px solid rgba(110, 30, 54, 0.15);
        border-radius: 12px;
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        font-size: 1.35rem;
        color: var(--maroon-dark);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.9);
    }

    .stats-digits span.highlight {
        background: linear-gradient(160deg, var(--maroon), var(--maroon-dark));
        color: #fff;
        border-color: var(--maroon-dark);
        box-shadow: 0 4px 14px rgba(110, 30, 54, 0.35), inset 0 1px 0 rgba(255, 255, 255, 0.3);
    }

    .notice-card {
        border-radius: 22px;
        padding: 1.5rem 1.6rem;
        color: #fff;
        margin-bottom: 1.5rem;
    }

    .notice-label {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: .7rem;
        letter-spacing: 1.5px;
        font-weight: 800;
        color: var(--pink-soft);
        margin-bottom: .85rem;
    }

    .notice-label i {
        font-size: 1.15rem;
        color: var(--gold);
    }

    .notice-card h3 {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        font-size: 1.3rem;
        margin-bottom: .55rem;
    }

    .notice-card p {
        font-size: .87rem;
        opacity: .92;
        margin: 0;
        line-height: 1.55;
    }

    .quicklinks-card {
        border-radius: 22px;
        padding: 1.5rem 1.6rem;
    }

    .quicklinks-title {
        font-weight: 800;
        text-transform: uppercase;
        font-size: .78rem;
        letter-spacing: 1px;
        color: var(--maroon-dark);
        margin-bottom: .75rem;
    }

    .quicklinks-card ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .quicklinks-card li+li {
        border-top: 1px solid rgba(110, 30, 54, 0.08);
    }

    .quicklinks-card a {
        display: flex;
        align-items: center;
        gap: .75rem;
        padding: .8rem .25rem;
        color: var(--ink);
        text-decoration: none;
        font-weight: 700;
        font-size: .88rem;
        transition: all .15s ease;
    }

    .quicklinks-card a i {
        color: var(--maroon);
        font-size: 1.1rem;
        width: 20px;
        text-align: center;
    }

    .quicklinks-card a:hover {
        color: var(--maroon-dark);
        padding-left: .5rem;
    }

    @media (max-width: 767px) {
        .stats-card {
            justify-content: center;
            text-align: center;
        }
    }
</style>
@endpush

@section('content')

{{-- FRASE / QUOTE BANNER --}}
<div class="quote-banner glass">
    <div class="quote-icon"><i class="bi bi-quote"></i></div>
    <p>"Nuestras manos tejen más que prendas: tejen identidad, cultura y un futuro mejor para nuestras familias y comunidades."</p>
</div>

<div class="row g-4">

    {{-- COLUMNA PRINCIPAL --}}
    <div class="col-lg-8">

        <div class="card-surface hero-card glass">
            <img src="{{ asset('images/hero-tejido.jpg') }}" alt="Artesana tejiendo" class="hero-image"
                onerror="this.src='https://placehold.co/900x400/6E1E36/F8F2E7?text=Sumaq+Awaykuna'">

            <div class="hero-body">
                <h2>Fortaleciendo nuestra tradición, creando oportunidades</h2>
                <p>En Sumaq Awaykuna nos dedicamos al tejido de prendas de alta calidad que combinan
                    técnicas ancestrales y tecnología moderna para llevar lo mejor de nuestra cultura al mundo.</p>
            </div>
        </div>

        {{-- CONTADOR DE ARTESANAS ACTIVAS --}}
        <div class="card-surface stats-card glass">
            <span class="stats-label">Artesanas activas en la comunidad</span>
            <div class="stats-digits">
                <span>0</span>
                <span>0</span>
                <span>1</span>
                <span class="highlight">2</span>
                <span class="highlight">5</span>
            </div>
        </div>

    </div>

    {{-- COLUMNA LATERAL --}}
    <div class="col-lg-4">

        <div class="card-surface notice-card glass-maroon">
            <div class="notice-label">
                <span>NOTIFICACIÓN IMPORTANTE</span>
                <i class="bi bi-bell-fill"></i>
            </div>
            <h3>¡Reunión Trimestral!</h3>
            <p>Sesión ordinaria de la Junta Directiva programada para el día 05 de Junio.
                Revisar acuerdos y asignación de tareas.</p>
        </div>

        <div class="card-surface quicklinks-card glass">
            <div class="quicklinks-title">Enlaces Rápidos</div>
            <ul>
                <li>
                    <a href="{{ url('/calendario') }}">
                        <i class="bi bi-calendar-event-fill"></i> Calendario de Reuniones
                    </a>
                </li>
                <li>
                    <a href="{{ url('/normas-calidad') }}">
                        <i class="bi bi-shield-check"></i> Normas de Calidad Textil
                    </a>
                </li>
                <li>
                    <a href="{{ url('/guia-diseno') }}">
                        <i class="bi bi-bag-heart-fill"></i> Guía de Diseño de Producto
                    </a>
                </li>
                <li>
                    <a href="{{ url('/catalogo') }}">
                        <i class="bi bi-journal-richtext"></i> Catálogo de Productos
                    </a>
                </li>
                <li>
                    <a href="{{ url('/soporte') }}">
                        <i class="bi bi-headset"></i> Soporte Técnico Interno
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>

@endsection