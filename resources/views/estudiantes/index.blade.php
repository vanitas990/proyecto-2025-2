<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
    <h1 class="text-center mb-4">Lista de Estudiantes</h1>

    @if(isset($estudiantes) && count($estudiantes) > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudiantes as $est)
                    <tr>
                        <td>{{ $est->id }}</td>
                        <td>{{ $est->nombre }}</td>
                        <td>{{ $est->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center text-muted">No hay estudiantes registrados.</p>
    @endif
</body>
</html>
