<header class="app-header glass-maroon">

    <button class="sidebar-toggle-btn" type="button" id="sidebarToggleBtn" aria-label="Contraer/expandir menú">
        <i class="bi bi-list"></i>
    </button>

    <div class="header-search">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Buscar artesanas, productos, pedidos...">
    </div>

    <div class="dropdown user-menu-wrap">
        @php
        $userName = auth()->check() ? auth()->user()->name : 'Sra. Carmen Mendoza';
        $userRole = auth()->check() ? (auth()->user()->rol ?? 'Presidenta de Junta Directiva') : 'Presidenta de Junta Directiva';
        $initials = collect(explode(' ', $userName))->map(fn($p) => mb_substr($p, 0, 1))->take(2)->join('');
        @endphp

        <div class="header-user" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="avatar">{{ strtoupper($initials) }}</div>

            <div class="user-info">
                <span class="user-name">{{ $userName }}</span>
                <span class="user-role">{{ $userRole }}</span>
            </div>

            <i class="bi bi-chevron-down"></i>
        </div>

        <ul class="dropdown-menu dropdown-menu-end user-dropdown-menu">
            <li>
                <a class="dropdown-item" href="{{ url('/perfil') }}">
                    <i class="bi bi-person-circle"></i> Mi Perfil
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ url('/configuracion') }}">
                    <i class="bi bi-gear-fill"></i> Configuración
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <form method="POST" action="{{ url('/logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                    </button>
                </form>
            </li>
        </ul>
    </div>

</header>