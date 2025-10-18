<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --danger-color: #dc3545;
            --danger-hover: #bb2d3b;
            --secondary-color: #6c757d;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        
        .card-header {
            background-color: var(--danger-color);
            color: white;
            font-weight: bold;
            border-radius: 10px 10px 0 0 !important;
            text-align: center;
            padding: 1.5rem;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .warning-icon {
            font-size: 4rem;
            color: var(--danger-color);
            margin-bottom: 1.5rem;
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border: none;
            padding: 10px 25px;
            font-weight: bold;
        }
        
        .btn-danger:hover {
            background-color: var(--danger-hover);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            border: none;
            padding: 10px 25px;
        }
        
        .student-info {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .info-label {
            font-weight: bold;
            color: #6c757d;
        }
        
        .button-container {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        @media (max-width: 576px) {
            .button-container {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i>Confirmar Eliminación</h4>
        </div>
        <div class="card-body text-center">
            <div class="warning-icon">
                <i class="fas fa-exclamation-circle"></i>
            </div>
            
            <h5 class="mb-4">¿Está seguro de que desea eliminar este estudiante?</h5>
            
            <div class="student-info text-start">
                <p><span class="info-label">Código:</span> {{ $estudiante->codigo }}</p>
                <p><span class="info-label">Nombres:</span> {{ $estudiante->nombres }}</p>
                <p><span class="info-label">Apellidos:</span> {{ $estudiante->pri_ape }} {{ $estudiante->seg_ape ?? '' }}</p>
                <p><span class="info-label">DNI:</span> {{ $estudiante->dni }}</p>
            </div>
            
            <p class="text-muted mb-4">
                <i class="fas fa-info-circle me-1"></i>
                Esta acción eliminará permanentemente el registro del estudiante. Esta operación no se puede deshacer.
            </p>
            
            <div class="button-container">
                <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Eliminar Definitivamente
                    </button>
                </form>
                
                <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Cancelar
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

