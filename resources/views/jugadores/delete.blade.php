<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Eliminación - Matrix</title>
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
            overflow: hidden;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
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
        
        .confirmation-container {
            background-color: rgba(0, 0, 0, 0.85);
            border: 1px solid var(--matrix-green);
            border-radius: 5px;
            padding: 30px;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 255, 65, 0.3);
            position: relative;
            overflow: hidden;
            z-index: 10;
        }
        
        .confirmation-container::before {
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
        
        .warning-icon {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--matrix-green);
            text-shadow: 0 0 10px var(--matrix-green);
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--matrix-green);
        }
        
        p {
            margin-bottom: 25px;
            line-height: 1.6;
            text-align: center;
        }
        
        .player-info {
            background-color: var(--matrix-darker);
            border: 1px solid var(--matrix-green);
            padding: 15px;
            margin: 20px 0;
            border-radius: 3px;
            position: relative;
            overflow: hidden;
        }
        
        .player-info::before {
            content: ">";
            position: absolute;
            left: 5px;
            top: 15px;
            color: var(--matrix-green);
        }
        
        .player-detail {
            margin-left: 20px;
            margin-bottom: 8px;
        }
        
        .button-group {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
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
        }
        
        .btn-matrix:hover {
            background-color: var(--matrix-green);
            color: var(--matrix-black);
            box-shadow: 0 0 10px var(--matrix-green);
        }
        
        .btn-cancel {
            background-color: transparent;
            color: #ff3333;
            border: 1px solid #ff3333;
        }
        
        .btn-cancel:hover {
            background-color: #ff3333;
            color: var(--matrix-black);
            box-shadow: 0 0 10px #ff3333;
        }
        
        .btn-confirm {
            background-color: transparent;
            color: var(--matrix-green);
            border: 1px solid var(--matrix-green);
        }
        
        .btn-confirm:hover {
            background-color: var(--matrix-green);
            color: var(--matrix-black);
            box-shadow: 0 0 10px var(--matrix-green);
        }
        
        .glitch-effect {
            position: relative;
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
            .button-group {
                flex-direction: column;
            }
            
            .confirmation-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Efecto de lluvia de código Matrix -->
    <div class="matrix-rain" id="matrixRain"></div>
    
    <div class="confirmation-container">
        <div class="warning-icon">⚠️</div>
        <h2 class="glitch-effect">CONFIRMACIÓN REQUERIDA</h2>
        <p>ESTA ACCIÓN NO SE PUEDE DESHACER. EL JUGADOR SERÁ ELIMINADO PERMANENTEMENTE.</p>
        
        <div class="player-info">
            <div class="player-detail"><strong>{{ $jugador->nombre }} {{ $jugador->apellido }}</strong></div>
            <div class="player-detail">EDAD: {{ $jugador->edad }} | ROL: {{ $jugador->rol ?? 'SIN ROL' }}</div>
        </div>
        
        <div class="button-group">
            <a href="{{ route('jugadores.index') }}" class="btn-matrix btn-cancel">CANCELAR</a>
            
            <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-matrix btn-confirm">CONFIRMAR ELIMINACIÓN</button>
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
        });
    </script>
</body>
</html>
