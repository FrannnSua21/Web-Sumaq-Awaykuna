@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')

<div class="page-heading">
    <h1><span class="title-bar"></span> Mi Perfil</h1>
    <p>Información personal y datos de la cuenta.</p>
</div>

@php
$persona = $usuario->persona;
$nombreCompleto = $persona ? trim($persona->nombres.' '.$persona->apellidos) : $usuario->username;
$rol = optional($usuario->cargo)->nombre ?? ucfirst(str_replace('_',' ', $usuario->area ?? ''));
$initials = collect(explode(' ', $nombreCompleto))->filter()->map(fn($p) => mb_substr($p,0,1))->take(2)->join('');
@endphp

@if(!$persona)
<div class="alert alert-warning">
    Tu cuenta todavía no tiene datos personales registrados.
    <a href="{{ route('configuracion') }}">Completa tu perfil aquí</a>.
</div>
@endif

<div class="panel-card glass profile-card">

    <div class="profile-header">

        @if($persona && $persona->foto)
        <img src="{{ asset($persona->foto) }}" class="profile-avatar-img" alt="Foto de perfil">
        @else
        <div class="profile-avatar">{{ strtoupper($initials) }}</div>
        @endif

        <div>
            <h2>{{ $nombreCompleto }}</h2>
            <p>{{ $rol }}</p>
        </div>

    </div>

    <div class="profile-info">

        <div>
            <label>Correo electrónico</label>
            <strong>{{ $persona->correo ?? 'No registrado' }}</strong>
        </div>

        <div>
            <label>Teléfono</label>
            <strong>{{ $persona->telefono ?? 'No registrado' }}</strong>
        </div>

        <div>
            <label>DNI</label>
            <strong>{{ $persona->dni ?? 'No registrado' }}</strong>
        </div>

        <div>
            <label>Fecha de nacimiento</label>
            <strong>
                {{ $persona?->fecha_nacimiento ? \Carbon\Carbon::parse($persona->fecha_nacimiento)->format('d/m/Y') : 'No registrada' }}
            </strong>
        </div>

        <div>
            <label>Sexo</label>
            <strong>
                @if($persona?->sexo === 'F') Femenino
                @elseif($persona?->sexo === 'M') Masculino
                @else No registrado
                @endif
            </strong>
        </div>

        <div>
            <label>Ubicación</label>
            <strong>
                {{ $persona?->ubicacion?->distrito ?? 'No registrada' }}{{ $persona?->ubicacion?->provincia ? ', '.$persona->ubicacion->provincia : '' }}
            </strong>
        </div>

        <div>
            <label>Usuario</label>
            <strong>{{ $usuario->username }}</strong>
        </div>

        <div>
            <label>Área</label>
            <strong>{{ ucfirst(str_replace('_',' ', $usuario->area ?? '')) }}</strong>
        </div>

        <div>
            <label>Estado</label>
            <span class="status-active">{{ ucfirst($usuario->estado ?? 'activo') }}</span>
        </div>

    </div>

    <a href="{{ route('configuracion') }}" class="btn-add">
        <i class="bi bi-pencil-square"></i>
        Editar Perfil
    </a>

</div>

@endsection

@push('styles')
<style>
    .profile-card {
        border-radius: 18px;
        padding: 1.5rem;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .profile-avatar,
    .profile-avatar-img {
        width: 75px;
        height: 75px;
        border-radius: 50%;
    }

    .profile-avatar {
        background: var(--maroon);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: 800;
    }

    .profile-avatar-img {
        object-fit: cover;
    }

    .profile-header h2 {
        font-family: 'Playfair Display', serif;
        color: var(--maroon-dark);
        margin: 0;
    }

    .profile-info {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .profile-info div {
        background: var(--cream);
        padding: 1rem;
        border-radius: 12px;
    }

    .profile-info label {
        display: block;
        font-size: .7rem;
        font-weight: 700;
        opacity: .6;
        margin-bottom: .3rem;
    }

    .status-active {
        background: #d8f3dc;
        color: #2e7d32;
        padding: .3rem .7rem;
        border-radius: 20px;
        font-size: .75rem;
        font-weight: 700;
    }

    @media(max-width:700px) {
        .profile-info {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush