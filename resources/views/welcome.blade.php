<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Macro Proveedores</title>
    <style>
        body {
            /* Cambia el fondo aquí, solo pon el nombre del archivo */
            background: url('/fondo1.jpg') center center / cover no-repeat fixed;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }
        .top-bar {
            display: flex;
            align-items: flex-start;
                padding: 10px 60px 0 60px;
        }
        .logo img {
            width: 160px;
            height: auto;
            margin-top: 10px;
            border-radius: 0;
            box-shadow: none;
            cursor: pointer;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
            transition: transform 0.7s cubic-bezier(.77,0,.18,1), filter 0.7s;
        }
        .container.move-right {
            position: fixed;
            top: 0;
            left: 400px;
            right: 0;
            bottom: 0;
            margin: auto;
            transform: translateX(0) scale(0.92);
            filter: blur(1px);
            display: flex;
            justify-content: center;
            align-items: center;
            width: calc(100vw - 350px);
            min-width: 400px;
            max-width: 900px;
            height: 100vh;
            background: transparent;
            z-index: 1;
        }
        .carrusel {
            width: 800px;
            height: 520px;
            background: #fff;
            border-radius: 0;
            box-shadow: none;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }
        .slides {
            display: flex;
            transition: transform 0.7s;
            width: 100%; /* Ajustado a 100% */
        }
        .slide {
            min-width: 100%;
            height: 520px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eee;
        }
        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0;
            background: #fff;
        }
        /* Modal columna animada */
        .modal-bg {
            position: fixed;
            top: 0; left: 0;
            width: 600px; height: 100vh;
            background: #185a9d;
            display: none;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            z-index: 2;
            animation: fadeInBg 0.7s;
        }
        .modal-overlay {
            position: fixed;
            top: 0; left: 350px;
            width: calc(100vw - 350px); height: 100vh;
            background: transparent;
            display: none;
            z-index: 2;
            cursor: pointer;
        }
        @keyframes fadeInBg {
            from { opacity: 0; transform: translateX(-100px);}
            to { opacity: 1; transform: translateX(0);}
        }
        .modal-columna {
            width: 100%;
            padding: 80px 38px 32px 38px;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            position: relative;
            text-align: center;
        }
        .modal-titulo {
            font-size: 3em;
            color: #fff;
            font-weight: bold;
            margin-bottom: 18px;
            letter-spacing: 2px;
            text-align: center;
            width: 100%;
            font-style: normal;
        }
        .modal-frase {
            font-size: 1.4em;
            color: #eaf6fb;
            margin-bottom: 36px;
            font-style: normal;
            text-align: center;
            width: 100%;
        }
        .modal-botones {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 32px;
            width: 100%;
            align-items: center;
        }
        .modal-botones a {
            text-decoration: none;
            padding: 16px 0;
            border-radius: 8px;
            font-size: 1.3em;
            font-weight: 700;
            text-align: center;
            background: #2193b0;
            color: #fff;
            transition: background 0.2s, transform 0.2s;
            width: 220px;
            margin: 0 auto;
            border: none;
            box-sizing: border-box;
            display: block;
        }
        .modal-botones a.registro {
            background: #eaf6fb;
            color: #185a9d;
        }
        .modal-botones a:hover {
            transform: scale(1.04);
            background: #6dd5ed;
            color: #185a9d;
        }
        .modal-mas {
            text-align: center;
            font-size: 1.2em;
            color: #eaf6fb;
            margin-top: 18px;
            cursor: pointer;
            text-decoration: underline;
            width: 100%;
        }
        .modal-logo {
            width: 160px;
            margin: auto;
            position: absolute;
            left: 0;
            right: 0;
            bottom: 120px;
            display: block;
        }
        @media (max-width: 700px) {
            .carrusel { width: 90vw; height: 50vw; }
            .slides { width: 600%; } /* Ajuste del ancho para 6 slides */
            .logo img { width: 60px; height: auto; }
            .modal-bg { width: 100vw; }
            .modal-overlay { left: 100vw; width: 0; }
            .container.move-right {
                left: 100vw;
                width: 100vw;
                min-width: unset;
                max-width: unset;
            }
            .modal-logo { width: 60px; }
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <div class="logo">
            <a href="/"><img src="/Logo.png" alt="Logo"></a>
        </div>
    </div>
    <div class="container" id="mainContainer" style="margin-top:-10px; flex-direction:column;">
    <div id="clickMsg" style="text-align:center; margin-bottom:18px; color:#185a9d; font-weight:500; font-size:1.1em;">Da click en la imagen</div>
        <div class="carrusel" id="carruselArea">
            <div class="slides" id="slides">
                <div class="slide">
                    <img src="/2.jpeg" alt="Imagen 1" class="carrusel-img">
                </div>
                <div class="slide">
                    <img src="/3.jpeg" alt="Imagen 2" class="carrusel-img">
                </div>
                <div class="slide">
                    <img src="/4.jpeg" alt="Imagen 3" class="carrusel-img">
                </div>
                <div class="slide">
                    <img src="/5.jpeg" alt="Imagen 4" class="carrusel-img">
                </div>
                <div class="slide">
                    <img src="/6.jpeg" alt="Imagen 5" class="carrusel-img">
                </div>
                <div class="slide">
                    <img src="/7.jpeg" alt="Imagen 6" class="carrusel-img">
                </div>
            </div>
        </div>
    </div>
    <div class="modal-bg" id="modalBg">
        <div class="modal-columna">
            <div class="modal-titulo">BIENVENIDOS</div>
            <div class="modal-frase">Macro Proveedores<br>“Construimos confianza que trasciende”</div>
            <div class="modal-botones">
                <a href="/login">Login</a>
                <a href="/register" class="registro">Registrarse</a>
            </div>
            <div class="modal-mas" onclick="window.location.href='/nosotros'">
                Conoce más de nosotros
            </div>
            <a href="/"><img src="/lgo.png" alt="Logo Macro" class="modal-logo"></a>
        </div>
    </div>
    <div class="modal-overlay" id="modalOverlay"></div>
    <script>
        let actual = 0;
        const slides = document.getElementById('slides');
        const totalSlides = slides.children.length;

        function mover(dir) {
            actual += dir;
            if (actual < 0) actual = totalSlides - 1;
            if (actual >= totalSlides) actual = 0;
            slides.style.transform = 'translateX(' + (-actual * 100) + '%)';
        }
        
        setInterval(function() {
            mover(1);
        }, 2000);

        const mainContainer = document.getElementById('mainContainer');
        const modalBg = document.getElementById('modalBg');
        const modalOverlay = document.getElementById('modalOverlay');

        function abrirModal() {
            modalBg.style.display = 'flex';
            modalOverlay.style.display = 'block';
            mainContainer.classList.add('move-right');
            var msg = document.getElementById('clickMsg');
            if (msg) msg.style.display = 'none';
        }

        document.body.addEventListener('click', function(e) {
            const isInsideModalBg = e.target.closest('.modal-bg');
            const isLogo = e.target.closest('.logo');
            
            if (modalBg.style.display !== 'flex' && !isInsideModalBg && !isLogo) {
                abrirModal();
            }
        });

    // Ocultar mensaje solo cuando se abre el modal
    </script>
</body>
</html>