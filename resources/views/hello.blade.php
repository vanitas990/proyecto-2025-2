<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo Animado</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #fff;
        }
        
        .container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 800px;
            width: 100%;
            animation: fadeIn 1s ease-out;
            overflow: hidden;
        }
        
        h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            animation: bounce 2s infinite alternate;
        }
        
        .greeting-text {
            font-size: 1.5rem;
            line-height: 1.6;
            margin-bottom: 30px;
            animation: slideIn 1.5s ease-out;
        }
        
        .highlight {
            color: #ffdd59;
            font-weight: bold;
        }
        
        .animated-element {
            display: inline-block;
            margin: 20px 0;
            padding: 15px 30px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            animation: pulse 2s infinite;
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .animated-element:hover {
            transform: scale(1.05);
        }
        
        .features {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 40px;
        }
        
        .feature {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            padding: 20px;
            margin: 10px;
            width: 200px;
            transition: all 0.3s ease;
            animation: fadeUp 1s ease-out;
        }
        
        .feature:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.25);
        }
        
        .feature i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            display: block;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes bounce {
            from {
                transform: translateY(0px);
            }
            to {
                transform: translateY(-15px);
            }
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(255, 221, 89, 0.4);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(255, 221, 89, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(255, 221, 89, 0);
            }
        }
        
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            
            .greeting-text {
                font-size: 1.2rem;
            }
            
            .features {
                flex-direction: column;
                align-items: center;
            }
            
            .feature {
                width: 80%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hello!</h1>
        
        <div class="greeting-text">
            <p>Welcome to this <span class="highlight">beautiful animated interface</span>! We're thrilled to have you here.</p>
            <p>This is a special greeting crafted with <span class="highlight">care and creativity</span> to make your experience more enjoyable and engaging.</p>
            <p>May your day be filled with <span class="highlight">joy, success, and wonderful moments</span>!</p>
        </div>
        
        <div class="animated-element">
            ✨ Hover over me! ✨
        </div>
        
        <div class="features">
            <div class="feature" style="animation-delay: 0.2s;">
                <i>🌟</i>
                <h3>Elegant Design</h3>
                <p>Smooth animations and modern aesthetics</p>
            </div>
            
            <div class="feature" style="animation-delay: 0.4s;">
                <i>💫</i>
                <h3>Interactive</h3>
                <p>Engaging elements that respond to your actions</p>
            </div>
            
            <div class="feature" style="animation-delay: 0.6s;">
                <i>🚀</i>
                <h3>Fast & Smooth</h3>
                <p>Optimized performance for best experience</p>
            </div>
        </div>
    </div>

    <script>
        // Agregar interactividad adicional
        document.querySelector('.animated-element').addEventListener('click', function() {
            this.textContent = "You clicked me! 🎉";
            this.style.background = "rgba(255, 221, 89, 0.3)";
            
            setTimeout(() => {
                this.textContent = "✨ Hover over me! ✨";
                this.style.background = "rgba(255, 255, 255, 0.2)";
            }, 1500);
        });
        
        // Efecto de escritura para el título
        const title = document.querySelector('h1');
        const originalText = title.textContent;
        title.textContent = "";
        
        let i = 0;
        const typeWriter = () => {
            if (i < originalText.length) {
                title.textContent += originalText.charAt(i);
                i++;
                setTimeout(typeWriter, 100);
            }
        };
        
        // Iniciar la animación de escritura
        setTimeout(typeWriter, 500);
    </script>
</body>
</html>
