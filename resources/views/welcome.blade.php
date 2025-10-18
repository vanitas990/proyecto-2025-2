<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Matrix</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --matrix-green: #00ff41;
            --matrix-dark: #003b00;
            --matrix-black: #000;
            --matrix-glow: 0 0 10px var(--matrix-green), 0 0 20px var(--matrix-green);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Courier New', monospace;
        }
        
        body {
            background-color: var(--matrix-black);
            color: var(--matrix-green);
            min-height: 100vh;
            overflow: hidden;
            position: relative;
        }
        
        /* Efecto de lluvia de código Matrix */
        .matrix-rain {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.3;
        }
        
        .matrix-code {
            position: absolute;
            font-size: 18px;
            color: var(--matrix-green);
            animation: fall linear infinite;
            text-shadow: var(--matrix-glow);
        }
        
        @keyframes fall {
            to {
                transform: translateY(100vh);
            }
        }
        
        .container {
            max-width: 900px;
            width: 100%;
            margin: 2rem auto;
            background: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 20px var(--matrix-green);
            border: 1px solid var(--matrix-green);
            overflow: hidden;
            position: relative;
            z-index: 1;
            animation: containerFade 2s ease-out;
        }
        
        @keyframes containerFade {
            from { 
                opacity: 0;
                transform: translateY(-50px) scale(0.9);
            }
            to { 
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        header {
            background: rgba(0, 59, 0, 0.5);
            padding: 30px;
            text-align: center;
            color: var(--matrix-green);
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid var(--matrix-green);
            text-shadow: var(--matrix-glow);
        }
        
        header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(transparent 0%, rgba(0, 255, 65, 0.1) 50%, transparent 100%);
            animation: scan 3s linear infinite;
        }
        
        @keyframes scan {
            0% { transform: translateY(-100%); }
            100% { transform: translateY(100%); }
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            letter-spacing: 3px;
            animation: flicker 5s infinite alternate;
        }
        
        @keyframes flicker {
            0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
                text-shadow: var(--matrix-glow);
                opacity: 1;
            }
            20%, 24%, 55% {
                text-shadow: none;
                opacity: 0.7;
            }
        }
        
        .subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            letter-spacing: 2px;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 40px;
        }
        
        .menu-item {
            background: rgba(0, 20, 0, 0.5);
            border-radius: 5px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid var(--matrix-green);
            position: relative;
            overflow: hidden;
            animation: itemFade 0.6s ease-out forwards;
            opacity: 0;
            box-shadow: 0 0 10px rgba(0, 255, 65, 0.3);
        }
        
        @keyframes itemFade {
            from {
                opacity: 0;
                transform: translateY(20px) rotateY(90deg);
            }
            to {
                opacity: 1;
                transform: translateY(0) rotateY(0);
            }
        }
        
        .menu-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 0%, rgba(0, 255, 65, 0.1) 50%, transparent 100%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }
        
        .menu-item:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 0 20px var(--matrix-green);
        }
        
        .menu-item:hover::before {
            transform: translateX(100%);
        }
        
        .menu-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: inline-block;
            color: var(--matrix-green);
            text-shadow: var(--matrix-glow);
            transition: all 0.3s ease;
        }
        
        .menu-item:hover .menu-icon {
            transform: scale(1.3) rotate(10deg);
        }
        
        .menu-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--matrix-green);
            text-shadow: var(--matrix-glow);
            letter-spacing: 1px;
        }
        
        .menu-description {
            color: rgba(0, 255, 65, 0.7);
            font-size: 0.9rem;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }
        
        .menu-link {
            display: inline-block;
            padding: 12px 25px;
            background: rgba(0, 59, 0, 0.7);
            color: var(--matrix-green);
            text-decoration: none;
            border-radius: 3px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 255, 65, 0.5);
            border: 1px solid var(--matrix-green);
            letter-spacing: 1px;
            position: relative;
            overflow: hidden;
        }
        
        .menu-link::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: all 0.5s ease;
        }
        
        .menu-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 0 15px var(--matrix-green);
        }
        
        .menu-link:hover::before {
            left: 100%;
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
            background: rgba(0, 20, 0, 0.5);
            color: var(--matrix-green);
            font-size: 0.9rem;
            border-top: 1px solid var(--matrix-green);
            text-shadow: 0 0 5px var(--matrix-green);
            letter-spacing: 1px;
        }
        
        /* Animaciones para elementos individuales */
        .menu-item:nth-child(1) { animation-delay: 0.1s; }
        .menu-item:nth-child(2) { animation-delay: 0.2s; }
        .menu-item:nth-child(3) { animation-delay: 0.3s; }
        .menu-item:nth-child(4) { animation-delay: 0.4s; }
        .menu-item:nth-child(5) { animation-delay: 0.5s; }
        
        /* Efecto de partículas */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        .particle {
            position: absolute;
            background: var(--matrix-green);
            border-radius: 50%;
            opacity: 0;
            animation: particleFloat 10s linear infinite;
        }
        
        @keyframes particleFloat {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(100vw);
                opacity: 0;
            }
        }
        
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
    <div class="matrix-rain" id="matrixRain"></div>
    <div class="particles" id="particles"></div>
    
    <div class="container">
        <header>
            <h1>MENÚ PRINCIPAL</h1>
            <p class="subtitle">SISTEMA DE GESTIÓN INTEGRAL</p>
        </header>
        
        <div class="menu-grid">
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-door-open"></i>
                </div>
                <h3 class="menu-title">BIENVENIDOS</h3>
                <p class="menu-description">Página de bienvenida oficial</p>
                <a href="{{ route('bienvenidos') }}" class="menu-link">
                    ACCEDER <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-snowflake"></i>
                </div>
                <h3 class="menu-title">WINTER FOREVER</h3>
                <p class="menu-description">Disfruta del invierno eterno</p>
                <a href="{{ route('winter-forever') }}" class="menu-link">
                    ACCEDER <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="menu-title">HELLO</h3>
                <p class="menu-description">Saludo en inglés para usuarios internacionales</p>
                <a href="{{ route('hello') }}" class="menu-link">
                    ACCEDER <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <h3 class="menu-title">ESTUDIANTES</h3>
                <p class="menu-description">Gestión del módulo de estudiantes</p>
                <a href="{{ route('estudiantes.index') }}" class="menu-link">
                    ACCEDER <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="menu-item">
                <div class="menu-icon">
                    <i class="fas fa-running"></i>
                </div>
                <h3 class="menu-title">JUGADORES</h3>
                <p class="menu-description">Gestión del módulo de jugadores</p>
                <a href="{{ route('jugadores.index') }}" class="menu-link">
                    ACCEDER <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        
        <footer>
            <p>SISTEMA DESARROLLADO CON EL KOKORO❤️ - {{ date('Y') }}</p>
        </footer>
    </div>

    <script>
        // Crear efecto de lluvia Matrix
        function createMatrixRain() {
            const matrixRain = document.getElementById('matrixRain');
            const characters = '01アイウエオカキクケコサシスセソタチツテトナニヌネノハヒフヘホマミムメモヤユヨラリルレロワヲン';
            
            for (let i = 0; i < 50; i++) {
                const code = document.createElement('div');
                code.classList.add('matrix-code');
                code.textContent = characters.charAt(Math.floor(Math.random() * characters.length));
                code.style.left = Math.random() * 100 + 'vw';
                code.style.animationDuration = (Math.random() * 5 + 3) + 's';
                code.style.opacity = Math.random() * 0.5 + 0.5;
                code.style.fontSize = (Math.random() * 10 + 14) + 'px';
                matrixRain.appendChild(code);
                
                // Reiniciar la animación cuando termine
                code.addEventListener('animationend', function() {
                    this.style.top = '-50px';
                    this.style.left = Math.random() * 100 + 'vw';
                    this.textContent = characters.charAt(Math.floor(Math.random() * characters.length));
                });
            }
        }
        
        // Crear efecto de partículas
        function createParticles() {
            const particles = document.getElementById('particles');
            
            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                particle.style.width = (Math.random() * 5 + 2) + 'px';
                particle.style.height = particle.style.width;
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.top = Math.random() * 100 + 'vh';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                particle.style.animationDelay = (Math.random() * 5) + 's';
                particles.appendChild(particle);
            }
        }
        
        // Animación de entrada para los elementos del menú
        document.addEventListener('DOMContentLoaded', function() {
            createMatrixRain();
            createParticles();
            
            const menuItems = document.querySelectorAll('.menu-item');
            
            menuItems.forEach((item, index) => {
                item.style.animationDelay = `${0.1 + index * 0.1}s`;
            });
            
            // Efecto de escritura para el título
            const title = document.querySelector('h1');
            const subtitle = document.querySelector('.subtitle');
            
            const originalTitle = title.textContent;
            const originalSubtitle = subtitle.textContent;
            
            title.textContent = "";
            subtitle.textContent = "";
            
            let i = 0;
            let j = 0;
            
            const typeWriterTitle = () => {
                if (i < originalTitle.length) {
                    title.textContent += originalTitle.charAt(i);
                    i++;
                    setTimeout(typeWriterTitle, 100);
                } else {
                    typeWriterSubtitle();
                }
            };
            
            const typeWriterSubtitle = () => {
                if (j < originalSubtitle.length) {
                    subtitle.textContent += originalSubtitle.charAt(j);
                    j++;
                    setTimeout(typeWriterSubtitle, 70);
                }
            };
            
            setTimeout(typeWriterTitle, 500);
            
            // Efecto de parpadeo aleatorio para los elementos
            setInterval(() => {
                const randomItem = menuItems[Math.floor(Math.random() * menuItems.length)];
                randomItem.style.boxShadow = '0 0 25px var(--matrix-green)';
                setTimeout(() => {
                    randomItem.style.boxShadow = '0 0 10px rgba(0, 255, 65, 0.3)';
                }, 300);
            }, 2000);
        });
    </script>
</body>
</html>
