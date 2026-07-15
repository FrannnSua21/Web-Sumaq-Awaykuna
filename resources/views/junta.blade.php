@extends('layouts.app')

@section('title', 'Gestión Junta')

@section('content')

    <div class="page-heading">
        <h1><span class="title-bar"></span> Gestión Junta</h1>
        <p>Miembros de la junta directiva y periodo de gestión vigente.</p>
    </div>

    <div class="junta-period glass">
        <i class="bi bi-calendar-check-fill"></i>
        <span>Periodo de gestión actual: <strong>2025 — 2027</strong></span>
    </div>

    <div class="junta-grid">
        @php
            $junta = [
                ['nombre' => 'Rosa Quispe', 'cargo' => 'Presidenta', 'desde' => 'Mar 2025'],
                ['nombre' => 'Elena Mamani', 'cargo' => 'Vicepresidenta', 'desde' => 'Mar 2025'],
                ['nombre' => 'Juana Ccopa', 'cargo' => 'Secretaria', 'desde' => 'Mar 2025'],
                ['nombre' => 'Flora Huanca', 'cargo' => 'Tesorera', 'desde' => 'Mar 2025'],
                ['nombre' => 'Carmen Apaza', 'cargo' => 'Fiscal', 'desde' => 'Mar 2025'],
                ['nombre' => 'Isabel Turpo', 'cargo' => 'Vocal de Producción', 'desde' => 'Mar 2025'],
            ];
        @endphp

        @foreach ($junta as $j)
            <div class="junta-card glass">
                <div class="junta-avatar">{{ collect(explode(' ', $j['nombre']))->map(fn($p) => $p[0])->take(2)->implode('') }}</div>
                <h3>{{ $j['nombre'] }}</h3>
                <span class="junta-cargo">{{ $j['cargo'] }}</span>
                <span class="junta-desde">En el cargo desde {{ $j['desde'] }}</span>
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

    .junta-period {
        margin-top: 1.6rem;
        margin-bottom: 1.4rem;
        border-radius: 14px;
        padding: .9rem 1.2rem;
        display: flex;
        align-items: center;
        gap: .7rem;
        font-size: .82rem;
        color: var(--ink);
    }

    .junta-period i {
        color: var(--gold);
        font-size: 1.1rem;
    }

    .junta-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.2rem;
    }

    .junta-card {
        border-radius: 16px;
        padding: 1.6rem 1.2rem;
        text-align: center;
    }

    .junta-avatar {
        width: 60px;
        height: 60px;
        margin: 0 auto .9rem;
        border-radius: 50%;
        background: var(--pink-soft);
        color: var(--maroon-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        font-size: 1.1rem;
    }

    .junta-card h3 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: .92rem;
        color: var(--maroon-dark);
        margin: 0 0 .3rem;
    }

    .junta-cargo {
        display: block;
        font-size: .72rem;
        font-weight: 800;
        color: var(--maroon);
        margin-bottom: .3rem;
    }

    .junta-desde {
        display: block;
        font-size: .68rem;
        color: rgba(74, 34, 51, 0.55);
    }

    @media (max-width: 991px) {
        .junta-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 576px) {
        .junta-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush