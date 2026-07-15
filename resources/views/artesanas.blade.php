@extends('layouts.app')

@section('title', 'Artesanías')


@push('styles')

<style>
    /* TITULO */

    .page-heading h1 {

        display: flex;
        align-items: center;
        gap: .7rem;

        font-family: 'Playfair Display', serif;

        font-weight: 800;

        color: var(--maroon-dark);

        font-size: 1.6rem;

        margin: 0;

    }


    .title-bar {

        width: 5px;
        height: 28px;

        background: var(--maroon);

        border-radius: 5px;

    }



    .page-heading p {

        color: rgba(74, 34, 51, .65);

        font-size: .85rem;

        margin: .4rem 0 0 1.2rem;

    }




    /* TOOLBAR */

    .artesanas-toolbar {

        margin-top: 1.6rem;

        margin-bottom: 1.6rem;

        border-radius: 18px;

        padding: 1rem 1.2rem;

        display: flex;

        align-items: center;

        gap: .8rem;

        flex-wrap: wrap;

    }



    .catalog-search {

        flex: 1;

        max-width: 320px;

    }



    .catalog-search input {

        background: var(--cream-deep);

    }



    .filter-select {

        border: 1px solid rgba(110, 30, 54, .15);

        border-radius: 12px;

        padding: .6rem .8rem;

        font-size: .75rem;

        font-weight: 700;

        background: white;

        color: var(--ink);

    }



    .btn-add {


        margin-left: auto;

        background: var(--maroon);

        color: white;

        border: none;

        padding: .65rem 1.2rem;

        border-radius: 12px;

        font-size: .75rem;

        font-weight: 800;

        display: flex;

        align-items: center;

        gap: .4rem;

        transition: .2s;

    }



    .btn-add:hover {

        background: var(--maroon-dark);

        transform: translateY(-2px);

    }





    /* GRID */

    .artesanas-grid {

        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 1.4rem;

    }





    /* CARD */


    .artesana-card {

        border-radius: 22px;

        padding: 1.5rem;

        transition: .3s;

        position: relative;

        overflow: hidden;

    }



    .artesana-card:hover {

        transform: translateY(-6px);

        box-shadow: 0 15px 35px rgba(110, 30, 54, .18);

    }




    .artesana-card::after {


        content: "";

        position: absolute;

        width: 130px;

        height: 130px;

        right: -50px;

        top: -50px;

        background: rgba(110, 30, 54, .08);

        border-radius: 50%;


    }




    /* HEADER CARD */


    .artesana-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 1.1rem;

    }





    /* FOTO */


    .artesana-avatar {

        width: 80px;

        height: 80px;

        border-radius: 50%;

        overflow: hidden;

        background: #ead1d8;

        color: var(--maroon-dark);

        display: flex;

        justify-content: center;

        align-items: center;

        font-family: 'Playfair Display', serif;

        font-weight: 900;

        font-size: 1.5rem;

        border: 3px solid white;

        box-shadow: 0 5px 15px rgba(0, 0, 0, .1);

    }



    .artesana-avatar img {

        width: 100%;

        height: 100%;

        object-fit: cover;

    }





    /* ESTADO */

    .artesana-status span {

        background: rgba(46, 125, 79, .12);

        color: #2E7D4F;

        padding: .35rem .75rem;

        border-radius: 30px;

        font-size: .65rem;

        font-weight: 800;

    }





    /* INFORMACION */


    .artesana-info h3 {

        font-family: 'Playfair Display', serif;

        color: var(--maroon-dark);

        font-size: 1.05rem;

        font-weight: 800;

        margin-bottom: .4rem;

    }




    .ubicacion {

        color: var(--gold);

        font-size: .75rem;

        font-weight: 700;

        margin-bottom: 1rem;

    }




    .especialidad {


        background: #F8F2E7;

        border-radius: 14px;

        padding: .8rem;

        font-size: .78rem;

        font-weight: 700;

        color: var(--ink);

        display: flex;

        gap: .5rem;

        align-items: center;

    }



    .especialidad i {

        color: var(--maroon);

    }





    /* FOOTER */


    .artesana-footer {

        margin-top: 1.2rem;

        padding-top: 1rem;

        border-top: 1px solid rgba(110, 30, 54, .12);

        display: flex;

        justify-content: space-between;

    }



    .artesana-footer small {

        display: block;

        font-size: .62rem;

        color: #888;

        text-transform: uppercase;

    }



    .artesana-footer strong {

        color: var(--maroon-dark);

        font-size: .9rem;

    }






    /* MODAL */


    .modal-content {

        border-radius: 22px;

        border: none;

        background: #F8F2E7;

    }



    .modal-header {

        background: var(--maroon);

        color: white;

        border-radius: 22px 22px 0 0;

    }



    .persona-item {

        background: white;

        border-radius: 15px;

        padding: 1rem;

        margin-bottom: .8rem;

        transition: .2s;

    }



    .persona-item:hover {

        transform: translateY(-3px);

        box-shadow: 0 8px 20px rgba(110, 30, 54, .12);

    }





    @media(max-width:991px) {

        .artesanas-grid {

            grid-template-columns: repeat(2, 1fr);

        }

    }



    @media(max-width:576px) {

        .artesanas-grid {

            grid-template-columns: 1fr;

        }


        .btn-add {

            width: 100%;

            justify-content: center;

            margin-left: 0;

        }

    }
</style>

@endpush





@section('content')



<div class="page-heading">


    <h1>

        <span class="title-bar"></span>

        Artesanías

    </h1>


    <p>
        Directorio de artesanas tejedoras y sus especialidades.
    </p>


</div>





<div class="artesanas-toolbar glass">



    <div class="header-search catalog-search">


        <i class="bi bi-search"></i>


        <input
            id="buscarArtesana"
            type="text"
            placeholder="Buscar artesana...">


    </div>





    <select
        id="filtroComunidad"
        class="filter-select">


        <option value="">
            Todas las comunidades
        </option>



        @foreach($artesanas->pluck('persona.ubicacion.comunidad')->unique() as $comunidad)


        @if($comunidad)

        <option value="{{ strtolower($comunidad) }}">

            {{ $comunidad }}

        </option>

        @endif


        @endforeach



    </select>





    <button
        class="btn-add"
        data-bs-toggle="modal"
        data-bs-target="#modalArtesana">


        <i class="bi bi-person-plus-fill"></i>

        Nueva socia


    </button>



</div>





<div class="artesanas-grid">



    @foreach($artesanas as $artesana)



    <div class="artesana-card glass"

        data-nombre="{{ strtolower(
$artesana->persona->nombres.' '.
$artesana->persona->apellidos
) }}"

        data-comunidad="{{ strtolower(
$artesana->persona->ubicacion->comunidad ?? ''
) }}">



        <div class="artesana-header">



            <div class="artesana-avatar">


                @if($artesana->persona->foto)


                <img src="{{ asset($artesana->persona->foto) }}">


                @else


                {{ strtoupper(
substr($artesana->persona->nombres,0,1).
substr($artesana->persona->apellidos,0,1)
) }}


                @endif


            </div>



            <div class="artesana-status">


                <span>

                    <i class="bi bi-check-circle-fill"></i>

                    {{ ucfirst($artesana->estado) }}


                </span>


            </div>



        </div>

        <div class="artesana-info">


            <h3>

                {{ $artesana->persona->nombres }}

                {{ $artesana->persona->apellidos }}

            </h3>




            <div class="ubicacion">

                <i class="bi bi-geo-alt-fill"></i>


                @if($artesana->persona->ubicacion)

                {{ $artesana->persona->ubicacion->comunidad }}

                @else

                Sin comunidad registrada

                @endif


            </div>





            <div class="especialidad">


                <i class="bi bi-stars"></i>


                {{ $artesana->especialidad }}


            </div>






            <div class="artesana-footer">



                <div>

                    <small>
                        Experiencia
                    </small>


                    <strong>

                        {{ $artesana->experiencia }} años

                    </strong>


                </div>



                <div>

                    <small>
                        Estado
                    </small>


                    <strong>

                        {{ ucfirst($artesana->estado) }}

                    </strong>


                </div>



            </div>





        </div>


    </div>



    @endforeach



</div>





{{-- ===========================
     MODAL NUEVA ARTESANA
=========================== --}}



<div class="modal fade" id="modalArtesana">


    <div class="modal-dialog modal-lg modal-dialog-centered">


        <div class="modal-content">



            <div class="modal-header">


                <h5 class="modal-title">

                    <i class="bi bi-person-plus-fill"></i>

                    Registrar nueva artesana

                </h5>


                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">

                </button>


            </div>





            <div class="modal-body">



                <p class="text-muted">

                    Seleccione una persona registrada para convertirla en artesana.

                </p>





                <div class="header-search mb-3">


                    <i class="bi bi-search"></i>


                    <input
                        id="buscarPersona"
                        type="text"
                        class="form-control"
                        placeholder="Buscar persona por nombre o DNI">


                </div>







                <div id="listaPersonas">



                    @foreach($personasDisponibles as $persona)



                    <div class="persona-item">



                        <div class="d-flex justify-content-between align-items-center">


                            <div>


                                <h6 class="mb-1">


                                    {{ $persona->nombres }}

                                    {{ $persona->apellidos }}


                                </h6>



                                <small>


                                    <i class="bi bi-card-text"></i>


                                    DNI:

                                    {{ $persona->dni ?? 'Sin DNI' }}



                                </small>



                                <br>



                                <small>


                                    <i class="bi bi-telephone"></i>


                                    {{ $persona->telefono ?? 'Sin teléfono' }}


                                </small>



                            </div>



                        </div>





                        <form
                            action="{{ route('artesanas.store') }}"
                            method="POST"
                            class="mt-3">


                            @csrf



                            <input
                                type="hidden"
                                name="persona_id"
                                value="{{ $persona->id }}">





                            <div class="row g-2">


                                <div class="col-md-6">


                                    <input
                                        type="text"
                                        name="especialidad"
                                        class="form-control"
                                        placeholder="Especialidad artesanal"
                                        required>


                                </div>





                                <div class="col-md-6">


                                    <input
                                        type="number"
                                        name="experiencia"
                                        class="form-control"
                                        placeholder="Años de experiencia"
                                        required>


                                </div>


                            </div>






                            <button
                                class="btn btn-dark mt-3 w-100"
                                style="background:#6E1E36;border:none;">


                                <i class="bi bi-check-circle-fill"></i>

                                Registrar como artesana


                            </button>




                        </form>




                    </div>




                    @endforeach




                    @if(count($personasDisponibles)==0)


                    <div class="alert alert-info">


                        Todas las personas ya están registradas como artesanas.


                    </div>


                    @endif




                </div>





            </div>


        </div>


    </div>


</div>









{{-- ===========================
        JAVASCRIPT
=========================== --}}


<script>
    // BUSCAR ARTESANAS


    document
        .getElementById('buscarArtesana')
        .addEventListener('keyup', function() {


            let texto = this.value.toLowerCase();



            document
                .querySelectorAll('.artesana-card')
                .forEach(card => {


                    let nombre =
                        card.dataset.nombre;



                    if (nombre.includes(texto))

                    {

                        card.style.display = "";

                    } else

                    {

                        card.style.display = "none";

                    }



                });


        });






    // FILTRO COMUNIDAD


    document
        .getElementById('filtroComunidad')
        .addEventListener('change', function() {


            let comunidad = this.value;



            document
                .querySelectorAll('.artesana-card')
                .forEach(card => {



                    let cardComunidad =
                        card.dataset.comunidad;



                    if (
                        comunidad == "" ||
                        cardComunidad == comunidad
                    )

                    {

                        card.style.display = "";

                    } else

                    {

                        card.style.display = "none";

                    }



                });


        });







    // BUSCAR PERSONAS MODAL


    document
        .getElementById('buscarPersona')
        .addEventListener('keyup', function() {


            let texto = this.value.toLowerCase();



            document
                .querySelectorAll('.persona-item')
                .forEach(persona => {


                    let contenido =
                        persona.innerText.toLowerCase();



                    if (contenido.includes(texto))

                    {

                        persona.style.display = "";

                    } else

                    {

                        persona.style.display = "none";

                    }



                });


        });
</script>





@endsection