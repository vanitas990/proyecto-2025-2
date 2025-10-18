<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación</title>
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
            padding: 2rem 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            max-width: 600px;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, #f72585, #b5179e);
            color: white;
            font-weight: bold;
            padding: 1.5rem;
            font-size: 1.2rem;
            text-align: center;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .warning-icon {
            font-size: 4rem;
            color: #f72585;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .player-info {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-left: 4px solid #4361ee;
        }
        
        .player-name {
            font-weight: bold;
            font-size: 1.3rem;
            color: var(--secondary);
            margin-bottom: 0.5rem;
        }
        
        .player-details {
            display: flex;
            gap: 1rem;
            color: #6b7280;
            font-size: 0.9rem;
            flex-wrap: wrap;
        }
        
        .player-details span {
            background: #e9ecef;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
        }
        
        .btn-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #f72585, #b5179e);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: bold;
            border-radius: 8px;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            background: linear-gradient(135deg, #d81159, #f72585);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(247, 37, 133, 0.3);
        }
        
        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: bold;
            border-radius: 8px;
            color: white;
            transition: all 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: #6b7280;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .back-link:hover {
            color: var(--primary);
        }
        
        @media (max-width: 576px) {
            .btn-container {
                flex-direction: column;
            }
            
            .btn-danger, .btn-secondary {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-exclamation-triangle me-2"></i>Confirmar Eliminación
            </div>
            <div class="card-body">
                <div class="warning-icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                
                <h3 class="text-center mb-4">¿Estás seguro de que quieres eliminar este jugador?</h3>
                
                <div class="player-info">
                    <div class="player-name">{{ $jugador->nombre }} {{ $jugador->apellido }}</div>
                    <div class="player-details">
                        <span>{{ $jugador->rol ?? 'Sin rol' }}</span>
                        <span>Edad: {{ $jugador->edad }}</span>
                    </div>
                </div>
                
                <p class="text-center text-muted mb-4">
                    Esta acción no se puede deshacer. El jugador será eliminado permanentemente del sistema.
                </p>
                
                <div class="btn-container">
                    <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-1"></i> Sí, Eliminar
                        </button>
                    </form>
                    
                    <a href="{{ route('jugadores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-1"></i> Cancelar
                    </a>
                </div>
                
                <a href="{{ route('jugadores.index') }}" class="back-link">
                    <i class="fas fa-arrow-left me-1"></i> Volver al listado de jugadores
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
