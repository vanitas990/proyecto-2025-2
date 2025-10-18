<?php

namespace App\Http\Controllers\Jugadores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jugador;

class JugadoresController extends Controller
{
    // 📋 Muestra todos los jugadores
    public function index()
    {
        $jugadores = Jugador::all();
        return view('jugadores.index', compact('jugadores'));
    }

    // ➕ Muestra el formulario para crear un jugador
    public function create()
    {
        return view('jugadores.create');
    }

    // 💾 Guarda un nuevo jugador en la base de datos
    public function store(Request $request)
    {
        // ✅ Validación de campos
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:1',
            'rol' => 'nullable|string|max:100',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'edad.integer' => 'La edad debe ser un número.',
            'edad.min' => 'La edad debe ser mayor que 0.',
        ]);

        // 🧩 Crea el jugador
        Jugador::create($validatedData);

        return redirect()->route('jugadores.index')
                         ->with('success', 'Jugador creado correctamente.');
    }

    // ✏️ Muestra el formulario para editar un jugador
    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);
        return view('jugadores.edit', compact('jugador'));
    }

    // 🔄 Actualiza un jugador en la base de datos
    public function update(Request $request, $id)
    {
        // ✅ Validación de campos (igual que en store)
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:1',
            'rol' => 'nullable|string|max:100',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'edad.required' => 'La edad es obligatoria.',
            'edad.integer' => 'La edad debe ser un número.',
            'edad.min' => 'La edad debe ser mayor que 0.',
        ]);

        // 🔍 Busca el jugador y actualiza
        $jugador = Jugador::findOrFail($id);
        $jugador->update($validatedData);

        return redirect()->route('jugadores.index')
                         ->with('success', 'Jugador actualizado correctamente.');
    }

    // ❌ Elimina un jugador
    public function destroy($id)
    {
        $jugador = Jugador::findOrFail($id);
        $jugador->delete();

        return redirect()->route('jugadores.index')
                         ->with('success', 'Jugador eliminado correctamente.');
    }
}
