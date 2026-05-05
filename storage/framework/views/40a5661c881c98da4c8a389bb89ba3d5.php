<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laboratorios - I.U. Pascual Bravo</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/Logo_1.svg')); ?>"style="background-color:#fff;">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/96d07d860b.js" crossorigin="anonymous"></script>
    
    <style>
        body {
            font-family: "Poppins", sans-serif
        }
    </style>
</head>
<body class="antialiased bg-white text-gray-900">
    <div class="min-h-screen flex flex-col justify-between">

        <header class="sticky top-0 z-50" style="background-color:#fff;">
            <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
               <h1 class="flex items-center gap-3 text-2xl font-bold tracking-wide" style="color:#293a52;">
                    <img src="<?php echo e(asset('images/Logo_1.png')); ?>" alt="Logo" class="h-8 w-8 color-black rounded"    >
                    Sistema de inventarios
                </h1>

              
            </div>
        </header>

         <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 50px;
            margin-right: 10px;
        }
        
        .logo h1 {
            font-size: 1.5rem;
            color: #293a52;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 25px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #293a52;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: #1e88e5;
        }
        
        .hero-section {
            background-color: #293a52;
            color: white;
            padding: 80px 0;
            text-align: center;
            position: relative;
            min-height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero-section h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            font-weight: 700;
        }
        
        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            line-height: 1.8;
        }
        
        .login-btn {
            display: inline-block;
            background-color: #1e88e5;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
            cursor: pointer;
        }
        
        .login-btn:hover {
            background-color: #1565c0;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }
        
        .features {
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: #293a52;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
            margin-bottom: 15px;
        }
        
        .section-title p {
            max-width: 600px;
            margin: 0 auto;
            color: #666;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .feature-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .feature-icon {
            background-color: #e3f2fd;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        
        .feature-icon i {
            font-size: 1.8rem;
            color: #1e88e5;
        }
        
        .feature-card h3 {
            font-size: 1.4rem;
            margin-bottom: 15px;
            color: #293a52;
        }
        
        .feature-card p {
            color: #666;
        }
        
        footer {
            background-color: #293a52;
            color: white;
            padding: 40px 0;
            text-align: center;
        }
        
        .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .footer-logo {
            margin-bottom: 20px;
        }
        
        .footer-links {
            display: flex;
            list-style: none;
            margin-bottom: 20px;
        }
        
        .footer-links li {
            margin: 0 15px;
        }
        
        .footer-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: #1e88e5;
        }
        
        .copyright {
            margin-top: 20px;
            color: #b0bec5;
            font-size: 0.9rem;
        }
        
    </style>
</head>
<body>

    <section class="hero-section">
        <div class="hero-content">
            <h2>Gestión de laboratorios</h2>
            <p>Este gestor permite administrar de manera ágil, segura y eficiente el inventario de equipos, reactivos y materiales de los laboratorios de la Institución Universitaria Pascual Bravo.</p>
              <nav class="space-x-6 font-semibold">
                   <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard')); ?>" class="login-btn">Dashboard</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="login-btn">Iniciar sesión</a>
                    <?php endif; ?>
                </nav>

        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Funcionalidades principales</h2>
                <p>Descubre todas las herramientas que nuestro sistema ofrece para la gestión integral de laboratorios</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i>🔬</i>
                    </div>
                    <h3>Gestión de equipos</h3>
                    <p>Registro, seguimiento y mantenimiento de todos los equipos de laboratorio con información detallada y alertas programadas.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i>🧪</i>
                    </div>
                    <h3>Control de reactivos</h3>
                    <p>Administración completa de reactivos químicos, incluyendo fechas de caducidad, niveles de stock y condiciones de almacenamiento.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i>📊</i>
                    </div>
                    <h3>Reportes y estadísticas</h3>
                    <p>Generación de reportes detallados y análisis estadísticos para una toma de decisiones informada sobre los recursos del laboratorio.</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <h2>Institución Universitaria Pascual Bravo</h2>
                <p class="copyright">© 2023 Institución Universitaria Pascual Bravo. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!--- flecha hacia arriba -->

    <a href="" class = "arriba">
        <i class="fa-solid fa-arrow-up"></i>
    </a>


    <style>

        *{
            scroll-behavior:smooth;
        }

        .arriba {
            background-color: lightgrey;
            padding: 10px;
            border-radius: 50%;
            position: fixed;
            bottom: 15px;
            right: 15px;
            transition: .3s ease;
        }

        .arriba:hover
        {
             transform: translateY(-3px);
        }

        i {
            color: white;
        }
    </style>

        </main>

        <?php /**PATH C:\Users\Mauricio\sistema_inventario_laboratorio2\resources\views/welcome.blade.php ENDPATH**/ ?>