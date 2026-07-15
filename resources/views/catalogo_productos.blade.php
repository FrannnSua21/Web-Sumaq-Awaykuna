@extends('layouts.app')


@section('title','Catálogo Artesanal')



@push('styles')

<style>
    .page-heading {

        margin-bottom: 2rem;

    }



    .page-heading h1 {

        display: flex;
        align-items: center;
        gap: .7rem;

        font-family: 'Playfair Display', serif;

        font-size: 1.9rem;

        font-weight: 900;

        color: var(--maroon-dark);

    }



    .title-bar {

        width: 6px;
        height: 35px;

        background: var(--maroon);

        border-radius: 10px;

    }



    .page-heading p {

        margin-left: 1.4rem;

        color: rgba(74, 34, 51, .65);

    }





    /* TOOLBAR */


    .catalog-toolbar {

        padding: 1.3rem;

        border-radius: 24px;

        margin-bottom: 2rem;

    }



    .catalog-form {

        display: flex;

        gap: 1rem;

        align-items: center;

        flex-wrap: wrap;

    }





    .search-box {

        flex: 1;

        min-width: 260px;

        height: 48px;

        background: white;

        border-radius: 16px;

        display: flex;

        align-items: center;

        padding: 0 1rem;

        gap: .7rem;

        border: 1px solid rgba(110, 30, 54, .15);

    }



    .search-box i {

        color: var(--maroon);

    }



    .search-box input {

        border: none;

        outline: none;

        width: 100%;

        font-size: .85rem;

    }





    .filter-select {

        height: 48px;

        border-radius: 16px;

        border: 1px solid rgba(110, 30, 54, .15);

        padding: 0 1rem;

        font-size: .75rem;

        font-weight: 800;

    }





    .btn-add-product {


        height: 48px;

        padding: 0 1.4rem;

        border: none;

        border-radius: 16px;

        background: var(--maroon);

        color: white;

        font-weight: 900;

        font-size: .75rem;

        display: flex;

        align-items: center;

        gap: .5rem;

    }



    .btn-add-product:hover {

        background: var(--maroon-dark);

    }





    /* GRID (mismo patrón que artesanas: grid directo, sin columnas de Bootstrap,
       para que al ocultar una tarjeta el resto suba y rellene el hueco) */

    .productos-grid {

        display: grid;

        grid-template-columns: repeat(3, 1fr);

        gap: 1.4rem;

    }



    .no-resultados {

        grid-column: 1 / -1;

    }





    /* CARD */


    .product-card {

        border-radius: 22px;

        overflow: hidden;

        transition: .3s;

        position: relative;

    }



    .product-card:hover {

        transform: translateY(-6px);

        box-shadow: 0 15px 35px rgba(110, 30, 54, .18);

    }



    .product-card::after {

        content: "";

        position: absolute;

        width: 130px;

        height: 130px;

        right: -50px;

        top: -50px;

        background: rgba(110, 30, 54, .08);

        border-radius: 50%;

        z-index: 0;

    }





    .image-container {

        width: 100%;

        height: 220px;

        display: flex;

        justify-content: center;

        align-items: center;

        overflow: hidden;

        background: #f8f2e7;

        position: relative;

        z-index: 1;

    }


    .product-image {

        width: 100%;
        height: 100%;

        object-fit: contain;

        background: #f8f2e7;

        transition: .4s;

    }



    .product-card:hover .product-image {

        transform: scale(1.03);

    }





    .product-body {

        padding: 1.5rem;

        position: relative;

        z-index: 1;

    }



    .product-header {

        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 1.1rem;

    }



    .category {

        background: #f3dce3;

        color: var(--maroon-dark);

        padding: .35rem .8rem;

        border-radius: 30px;

        font-size: .65rem;

        font-weight: 900;

    }



    .status {

        padding: .35rem .7rem;

        border-radius: 20px;

        font-size: .60rem;

        font-weight: 900;

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



    .product-body h3 {

        font-family: 'Playfair Display', serif;

        color: var(--maroon-dark);

        font-size: 1.05rem;

        font-weight: 800;

        margin-bottom: .4rem;

    }



    .product-body p {

        font-size: .78rem;

        color: rgba(74, 34, 51, .7);

        margin-bottom: 1rem;

    }



    .price {

        background: #F8F2E7;

        border-radius: 14px;

        padding: .8rem;

        font-size: 1.2rem;

        font-weight: 900;

        color: var(--maroon);

        text-align: center;

    }



    .product-footer {

        margin-top: 1.2rem;

        padding-top: 1rem;

        border-top: 1px solid rgba(110, 30, 54, .12);

        display: flex;

        justify-content: space-between;

    }



    .product-footer small {

        display: block;

        font-size: .62rem;

        color: #888;

        text-transform: uppercase;

    }



    .product-footer strong {

        color: var(--maroon-dark);

        font-size: .9rem;

    }



    .product-actions {

        margin-top: 1rem;

        display: flex;

        gap: .5rem;

    }



    .btn-action {

        flex: 1;

        border: none;

        padding: .6rem;

        border-radius: 12px;

        font-size: .7rem;

        font-weight: 900;

    }



    .btn-edit {

        background: #f3dce3;

        color: var(--maroon-dark);

    }



    .btn-delete {

        background: #ffdede;

        color: #a12626;

    }



    .btn-detail {

        margin-top: .8rem;

        display: flex;

        justify-content: center;

        background: var(--maroon);

        color: white;

        padding: .7rem;

        border-radius: 14px;

        text-decoration: none;

        font-size: .75rem;

        font-weight: 900;

    }



    @media(max-width:991px) {

        .productos-grid {

            grid-template-columns: repeat(2, 1fr);

        }

    }



    @media(max-width:576px) {

        .productos-grid {

            grid-template-columns: 1fr;

        }

    }





    /* MODAL */


    .modal-content {

        border-radius: 25px;

        border: none;

    }



    .modal-header {

        background: var(--maroon);

        color: white;

        border-radius: 25px 25px 0 0;

    }



    .form-control,
    .form-select {

        border-radius: 14px;

        padding: .7rem;

    }

    @media(max-width:576px) {

        .image-container {

            height: 180px;

        }

    }
</style>

@endpush


@section('content')


<div class="page-heading">


    <h1>

        <span class="title-bar"></span>

        Catálogo Artesanal

    </h1>


    <p>
        Gestión completa de productos elaborados por nuestras artesanas.
    </p>


</div>





{{-- TOOLBAR --}}


<div class="catalog-toolbar glass">


    <div class="catalog-form w-100">





        <div class="search-box">


            <i class="bi bi-search"></i>


            <input

                type="text"

                id="buscarProducto"

                placeholder="Buscar producto...">


        </div>







        <select
            id="categoriaFiltro"
            class="filter-select">


            <option value="">
                Todas las categorías
            </option>


            @foreach($categorias as $categoria)

            <option value="{{strtolower($categoria->nombre)}}">

                {{$categoria->nombre}}

            </option>


            @endforeach


        </select>







        <select
            id="estadoFiltro"
            class="filter-select">


            <option value="">
                Todos los estados
            </option>


            <option value="disponible">
                Disponible
            </option>


            <option value="agotado">
                Agotado
            </option>


            <option value="reservado">
                Reservado
            </option>


        </select>




        <button type="button"

            class="btn-add-product"

            data-bs-toggle="modal"

            data-bs-target="#modalNuevoProducto">


            <i class="bi bi-plus-circle-fill"></i>

            Nuevo producto


        </button>


    </div>

</div>


{{-- PRODUCTOS --}}



<div class="productos-grid" id="gridProductos">



    @forelse($productos as $producto)



    <div class="product-card glass"

        data-nombre="{{strtolower($producto->nombre)}}"

        data-codigo="{{strtolower($producto->codigo)}}"

        data-categoria="{{strtolower($producto->categoria->nombre ?? '')}}"

        data-estado="{{strtolower($producto->estado)}}">



        <div class="image-container">



            @if($producto->imagen)

            <img src="{{ $producto->imagen ? asset($producto->imagen) : 'https://via.placeholder.com/500x400' }}" class="product-image">

            @else


            <img src="https://via.placeholder.com/500x400"
                class="product-image">


            @endif



        </div>



        <div class="product-body">



            <div class="product-header">


                <span class="category">

                    <i class="bi bi-tag"></i>

                    {{$producto->categoria->nombre ?? 'Sin categoría'}}

                </span>



                <span class="status {{$producto->estado}}">

                    {{$producto->estado}}

                </span>


            </div>



            <h3>

                {{$producto->nombre}}

            </h3>



            <p>

                {{Str::limit($producto->descripcion,90)}}

            </p>



            <div class="price">

                S/ {{number_format($producto->precio_venta,2)}}

            </div>



            <div class="product-footer">


                <div>

                    <small>
                        Stock
                    </small>


                    <strong>

                        {{$producto->stock}} unid.

                    </strong>


                </div>



                <div>

                    <small>
                        Estado
                    </small>


                    <strong>

                        {{ucfirst($producto->estado)}}

                    </strong>


                </div>


            </div>



            <div class="product-actions">



                <button

                    class="btn-action btn-edit"

                    data-bs-toggle="modal"

                    data-bs-target="#modalEditarProducto"


                    data-id="{{$producto->id}}"

                    data-codigo="{{$producto->codigo}}"

                    data-nombre="{{$producto->nombre}}"

                    data-descripcion="{{$producto->descripcion}}"

                    data-categoria="{{$producto->categoria_id}}"

                    data-disenio="{{$producto->disenio_id}}"

                    data-compra="{{$producto->precio_compra}}"

                    data-venta="{{$producto->precio_venta}}"

                    data-stock="{{$producto->stock}}"

                    data-minimo="{{$producto->stock_minimo}}"

                    data-imagen="{{$producto->imagen}}"

                    data-estado="{{$producto->estado}}">


                    <i class="bi bi-pencil-fill"></i>

                    Editar


                </button>



                <form method="POST"

                    action="{{route('productos.delete',$producto->id)}}">


                    @csrf

                    @method('DELETE')


                    <button

                        class="btn-action btn-delete"

                        onclick="return confirm('¿Eliminar producto?')">


                        <i class="bi bi-trash-fill"></i>

                        Eliminar


                    </button>


                </form>


            </div>



            <a href="{{route('productos.detalle',$producto->id)}}"

                class="btn-detail">


                <i class="bi bi-eye-fill"></i>

                Ver detalle


            </a>


        </div>


    </div>



    @empty


    <div class="no-resultados glass p-5 text-center">


        <h4>

            No existen productos registrados

        </h4>


    </div>


    @endforelse



</div>



<div id="sinCoincidencias" class="no-resultados glass p-5 text-center" style="display:none;">

    <h4>
        No se encontraron productos con esos criterios
    </h4>

</div>







{{-- =========================
MODAL NUEVO PRODUCTO
========================= --}}





<div class="modal fade"

    id="modalNuevoProducto">


    <div class="modal-dialog modal-lg">


        <div class="modal-content">



            <div class="modal-header">


                <h5>

                    <i class="bi bi-plus-circle"></i>

                    Nuevo Producto

                </h5>


                <button class="btn-close"

                    data-bs-dismiss="modal"></button>


            </div>






            <form method="POST"

                action="{{route('productos.store')}}"

                enctype="multipart/form-data">


                @csrf



                <div class="modal-body">



                    <div class="row g-3">



                        <div class="col-md-6">


                            <label>Código</label>


                            <input

                                class="form-control"

                                name="codigo"

                                required>


                        </div>





                        <div class="col-md-6">


                            <label>Nombre</label>


                            <input

                                class="form-control"

                                name="nombre"

                                required>


                        </div>






                        <div class="col-md-6">


                            <label>Categoría *</label>


                            <select

                                class="form-select"

                                name="categoria_id"

                                required>



                                <option value="">

                                    Seleccione

                                </option>


                                @foreach($categorias as $categoria)


                                <option value="{{$categoria->id}}">

                                    {{$categoria->nombre}}

                                </option>


                                @endforeach


                            </select>


                        </div>







                        <div class="col-md-6">


                            <label>Diseño</label>


                            <select

                                class="form-select"

                                name="disenio_id">


                                <option value="">

                                    Sin diseño

                                </option>



                                @foreach($disenios as $disenio)


                                <option value="{{$disenio->id}}">

                                    {{$disenio->nombre}}

                                </option>


                                @endforeach


                            </select>


                        </div>







                        <div class="col-md-6">

                            <label>Precio venta</label>


                            <input

                                type="number"

                                step="0.01"

                                class="form-control"

                                name="precio_venta" required>

                        </div>







                        <div class="col-md-6">


                            <label>Stock</label>


                            <input

                                type="number"

                                class="form-control"

                                name="stock">


                        </div>


                        <div class="col-md-6">

                            <label>Estado</label>

                            <select
                                class="form-select"
                                name="estado"
                                required>

                                <option value="disponible">
                                    Disponible
                                </option>

                                <option value="agotado">
                                    Agotado
                                </option>

                                <option value="reservado">
                                    Reservado
                                </option>

                            </select>

                        </div>




                        <div class="col-12">


                            <label>Descripción</label>


                            <textarea

                                class="form-control"

                                name="descripcion"></textarea>


                        </div>







                        <div class="col-12">


                            <label>Foto del producto</label>


                            <input

                                type="file"

                                accept="image/*"

                                class="form-control"

                                name="imagen">


                            <small class="text-muted">

                                Puedes tomar una foto desde el celular o elegir un archivo desde la laptop. Se guarda en el servidor, no hace falta pegar una URL.

                            </small>


                        </div>



                    </div>


                </div>







                <div class="modal-footer">


                    <button

                        class="btn btn-secondary"

                        data-bs-dismiss="modal">


                        Cancelar


                    </button>


                    <button
                        type="submit"
                        class="btn btn-danger">

                        Guardar producto

                    </button>


                </div>



            </form>




        </div>

    </div>

</div>

{{-- =========================
MODAL EDITAR PRODUCTO
========================= --}}



<div class="modal fade"

    id="modalEditarProducto">


    <div class="modal-dialog modal-lg">


        <div class="modal-content">



            <div class="modal-header">


                <h5>

                    <i class="bi bi-pencil-square"></i>

                    Editar Producto

                </h5>


                <button

                    class="btn-close"

                    data-bs-dismiss="modal">

                </button>


            </div>







            <form method="POST"

                id="formEditarProducto"

                enctype="multipart/form-data">


                @csrf

                @method('PUT')




                <div class="modal-body">



                    <div class="row g-3">





                        <div class="col-md-6">


                            <label>Código</label>


                            <input

                                id="editCodigo"

                                class="form-control"

                                name="codigo"

                                readonly

                                style="background:#eee;">


                            <small class="text-muted">

                                El código no se puede modificar

                            </small>


                        </div>







                        <div class="col-md-6">


                            <label>Nombre</label>


                            <input

                                id="editNombre"

                                class="form-control"

                                name="nombre">


                        </div>







                        <div class="col-md-6">


                            <label>Categoría *</label>


                            <select

                                id="editCategoria"

                                class="form-select"

                                name="categoria_id"

                                required>


                                @foreach($categorias as $categoria)


                                <option value="{{$categoria->id}}">

                                    {{$categoria->nombre}}

                                </option>


                                @endforeach


                            </select>


                        </div>







                        <div class="col-md-6">


                            <label>Diseño</label>


                            <select

                                id="editDisenio"

                                class="form-select"

                                name="disenio_id">


                                <option value="">

                                    Sin diseño

                                </option>


                                @foreach($disenios as $disenio)


                                <option value="{{$disenio->id}}">

                                    {{$disenio->nombre}}

                                </option>


                                @endforeach


                            </select>


                        </div>







                        <div class="col-md-6">


                            <label>Precio compra</label>


                            <input

                                id="editCompra"

                                type="number"

                                step="0.01"

                                class="form-control"

                                name="precio_compra">


                        </div>







                        <div class="col-md-6">


                            <label>Precio venta</label>


                            <input

                                id="editVenta"

                                type="number"

                                step="0.01"

                                class="form-control"

                                name="precio_venta" required>


                        </div>







                        <div class="col-md-6">


                            <label>Stock</label>


                            <input

                                id="editStock"

                                type="number"

                                class="form-control"

                                name="stock">


                        </div>







                        <div class="col-md-6">


                            <label>Stock mínimo</label>


                            <input

                                id="editMinimo"

                                type="number"

                                class="form-control"

                                name="stock_minimo">


                        </div>







                        <div class="col-md-6">


                            <label>Estado</label>


                            <select

                                id="editEstado"

                                class="form-select"

                                name="estado">


                                <option value="disponible">

                                    Disponible

                                </option>


                                <option value="agotado">

                                    Agotado

                                </option>


                                <option value="reservado">

                                    Reservado

                                </option>


                            </select>


                        </div>








                        <div class="col-md-6">


                            <label>Foto del producto</label>


                            <input

                                id="editImagen"

                                type="file"

                                accept="image/*"

                                class="form-control"

                                name="imagen">


                            <small class="text-muted">

                                Sube una foto solo si quieres reemplazar la actual

                            </small>


                        </div>



                        <div class="col-md-6 d-flex align-items-end">
                            <img
                                id="editImagenPreview"
                                src=""
                                alt="Imagen actual"
                                style="max-height:90px;border-radius:12px;display:none;">
                        </div>








                        <div class="col-12">


                            <label>Descripción</label>


                            <textarea

                                id="editDescripcion"

                                class="form-control"

                                name="descripcion"></textarea>


                        </div>





                    </div>



                </div>






                <div class="modal-footer">


                    <button

                        type="button"

                        class="btn btn-secondary"

                        data-bs-dismiss="modal">


                        Cancelar


                    </button>



                    <button

                        class="btn btn-danger">


                        Actualizar


                    </button>



                </div>






            </form>





        </div>


    </div>


</div>










{{-- =========================
JAVASCRIPT
========================= --}}



<script>
    document.addEventListener(
        "DOMContentLoaded",
        () => {


            // Rutas base para construir URLs dinámicas en JS
            const storageBase = "{{ url('/') }}/";

            const productosBase =
                "{{ url('/productos') }}";



            // ==========================
            // RELLENAR MODAL EDITAR
            // ==========================


            document
                .querySelectorAll('.btn-edit')
                .forEach(boton => {

                    boton.addEventListener('click', function() {


                        document.getElementById('editCodigo').value =
                            this.dataset.codigo || '';

                        document.getElementById('editNombre').value =
                            this.dataset.nombre || '';

                        document.getElementById('editDescripcion').value =
                            this.dataset.descripcion || '';

                        document.getElementById('editCategoria').value =
                            this.dataset.categoria || '';

                        document.getElementById('editDisenio').value =
                            this.dataset.disenio || '';

                        document.getElementById('editCompra').value =
                            this.dataset.compra || '';

                        document.getElementById('editVenta').value =
                            this.dataset.venta || '';

                        document.getElementById('editStock').value =
                            this.dataset.stock || '';

                        document.getElementById('editMinimo').value =
                            this.dataset.minimo || '';

                        document.getElementById('editEstado').value =
                            this.dataset.estado || '';


                        // Limpiar el input de archivo (no se puede precargar por seguridad del navegador)
                        let inputImagen =
                            document.getElementById('editImagen');

                        if (inputImagen) {
                            inputImagen.value = '';
                        }


                        // Mostrar la imagen actual como vista previa
                        let preview =
                            document.getElementById('editImagenPreview');

                        if (this.dataset.imagen) {

                            preview.src =
                                storageBase + this.dataset.imagen;

                            preview.style.display = '';

                        } else {

                            preview.removeAttribute('src');

                            preview.style.display = 'none';

                        }


                        // Armar la URL de actualización con el id del producto
                        document.getElementById('formEditarProducto').action =
                            productosBase + '/' + this.dataset.id;

                    });

                });



            let buscar =
                document.getElementById(
                    "buscarProducto"
                );



            let categoria =
                document.getElementById(
                    "categoriaFiltro"
                );



            let estado =
                document.getElementById(
                    "estadoFiltro"
                );



            function filtrarProductos() {


                let texto =
                    buscar.value.toLowerCase();



                let cat =
                    categoria.value;



                let est =
                    estado.value;



                let visibles = 0;



                document
                    .querySelectorAll('.product-card')
                    .forEach(card => {



                        let nombre =
                            card.dataset.nombre;



                        let codigo =
                            card.dataset.codigo;



                        let categoriaProducto =
                            card.dataset.categoria;



                        let estadoProducto =
                            card.dataset.estado;




                        let coincideTexto =
                            nombre.includes(texto) ||
                            codigo.includes(texto);



                        let coincideCategoria =
                            cat == "" ||
                            categoriaProducto == cat;



                        let coincideEstado =
                            est == "" ||
                            estadoProducto == est;




                        if (
                            coincideTexto &&
                            coincideCategoria &&
                            coincideEstado
                        )

                        {

                            card.style.display = "";

                            visibles++;


                        } else

                        {

                            card.style.display = "none";

                        }



                    });



                let mensajeVacio =
                    document.getElementById(
                        "sinCoincidencias"
                    );



                if (mensajeVacio) {

                    mensajeVacio.style.display =
                        visibles === 0 ? "" : "none";

                }



            }




            buscar.addEventListener(
                "keyup",
                filtrarProductos
            );



            categoria.addEventListener(
                "change",
                filtrarProductos
            );



            estado.addEventListener(
                "change",
                filtrarProductos
            );



        });
</script>




@endsection