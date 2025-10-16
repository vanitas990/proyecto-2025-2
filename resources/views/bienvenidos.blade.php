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
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            background: linear-gradient(to bottom, #0a0f2e, #1a2a4c, #2c3e6e);
            color: #f0f8ff;
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
        
        .greeting {
            position: absolute;
            top: 20px;
            left: 0;
            width: 100%;
            font-size: 1.2rem;
            color: #a3d9ff;
            text-shadow: 0 0 10px rgba(163, 217, 255, 0.7);
            animation: greetFade 4s ease-in-out;
            z-index: 3;
        }
        
        @keyframes greetFade {
            0% { opacity: 0; transform: translateY(-20px); }
            20% { opacity: 1; transform: translateY(0); }
            80% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(-20px); }
        }
        
        .container {
            max-width: 700px;
            padding: 2.5rem;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 4, 40, 0.3),
                        inset 0 0 0 1px rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 2;
            animation: containerGlow 10s infinite alternate;
        }
        
        @keyframes containerGlow {
            0% {
                box-shadow: 0 0 20px rgba(100, 180, 255, 0.4),
                           inset 0 0 0 1px rgba(255, 255, 255, 0.1);
            }
            100% {
                box-shadow: 0 0 30px rgba(70, 130, 255, 0.6),
                           inset 0 0 0 1px rgba(255, 255, 255, 0.15);
            }
        }
        
        h1 {
            font-size: 1.9rem;
            margin-bottom: 1.2rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            font-weight: 300;
            letter-spacing: 1px;
            position: relative;
            opacity: 0;
            animation: fadeInUp 1.8s forwards;
            line-height: 1.4;
        }
        
        h1:nth-child(1) { animation-delay: 0.4s; }
        h1:nth-child(2) { animation-delay: 0.8s; }
        h1:nth-child(3) { animation-delay: 1.2s; }
        h1:nth-child(4) { animation-delay: 1.6s; }
        h1:nth-child(5) { animation-delay: 2.0s; }
        h1:nth-child(6) { animation-delay: 2.4s; }
        h1:nth-child(7) { animation-delay: 2.8s; }
        h1:nth-child(8) { animation-delay: 3.2s; }
        h1:nth-of-type(9) { animation-delay: 3.6s; }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .title-accent {
            color: #7ec8ff;
            font-weight: 500;
            text-shadow: 0 0 15px rgba(126, 200, 255, 0.8),
                         0 0 30px rgba(126, 200, 255, 0.4);
            font-size: 2.2rem;
        }
        
        .winter-icon {
            font-size: 3.5rem;
            margin: 2rem 0;
            color: #e6f1ff;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.7);
            animation: iconPulse 4s infinite alternate;
        }
        
        @keyframes iconPulse {
            0% {
                transform: scale(1) rotate(0deg);
                text-shadow: 0 0 15px rgba(255, 255, 255, 0.6);
            }
            100% {
                transform: scale(1.1) rotate(5deg);
                text-shadow: 0 0 25px rgba(255, 255, 255, 0.9);
            }
        }
        
        .footer {
            margin-top: 3rem;
            font-size: 1.1rem;
            color: #b8e2ff;
            animation: fadeIn 3s forwards;
            animation-delay: 7s;
            opacity: 0;
        }
        
        @keyframes fadeIn {
            to { opacity: 0.9; }
        }
        
        h1:hover {
            color: #ffffff;
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.9),
                         0 0 30px rgba(255, 255, 255, 0.4);
            transition: all 0.4s ease;
        }
        
        .frost-border {
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 22px;
            background: linear-gradient(45deg, 
                           rgba(255,255,255,0.1) 0%, 
                           rgba(255,255,255,0.05) 25%,
                           rgba(255,255,255,0.1) 50%,
                           rgba(255,255,255,0.05) 75%,
                           rgba(255,255,255,0.1) 100%);
            z-index: -1;
            animation: frostShine 8s infinite linear;
        }
        
        @keyframes frostShine {
            0% { background-position: 0% 0%; }
            100% { background-position: 200% 200%; }
        }
        
        .final-title {
            opacity: 0;
            animation: finalFadeIn 2.5s forwards;
            animation-delay: 5s;
        }

        @keyframes finalFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 1.7rem;
            }
            .container {
                padding: 2rem;
            }
            .winter-icon {
                font-size: 3rem;
            }
        }
        
        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
            }
            .container {
                padding: 1.5rem;
            }
            .winter-icon {
                font-size: 2.5rem;
            }
            .greeting {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="snowflakes" id="snowflakes"></div>
    
    <div class="greeting">
        ❄️ Bienvenido al invierno eterno ❄️
    </div>
    
    <div class="container">
        <div class="frost-border"></div>
        
        <div class="winter-icon">
            <i class="fas fa-snowflake"></i>
        </div>
        
        <h1>cierro los ojos!</h1>
        <h1>y descubro!</h1>
        <h1>que es invierno todo el tiempo!</h1>
        <h1>en lo blanco!</h1>
        <h1>en mi mente!</h1>
        <h1>no hay forma de dejarte atrás!</h1>
        <h1>cuando muera!</h1>
        <h1>estaré bien!</h1>
        <h1>porque siempre te llamo mi!</h1>
        <h1>invierno eterno!</h1>
        
        <div class="footer">
            <p>Donde los recuerdos nunca se congelan</p>
        </div>
    </div>

    <script>
        function createSnow() {
            const snowflakes = document.getElementById('snowflakes');
            const symbols = ['❄', '❅', '❆', '＊', '✢', '✶', '✷'];
            
            for (let i = 0; i < 100; i++) {
                const flake = document.createElement('div');
                flake.className = 'snowflake';
                flake.innerHTML = symbols[Math.floor(Math.random() * symbols.length)];
                
                const size = Math.random() * 20 + 12;
                const posX = Math.random() * 100;
                const delay = Math.random() * 20;
                const duration = Math.random() * 15 + 15;
                const opacity = Math.random() * 0.5 + 0.4;
                
                flake.style.left = `${posX}%`;
                flake.style.fontSize = `${size}px`;
                flake.style.animationDelay = `${delay}s`;
                flake.style.animationDuration = `${duration}s`;
                flake.style.opacity = opacity;
                
                snowflakes.appendChild(flake);
            }
        }
        
        window.addEventListener('load', createSnow);
        
        setTimeout(() => {
            const lastVerse = document.querySelector('.final-title');
            lastVerse.style.animation = 'pulse 3s infinite alternate';
        }, 7500);
    </script>
</body>
</html>
