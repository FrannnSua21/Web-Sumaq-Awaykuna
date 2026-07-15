@extends('layouts.app')

@section('title', $producto->nombre)


@push('styles')
<style>
    .detalle-back {

        display: inline-flex;

        align-items: center;

        gap: .4rem;

        color: var(--maroon-dark);

        font-weight: 800;

        font-size: .8rem;

        text-decoration: none;

        margin-bottom: 1.2rem;

    }

    .detalle-back:hover {

        color: var(--maroon);

    }



    .detalle-wrap {

        display: grid;

        grid-template-columns: 380px 1fr;

        gap: 1.8rem;

    }



    .detalle-imagen {

        border-radius: 24px;

        overflow: hidden;

        height: 380px;

    }

    .detalle-imagen img {

        width: 100%;

        height: 100%;

        object-fit: cover;

    }



    .detalle-card {

        border-radius: 24px;

        padding: 1.8rem;

    }



    .detalle-header {

        display: flex;

        justify-content: space-between;

        align-items: flex-start;

        flex-wrap: wrap;

        gap: .8rem;

        margin-bottom: .6rem;

    }



    .detalle-header h1 {

        font-family: 'Playfair Display', serif;

        color: var(--maroon-dark);

        font-size: 1.7rem;

        font-weight: 900;

        margin: 0;

    }



    .detalle-header .price {

        background: #F8F2E7;

        border-radius: 14px;

        padding: .6rem 1.1rem;

        font-size: 1.3rem;

        font-weight: 900;

        color: var(--maroon);

        white-space: nowrap;

    }



    .detalle-codigo {

        color: rgba(74, 34, 51, .55);

        font-size: .8rem;

        font-weight: 700;

        margin-bottom: 1rem;

    }



    .badge-row {

        display: flex;

        gap: .6rem;

        flex-wrap: wrap;

        margin-bottom: 1.2rem;

    }



    .badge-row span {

        padding: .35rem .8rem;

        border-radius: 30px;

        font-size: .7rem;

        font-weight: 900;

    }



    .badge-categoria {

        background: #f3dce3;

        color: var(--maroon-dark);

    }



    .disponible {
        background: #dff3e6;
        color: #267343;
    }

    .agotado {
        background: #f8dddd;
        color: #a12626;
    }

    .reservado {
        background: #fff0c7;
        color: #956c00;
    }



    .detalle-descripcion {

        color: rgba(74, 34, 51, .8);

        font-size: .9rem;

        line-height: 1.6;

        margin-bottom: 1.5rem;

    }



    .detalle-datos {

        display: grid;

        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));

        gap: 1rem;

        margin-bottom: 1.5rem;

    }



    .dato-box {

        background: #F8F2E7;

        border-radius: 16px;

        padding: 1rem;

    }



    .dato-box small {

        display: block;

        font-size: .65rem;

        color: #888;

        text-transform: uppercase;

        margin-bottom: .3rem;

    }



    .dato-box strong {

        color: var(--maroon-dark);

        font-size: 1.05rem;

    }



    .detalle-acciones {

        display: flex;

        gap: .8rem;

        flex-wrap: wrap;

    }



    .detalle-acciones button {

        border: none;

        padding: .75rem 1.4rem;

        border-radius: 14px;

        font-size: .8rem;

        font-weight: 900;

    }



    .btn-editar-detalle {

        background: var(--maroon);

        color: white;

    }



    .btn-eliminar-detalle {

        background: #ffdede;

        color: #a12626;

    }



    .artesanas-relacionadas {

        margin-top: 2rem;

        border-radius: 24px;

        padding: 1.5rem 1.8rem;

    }



    .artesanas-relacionadas h3 {

        font-family: 'Playfair Display', serif;

        color: var(--maroon-dark);

        font-size: 1.1rem;

        font-weight: 800;

        margin-bottom: 1rem;

    }



    .artesana-chip {

        display: inline-flex;

        align-items: center;

        gap: .5rem;

        background: #F8F2E7;

        padding: .5rem 1rem;

        border-radius: 30px;

        font-size: .8rem;

        font-weight: 700;

        color: var(--ink);

        margin: 0 .5rem .5rem 0;

    }



    @media(max-width:860px) {

        .detalle-wrap {

            grid-template-columns: 1fr;

        }

        .detalle-imagen {

            height: 260px;

        }

    }
</style>
@endpush


@section('content')

<a href="{{ route('productos') }}" class="detalle-back">
    <i class="bi bi-arrow-left"></i>
    Volver al catálogo
</a>


<div class="detalle-wrap">

    <div class="detalle-imagen glass">

        @if($producto->imagen)

        <img src="{{ $producto->imagen ? asset($producto->imagen) : 'https://via.placeholder.com/500x400' }}" ...>

        @else

        <img src="https://via.placeholder.com/500x400" alt="{{ $producto->nombre }}">

        @endif

    </div>


    <div class="detalle-card glass">

        <div class="detalle-header">

            <h1>{{ $producto->nombre }}</h1>

            <div class="price">S/ {{ number_format($producto->precio_venta, 2) }}</div>

        </div>

        <div class="detalle-codigo">
            <i class="bi bi-upc-scan"></i>
            Código: {{ $producto->codigo }}
        </div>

        <div class="badge-row">

            <span class="badge-categoria">
                <i class="bi bi-tag"></i>
                {{ $producto->categoria->nombre ?? 'Sin categoría' }}
            </span>

            <span class="{{ $producto->estado }}">
                {{ ucfirst($producto->estado) }}
            </span>

            @if($producto->disenio)
            <span class="badge-categoria">
                <i class="bi bi-palette"></i>
                {{ $producto->disenio->nombre }}
            </span>
            @endif

        </div>

        <p class="detalle-descripcion">
            {{ $producto->descripcion ?: 'Sin descripción registrada.' }}
        </p>

        <div class="detalle-datos">

            <div class="dato-box">
                <small>Precio compra</small>
                <strong>S/ {{ number_format($producto->precio_compra, 2) }}</strong>
            </div>

            <div class="dato-box">
                <small>Precio venta</small>
                <strong>S/ {{ number_format($producto->precio_venta, 2) }}</strong>
            </div>

            <div class="dato-box">
                <small>Stock actual</small>
                <strong>{{ $producto->stock }} unid.</strong>
            </div>

            <div class="dato-box">
                <small>Stock mínimo</small>
                <strong>{{ $producto->stock_minimo }} unid.</strong>
            </div>

        </div>

        <div class="detalle-acciones">

            <button
                type="button"
                class="btn-editar-detalle"
                onclick="window.location.href='{{ route('productos') }}'">
                <i class="bi bi-pencil-fill"></i>
                Editar desde el catálogo
            </button>

            <form method="POST" action="{{ route('productos.delete', $producto->id) }}">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="btn-eliminar-detalle"
                    onclick="return confirm('¿Eliminar este producto?')">
                    <i class="bi bi-trash-fill"></i>
                    Eliminar producto
                </button>

            </form>

        </div>

    </div>

</div>


@if($producto->artesanas->count() > 0)

<div class="artesanas-relacionadas glass">

    <h3>
        <i class="bi bi-people-fill"></i>
        Artesanas que elaboran este producto
    </h3>

    @foreach($producto->artesanas as $artesana)

    <span class="artesana-chip">
        <i class="bi bi-person-circle"></i>
        {{ $artesana->persona->nombres ?? '' }} {{ $artesana->persona->apellidos ?? '' }}
    </span>

    @endforeach

</div>

@endif

@endsection