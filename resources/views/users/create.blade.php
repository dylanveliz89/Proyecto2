@extends('layouts.app')

@section('content')
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <style>
    .create-user-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 32px;
        margin-top: 32px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    .create-user-container h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 24px;
        color: #2d3748;
    }
    .create-user-form {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    .create-user-form label {
        font-weight: 500;
        color: #374151;
        margin-bottom: 4px;
    }
    .create-user-form input[type="text"],
    .create-user-form input[type="email"],
    .create-user-form input[type="password"] {
        padding: 8px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 1rem;
        margin-bottom: 4px;
        width: 100%;
        box-sizing: border-box;
    }
    .create-user-form button {
        background: #6366f1;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 10px 0;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        margin-top: 8px;
        transition: background 0.2s;
    }
    .create-user-form button:hover {
        background: #4338ca;
    }
    .create-user-form a {
        background: #38bdf8;
        color: #fff;
        border-radius: 6px;
        padding: 8px 16px;
        text-decoration: none;
        font-weight: 500;
        margin-left: 8px;
        transition: background 0.2s;
    }
    .create-user-form a:hover {
        background: #0ea5e9;
    }
    .create-user-success {
        color: #22c55e;
        margin-bottom: 10px;
        font-weight: 500;
    }
    .create-user-error {
        color: #ef4444;
        margin-bottom: 10px;
        font-weight: 500;
    }
    @media (max-width: 700px) {
        .create-user-container {
            padding: 12px;
        }
    }
    </style>
</head>
<body>
<div class="create-user-container">
    <h1>Crear Usuario</h1>
    @if(session('success'))
        <div class="create-user-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="create-user-error">{{ session('error') }}</div>
    @endif
    @if($errors->has('email'))
        <div class="create-user-error">{{ $errors->first('email') }}</div>
    @endif
    <form method="POST" action="{{ route('users.store') }}" class="create-user-form">
        @csrf
        <div>
            <label>Nombre:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" required>
        </div>
        <div style="display: flex; gap: 8px; align-items: center;">
            <button type="submit">Guardar</button>
            <a href="{{ route('users.index') }}">Volver</a>
        </div>
    </form>
</div>
</body>
</html>
@endsection
