<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jugador - Matrix</title>
    <style>
        :root {
            --matrix-green: #00ff41;
            --matrix-dark: #003b00;
            --matrix-darker: #001a00;
            --matrix-black: #000000;
            --matrix-red: #ff3333;
            --matrix-gray: #cccccc;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: var(--matrix-black);
            color: var(--matrix-green);
            font-family: 'Courier New', monospace;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        /* Efecto de lluvia de código Matrix */
        .matrix-rain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: -1;
            opacity: 0.3;
        }
        
        .matrix-character {
            position: absolute;
            color: var(--matrix-green);
            font-size: 16px;
            animation: fall linear infinite;
            opacity: 0;
            text-shadow: 0 0 8px var(--matrix-green);
            font-weight: bold;
        }
        
        @keyframes fall {
            0% {
                transform: translateY(-100px);
                opacity: 0;
            }
            5% {
                opacity: 1;
            }
            80% {
                opacity: 0.8;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }
        
        .container {
            max-width: 600px;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            border: 1px solid var(--matrix-green);
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 25px rgba(0, 255, 65, 0.4);
            position: relative;
        }
        
        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--matrix-green);
            box-shadow: 0 0 15px var(--matrix-green);
            animation: scanline 3s linear infinite;
            z-index: 10;
        }
        
        @keyframes scanline {
            0% {
                top: 0;
            }
            100% {
                top: 100%;
            }
        }
        
        header {
            background-color: var(--matrix-darker);
            padding: 25px;
            border-bottom: 1px solid var(--matrix-green);
            position: relative;
            overflow: hidden;
            text-align: center;
        }
        
        h1 {
            font-size: 1.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--matrix-green);
            text-shadow: 0 0 10px var(--matrix-green);
            margin-bottom: 10px;
        }
        
        .header-subtitle {
            color: var(--matrix-green);
            text-shadow: 0 0 5px var(--matrix-green);
            opacity: 0.8;
        }
        
        .content {
            padding: 30px;
        }
        
        .alert {
            background-color: rgba(255, 0, 0, 0.1);
            border: 1px solid var(--matrix-red);
            color: var(--matrix-red);
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 3px;
            position: relative;
            text-shadow: 0 0 5px rgba(255, 51, 51, 0.5);
        }
        
        .alert-success {
            background-color: rgba(0, 255, 65, 0.1);
            border: 1px solid var(--matrix-green);
            color: var(--matrix-green);
        }
        
        .alert::before {
            content: "⚠️ ";
            font-weight: bold;
            color: var(--matrix-red);
        }
        
        .alert-success::before {
            content: "✅ ";
            color: var(--matrix-green);
        }
        
        .alert ul {
            margin-top: 10px;
            padding-left: 20px;
        }
        
        .alert li {
            margin-bottom: 5px;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: var(--matrix-green);
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 0 0 5px var(--matrix-green);
        }
        
        .form-input {
            width: 100%;
            background-color: var(--matrix-darker);
            color: var(--matrix-green);
            border: 1px solid var(--matrix-green);
            padding: 12px 15px;
            font-family: 'Courier New', monospace;
            font-size: 1rem;
            transition: all 0.3s ease;
            border-radius: 3px;
            text-shadow: 0 0 5px var(--matrix-green);
            box-shadow: inset 0 0 5px rgba(0, 255, 65, 0.3);
        }
        
        .form-input:focus {
            outline: none;
            box-shadow: 0 0 15px var(--matrix-green), inset 0 0 10px rgba(0, 255, 65, 0.3);
            background-color: rgba(0, 60, 0, 0.3);
        }
        
        .form-input::placeholder {
            color: #00ff4144;
            text-shadow: none;
        }
        
        .error-message {
            color: var(--matrix-red);
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
            text-shadow: 0 0 3px rgba(255, 51, 51, 0.5);
        }
        
        .btn-submit {
            background-color: transparent;
            color: var(--matrix-green);
            border: 1px solid var(--matrix-green);
            padding: 12px 25px;
            font-family: 'Courier New', monospace;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            text-shadow: 0 0 5px var(--matrix-green);
            box-shadow: 0 0 5px rgba(0, 255, 65, 0.3);
            width: 100%;
            margin-top: 10px;
        }
        
        .btn-submit:hover {
            background-color: var(--matrix-green);
            color: var(--matrix-black);
            box-shadow: 0 0 15px var(--matrix-green);
            text-shadow: none;
        }
        
        .btn-submit::before {
            content: "💾";
            margin-right: 8px;
        }
        
        .btn-cancel {
            display: inline-block;
            background-color: transparent;
            color: var(--matrix-red);
            border: 1px solid var(--matrix-red);
            padding: 10px 20px;
            border-radius: 3px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 15px;
            text-align: center;
            width: 100%;
            transition: all 0.3s ease;
            text-shadow: 0 0 5px rgba(255, 51, 51, 0.5);
            box-shadow: 0 0 5px rgba(255, 51, 51, 0.3);
        }
        
        .btn-cancel:hover {
            background-color: var(--matrix-red);
            color: var(--matrix-black);
            box-shadow: 0 0 15px var(--matrix-red);
            text-shadow: none;
        }
        
        @media (max-width: 768px) {
            .container {
                margin: 10px;
            }
            
            header {
                padding: 20px;
            }
            
            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Efecto de lluvia de código Matrix -->
    <div class="matrix-rain" id="matrixRain"></div>
    
    <div class="container">
        <header>
            <h1>EDITAR JUGADOR</h1>
            <p class="header-subtitle">ACTUALIZA LA INFORMACIÓN DEL JUGADOR</p>
        </header>

        <div class="content">
            <!-- Mensaje de éxito -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Formulario de edición -->
            <form action="{{ route('jugadores.update', $jugador->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="nombre" class="form-label">NOMBRE</label>
                    <input type="text" id="nombre" name="nombre" class="form-input" 
                           value="{{ old('nombre', $jugador->nombre) }}" placeholder="INGRESE EL NOMBRE" required>
                    @error('nombre')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="apellido" class="form-label">APELLIDO</label>
                    <input type="text" id="apellido" name="apellido" class="form-input" 
                           value="{{ old('apellido', $jugador->apellido) }}" placeholder="INGRESE EL APELLIDO" required>
                    @error('apellido')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="edad" class="form-label">EDAD</label>
                    <input type="number" id="edad" name="edad" class="form-input" 
                           value="{{ old('edad', $jugador->edad) }}" min="16" max="50" placeholder="INGRESE LA EDAD" required>
                    @error('edad')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="rol" class="form-label">ROL</label>
                    <input type="text" id="rol" name="rol" class="form-input" 
                           value="{{ old('rol', $jugador->rol) }}" placeholder="EJ: DELANTERO, DEFENSA, PORTERO...">
                    @error('rol')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn-submit">ACTUALIZAR JUGADOR</button>
            </form>
            
            <a href="{{ route('jugadores.index') }}" class="btn-cancel">CANCELAR</a>
        </div>
    </div>

    <script>
        // Crear efecto de lluvia de código Matrix mejorado
        document.addEventListener('DOMContentLoaded', function() {
            const matrixRain = document.getElementById('matrixRain');
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$%&@#*';
            const columns = Math.floor(window.innerWidth / 20);
            
            // Crear más caracteres para un efecto más denso
            for (let i = 0; i < columns * 2; i++) {
                const char = document.createElement('div');
                char.classList.add('matrix-character');
                
                // Posición aleatoria
                const left = (i % columns) * 20 + Math.random() * 20;
                char.style.left = `${left}px`;
                
                // Retraso aleatorio
                const delay = Math.random() * 10;
                char.style.animationDelay = `${delay}s`;
                
                // Duración aleatoria
                const duration = 3 + Math.random() * 7;
                char.style.animationDuration = `${duration}s`;
                
                // Carácter aleatorio
                char.textContent = characters.charAt(Math.floor(Math.random() * characters.length));
                
                // Opacidad variable
                char.style.opacity = Math.random() * 0.5 + 0.5;
                
                matrixRain.appendChild(char);
            }
            
            // Efecto de parpadeo aleatorio en los inputs
            const inputs = document.querySelectorAll('.form-input');
            setInterval(() => {
                inputs.forEach(input => {
                    if (Math.random() > 0.9) {
                        input.style.boxShadow = '0 0 15px var(--matrix-green)';
                        setTimeout(() => {
                            input.style.boxShadow = 'inset 0 0 5px rgba(0, 255, 65, 0.3)';
                        }, 100);
                    }
                });
            }, 500);
        });
    </script>
</body>
</html>
