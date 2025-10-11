<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\Estudiante;

use App\Http\Controllers\Estudiantes\EstudiantesController;

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

Route::get('/hola', function () {
    return 'Hello friends';
})->name('saludos' );

Route::get('/bienvenidos', function () {
    return view('bienvenidos');
})->name('bienvenidos');

Route::get('/hola', function () {
    return 'Hello friends';
})->name('saludos' );

Route::get('/winter-forever', function () {
    return view('winter-forever');
})->name('winter-forever');

Route::get('/hello', function () {
    return view('hello');
})->name('hello');

Route::get('/estudiantes/index',[EstudiantesController::class,'index'])->name('estudiantes.index');
