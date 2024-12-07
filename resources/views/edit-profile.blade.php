@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/edit-profile.css') }}">
</head>
<div class="edit-profile-container">
    <h1 class="edit-profile-title">Información de Perfil</h1>
    <p class="edit-profile-subtitle">Actualiza tus datos para mantener tu cuenta al día 😉.</p>

    <form action="{{ route('users.update', auth()->user()->id) }}" method="POST" class="edit-profile-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre Completo</label>
            <input type="text" id="full_name" name="full_name" value="{{ auth()->user()->name }}"  class="form-control">
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ auth()->user()->username }}"  class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" value="{{ auth()->user()->email }}"  class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Nueva Contraseña <span class="optional">(Opcional)</span></label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="tel" id="phone" name="phone" value="{{ auth()->user()->phone }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="address">Dirección</label>
            <textarea id="address" name="address" rows="3" class="form-control">{{ auth()->user()->address }}</textarea>
        </div>

        <div class="form-group">
            <label for="postal_code">Código Postal</label>
            <input type="text" id="postal_code" name="postal_code" value="{{ auth()->user()->postal_code }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="birth_date">Fecha de Nacimiento</label>
            <input type="date" id="birth_date" name="birth_date" value="{{ auth()->user()->birth_date }}" class="form-control">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="{{ route('profile') }}" class="btn btn-secondary">Volver al Perfil</a>
        </div>
    </form>
</div>
@endsection
