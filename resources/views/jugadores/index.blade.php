<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Jugadores</title>
</head>
<body>
    <h1>Lista de Jugadores</h1>

    {{-- ✅ Mensaje de éxito --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- ➕ Enlace para crear nuevo jugador --}}
    <a href="{{ route('jugadores.create') }}">➕ Nuevo jugador</a>

    {{-- 📋 Lista de jugadores --}}
    @if ($jugadores->isEmpty())
        <p>No hay jugadores registrados.</p>
    @else
        <ul>
            @foreach ($jugadores as $jugador)
                <li>
                    {{ $jugador->nombre }} {{ $jugador->apellido }}
                    ({{ $jugador->rol ?? 'Sin rol' }})
                    - Edad: {{ $jugador->edad }}

                    <form action="{{ route('jugadores.destroy', $jugador->id) }}" 
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">❌ Eliminar</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>
