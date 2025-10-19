<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores - Matrix Style</title>
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
            max-width: 1000px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.8);
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
        
        header {
            background-color: var(--matrix-darker);
            padding: 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid var(--matrix-green);
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: var(--matrix-green);
            text-shadow: 0 0 10px var(--matrix-green);
        }
        
        .header-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .content {
            padding: 30px;
        }
        
        .alert {
            background-color: var(--matrix-darker);
            color: var(--matrix-green);
            padding: 15px;
            border: 1px solid var(--matrix-green);
            border-radius: 3px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }
        
        .alert::before {
            content: ">";
            margin-right: 10px;
            font-weight: bold;
            color: var(--matrix-green);
        }
        
        .btn-menu {
            background-color: transparent;
            color: var(--matrix-green);
            border: 1px solid var(--matrix-green);
            padding: 10px 20px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
            display: inline-block;
            transition: all 0.3s ease;
            font-family: 'Courier New', monospace;
        }
        
        .btn-menu:hover {
            background-color: var(--matrix-green);
            color: var(--matrix-black);
            box-shadow: 0 0 10px var(--matrix-green);
        }
        
        .btn-menu::before {
            content: "< ";
            margin-right: 8px;
        }
        
        .btn-primary {
            background-color: transparent;
            color: var(--matrix-green);
            border: 1px solid var(--matrix-green);
            padding: 12px 25px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 30px;
            margin-left: 15px;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            font-family: 'Courier New', monospace;
        }
        
        .btn-primary:hover {
            background-color: var(--matrix-green);
            color: var(--matrix-black);
            box-shadow: 0 0 10px var(--matrix-green);
        }
        
        .btn-primary::before {
            content: "+ ";
            margin-right: 8px;
            font-size: 1.2rem;
        }
        
        /* ESTILOS PARA BOTÓN EDITAR */
        .btn-edit {
            background-color: transparent;
            color: var(--matrix-green);
            border: 1px solid var(--matrix-green);
            padding: 8px 15px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            margin-right: 10px;
            transition: all 0.3s ease;
            font-family: 'Courier New', monospace;
        }

        .btn-edit:hover {
            background-color: var(--matrix-green);
            color: var(--matrix-black);
            box-shadow: 0 0 10px var(--matrix-green);
        }

        .btn-edit::before {
            content: "EDIT ";
            margin-right: 5px;
        }

        /* ESTILOS PARA BOTÓN ELIMINAR */
        .btn-delete {
            background-color: transparent;
            color: #ff3333;
            border: 1px solid #ff3333;
            padding: 8px 15px;
            text-decoration: none;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            font-family: 'Courier New', monospace;
        }

        .btn-delete:hover {
            background-color: #ff3333;
            color: var(--matrix-black);
            box-shadow: 0 0 10px #ff3333;
        }

        .btn-delete::before {
            content: "DEL ";
            margin-right: 5px;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: #00ff41;
        }
        
        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        
        .player-list {
            list-style: none;
        }
        
        .player-card {
            background-color: var(--matrix-darker);
            border: 1px solid var(--matrix-green);
            border-radius: 3px;
            padding: 20px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .player-card:hover {
            box-shadow: 0 0 15px rgba(0, 255, 65, 0.5);
            transform: translateY(-2px);
        }
        
        .player-info {
            flex: 1;
        }
        
        .player-name {
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--matrix-green);
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        
        .player-details {
            display: flex;
            gap: 15px;
            color: #00cc33;
            font-size: 0.9rem;
        }
        
        .player-details span {
            display: inline-flex;
            align-items: center;
            background: rgba(0, 255, 65, 0.1);
            padding: 4px 10px;
            border-radius: 3px;
            border: 1px solid rgba(0, 255, 65, 0.3);
        }
        
        .player-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        @media (max-width: 768px) {
            .player-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .player-actions {
                align-self: flex-end;
            }

            .btn-primary {
                margin-left: 0;
                margin-top: 10px;
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Efecto de lluvia de código Matrix -->
    <div class="matrix-rain" id="matrixRain"></div>
    
    <div class="container">
        <header>
            <h1>LISTA DE JUGADORES</h1>
            <p class="header-subtitle">SISTEMA DE GESTIÓN MATRIX</p>
        </header>

        <div class="content">
            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ url('/') }}" class="btn-menu">VOLVER AL MENÚ PRINCIPAL</a>
            <a href="{{ route('jugadores.create') }}" class="btn-primary">NUEVO JUGADOR</a>

            @if ($jugadores->isEmpty())
                <div class="empty-state">
                    <div class="empty-state-icon">[NO DATA]</div>
                    <p>NO HAY JUGADORES REGISTRADOS EN EL SISTEMA.</p>
                </div>
            @else
                <ul class="player-list">
                    @foreach ($jugadores as $jugador)
                        <li class="player-card">
                            <div class="player-info">
                                <div class="player-name">{{ $jugador->nombre }} {{ $jugador->apellido }}</div>
                                <div class="player-details">
                                    <span>{{ $jugador->rol ?? 'SIN ROL' }}</span>
                                    <span>EDAD: {{ $jugador->edad }}</span>
                                </div>
                            </div>
                            <div class="player-actions">
                                <!-- BOTÓN DE EDITAR -->
                                <a href="{{ route('jugadores.edit', $jugador->id) }}" class="btn-edit">
                                    EDITAR
                                </a>
                                
                                <!-- BOTÓN DE ELIMINAR -->
                                <a href="{{ route('jugadores.confirm-delete', $jugador->id) }}" class="btn-delete">
                                    ELIMINAR
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
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
