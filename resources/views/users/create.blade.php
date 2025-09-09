@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Usuario</h1>
    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div>
            <label>Nombre:</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Guardar</button>
        <a href="{{ route('users.index') }}">Volver</a>
    </form>
</div>
@endsection
