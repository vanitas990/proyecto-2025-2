<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Estudiantes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #f72585;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .header-container {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 10px 10px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .card-header {
            background-color: var(--primary);
            color: white;
            font-weight: bold;
            border-radius: 10px 10px 0 0 !important;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            border: none;
            padding: 10px 20px;
            font-weight: bold;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #3a0ca3, #4361ee);
            transform: translateY(-2px);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #4cc9f0, #4361ee);
            border: none;
            padding: 10px 20px;
            font-weight: bold;
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #4361ee, #4cc9f0);
            transform: translateY(-2px);
        }
        
        .btn-danger {
            background-color: var(--accent);
            border: none;
        }
        
        .btn-sm {
            padding: 5px 10px;
        }
        
        .table th {
            background-color: #e9ecef;
            color: var(--dark);
        }
        
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }
        
        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1><i class="fas fa-user-graduate me-2"></i>Gestión de Estudiantes</h1>
                    <p class="lead">Administra el registro de estudiantes del sistema</p>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('estudiantes.create') }}" class="btn btn-light me-2">
                        <i class="fas fa-plus-circle me-2"></i>Nuevo Estudiante
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Botones de navegación -->
        <div class="navigation-buttons">
            <a href="{{ url('/') }}" class="btn btn-success">
                <i class="fas fa-home me-2"></i>Volver al Menú Principal
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-list me-2"></i>Lista de Estudiantes Registrados</span>
                <span class="badge bg-secondary">{{ $estudiantes->count() }} registros</span>
            </div>
            <div class="card-body">
                @if($estudiantes->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombres</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>DNI</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($estudiantes as $estudiante)
                            <tr>
                                <td>{{ $estudiante->codigo }}</td>
                                <td>{{ $estudiante->nombres }}</td>
                                <td>{{ $estudiante->pri_ape }}</td>
                                <td>{{ $estudiante->seg_ape }}</td>
                                <td>{{ $estudiante->dni }}</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-sm btn-info" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-warning" title="Ver detalles">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este estudiante?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="empty-state">
                    <i class="fas fa-user-graduate"></i>
                    <h4>No hay estudiantes registrados</h4>
                    <p>Comienza agregando el primer estudiante al sistema</p>
                    <a href="{{ route('estudiantes.create') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus-circle me-2"></i>Registrar Primer Estudiante
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script para mejorar la interactividad
        document.addEventListener('DOMContentLoaded', function() {
            // Animación para los botones
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.transition = 'transform 0.2s ease';
                });
                
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>
