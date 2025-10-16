<?php

namespace App\Http\Controllers\Estudiantes;

use App\Models\Estudiante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    // 📋 Mostrar todos los estudiantes
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    // ➕ Formulario de creación
    public function create()
    {
        return view('estudiantes.create');
    }

    // 💾 Guardar nuevo estudiante
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:21|unique:estudiantes,codigo',
            'nombres' => 'required|string|max:120',
            'pri_ape' => 'required|string|max:120',
            'seg_ape' => 'nullable|string|max:100',
            'dni' => 'required|digits:8|unique:estudiantes,dni',
        ], [
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'Este código ya está registrado.',
            'nombres.required' => 'Los nombres son obligatorios.',
            'pri_ape.required' => 'El primer apellido es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
            'dni.unique' => 'Este DNI ya está registrado.',
        ]);

        Estudiante::create($validatedData);

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante registrado correctamente.');
    }

    // ❌ Eliminar estudiante
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante eliminado correctamente.');
    }
    
}
