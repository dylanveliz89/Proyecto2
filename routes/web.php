<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Rutas CRUD para usuarios autenticados (sin restricción de admin)
// Ruta temporal para mostrar usuarios directamente desde la web
Route::get('/verificar-usuarios', function () {
    try {
        $usuarios = DB::table('users')->get();
        if ($usuarios->isEmpty()) {
            return '<h2>No hay usuarios en la base de datos.</h2>';
        }
        $html = '<h2>Usuarios en la base de datos:</h2><table border="1"><tr><th>ID</th><th>Nombre</th><th>Email</th></tr>';
        foreach ($usuarios as $usuario) {
            $html .= "<tr><td>{$usuario->id}</td><td>{$usuario->name}</td><td>{$usuario->email}</td></tr>";
        }
        $html .= '</table>';
        return $html;
    } catch (Exception $e) {
        return '<h2>Error al conectar con la base de datos: ' . $e->getMessage() . '</h2>';
    }
});
Route::middleware(['auth'])->group(function () {
    Route::resource('users', App\Http\Controllers\UsersController::class);
});
