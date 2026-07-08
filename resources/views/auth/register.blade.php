<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Cuenta | Sumaq Awaykuna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
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
            --sage: #93A480;
            --lavender: #B79FD1;
            --denim: #7C9BC0;
            --blush: #E7B9AC;
            --ink: #4A2233;
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
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }

        /* ---------- Decorative backdrop ---------- */
        .backdrop {
            position: fixed;
            inset: 0;
            z-index: 0;
            overflow: hidden;
        }

        .blob {
            position: absolute;
            border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
            filter: saturate(1.05);
        }

        .blob-tulips {
            top: -8%;
            left: -10%;
            width: 46vw;
            height: 46vw;
            max-width: 560px;
            max-height: 560px;
            background: linear-gradient(135deg, #E88FAE, #D8688F 70%);
        }

        .blob-knit {
            top: -12%;
            right: -12%;
            width: 42vw;
            height: 42vw;
            max-width: 520px;
            max-height: 520px;
            background: linear-gradient(135deg, var(--lavender), #9A7FBE 75%);
        }

        .blob-yarn {
            bottom: -14%;
            left: -8%;
            width: 40vw;
            height: 40vw;
            max-width: 500px;
            max-height: 500px;
            background: linear-gradient(135deg, var(--denim), var(--sage) 80%);
        }

        .blob-weave {
            bottom: -12%;
            right: -10%;
            width: 44vw;
            height: 44vw;
            max-width: 540px;
            max-height: 540px;
            background: linear-gradient(135deg, var(--blush), var(--pink) 80%);
        }

        .sparkle {
            position: absolute;
            color: var(--pink);
            opacity: .55;
        }

        .leaf-svg {
            position: absolute;
            opacity: .35;
        }

        /* ---------- Liquid glass card ---------- */
        .glass-wrap {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 520px;
            padding: 1.25rem;
        }

        .glass-card {
            position: relative;
            background: rgba(255, 253, 248, 0.55);
            backdrop-filter: blur(22px) saturate(160%);
            -webkit-backdrop-filter: blur(22px) saturate(160%);
            border-radius: 28px;
            border: 1px solid rgba(255, 255, 255, 0.65);
            box-shadow:
                0 8px 32px rgba(110, 30, 54, 0.18),
                inset 0 1px 1px rgba(255, 255, 255, 0.8),
                inset 0 -1px 12px rgba(255, 255, 255, 0.25);
            padding: 2rem 2.25rem 1.75rem;
            overflow: hidden;
        }

        .glass-card::before {
            content: "";
            position: absolute;
            top: -40%;
            left: -20%;
            width: 60%;
            height: 60%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.55), transparent 70%);
            pointer-events: none;
        }

        .brand-mark {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .65rem;
            margin-bottom: .4rem;
        }

        .brand-mark .line {
            flex: 1;
            max-width: 70px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--gold));
        }

        .brand-mark .line.reverse {
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        .diamond-motif {
            width: 26px;
            height: 26px;
            transform: rotate(45deg);
            border: 2px solid var(--maroon);
            border-radius: 4px;
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

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-weight: 800;
            color: var(--maroon);
            text-align: center;
            font-size: 1.55rem;
            line-height: 1.2;
            letter-spacing: .3px;
            margin-bottom: 1.35rem;
        }

        .brand-subtitle {
            display: inline-block;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: var(--gold);
            margin-top: .15rem;
        }

        .terms-check {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            padding-left: 0;
            text-align: center;
        }

        .terms-check .form-check-input {
            margin-top: 0;
            float: none;
            margin-left: 0;
        }

        .terms-check .form-check-input:checked {
            background-color: var(--maroon);
            border-color: var(--maroon);
        }

        .terms-check .form-check-label {
            font-size: .82rem;
            color: var(--ink);
        }

        .terms-check a {
            color: var(--maroon);
            font-weight: 700;
            text-decoration: none;
            border-bottom: 1px dashed rgba(110, 30, 54, 0.55);
        }

        .field-group {
            position: relative;
            margin-bottom: .85rem;
        }

        .field-group .form-control {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(110, 30, 54, 0.18);
            border-radius: 14px;
            padding: .7rem 1rem .7rem 3rem;
            font-size: .92rem;
            letter-spacing: .4px;
            color: var(--ink);
            height: 48px;
        }

        .field-group:has(.icon-right) .form-control {
            padding-right: 3rem;
        }

        .field-group .form-control::placeholder {
            color: rgba(74, 34, 51, 0.55);
            text-transform: uppercase;
            font-size: .8rem;
            letter-spacing: .8px;
        }

        .field-group .form-control:focus {
            background: rgba(255, 255, 255, 0.85);
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(199, 149, 47, 0.18);
        }

        .icon-left {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--maroon);
            font-size: 1.05rem;
            pointer-events: none;
        }

        .icon-right {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gold);
            font-size: 1.1rem;
            pointer-events: none;
            padding-left: 12px;
            border-left: 1px solid rgba(110, 30, 54, 0.18);
        }

        .icon-toggle {
            pointer-events: auto;
            cursor: pointer;
            transition: color .15s ease;
        }

        .icon-toggle:hover,
        .icon-toggle:focus {
            color: var(--maroon);
            outline: none;
        }

        .btn-ingresar {
            width: 100%;
            background: linear-gradient(180deg, var(--maroon), var(--maroon-dark));
            color: #fff;
            border: none;
            border-radius: 14px;
            padding: .95rem;
            font-weight: 700;
            letter-spacing: 1px;
            font-size: .92rem;
            text-transform: uppercase;
            box-shadow: 0 10px 22px rgba(110, 30, 54, 0.35);
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .btn-ingresar:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 26px rgba(110, 30, 54, 0.4);
            color: #fff;
        }

        .forgot-link {
            display: block;
            text-align: center;
            margin-top: 1.25rem;
            color: var(--maroon);
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
            border-bottom: 1px dashed rgba(110, 30, 54, 0.5);
            display: inline-block;
            width: 100%;
        }

        .forgot-wrap {
            text-align: center;
        }

        .forgot-wrap a {
            color: var(--maroon);
            font-size: .85rem;
            font-weight: 600;
            text-decoration: none;
            border-bottom: 1px dashed rgba(110, 30, 54, 0.55);
            padding-bottom: 1px;
        }

        .forgot-wrap a:hover {
            color: var(--maroon-dark);
        }

        .signup-hint {
            text-align: center;
            margin: 1rem 0 0;
            font-size: .82rem;
            color: rgba(74, 34, 51, 0.75);
        }

        .signup-hint a {
            color: var(--maroon);
            font-weight: 700;
            text-decoration: none;
            border-bottom: 1px dashed rgba(110, 30, 54, 0.55);
        }

        .signup-hint a:hover {
            color: var(--maroon-dark);
        }

        @media (max-width: 480px) {
            .glass-card {
                padding: 2.25rem 1.5rem 1.75rem;
            }

            .brand-title {
                font-size: 1.35rem;
            }
        }
    </style>
</head>

<body>

    <div class="backdrop">
        <div class="blob blob-tulips"></div>
        <div class="blob blob-knit"></div>
        <div class="blob blob-yarn"></div>
        <div class="blob blob-weave"></div>

        <!-- sparkles -->
        <svg class="sparkle" style="top:38%; left:6%; width:38px;" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 0 L14 10 L24 12 L14 14 L12 24 L10 14 L0 12 L10 10 Z" />
        </svg>
        <svg class="sparkle" style="top:46%; left:11%; width:20px;" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 0 L14 10 L24 12 L14 14 L12 24 L10 14 L0 12 L10 10 Z" />
        </svg>
        <svg class="sparkle" style="top:34%; right:7%; width:30px;" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 0 L14 10 L24 12 L14 14 L12 24 L10 14 L0 12 L10 10 Z" />
        </svg>

        <!-- soft botanical line art -->
        <svg class="leaf-svg" style="top:6%; left:34%; width:220px;" viewBox="0 0 200 260" fill="none">
            <path d="M100 250 C 90 190 90 130 100 10" stroke="#93A480" stroke-width="3" />
            <ellipse cx="88" cy="60" rx="22" ry="10" fill="#93A480" transform="rotate(-30 88 60)" />
            <ellipse cx="112" cy="100" rx="22" ry="10" fill="#B7C2A6" transform="rotate(30 112 100)" />
            <ellipse cx="88" cy="140" rx="22" ry="10" fill="#93A480" transform="rotate(-30 88 140)" />
            <ellipse cx="112" cy="180" rx="22" ry="10" fill="#B7C2A6" transform="rotate(30 112 180)" />
        </svg>
    </div>

    <div class="glass-wrap">
        <div class="glass-card">

            <div class="brand-mark">
                <span class="line"></span>
                <div class="diamond-motif">
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                    <span></span><span></span><span></span>
                </div>
                <span class="line reverse"></span>
            </div>

            <h1 class="brand-title">CREA TU CUENTA<br><span class="brand-subtitle">SUMAQ AWAYKUNA</span></h1>

            <form action="procesar_registro.php" method="POST" autocomplete="off">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="field-group mb-0">
                            <i class="icon-left bi bi-person"></i>
                            <input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="field-group mb-0">
                            <i class="icon-left bi bi-person"></i>
                            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                        </div>
                    </div>
                </div>

                <div class="field-group mt-3">
                    <i class="icon-left bi bi-envelope"></i>
                    <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required>
                </div>

                <div class="field-group">
                    <i class="icon-left bi bi-person-badge"></i>
                    <input type="text" name="usuario" class="form-control" placeholder="Usuario" required>
                    <i class="icon-right bi bi-people-fill"></i>
                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="field-group mb-0">
                            <i class="icon-left bi bi-lock"></i>
                            <input type="password" name="password" id="passwordField" class="form-control" placeholder="Contraseña" required>
                            <i class="icon-right icon-toggle bi bi-eye-fill" id="togglePassword" role="button" tabindex="0" aria-label="Mostrar contraseña"></i>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="field-group mb-0">
                            <i class="icon-left bi bi-lock-fill"></i>
                            <input type="password" name="password_confirm" id="passwordConfirmField" class="form-control" placeholder="Confirmar" required>
                            <i class="icon-right icon-toggle bi bi-eye-fill" id="toggleConfirmPassword" role="button" tabindex="0" aria-label="Mostrar contraseña"></i>
                        </div>
                    </div>
                </div>

                <div class="form-check terms-check my-2">
                    <input class="form-check-input" type="checkbox" id="terminos" name="terminos" required>
                    <label class="form-check-label" for="terminos">
                        Acepto los <a href="#">términos y condiciones</a>
                    </label>
                </div>

                <button type="submit" class="btn-ingresar">Crear Cuenta</button>
            </form>

            <p class="signup-hint">¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a></p>

        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script>
        function setupPasswordToggle(inputId, toggleId) {
            const input = document.getElementById(inputId);
            const toggle = document.getElementById(toggleId);
            if (!input || !toggle) return;

            const flip = () => {
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                toggle.classList.toggle('bi-eye-fill', !isHidden);
                toggle.classList.toggle('bi-eye-slash-fill', isHidden);
                toggle.setAttribute('aria-label', isHidden ? 'Ocultar contraseña' : 'Mostrar contraseña');
            };

            toggle.addEventListener('click', flip);
            toggle.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    flip();
                }
            });
        }

        setupPasswordToggle('passwordField', 'togglePassword');
        setupPasswordToggle('passwordConfirmField', 'toggleConfirmPassword');
    </script>
</body>

</html>