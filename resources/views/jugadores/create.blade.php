<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Jugador</title>
</head>
<body>
    <h1>Registrar nuevo jugador</h1>

    <form action="{{ route('jugadores.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre"><br><br>

        <label>Apellido:</label>
        <input type="text" name="apellido"><br><br>

        <label>Edad:</label>
        <input type="number" name="edad"><br><br>

        <label>Rol:</label>
        <input type="text" name="rol"><br><br>

        <button type="submit">Guardar</button>
        </form>

    <a href="{{ route('jugadores.index') }}">⬅️ Volver a la lista</a>
</body>
</html>
