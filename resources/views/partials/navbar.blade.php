<aside class="app-sidebar glass-maroon" id="appSidebar">

    <div class="sidebar-brand">
        <div class="diamond-motif">
            <span></span><span></span><span></span>
            <span></span><span></span><span></span>
            <span></span><span></span><span></span>
        </div>
        <div class="brand-text">
            <strong>SUMAQ</strong>
            <small>AWAYKUNA</small>
        </div>
    </div>


    <ul class="sidebar-nav">

        {{-- Dashboard --}}
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                title="Panel Principal">

                <i class="bi bi-house-door-fill"></i>
                <span class="link-text">PANEL PRINCIPAL</span>

            </a>
        </li>


        {{-- Módulos Administrativos --}}
        <li class="nav-item">
            <a href="{{ route('modulos.administrativos') }}"
                class="nav-link {{ request()->routeIs('modulos.administrativos') ? 'active' : '' }}"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                title="Módulos Administrativos">

                <i class="bi bi-grid-fill"></i>
                <span class="link-text">MÓDULOS ADMINISTRATIVOS</span>

            </a>
        </li>



        @php
        $productosOpen =
        request()->routeIs('productos') ||
        request()->routeIs('artesanas') ||
        request()->routeIs('produccion');
        @endphp



        {{-- Productos --}}
        <li class="nav-item has-submenu {{ $productosOpen ? 'open' : '' }}">

            <a href="#productosSubmenu"
                class="nav-link submenu-toggle {{ $productosOpen ? 'active' : '' }}"
                data-bs-toggle="collapse"
                role="button"
                aria-expanded="{{ $productosOpen ? 'true' : 'false' }}"
                aria-controls="productosSubmenu"
                title="Productos">

                <i class="bi bi-bag-heart-fill"></i>
                <span class="link-text">PRODUCTOS</span>
                <i class="bi bi-chevron-down submenu-arrow"></i>

            </a>



            <ul class="collapse submenu-nav {{ $productosOpen ? 'show' : '' }}" id="productosSubmenu">



                {{-- Catálogo de Productos --}}
                <li class="nav-item">

                    <a href="{{ route('productos') }}"
                        class="nav-link submenu-link {{ request()->routeIs('productos') ? 'active' : '' }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title="Catálogo de Productos">

                        <i class="bi bi-bag-fill"></i>
                        <span class="link-text">CATÁLOGO PRODUCTOS</span>

                    </a>

                </li>

                {{-- Artesanías --}}
                <li class="nav-item">

                    <a href="{{ route('artesanas') }}"
                        class="nav-link submenu-link {{ request()->routeIs('artesanas') ? 'active' : '' }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title="Artesanías">

                        <i class="bi bi-people-fill"></i>
                        <span class="link-text">ARTESANÍAS</span>

                    </a>

                </li>



                {{-- Producción --}}
                <li class="nav-item">

                    <a href="{{ route('produccion') }}"
                        class="nav-link submenu-link {{ request()->routeIs('produccion') ? 'active' : '' }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title="Producción y Tejido">

                        <i class="bi bi-diagram-3-fill"></i>
                        <span class="link-text">PRODUCCIÓN Y TEJIDO</span>

                    </a>

                </li>


            </ul>

        </li>




        {{-- Inventario --}}
        <li class="nav-item">

            <a href="{{ route('inventario') }}"
                class="nav-link {{ request()->routeIs('inventario') ? 'active' : '' }}"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                title="Inventario">

                <i class="bi bi-archive-fill"></i>
                <span class="link-text">INVENTARIO</span>

            </a>

        </li>



        {{-- Contabilidad --}}
        <li class="nav-item">

            <a href="{{ route('contabilidad') }}"
                class="nav-link {{ request()->routeIs('contabilidad') ? 'active' : '' }}"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                title="Contabilidad">

                <i class="bi bi-bar-chart-fill"></i>
                <span class="link-text">CONTABILIDAD</span>

            </a>

        </li>




        {{-- Comunicados --}}
        <li class="nav-item">

            <a href="{{ route('comunicados') }}"
                class="nav-link {{ request()->routeIs('comunicados') ? 'active' : '' }}"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                title="Comunicados">

                <i class="bi bi-envelope-fill"></i>
                <span class="link-text">COMUNICADOS</span>

            </a>

        </li>




        {{-- Archivos --}}
        <li class="nav-item">

            <a href="{{ route('archivos') }}"
                class="nav-link {{ request()->routeIs('archivos') ? 'active' : '' }}"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                title="Archivos">

                <i class="bi bi-folder-fill"></i>
                <span class="link-text">ARCHIVOS</span>

            </a>

        </li>




        {{-- Gestión Junta --}}
        <li class="nav-item">

            <a href="{{ route('junta') }}"
                class="nav-link {{ request()->routeIs('junta') ? 'active' : '' }}"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                title="Gestión Junta">

                <i class="bi bi-person-video3"></i>
                <span class="link-text">GESTIÓN JUNTA</span>

            </a>

        </li>


    </ul>


    @include('partials.footer')


</aside>