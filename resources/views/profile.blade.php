@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/profile.css')}}">
</head>
<div class="profile-container">
    <div class="profile-header">
        <img src="{{ asset('images/profile-placeholder.png') }}" alt="Avatar" class="profile-avatar">
        <h1 class="profile-name">{{ auth()->user()->name }}</h1>
        <p class="profile-email">{{ auth()->user()->email }}</p>
    </div>

    <div class="profile-body">
        <h2 class="section-title">Información de Usuario</h2>
        <ul class="profile-info">
            <li><strong>Nombre:</strong> {{ auth()->user()->name }}</li>
            <li><strong>Correo Electrónico:</strong> {{ auth()->user()->email }}</li>
            <li><strong>Fecha de Registro:</strong> {{ auth()->user()->created_at->format('d/m/Y') }}</li>
        </ul>

        <a href="{{ route('userProfile.edit')}}" class="user-profile-edit">Editar Perfil</a>

        @if(auth()->user()->user_type == 'ADMIN')
            <div class="admin-section">
                <a href="{{ route('admin.dashboard') }}" class="admin-button">Administrar Tienda</a>
            </div>
        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Salir</button>
        </form>
    </div>
</div>
@endsection
