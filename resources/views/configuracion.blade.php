@extends('layouts.app')

@section('title', 'Configuración')

@section('content')

<div class="page-heading">
    <h1><span class="title-bar"></span> Configuración</h1>
    <p>Preferencias del sistema y datos de tu cuenta.</p>
</div>

@php $persona = $usuario->persona; @endphp

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="panel-card glass settings-card">

    <h2><i class="bi bi-person-badge"></i> Mis datos</h2>

    <form method="POST" action="{{ route('configuracion.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">

            <div class="col-md-6">
                <label>Nombres</label>
                <input class="form-control" name="nombres" value="{{ old('nombres', $persona->nombres ?? '') }}" required>
            </div>

            <div class="col-md-6">
                <label>Apellidos</label>
                <input class="form-control" name="apellidos" value="{{ old('apellidos', $persona->apellidos ?? '') }}" required>
            </div>

            <div class="col-md-6">
                <label>DNI</label>
                <input class="form-control" name="dni" value="{{ old('dni', $persona->dni ?? '') }}" maxlength="8">
            </div>

            <div class="col-md-6">
                <label>Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $persona->fecha_nacimiento ?? '') }}">
            </div>

            <div class="col-md-6">
                <label>Sexo</label>
                <select class="form-select" name="sexo">
                    <option value="">Seleccione</option>
                    <option value="F" {{ old('sexo', $persona->sexo ?? '') === 'F' ? 'selected' : '' }}>Femenino</option>
                    <option value="M" {{ old('sexo', $persona->sexo ?? '') === 'M' ? 'selected' : '' }}>Masculino</option>
                </select>
            </div>

            <div class="col-md-6">
                <label>Teléfono</label>
                <input class="form-control" name="telefono" value="{{ old('telefono', $persona->telefono ?? '') }}">
            </div>

            <div class="col-md-6">
                <label>Correo electrónico</label>
                <input type="email" class="form-control" name="correo" value="{{ old('correo', $persona->correo ?? '') }}">
            </div>

            <div class="col-md-6">
                <label>Usuario (para iniciar sesión)</label>
                <input class="form-control" name="username" value="{{ old('username', $usuario->username) }}" required>
            </div>

            <div class="col-12">
                <label>Foto de perfil</label>
                <input type="file" accept="image/*" class="form-control" name="foto">
                <small class="text-muted">Sube una foto solo si quieres reemplazar la actual</small>
            </div>

        </div>

        <button type="submit" class="btn-add mt-3">
            <i class="bi bi-check-circle"></i> Guardar cambios
        </button>

    </form>

</div>

<div class="panel-card glass settings-card mt-4">

    <h2><i class="bi bi-sliders"></i> Preferencias generales</h2>

    <div class="setting-item">
        <div>
            <strong>Notificaciones</strong>
            <p>Recibir avisos de pedidos y comunicados.</p>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" checked>
        </div>
    </div>

    <div class="setting-item">
        <div>
            <strong>Modo compacto</strong>
            <p>Reduce el tamaño visual del panel.</p>
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox">
        </div>
    </div>

    <hr>

    <h2><i class="bi bi-shield-lock"></i> Seguridad</h2>

    <button class="btn-add" type="button">
        <i class="bi bi-key"></i> Cambiar contraseña
    </button>

</div>

@endsection

@push('styles')
<style>
    .settings-card {
        padding: 1.5rem;
        border-radius: 18px;
    }

    .settings-card h2 {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        color: var(--maroon-dark);
        margin-bottom: 1.2rem;
    }

    .setting-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 0;
        border-bottom: 1px solid var(--cream-deep);
    }

    .setting-item p {
        margin: 0;
        font-size: .8rem;
        opacity: .6;
    }
</style>
@endpush