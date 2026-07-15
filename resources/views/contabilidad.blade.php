@extends('layouts.app')

@section('title', 'Contabilidad')

@section('content')

    <div class="page-heading">
        <h1><span class="title-bar"></span> Contabilidad</h1>
        <p>Resumen financiero y movimientos de la asociación.</p>
    </div>

    <div class="acc-summary">
        <div class="acc-card glass income">
            <span class="acc-label">Ingresos del mes</span>
            <span class="acc-value">S/ 8,540.00</span>
            <span class="acc-trend"><i class="bi bi-arrow-up-short"></i> 14% vs. mes anterior</span>
        </div>
        <div class="acc-card glass expense">
            <span class="acc-label">Egresos del mes</span>
            <span class="acc-value">S/ 3,120.00</span>
            <span class="acc-trend down"><i class="bi bi-arrow-down-short"></i> 6% vs. mes anterior</span>
        </div>
        <div class="acc-card glass balance">
            <span class="acc-label">Balance neto</span>
            <span class="acc-value">S/ 5,420.00</span>
            <span class="acc-trend"><i class="bi bi-check-circle"></i> Saludable</span>
        </div>
    </div>

<div class="charts-grid">

    {{-- Gráfico barras --}}
    <div class="panel-card glass chart-card">

        <div class="panel-head">
            <h2>
                <i class="bi bi-bar-chart-fill"></i>
                Ingresos vs Egresos
            </h2>
        </div>

        <canvas id="financeBarChart"></canvas>

    </div>



    {{-- Gráfico torta --}}
    <div class="panel-card glass chart-card">

        <div class="panel-head">
            <h2>
                <i class="bi bi-pie-chart-fill"></i>
                Distribución de gastos
            </h2>
        </div>

        <canvas id="expensePieChart"></canvas>

    </div>



    {{-- Gráfico línea --}}
    <div class="panel-card glass chart-card">

        <div class="panel-head">
            <h2>
                <i class="bi bi-graph-up-arrow"></i>
                Evolución financiera
            </h2>
        </div>

        <canvas id="balanceLineChart"></canvas>

    </div>



    {{-- Cuarto gráfico futuro --}}
    <div class="panel-card glass chart-card">

        <div class="panel-head">
            <h2>
                <i class="bi bi-wallet2"></i>
                Flujo de caja
            </h2>
        </div>

        <canvas id="cashFlowChart"></canvas>

    </div>


</div>



    <div class="panel-card glass">
        <div class="panel-head">
            <h2>Movimientos recientes</h2>
            <button class="btn-add"><i class="bi bi-plus-lg"></i> Nuevo movimiento</button>
        </div>

        <div class="table-responsive">
            <table class="table acc-table align-middle">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Concepto</th>
                        <th>Categoría</th>
                        <th>Tipo</th>
                        <th class="text-end">Monto</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $movimientos = [
                            ['fecha' => '10 Jul 2026', 'concepto' => 'Venta — Feria de Puno', 'cat' => 'Ventas', 'tipo' => 'ingreso', 'monto' => 1250.00],
                            ['fecha' => '08 Jul 2026', 'concepto' => 'Compra de lana de alpaca', 'cat' => 'Materia prima', 'tipo' => 'egreso', 'monto' => 640.00],
                            ['fecha' => '05 Jul 2026', 'concepto' => 'Venta en línea', 'cat' => 'Ventas', 'tipo' => 'ingreso', 'monto' => 380.00],
                            ['fecha' => '02 Jul 2026', 'concepto' => 'Pago de tintes naturales', 'cat' => 'Insumos', 'tipo' => 'egreso', 'monto' => 210.00],
                            ['fecha' => '28 Jun 2026', 'concepto' => 'Cuota de socias', 'cat' => 'Aportes', 'tipo' => 'ingreso', 'monto' => 480.00],
                        ];
                    @endphp

                    @foreach ($movimientos as $m)
                        <tr>
                            <td>{{ $m['fecha'] }}</td>
                            <td><strong>{{ $m['concepto'] }}</strong></td>
                            <td>{{ $m['cat'] }}</td>
                            <td>
                                @if ($m['tipo'] === 'ingreso')
                                    <span class="badge-status badge-green"><i class="bi bi-arrow-down-left-circle-fill"></i> Ingreso</span>
                                @else
                                    <span class="badge-status badge-red"><i class="bi bi-arrow-up-right-circle-fill"></i> Egreso</span>
                                @endif
                            </td>
                            <td class="text-end amount {{ $m['tipo'] }}">
                                {{ $m['tipo'] === 'ingreso' ? '+' : '-' }} S/ {{ number_format($m['monto'], 2) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>


// Barras ingresos vs egresos

new Chart(
    document.getElementById('financeBarChart'),
    {
        type:'bar',

        data:{

            labels:[
                'Enero',
                'Febrero',
                'Marzo',
                'Abril',
                'Mayo',
                'Junio'
            ],

            datasets:[

                {
                    label:'Ingresos',

                    data:[
                        5200,
                        6800,
                        5900,
                        7200,
                        8100,
                        8540
                    ],

                    borderWidth:1
                },


                {
                    label:'Egresos',

                    data:[
                        2100,
                        2800,
                        2500,
                        3200,
                        2900,
                        3120
                    ],

                    borderWidth:1
                }

            ]

        },

        options:{

            responsive:true,

            plugins:{
                legend:{
                    position:'bottom'
                }
            }

        }

    }
);




// Grafico torta gastos


new Chart(

document.getElementById('expensePieChart'),

{

type:'doughnut',


data:{


labels:[

'Materia prima',
'Insumos',
'Transporte',
'Administración'

],


datasets:[{

data:[

1200,
650,
420,
850

],

borderWidth:2


}]


},


options:{


responsive:true,


plugins:{

legend:{

position:'bottom'

}

}


}



}

);




// Linea balance


new Chart(

document.getElementById('balanceLineChart'),

{


type:'line',


data:{


labels:[

'Enero',
'Febrero',
'Marzo',
'Abril',
'Mayo',
'Junio'

],


datasets:[{

label:'Balance acumulado',


data:[

3100,
5200,
6800,
9100,
10200,
12500

],


tension:.35,


fill:true,


borderWidth:3


}]


},



options:{


responsive:true,


plugins:{


legend:{


position:'bottom'


}


}



}



}

);

// Flujo de caja

new Chart(

document.getElementById('cashFlowChart'),

{

    type:'bar',

    data:{

        labels:[

            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio'

        ],


        datasets:[

            {

                label:'Flujo positivo',

                data:[

                    3100,
                    4000,
                    3400,
                    4500,
                    5200,
                    5420

                ],


                borderWidth:1

            },


            {

                label:'Flujo negativo',

                data:[

                    1200,
                    1800,
                    1500,
                    2100,
                    1700,
                    2000

                ],


                borderWidth:1

            }


        ]


    },


    options:{

        responsive:true,


        plugins:{

            legend:{

                position:'bottom'

            }


        }


    }


}

);

</script>

@endsection

@push('styles')
<style>




.charts-grid {

    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 1rem;

    margin-top: 1.5rem;

    margin-bottom: 1.5rem;

}


.chart-card {

    height: 360px;

    padding: 1.3rem;

    border-radius: 18px;

}


.chart-card canvas {

    max-height: 270px;

}



.panel-head h2 i {

    color: var(--gold);

    margin-right: .4rem;

}



@media(max-width:900px){

    .charts-grid {

        grid-template-columns: 1fr;

    }

}

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

    .acc-summary {
        margin-top: 1.6rem;
        margin-bottom: 1.4rem;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }

    .acc-card {
        border-radius: 16px;
        padding: 1.2rem 1.3rem;
        display: flex;
        flex-direction: column;
        gap: .3rem;
        border-left: 4px solid transparent;
    }

    .acc-card.income {
        border-left-color: #2E7D4F;
    }

    .acc-card.expense {
        border-left-color: #B3273D;
    }

    .acc-card.balance {
        border-left-color: var(--gold);
    }

    .acc-label {
        font-size: .7rem;
        font-weight: 700;
        color: rgba(74, 34, 51, 0.6);
    }

    .acc-value {
        font-family: 'Playfair Display', serif;
        font-weight: 800;
        font-size: 1.4rem;
        color: var(--maroon-dark);
    }

    .acc-trend {
        font-size: .68rem;
        font-weight: 700;
        color: #2E7D4F;
    }

    .acc-trend.down {
        color: #B3273D;
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

    .acc-table {
        font-size: .78rem;
    }

    .acc-table thead th {
        font-size: .66rem;
        text-transform: uppercase;
        letter-spacing: .4px;
        color: rgba(74, 34, 51, 0.55);
        border-bottom: 2px solid var(--cream-deep);
        padding-bottom: .6rem;
    }

    .acc-table tbody td {
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

    .amount {
        font-weight: 800;
    }

    .amount.ingreso {
        color: #2E7D4F;
    }

    .amount.egreso {
        color: #B3273D;
    }

    @media (max-width: 768px) {
        .acc-summary {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush