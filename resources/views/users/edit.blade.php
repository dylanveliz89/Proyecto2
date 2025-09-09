@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Nombre:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </div>
        <div>
            <label>Contraseña (dejar vacío para no cambiar):</label>
            <input type="password" name="password">
        </div>
        <button type="submit">Actualizar</button>
        <a href="{{ route('users.index') }}">Volver</a>
    </form>
</div>
@endsection
