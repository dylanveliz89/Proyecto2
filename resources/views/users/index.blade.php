@extends('layouts.app')

@section('content')
<style>
    .usuarios-container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 32px;
        margin-top: 32px;
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }
    .usuarios-container h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 24px;
        color: #2d3748;
    }
    .usuarios-form {
        display: flex;
        gap: 12px;
        margin-bottom: 24px;
        align-items: center;
    }
    .usuarios-form input[type="text"] {
        padding: 8px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 1rem;
    }
    .usuarios-form button {
        background: #6366f1;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 8px 16px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.2s;
    }
    .usuarios-form button:hover {
        background: #4338ca;
    }
    .usuarios-form a {
        background: #38bdf8;
        color: #fff;
        border-radius: 6px;
        padding: 8px 16px;
        text-decoration: none;
        font-weight: 500;
        margin-left: 8px;
        transition: background 0.2s;
    }
    .usuarios-form a:hover {
        background: #0ea5e9;
    }
    .usuarios-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 8px;
    }
    .usuarios-table th, .usuarios-table td {
        padding: 12px 8px;
        border-bottom: 1px solid #e5e7eb;
        text-align: left;
    }
    .usuarios-table th {
        background: #f1f5f9;
        font-weight: 600;
        color: #374151;
    }
    .usuarios-table tr:last-child td {
        border-bottom: none;
    }
    .usuarios-table td a {
        color: #6366f1;
        text-decoration: underline;
        margin-right: 8px;
    }
    .usuarios-table td button {
        background: #ef4444;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 6px 12px;
        font-size: 0.95rem;
        cursor: pointer;
        transition: background 0.2s;
    }
    .usuarios-table td button:hover {
        background: #b91c1c;
    }
    .usuarios-success {
        color: #22c55e;
        margin-bottom: 10px;
        font-weight: 500;
    }
    @media (max-width: 700px) {
        .usuarios-container {
            padding: 12px;
        }
        .usuarios-table th, .usuarios-table td {
            padding: 8px 4px;
            font-size: 0.95rem;
        }
        .usuarios-form {
            flex-direction: column;
            gap: 8px;
            align-items: stretch;
        }
    }
</style>
<div class="usuarios-container">
    <h1>Lista de Usuarios</h1>
    @if(session('success'))
        <div class="usuarios-success">{{ session('success') }}</div>
    @endif
    <form method="GET" action="{{ route('users.index') }}" class="usuarios-form">
        <input type="text" name="search" placeholder="Buscar por nombre" value="{{ request('search') }}">
        <button type="submit">Buscar</button>
        <a href="{{ route('users.create') }}">Crear Usuario</a>
    </form>
    <table class="usuarios-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if($users->count() == 0)
                <tr>
                    <td colspan="4" style="text-align:center; color:gray;">No hay usuarios registrados.</td>
                </tr>
            @else
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
@endsection
