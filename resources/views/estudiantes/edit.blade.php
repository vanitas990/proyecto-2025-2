<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante - Matrix</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --matrix-green: #00ff41;
            --matrix-dark: #003b00;
            --matrix-darker: #001a00;
            --matrix-black: #000000;
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
            opacity: 0.2;
        }
        
        .matrix-character {
            position: absolute;
            color: var(--matrix-green);
            font-size: 14px;
            animation: fall linear infinite;
            opacity: 0.8;
            text-shadow: 0 0 5px var(--matrix-green);
        }
        
        @keyframes fall {
            from {
                transform: translateY(-100%);
                opacity: 1;
            }
            to {
                transform: translateY(100vh);
                opacity: 0.3;
            }
        }
        
        .container {
            max-width: 800px;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            border: 1px solid var(--matrix-green);
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 255, 65, 0.3);
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
            box-shadow: 0 0 10px var(--matrix-green);
            animation: scanline 3s linear infinite;
        }
        
        @keyframes scanline {
            0% {
                top: 0;
            }
            100% {
                top: 100%;
            }
        }
        
        .card-header {
            background-color: var(--matrix-darker);
            padding: 25px;
            border-bottom: 1px solid var(--matrix-green);
            position: relative;
            overflow: hidden;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        h4 {
            font-size: 1.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--matrix-green);
            text-shadow: 0 0 10px var(--matrix-green);
            display: flex;
            align-items: center;
        }
        
        h4 i {
            margin-right: 10px;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .alert {
            background-color: rgba(255, 0, 0, 0.1);
            border: 1px solid #ff3333;
            color: #ff6666;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 3px;
            position: relative;
        }
        
        .alert::before {
            content: "ERROR: ";
            font-weight: bold;
            color: #ff3333;
        }
        
        .alert ul {
            margin-top: 10px;
            padding-left: 20px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: var(--matrix-green);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .required-field::after {
            content: " *";
            color: #ff3333;
        }
        
        input {
            width: 100%;
            background-color: var(--matrix-darker);
            color: var(--matrix-green);
            border: 1px solid var(--matrix-green);
            padding: 12px 15px;
            font-family: 'Courier New', monospace;
            font-size: 1rem;
            transition: all 0.3s ease;
            border-radius: 3px;
        }
        
        input:focus {
            outline: none;
            box-shadow: 0 0 10px var(--matrix-green);
            background-color: rgba(0, 60, 0, 0.3);
        }
        
        .error-message {
            color: #ff3333;
            font-size: 0.9rem;
            margin-top: 5px;
            display: block;
        }
        
        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        
        .btn-matrix {
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
            text-decoration: none;
        }
        
        .btn-matrix:hover {
            background-color: var(--matrix-green);
            color: var(--matrix-black);
            box-shadow: 0 0 10px var(--matrix-green);
        }
        
        .btn-primary {
            background-color: transparent;
            color: var(--matrix-green);
            border: 1px solid var(--matrix-green);
        }
        
        .btn-primary:hover {
            background-color: var(--matrix-green);
            color: var(--matrix-black);
        }
        
        .btn-secondary {
            background-color: transparent;
            color: #ff3333;
            border: 1px solid #ff3333;
        }
        
        .btn-secondary:hover {
            background-color: #ff3333;
            color: var(--matrix-black);
            box-shadow: 0 0 10px #ff3333;
        }
        
        .btn-light {
            background-color: transparent;
            color: #cccccc;
            border: 1px solid #cccccc;
        }
        
        .btn-light:hover {
            background-color: #cccccc;
            color: var(--matrix-black);
            box-shadow: 0 0 10px #cccccc;
        }
        
        .btn-matrix i {
            margin-right: 8px;
        }
        
        .glitch-text {
            animation: glitch 2s infinite;
        }
        
        @keyframes glitch {
            0% { transform: translate(0); }
            20% { transform: translate(-2px, 2px); }
            40% { transform: translate(-2px, -2px); }
            60% { transform: translate(2px, 2px); }
            80% { transform: translate(2px, -2px); }
            100% { transform: translate(0); }
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .button-group {
                flex-direction: column;
                align-items: stretch;
            }
            
            .btn-matrix {
                width: 100%;
                justify-content: center;
            }
            
            .header-content {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .container {
                margin: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Efecto de lluvia de código Matrix -->
    <div class="matrix-rain" id="matrixRain"></div>
    
    <div class="container">
        <div class="card-header">
            <div class="header-content">
                <h4 class="glitch-text"><i class="fas fa-user-edit"></i>EDITAR ESTUDIANTE</h4>
                <a href="{{ route('estudiantes.index') }}" class="btn-matrix btn-light">
                    <i class="fas fa-arrow-left"></i> VOLVER
                </a>
            </div>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert">
                    <strong>¡ERROR EN EL SISTEMA!</strong> CORRIJA LOS ERRORES EN EL FORMULARIO.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <div class="form-group">
                        <label for="codigo" class="required-field">CÓDIGO</label>
                        <input type="text" name="codigo" id="codigo" 
                               value="{{ old('codigo', $estudiante->codigo) }}" 
                               placeholder="INGRESE EL CÓDIGO DEL ESTUDIANTE" required>
                        @error('codigo')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dni" class="required-field">DNI</label>
                        <input type="text" name="dni" id="dni" 
                               value="{{ old('dni', $estudiante->dni) }}" 
                               placeholder="INGRESE EL DNI (8 DÍGITOS)" maxlength="8" required>
                        @error('dni')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombres" class="required-field">NOMBRES</label>
                    <input type="text" name="nombres" id="nombres" 
                           value="{{ old('nombres', $estudiante->nombres) }}" 
                           placeholder="INGRESE LOS NOMBRES DEL ESTUDIANTE" required>
                    @error('nombres')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="pri_ape" class="required-field">PRIMER APELLIDO</label>
                        <input type="text" name="pri_ape" id="pri_ape" 
                               value="{{ old('pri_ape', $estudiante->pri_ape) }}" 
                               placeholder="INGRESE EL PRIMER APELLIDO" required>
                        @error('pri_ape')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="seg_ape">SEGUNDO APELLIDO</label>
                        <input type="text" name="seg_ape" id="seg_ape" 
                               value="{{ old('seg_ape', $estudiante->seg_ape) }}" 
                               placeholder="INGRESE EL SEGUNDO APELLIDO (OPCIONAL)">
                        @error('seg_ape')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn-matrix btn-primary">
                        <i class="fas fa-save"></i> ACTUALIZAR ESTUDIANTE
                    </button>
                    <a href="{{ route('estudiantes.index') }}" class="btn-matrix btn-secondary">
                        <i class="fas fa-times"></i> CANCELAR
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Crear efecto de lluvia de código Matrix
        document.addEventListener('DOMContentLoaded', function() {
            const matrixRain = document.getElementById('matrixRain');
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789$%&@#*';
            const columns = Math.floor(window.innerWidth / 20);
            
            for (let i = 0; i < columns; i++) {
                const char = document.createElement('div');
                char.classList.add('matrix-character');
                
                // Posición aleatoria
                const left = (i * 20) + Math.random() * 20;
                char.style.left = `${left}px`;
                
                // Retraso aleatorio
                const delay = Math.random() * 5;
                char.style.animationDelay = `${delay}s`;
                
                // Duración aleatoria
                const duration = 2 + Math.random() * 5;
                char.style.animationDuration = `${duration}s`;
                
                // Carácter aleatorio
                char.textContent = characters.charAt(Math.floor(Math.random() * characters.length));
                
                matrixRain.appendChild(char);
            }
            
            // Validación básica del formulario
            const form = document.querySelector('form');
            
            form.addEventListener('submit', function(e) {
                let valid = true;
                
                // Validar que el DNI tenga exactamente 8 dígitos
                const dni = document.getElementById('dni');
                if (dni.value.length !== 8 || !/^\d+$/.test(dni.value)) {
                    alert('ERROR: EL DNI DEBE TENER EXACTAMENTE 8 DÍGITOS NUMÉRICOS.');
                    valid = false;
                }
                
                if (!valid) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>
