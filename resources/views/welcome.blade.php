<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Menú principal</h1>

    <a href="{{ route('saludos') }}">Saludos</a>
    <br>

    <a href="{{ route('bienvenidos') }}">Bienvenidos</a>
    <br>

    <a href="{{ route('winter-forever') }}">Winter Forever</a>
    <br>

    <a href="{{ route('hello') }}">Hello</a>
    <br>

    <a href="{{ route('estudiantes.index') }}">Estudiantes</a>
    <br>

    <a href="{{ route('jugadores.index') }}">Jugadores</a>
</body>
</html>
