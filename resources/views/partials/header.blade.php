<header class="app-header glass-maroon">

    <button class="sidebar-toggle-btn" type="button" id="sidebarToggleBtn" aria-label="Contraer/expandir menú">
        <i class="bi bi-list"></i>
    </button>

    <div class="header-search">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Buscar artesanas, productos, pedidos...">
    </div>

    <div class="header-user dropdown">
        @php
        $userName = auth()->check() ? auth()->user()->name : 'Sra. Carmen Mendoza';
        $userRole = auth()->check() ? (auth()->user()->rol ?? 'Presidenta de Junta Directiva') : 'Presidenta de Junta Directiva';
        $initials = collect(explode(' ', $userName))->map(fn($p) => mb_substr($p, 0, 1))->take(2)->join('');
        @endphp

        <div class="avatar">{{ strtoupper($initials) }}</div>

        <div class="user-info">
            <span class="user-name">{{ $userName }}</span>
            <span class="user-role">{{ $userRole }}</span>
        </div>

        <i class="bi bi-chevron-down"></i>
    </div>

</header>