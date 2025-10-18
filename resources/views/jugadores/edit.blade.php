<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jugador</title>
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #f72585;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --gradient: linear-gradient(135deg, #4361ee, #3a0ca3);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7ff;
            color: var(--dark);
            padding: 20px;
            min-height: 100vh;
            background-image: radial-gradient(#4361ee15 1px, transparent 1px);
            background-size: 20px 20px;
        }
        
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        header {
            background: var(--gradient);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
            z-index: 1;
        }
        
        h1 {
            font-size: 2rem;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .header-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }
        
        .content {
            padding: 30px;
        }
        
        .alert {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            background-color: #d1fae5;
            color: #065f46;
            border-left: 5px solid #10b981;
            display: flex;
            align-items: center;
            animation: fadeIn 0.5s ease-in;
        }
        
        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            border-left: 5px solid #ef4444;
        }
        
        .alert::before {
            content: "✓";
            margin-right: 10px;
            font-weight: bold;
        }
        
        .alert-error::before {
            content: "⚠️";
        }
        
        .btn-menu {
            display: inline-block;
            background-color: #41b8c1ff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }
        
        .btn-menu:hover {
            background-color: #3a6ef1ff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            color: white;
        }
        
        .btn-menu::before {
            content: "←";
            margin-right: 8px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: var(--secondary);
        }
        
        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        
        .error-message {
            color: var(--accent);
            font-size: 0.9rem;
            margin-top: 5px;
        }
        
        .btn-submit {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
            width: 100%;
            margin-top: 10px;
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }
        
        .btn-submit::before {
            content: "💾";
            margin-right: 8px;
        }
        
        .btn-cancel {
            display: inline-block;
            background-color: #6b7280;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
            text-align: center;
            width: 100%;
            transition: all 0.2s ease;
        }
        
        .btn-cancel:hover {
            background-color: #4b5563;
            transform: translateY(-2px);
            color: white;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(67, 97, 238, 0.1);
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) rotate(360deg);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Partículas decorativas de fondo -->
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <header>
            <h1>Editar Jugador</h1>
            <p class="header-subtitle">Actualiza la información del jugador</p>
        </header>

        <div class="content">
            {{-- ✅ Mensaje de éxito --}}
            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- 🏠 Botón para volver --}}
            <a href="{{ route('jugadores.index') }}" class="btn-menu">Volver a Jugadores</a>

            {{-- 📋 Formulario de edición --}}
            <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-input" 
                           value="{{ old('nombre', $jugador->nombre) }}" required>
                    @error('nombre')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-input" 
                           value="{{ old('apellido', $jugador->apellido) }}" required>
                    @error('apellido')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="edad" class="form-label">Edad</label>
                    <input type="number" id="edad" name="edad" class="form-input" 
                           value="{{ old('edad', $jugador->edad) }}" min="16" max="50" required>
                    @error('edad')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="rol" class="form-label">Rol</label>
                    <input type="text" id="rol" name="rol" class="form-input" 
                           value="{{ old('rol', $jugador->rol) }}" placeholder="Ej: Delantero, Defensa, Portero...">
                    @error('rol')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn-submit">Actualizar Jugador</button>
            </form>
            
            <a href="{{ route('jugadores.index') }}" class="btn-cancel">Cancelar</a>
        </div>
    </div>

    <script>
        // Crear partículas decorativas
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 15;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Tamaño y posición aleatoria
                const size = Math.random() * 15 + 5;
                const posX = Math.random() * 100;
                const delay = Math.random() * 15;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.animationDelay = `${delay}s`;
                
                particlesContainer.appendChild(particle);
            }
        });
    </script>
</body>
</html>
