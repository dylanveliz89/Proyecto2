@extends('layouts.app')

@section('content')
<style>
    .edit-user-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 32px;
        margin-top: 32px;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    .edit-user-container h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 24px;
        color: #2d3748;
    }
    .edit-user-form {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }
    .edit-user-form label {
        font-weight: 500;
        color: #374151;
        margin-bottom: 4px;
    }
    .edit-user-form input[type="text"],
    .edit-user-form input[type="email"],
    .edit-user-form input[type="password"] {
        padding: 8px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 1rem;
        margin-bottom: 4px;
        width: 100%;
        box-sizing: border-box;
    }
    .edit-user-form button {
        background: #6366f1;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 10px 0;
        font-weight: 600;
        font-size: 1rem;
             git branch   cursor: pointer;
        margin-top: 8px;
        transition: background 0.2s;
    }
    .edit-user-form button:hover {
        background: #4338ca;
    }
    .edit-user-form a {
        background: #38bdf8;
        color: #fff;
        border-radius: 6px;
        padding: 8px 16px;
        text-decoration: none;
        font-weight: 500;
        margin-left: 8px;
        transition: background 0.2s;
    }
    .edit-user-form a:hover {
        background: #0ea5e9;
    }
    .edit-user-success {
        color: #22c55e;
        margin-bottom: 10px;
        font-weight: 500;
    }
    .edit-user-error {
        color: #ef4444;
        margin-bottom: 10px;
        font-weight: 500;
    }
    @media (max-width: 700px) {
        .edit-user-container {
            padding: 12px;
        }
    }
</style>
<div class="edit-user-container">
    <h1>Editar Usuario</h1>
    @if(session('success'))
        <div class="edit-user-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="edit-user-error">{{ session('error') }}</div>
    @endif
    <form method="POST" action="{{ route('users.update', $user->id) }}" class="edit-user-form">
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
        <div style="display: flex; gap: 8px; align-items: center;">
            <button type="submit">Actualizar</button>
            <a href="{{ route('users.index') }}">Volver</a>
        </div>
    </form>
</div>
@endsection
