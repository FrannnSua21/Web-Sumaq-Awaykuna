<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Panel Principal') | Sumaq Awaykuna</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --cream: #F8F2E7;
            --cream-deep: #F1E7D5;
            --maroon: #6E1E36;
            --maroon-dark: #551327;
            --gold: #C7952F;
            --pink: #E7B7C8;
            --pink-soft: #F0D3DE;
            --ink: #4A2233;
            --sidebar-w: 260px;
            --sidebar-w-mini: 84px;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: var(--cream);
            color: var(--ink);
            margin: 0;
            overflow-x: hidden;
        }

        /* ---------- LIQUID GLASS (nítido, sin difuminar) ---------- */
        .glass-maroon {
            position: relative;
            background: linear-gradient(160deg, rgba(110, 30, 54, 0.98), rgba(85, 19, 39, 0.99));
            backdrop-filter: saturate(140%);
            -webkit-backdrop-filter: saturate(140%);
            border: 1px solid rgba(255, 255, 255, 0.22);
            box-shadow:
                0 10px 30px rgba(85, 19, 39, 0.35),
                inset 0 1px 0 rgba(255, 255, 255, 0.35),
                inset 0 -1px 0 rgba(0, 0, 0, 0.15);
        }

        .glass {
            position: relative;
            background: rgba(255, 253, 248, 0.97);
            backdrop-filter: saturate(140%);
            -webkit-backdrop-filter: saturate(140%);
            border: 1px solid rgba(255, 255, 255, 0.9);
            box-shadow:
                0 8px 28px rgba(110, 30, 54, 0.14),
                inset 0 1px 0 rgba(255, 255, 255, 0.9),
                inset 0 -1px 0 rgba(110, 30, 54, 0.06);
        }

        /* brillo/reflejo especular tipo vidrio, nítido y sin desenfocar el fondo */
        .glass::before,
        .glass-maroon::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: inherit;
            background: linear-gradient(120deg,
                    rgba(255, 255, 255, 0.55) 0%,
                    rgba(255, 255, 255, 0) 18%,
                    rgba(255, 255, 255, 0) 82%,
                    rgba(255, 255, 255, 0.18) 100%);
            pointer-events: none;
            z-index: 0;
            mix-blend-mode: overlay;
        }

        /* línea de luz superior, como el filo de un cristal */
        .glass::after,
        .glass-maroon::after {
            content: "";
            position: absolute;
            top: 0;
            left: 8%;
            right: 8%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.9), transparent);
            pointer-events: none;
            z-index: 1;
        }

        .glass>*,
        .glass-maroon>* {
            position: relative;
            z-index: 1;
        }

        /* ---------- App shell ---------- */
        .app-shell {
            display: flex;
            min-height: 100vh;
        }

        .app-main {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .app-content {
            flex: 1;
            padding: 1.75rem 2rem 2.5rem;
        }

        /* ---------- Sidebar (colapsable, no offcanvas) ---------- */
        .app-sidebar {
            width: var(--sidebar-w);
            min-width: var(--sidebar-w);
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            transition: width .25s ease, min-width .25s ease;
            overflow: hidden;
        }

        .app-sidebar.collapsed {
            width: var(--sidebar-w-mini);
            min-width: var(--sidebar-w-mini);
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: 1.5rem 1.35rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            white-space: nowrap;
        }

        .diamond-motif {
            width: 30px;
            height: 30px;
            min-width: 30px;
            transform: rotate(45deg);
            background: rgba(255, 255, 255, 0.9);
            border-radius: 5px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
            padding: 3px;
        }

        .diamond-motif span {
            background: var(--gold);
            border-radius: 1px;
        }

        .diamond-motif span:nth-child(2n) {
            background: var(--maroon);
        }

        .brand-text {
            line-height: 1.05;
        }

        .brand-text strong {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            color: #fff;
            font-size: 1.15rem;
            display: block;
        }

        .brand-text small {
            color: var(--pink-soft);
            font-size: .68rem;
            letter-spacing: 2px;
            font-weight: 700;
        }

        .app-sidebar.collapsed .brand-text {
            display: none;
        }

        .app-sidebar.collapsed .sidebar-brand {
            justify-content: center;
            padding: 1.5rem .75rem;
        }

        .sidebar-nav {
            flex: 1;
            padding: 1rem .75rem;
            overflow-y: auto;
            overflow-x: hidden;
            list-style: none;
            margin: 0;
        }

        .sidebar-nav .nav-item+.nav-item {
            margin-top: .2rem;
        }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            gap: .75rem;
            color: rgba(255, 255, 255, 0.78);
            font-weight: 700;
            font-size: .82rem;
            letter-spacing: .4px;
            padding: .75rem .9rem;
            border-radius: 10px;
            border-left: 3px solid transparent;
            white-space: nowrap;
            transition: background .15s ease, color .15s ease;
        }

        .sidebar-nav .nav-link i {
            font-size: 1.05rem;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar-nav .nav-link:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .sidebar-nav .nav-link.active {
            background: rgba(255, 255, 255, 0.14);
            color: #fff;
            border-left-color: var(--gold);
        }

        .app-sidebar.collapsed .sidebar-nav .nav-link {
            justify-content: center;
            padding: .75rem;
        }

        .app-sidebar.collapsed .sidebar-nav .link-text {
            display: none;
        }

        .sidebar-footer {
            padding: 1rem 1.35rem 1.35rem;
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            color: rgba(255, 255, 255, 0.55);
            font-size: .72rem;
            line-height: 1.4;
            text-align: center;
        }

        .footer-mini {
            display: none;
            font-size: 1.1rem;
        }

        .app-sidebar.collapsed .footer-full {
            display: none;
        }

        .app-sidebar.collapsed .footer-mini {
            display: block;
        }

        /* ---------- Header ---------- */
        .app-header {
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1.1rem;
            position: sticky;
            top: 0;
            z-index: 10;
            border-radius: 0 0 24px 24px;
        }

        .sidebar-toggle-btn {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.35);
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .sidebar-toggle-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .header-search {
            position: relative;
            flex: 1;
            max-width: 460px;
        }

        .header-search i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--maroon);
            opacity: .6;
        }

        .header-search input {
            width: 100%;
            border: none;
            border-radius: 30px;
            padding: .65rem 1rem .65rem 2.6rem;
            font-size: .88rem;
            background: rgba(255, 255, 255, 0.92);
            color: var(--ink);
        }

        .header-search input::placeholder {
            color: rgba(74, 34, 51, 0.55);
        }

        .header-search input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(199, 149, 47, 0.35);
        }

        .header-user {
            display: flex;
            align-items: center;
            gap: .75rem;
            cursor: pointer;
            color: #fff;
            margin-left: auto;
        }

        .header-user .avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--pink-soft);
            color: var(--maroon-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: .9rem;
            font-family: 'Playfair Display', serif;
        }

        .header-user .user-info {
            line-height: 1.2;
        }

        .header-user .user-name {
            font-weight: 800;
            font-size: .88rem;
            display: block;
        }

        .header-user .user-role {
            font-size: .72rem;
            color: rgba(255, 255, 255, 0.75);
        }

        .header-user .bi-chevron-down {
            color: rgba(255, 255, 255, 0.8);
            font-size: .8rem;
        }

        @media (max-width: 767px) {
            .header-user .user-info {
                display: none;
            }
        }

        @media (max-width: 991px) {
            .app-sidebar {
                width: var(--sidebar-w-mini);
                min-width: var(--sidebar-w-mini);
            }

            .app-sidebar .brand-text,
            .app-sidebar .link-text,
            .app-sidebar .footer-full {
                display: none;
            }

            .app-sidebar .footer-mini {
                display: block;
            }

            .app-sidebar .sidebar-nav .nav-link,
            .app-sidebar .sidebar-brand {
                justify-content: center;
                padding: .75rem;
            }

            .app-sidebar.collapsed {
                width: var(--sidebar-w);
                min-width: var(--sidebar-w);
            }

            .app-sidebar.collapsed .brand-text,
            .app-sidebar.collapsed .link-text,
            .app-sidebar.collapsed .footer-full {
                display: block;
            }

            .app-sidebar.collapsed .footer-mini {
                display: none;
            }

            .app-sidebar.collapsed .sidebar-nav .nav-link,
            .app-sidebar.collapsed .sidebar-brand {
                justify-content: flex-start;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <div class="app-shell">

        @include('partials.navbar')

        <div class="app-main">

            @include('partials.header')

            <main class="app-content">
                @yield('content')
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
        (function() {
            const sidebar = document.getElementById('appSidebar');
            const toggleBtn = document.getElementById('sidebarToggleBtn');
            const STORAGE_KEY = 'sumaq_sidebar_collapsed';

            if (localStorage.getItem(STORAGE_KEY) === '1') {
                sidebar.classList.add('collapsed');
            }

            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                localStorage.setItem(STORAGE_KEY, sidebar.classList.contains('collapsed') ? '1' : '0');
            });

            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
                new bootstrap.Tooltip(el);
            });
        })();
    </script>

    @stack('scripts')
</body>

</html>