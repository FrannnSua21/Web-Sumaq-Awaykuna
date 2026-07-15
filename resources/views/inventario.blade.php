@extends('layouts.app')

@section('title', 'Inventario')

@section('content')

    <div class="page-heading">
        <h1><span class="title-bar"></span> Inventario</h1>
        <p>Stock de materia prima e insumos, y prendas terminadas.</p>
    </div>

    <div class="inv-summary">
        <div class="inv-summary-card glass">
            <i class="bi bi-box-seam-fill"></i>
            <div>
                <span class="ps-value">128</span>
                <span class="ps-label">Ítems en stock</span>
            </div>
        </div>
        <div class="inv-summary-card glass">
            <i class="bi bi-exclamation-triangle-fill" style="color:#B3273D;"></i>
            <div>
                <span class="ps-value">4</span>
                <span class="ps-label">Con stock bajo</span>
            </div>
        </div>
        <div class="inv-summary-card glass">
            <i class="bi bi-arrow-down-circle-fill" style="color:#2E7D4F;"></i>
            <div>
                <span class="ps-value">S/ 6,120</span>
                <span class="ps-label">Valor total del inventario</span>
            </div>
        </div>
    </div>

    <div class="panel-card glass">
        <div class="panel-head">
            <h2>Materiales e insumos</h2>
            <button class="btn-add"><i class="bi bi-plus-lg"></i> Agregar ítem</button>
        </div>

        <div class="table-responsive">
            <table class="table inv-table align-middle">
                <thead>
                    <tr>
                        <th>Ítem</th>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Unidad</th>
                        <th>Ubicación</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $items = [
                            ['nombre' => 'Lana de alpaca baby', 'cat' => 'Materia prima', 'cant' => 42, 'unidad' => 'kg', 'ubicacion' => 'Almacén A', 'estado' => 'ok'],
                            ['nombre' => 'Lana de oveja', 'cat' => 'Materia prima', 'cant' => 8, 'unidad' => 'kg', 'ubicacion' => 'Almacén A', 'estado' => 'bajo'],
                            ['nombre' => 'Tinte de cochinilla', 'cat' => 'Insumo', 'cant' => 15, 'unidad' => 'frascos', 'ubicacion' => 'Almacén B', 'estado' => 'ok'],
                            ['nombre' => 'Tinte de añil', 'cat' => 'Insumo', 'cant' => 3, 'unidad' => 'frascos', 'ubicacion' => 'Almacén B', 'estado' => 'bajo'],
                            ['nombre' => 'Chompas terminadas', 'cat' => 'Producto final', 'cant' => 18, 'unidad' => 'unid.', 'ubicacion' => 'Tienda', 'estado' => 'ok'],
                            ['nombre' => 'Chullos terminados', 'cat' => 'Producto final', 'cant' => 2, 'unidad' => 'unid.', 'ubicacion' => 'Tienda', 'estado' => 'bajo'],
                        ];
                    @endphp

                    @foreach ($items as $i)
                        <tr>
                            <td><strong>{{ $i['nombre'] }}</strong></td>
                            <td>{{ $i['cat'] }}</td>
                            <td>{{ $i['cant'] }}</td>
                            <td>{{ $i['unidad'] }}</td>
                            <td>{{ $i['ubicacion'] }}</td>
                            <td>
                                @if ($i['estado'] === 'ok')
                                    <span class="badge-status badge-green"><i class="bi bi-check-circle-fill"></i> Suficiente</span>
                                @else
                                    <span class="badge-status badge-red"><i class="bi bi-exclamation-circle-fill"></i> Stock bajo</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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

    .inv-summary {
        margin-top: 1.6rem;
        margin-bottom: 1.4rem;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    .inv-summary-card {
        border-radius: 16px;
        padding: 1rem 1.2rem;
        display: flex;
        align-items: center;
        gap: .8rem;
    }

    .inv-summary-card i {
        font-size: 1.4rem;
        color: var(--maroon);
    }

    .ps-value {
        display: block;
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        font-size: 1.25rem;
        color: var(--maroon-dark);
    }

    .ps-label {
        display: block;
        font-size: .68rem;
        color: rgba(74, 34, 51, 0.6);
        font-weight: 700;
    }

    .panel-card {
        border-radius: 18px;
        padding: 1.3rem 1.4rem;
    }

    .panel-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1.1rem;
    }

    .panel-head h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1rem;
        color: var(--maroon-dark);
        margin: 0;
    }

    .btn-add {
        border: none;
        background: var(--maroon);
        color: #fff;
        font-size: .74rem;
        font-weight: 800;
        padding: .5rem 1rem;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        gap: .35rem;
    }

    .btn-add:hover {
        background: var(--maroon-dark);
    }

    .inv-table {
        font-size: .78rem;
    }

    .inv-table thead th {
        font-size: .66rem;
        text-transform: uppercase;
        letter-spacing: .4px;
        color: rgba(74, 34, 51, 0.55);
        border-bottom: 2px solid var(--cream-deep);
        padding-bottom: .6rem;
    }

    .inv-table tbody td {
        padding: .7rem .5rem;
        border-bottom: 1px solid var(--cream-deep);
        color: var(--ink);
    }

    .badge-status {
        font-size: .66rem;
        font-weight: 800;
        padding: .3rem .6rem;
        border-radius: 20px;
        white-space: nowrap;
    }

    .badge-green {
        background: rgba(46, 125, 79, 0.1);
        color: #2E7D4F;
    }

    .badge-red {
        background: rgba(179, 39, 61, 0.08);
        color: #B3273D;
    }

    @media (max-width: 768px) {
        .inv-summary {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush