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

    // 👁️ Mostrar detalles de un estudiante
    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.show', compact('estudiante'));
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

    // ✏️ Mostrar formulario de edición
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    // 🔄 Actualizar estudiante
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:21|unique:estudiantes,codigo,' . $id,
            'nombres' => 'required|string|max:120',
            'pri_ape' => 'required|string|max:120',
            'seg_ape' => 'nullable|string|max:100',
            'dni' => 'required|digits:8|unique:estudiantes,dni,' . $id,
        ], [
            'codigo.required' => 'El código es obligatorio.',
            'codigo.unique' => 'Este código ya está registrado.',
            'nombres.required' => 'Los nombres son obligatorios.',
            'pri_ape.required' => 'El primer apellido es obligatorio.',
            'dni.required' => 'El DNI es obligatorio.',
            'dni.digits' => 'El DNI debe tener 8 dígitos.',
            'dni.unique' => 'Este DNI ya está registrado.',
        ]);

        $estudiante->update($validatedData);

        return redirect()->route('estudiantes.index')
                         ->with('success', 'Estudiante actualizado correctamente.');
    }

    // ❓ Mostrar formulario de confirmación para eliminar
    public function delete($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.delete', compact('estudiante'));
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
