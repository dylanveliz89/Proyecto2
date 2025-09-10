<?php
// Script para actualizar contraseñas antiguas en la base de datos
use Illuminate\Support\Facades\Hash;
use App\Models\User;

// Encuentra usuarios con contraseñas cortas (probablemente en texto plano)
$usuarios = User::whereRaw('LENGTH(password) < 50')->get();
foreach ($usuarios as $usuario) {
    // Cambia la contraseña a '123456' encriptada (puedes cambiarla por otra)
    $usuario->password = Hash::make('123456');
    $usuario->save();
    echo "Usuario actualizado: {$usuario->email}\n";
}
echo "Contraseñas actualizadas.\n";
