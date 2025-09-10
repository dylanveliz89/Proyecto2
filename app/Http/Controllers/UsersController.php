<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $users = \App\Models\User::where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->get();
        } else {
            $users = \App\Models\User::all();
        }
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);
        // No mostrar información en blanco
        if (empty($request->name) || empty($request->email) || empty($request->password)) {
            return back()->with('error', 'Todos los campos son obligatorios.')->withInput();
        }
        // Validar usuario existente
        if (\App\Models\User::where('email', $request->email)->exists()) {
            return back()->with('error', 'Usuario existente')->withInput();
        }
        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

    public function edit($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'required|min:6',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        // Requiere nueva contraseña para actualizar
        if (empty($request->password)) {
            return back()->with('error', 'Debes ingresar una nueva contraseña para actualizar el usuario.')->withInput();
        }
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }
}
