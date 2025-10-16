<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nuevo Jugador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #f72585;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --gradient: linear-gradient(135deg, #4361ee, #3a0ca3);
            --gradient-accent: linear-gradient(135deg, #f72585, #b5179e);
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
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-image: 
                radial-gradient(#4361ee15 1px, transparent 1px),
                radial-gradient(#3a0ca315 1px, transparent 1px);
            background-size: 30px 30px, 60px 60px;
            background-position: 0 0, 15px 15px;
            animation: backgroundMove 20s infinite linear;
        }
        
        @keyframes backgroundMove {
            0% { background-position: 0 0, 15px 15px; }
            100% { background-position: 30px 30px, 45px 45px; }
        }
        
        .container {
            max-width: 800px;
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            display: flex;
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .graphic-side {
            flex: 1;
            background: var(--gradient);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 30px;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .graphic-side::before {
            content: "";
            position: absolute;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
            z-index: 1;
        }
        
        .soccer-icon {
            font-size: 5rem;
            margin-bottom: 20px;
            z-index: 2;
            animation: bounce 3s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        
        .graphic-text {
            text-align: center;
            z-index: 2;
        }
        
        .graphic-text h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        
        .form-side {
            flex: 2;
            padding: 40px;
        }
        
        h1 {
            color: var(--secondary);
            margin-bottom: 30px;
            text-align: center;
            font-size: 2.2rem;
            position: relative;
        }
        
        h1::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--gradient);
            border-radius: 2px;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--secondary);
            display: flex;
            align-items: center;
        }
        
        label i {
            margin-right: 10px;
            color: var(--primary);
        }
        
        input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 42px;
            color: #94a3b8;
        }
        
        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }
        
        .btn {
            padding: 14px 30px;
            border: none;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .btn-submit {
            background: var(--gradient);
            color: white;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.5);
        }
        
        .btn-back {
            background: white;
            color: var(--dark);
            border: 2px solid #e2e8f0;
            text-decoration: none;
        }
        
        .btn-back:hover {
            background: #f8fafc;
            border-color: var(--primary);
            color: var(--primary);
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        /* Efecto de partículas decorativas */
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
            background: rgba(67, 97, 238, 0.15);
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
            .container {
                flex-direction: column;
                max-width: 500px;
            }
            
            .graphic-side {
                padding: 30px 20px;
            }
            
            .soccer-icon {
                font-size: 3.5rem;
            }
            
            .form-side {
                padding: 30px 25px;
            }
            
            .button-group {
                flex-direction: column;
                gap: 15px;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Partículas decorativas de fondo -->
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <div class="graphic-side">
            <div class="soccer-icon">
                <i class="fas fa-futbol"></i>
            </div>
            <div class="graphic-text">
                <h2>¡Únete al equipo!</h2>
                <p>Completa tus datos para formar parte del equipo</p>
            </div>
        </div>
        
        <div class="form-side">
            <h1>Registrar nuevo jugador</h1>
            
            <form action="{{ route('jugadores.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="nombre"><i class="fas fa-user"></i>Nombre:</label>
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="apellido"><i class="fas fa-user-tag"></i>Apellido:</label>
                    <div class="input-icon">
                        <i class="fas fa-user-tag"></i>
                    </div>
                    <input type="text" id="apellido" name="apellido" placeholder="Ingresa tu apellido" required>
                </div>
                
                <div class="form-group">
                    <label for="edad"><i class="fas fa-birthday-cake"></i>Edad:</label>
                    <div class="input-icon">
                        <i class="fas fa-birthday-cake"></i>
                    </div>
                    <input type="number" id="edad" name="edad" placeholder="Ingresa tu edad" min="1" max="99" required>
                </div>
                
                <div class="form-group">
                    <label for="rol"><i class="fas fa-star"></i>Rol:</label>
                    <div class="input-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <input type="text" id="rol" name="rol" placeholder="Ej: Delantero, Portero, etc.">
                </div>
                
                <div class="button-group">
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-save"></i>Guardar
                    </button>
                    
                    <a href="{{ route('jugadores.index') }}" class="btn btn-back">
                        <i class="fas fa-arrow-left"></i>Volver a la lista
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Crear partículas decorativas
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 25;
            
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
