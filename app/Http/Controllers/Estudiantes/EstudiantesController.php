<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estudiante; // 👈 importante: importar el modelo

class EstudiantesController extends Controller
{
    public function index(Request $request)
    {
        // Obtener todos los registros de la tabla 'estudiantes'
        $estudiantes = Estudiante::all();

        // Retornar la vista con los datos
        return view('estudiantes.index', compact('estudiantes'));
    }
}
