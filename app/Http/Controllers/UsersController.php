<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
<<<<<<< HEAD
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

=======
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = \App\Models\User::query();
        if ($search) {
            $users->where('name', 'like', "%$search%");
        }
        $users = $users->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
>>>>>>> caa8d36bba4986cf2fd7fcfe2dbb926f7809b941
    public function create()
    {
        return view('users.create');
    }

<<<<<<< HEAD
=======
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
>>>>>>> caa8d36bba4986cf2fd7fcfe2dbb926f7809b941
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
    }

<<<<<<< HEAD
=======
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
>>>>>>> caa8d36bba4986cf2fd7fcfe2dbb926f7809b941
    public function edit($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

<<<<<<< HEAD
    public function update(Request $request, $id)
        {
            $user = \App\Models\User::findOrFail($id);
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
            ]);
            $user->name = $request->name;
            $user->email = $request->email;
            // Si no hay contraseña nueva, no actualiza y muestra error
            if (!$request->password) {
                return redirect()->back()->with('error', 'Debes ingresar una nueva contraseña para actualizar.');
            }
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
        }

=======
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
>>>>>>> caa8d36bba4986cf2fd7fcfe2dbb926f7809b941
    public function destroy($id)
    {
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }
}
