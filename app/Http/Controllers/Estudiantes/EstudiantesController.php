<?php

namespace App\Http\Controllers\Estudiantes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function index(Request $request){

        $estudiante = Estudiante::get();

    }
    return view('estudiantes.index');
};
