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
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
                class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Panel Principal">
                <i class="bi bi-house-door-fill"></i>
                <span class="link-text">PANEL PRINCIPAL</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/modulos-administrativos') }}"
                class="nav-link {{ request()->is('modulos-administrativos*') ? 'active' : '' }}"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Módulos Administrativos">
                <i class="bi bi-grid-fill"></i>
                <span class="link-text">MÓDULOS ADMINISTRATIVOS</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/artesanas') }}"
                class="nav-link {{ request()->is('artesanas*') ? 'active' : '' }}"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Artesanas">
                <i class="bi bi-people-fill"></i>
                <span class="link-text">ARTESANAS</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/produccion') }}"
                class="nav-link {{ request()->is('produccion*') ? 'active' : '' }}"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Producción y Tejido">
                <i class="bi bi-diagram-3-fill"></i>
                <span class="link-text">PRODUCCIÓN Y TEJIDO</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/productos') }}"
                class="nav-link {{ request()->is('productos*') ? 'active' : '' }}"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Productos">
                <i class="bi bi-bag-heart-fill"></i>
                <span class="link-text">PRODUCTOS</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/inventario') }}"
                class="nav-link {{ request()->is('inventario*') ? 'active' : '' }}"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Inventario">
                <i class="bi bi-archive-fill"></i>
                <span class="link-text">INVENTARIO</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/contabilidad') }}"
                class="nav-link {{ request()->is('contabilidad*') ? 'active' : '' }}"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Contabilidad">
                <i class="bi bi-bar-chart-fill"></i>
                <span class="link-text">CONTABILIDAD</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/comunicados') }}"
                class="nav-link {{ request()->is('comunicados*') ? 'active' : '' }}"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Comunicados">
                <i class="bi bi-envelope-fill"></i>
                <span class="link-text">COMUNICADOS</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/archivos') }}"
                class="nav-link {{ request()->is('archivos*') ? 'active' : '' }}"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Archivos">
                <i class="bi bi-folder-fill"></i>
                <span class="link-text">ARCHIVOS</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('/junta') }}"
                class="nav-link {{ request()->is('junta*') ? 'active' : '' }}"
                data-bs-toggle="tooltip" data-bs-placement="right" title="Gestión Junta">
                <i class="bi bi-person-video3"></i>
                <span class="link-text">GESTIÓN JUNTA</span>
            </a>
        </li>
    </ul>

    @include('partials.footer')

</aside>