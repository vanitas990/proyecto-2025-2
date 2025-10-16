<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
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
            max-width: 1000px;
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
            font-size: 2.5rem;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .header-subtitle {
            font-size: 1.1rem;
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
        
        .alert::before {
            content: "✓";
            margin-right: 10px;
            font-weight: bold;
        }
        
        .btn-primary {
            display: inline-flex;
            align-items: center;
            background: var(--gradient);
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
        }
        
        .btn-primary::before {
            content: "+";
            margin-right: 8px;
            font-size: 1.2rem;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: #6b7280;
        }
        
        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #9ca3af;
        }
        
        .player-list {
            list-style: none;
        }
        
        .player-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            border-left: 5px solid var(--primary);
            animation: slideIn 0.5s ease-out;
        }
        
        .player-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        
        .player-info {
            flex: 1;
        }
        
        .player-name {
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--secondary);
            margin-bottom: 5px;
        }
        
        .player-details {
            display: flex;
            gap: 15px;
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .player-details span {
            display: inline-flex;
            align-items: center;
            background: #f3f4f6;
            padding: 4px 10px;
            border-radius: 20px;
        }
        
        .player-actions form {
            margin: 0;
        }
        
        .btn-danger {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 50px;
            cursor: pointer;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        
        .btn-danger:hover {
            background-color: #d81159;
            transform: scale(1.05);
        }
        
        .btn-danger::before {
            content: "×";
            margin-right: 5px;
            font-size: 1.1rem;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideIn {
            from { 
                opacity: 0;
                transform: translateY(20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Efectos de partículas decorativas */
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
        
        /* Responsive */
        @media (max-width: 768px) {
            .player-card {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .player-actions {
                align-self: flex-end;
            }
        }
    </style>
</head>
<body>
    <!-- Partículas decorativas de fondo -->
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <header>
            <h1>Lista de Jugadores</h1>
            <p class="header-subtitle">Gestiona tu equipo de forma divertida</p>
        </header>
        
        <div class="content">
            {{-- ✅ Mensaje de éxito --}}
            @if (session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ➕ Enlace para crear nuevo jugador --}}
            <a href="{{ route('jugadores.create') }}" class="btn-primary">Nuevo jugador</a>

            {{-- 📋 Lista de jugadores --}}
            @if ($jugadores->isEmpty())
                <div class="empty-state">
                    <div class="empty-state-icon">😢</div>
                    <p>No hay jugadores registrados.</p>
                </div>
            @else
                <ul class="player-list">
                    @foreach ($jugadores as $jugador)
                        <li class="player-card">
                            <div class="player-info">
                                <div class="player-name">{{ $jugador->nombre }} {{ $jugador->apellido }}</div>
                                <div class="player-details">
                                    <span>{{ $jugador->rol ?? 'Sin rol' }}</span>
                                    <span>Edad: {{ $jugador->edad }}</span>
                                </div>
                            </div>
                            <div class="player-actions">
                                <form action="{{ route('jugadores.destroy', $jugador->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <script>
        // Crear partículas decorativas
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 20;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Tamaño y posición aleatoria
                const size = Math.random() * 20 + 5;
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
