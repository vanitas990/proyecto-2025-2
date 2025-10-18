<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\Estudiante;

use App\Http\Controllers\Estudiantes\EstudiantesController;

use App\Http\Controllers\Jugadores\JugadoresController;

Route::get('/', function () {

   /* $estudiante = new Estudiante();
    $estudiante-> nombres = 'Nestor';
    $estudiante-> pri_ape = 'Armas';
    $estudiante-> seg_ape = 'Villanueva';
    $estudiante-> save ();

    return $estudiante;*/

   // return 'aqui trabajare con la tabla estudiantes';
    return view('welcome');
});

Route::get('/bienvenidos', function () {
    return view('bienvenidos');
})->name('bienvenidos');

Route::get('/winter-forever', function () {
    return view('winter-forever');
})->name('winter-forever');

Route::get('/hello', function () {
    return view('hello');
})->name('hello');


// Rutas para Estudiantes
// routes/web.php

// Rutas existentes...
Route::get('/estudiantes', [EstudiantesController::class, 'index'])->name('estudiantes.index');
Route::get('/estudiantes/create', [EstudiantesController::class, 'create'])->name('estudiantes.create');
Route::post('/estudiantes', [EstudiantesController::class, 'store'])->name('estudiantes.store');
Route::get('/estudiantes/{id}/edit', [EstudiantesController::class, 'edit'])->name('estudiantes.edit');
Route::put('/estudiantes/{id}', [EstudiantesController::class, 'update'])->name('estudiantes.update');
Route::delete('/estudiantes/{id}', [EstudiantesController::class, 'destroy'])->name('estudiantes.destroy');

// Nueva ruta para la página de confirmación de eliminación
Route::get('/estudiantes/{id}/delete', [EstudiantesController::class, 'delete'])->name('estudiantes.delete');





// Lista de jugadores
Route::get('/jugadores', [JugadoresController::class, 'index'])->name('jugadores.index');

// Mostrar formulario de creación
Route::get('/jugadores/create', [JugadoresController::class, 'create'])->name('jugadores.create');

// Guardar nuevo jugador
Route::post('/jugadores', [JugadoresController::class, 'store'])->name('jugadores.store');

// Mostrar jugador específico (opcional)
Route::get('/jugadores/{id}', [JugadoresController::class, 'show'])->name('jugadores.show');

// Mostrar formulario de edición
Route::get('/jugadores/{id}/edit', [JugadoresController::class, 'edit'])->name('jugadores.edit');

// Actualizar jugador
Route::put('/jugadores/{id}', [JugadoresController::class, 'update'])->name('jugadores.update');

// Eliminar jugador
Route::delete('/jugadores/{id}', [JugadoresController::class, 'destroy'])->name('jugadores.destroy');
