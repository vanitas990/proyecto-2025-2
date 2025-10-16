<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winter Forever</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background: linear-gradient(to bottom, #0a2a5f, #1c3b6f, #2c5282);
            color: #e6f1ff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }
        
        .snowflakes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }
        
        .snowflake {
            position: absolute;
            top: -10px;
            color: #ffffff;
            opacity: 0.8;
            animation: fall linear infinite;
        }
        
        @keyframes fall {
            to {
                transform: translateY(105vh) rotate(360deg);
            }
        }
        
        .container {
            max-width: 700px;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 2;
            animation: glow 8s infinite alternate;
        }
        
        @keyframes glow {
            0% {
                box-shadow: 0 0 15px rgba(173, 216, 230, 0.4);
            }
            100% {
                box-shadow: 0 0 25px rgba(135, 206, 250, 0.6);
            }
        }
        
        h1 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            font-weight: 300;
            letter-spacing: 0.5px;
            position: relative;
            opacity: 0;
            animation: fadeIn 1.5s forwards;
        }
        
        /* Ajustamos los delays para que winter forever aparezca último */
        h1:nth-child(1) { animation-delay: 0.3s; }
        h1:nth-child(2) { animation-delay: 0.6s; }
        h1:nth-child(3) { animation-delay: 0.9s; }
        h1:nth-child(4) { animation-delay: 1.2s; }
        h1:nth-child(5) { animation-delay: 1.5s; }
        h1:nth-child(6) { animation-delay: 1.8s; }
        h1:nth-child(7) { animation-delay: 2.1s; }
        h1:nth-child(8) { animation-delay: 2.4s; }
        h1:nth-child(9) { animation-delay: 2.7s; }
        h1:nth-child(10) { animation-delay: 3.9s; } /* Este es el último verso - winter forever */
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .title-accent {
            color: #87cefa;
            font-weight: 400;
            text-shadow: 0 0 8px rgba(135, 206, 250, 0.7);
        }
        
        .winter-icon {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            color: #e6f1ff;
            text-shadow: 0 0 12px rgba(255, 255, 255, 0.6);
            animation: pulse 3s infinite alternate;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
                text-shadow: 0 0 8px rgba(255, 255, 255, 0.6);
            }
            100% {
                transform: scale(1.05);
                text-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
            }
        }
        
        .footer {
            margin-top: 2rem;
            font-size: 1rem;
            opacity: 0.8;
            animation: fadeIn 2s forwards;
            animation-delay: 4.5s; /* Ajustamos este delay también */
            opacity: 0;
        }
        
        /* Efectos de brillo en texto al pasar el mouse */
        h1:hover {
            color: #ffffff;
            text-shadow: 0 0 12px rgba(255, 255, 255, 0.8);
            transition: all 0.3s ease;
        }
        
        /* Diseño responsivo */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.6rem;
            }
            
            .container {
                padding: 1.5rem;
            }
            
            .winter-icon {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 480px) {
            h1 {
                font-size: 1.4rem;
            }
            
            .container {
                padding: 1.2rem;
            }
            
            .winter-icon {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="snowflakes" id="snowflakes"></div>
    
    <div class="container">
        <div class="winter-icon">
            <i class="fas fa-snowflake"></i>
        </div>
        
        <h1>i close my eyes!</h1>
        <h1>and i find!</h1>
        <h1>that it's winter all the time!</h1>
        <h1>in the white!</h1>
        <h1>in my mind!</h1>
        <h1>there's no leaving you behind!</h1>
        <h1>when i die!</h1>
        <h1>i'll be fine!</h1>
        <h1>cause i always call you my</h1>
        <h1>winter forever!</h1>
        
        <div class="footer">
            <p>Un eterno invierno en el corazón</p>
        </div>
    </div>

    <script>
        // Crear efecto de nieve
        function createSnow() {
            const snowflakes = document.getElementById('snowflakes');
            const snowflakeSymbols = ['❄', '❅', '❆', '✻', '✼', '✾', '＊'];
            
            for (let i = 0; i < 80; i++) {
                const snowflake = document.createElement('div');
                snowflake.className = 'snowflake';
                snowflake.innerHTML = snowflakeSymbols[Math.floor(Math.random() * snowflakeSymbols.length)];
                
                // Propiedades aleatorias para cada copo de nieve
                const size = Math.random() * 15 + 8;
                const posX = Math.random() * 100;
                const delay = Math.random() * 20;
                const duration = Math.random() * 10 + 10;
                
                snowflake.style.left = `${posX}%`;
                snowflake.style.fontSize = `${size}px`;
                snowflake.style.animationDelay = `${delay}s`;
                snowflake.style.animationDuration = `${duration}s`;
                
                snowflakes.appendChild(snowflake);
            }
        }
        
        // Iniciar efecto de nieve cuando la página cargue
        window.addEventListener('load', createSnow);
        
        // Efecto de escritura para el último verso
        setTimeout(() => {
            const lastVerse = document.querySelector('.title-accent');
            lastVerse.style.animation = 'pulse 2s infinite alternate';
        }, 4500); // Ajustamos este tiempo también
    </script>
</body>
</html>
