<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
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
            max-width: 900px;
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        header {
            background: var(--gradient);
            padding: 40px;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        header::before {
            content: "";
            position: absolute;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
            top: -50%;
            left: -50%;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
        }
        
        .subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 40px;
        }
        
        .menu-item {
            background: #f8fafc;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }
        
        .menu-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
            transform: translateY(-5px);
            transition: transform 0.3s ease;
        }
        
        .menu-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }
        
        .menu-item:hover::before {
            transform: translateY(0);
        }
        
        .menu-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: inline-block;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .menu-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--secondary);
        }
        
        .menu-description {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        
        .menu-link {
            display: inline-block;
            padding: 12px 25px;
            background: var(--gradient);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        }
        
        .menu-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.5);
        }
        
        .menu-link i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }
        
        .menu-link:hover i {
            transform: translateX(5px);
        }
        
        footer {
            text-align: center;
            padding: 20px;
            background: #f8fafc;
            color: #64748b;
            font-size: 0.9rem;
        }
        
        /* Animaciones para elementos individuales */
        .menu-item:nth-child(1) { animation-delay: 0.1s; }
        .menu-item:nth-child(2) { animation-delay: 0.2s; }
        .menu-item:nth-child(3) { animation-delay: 0.3s; }
        .menu-item:nth-child(4) { animation-delay: 0.4s; }
        .menu-item:nth-child(5) { animation-delay: 0.5s; }
        .menu-item:nth-child(6) { animation-delay: 0.6s; }
        
        /* Responsive */
        @media (max-width: 768px) {
            .menu-grid {
                grid-template-columns: 1fr;
                padding: 30px 20px;
            }
            
            header {
                padding: 30px 20px;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Menú Principal</h1>
            <p class="subtitle">Sistema de gestión integral</p>
        </header>
        
        <div class="menu-grid">
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="menu-title">Saludos</h3>
                <p class="menu-description">Mensaje de bienvenida al sistema</p>
                <a href="{{ route('saludos') }}" class="menu-link">
                    Acceder <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-door-open"></i>
                </div>
                <h3 class="menu-title">Bienvenidos</h3>
                <p class="menu-description">Página de bienvenida oficial</p>
                <a href="{{ route('bienvenidos') }}" class="menu-link">
                    Acceder <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-snowflake"></i>
                </div>
                <h3 class="menu-title">Winter Forever</h3>
                <p class="menu-description">Disfruta del invierno eterno</p>
                <a href="{{ route('winter-forever') }}" class="menu-link">
                    Acceder <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="menu-title">Hello</h3>
                <p class="menu-description">Saludo en inglés para usuarios internacionales</p>
                <a href="{{ route('hello') }}" class="menu-link">
                    Acceder <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3 class="menu-title">Estudiantes</h3>
                <p class="menu-description">Gestión del módulo de estudiantes</p>
                <a href="{{ route('estudiantes.index') }}" class="menu-link">
                    Acceder <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-running"></i>
                </div>
                <h3 class="menu-title">Jugadores</h3>
                <p class="menu-description">Gestión del módulo de jugadores</p>
                <a href="{{ route('jugadores.index') }}" class="menu-link">
                    Acceder <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        
        <footer>
            <p>Sistema desarrollado con ❤️ - {{ date('Y') }}</p>
        </footer>
    </div>
</body>
</html>
