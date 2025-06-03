

<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema Cuenca</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <!-- Video de fondo -->
    <video autoplay muted loop id="videoFondo">
        <source src="fondocine.mp4" type="video/mp4">
        Tu navegador no soporta video HTML5.
    </video>

    <div class="contenido">
        <header>
            <h1>CINEMA <span>CUENCA</span></h1>
            
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="../Cine/index.php">Películas</a></li> 
                    <li><a href="#">Candy</a></li>
                    <li><a href="clientes.php">Clientes</a></li>
                    <li><a href="#quienes-somos">¿Quiénes somos?</a></li> 
                    <li><a href="contacto.php">Contacto</a></li>
                    <?php if (isset($_SESSION['usuario'])): ?>
                    <li><a href="#"><?php echo '👤 ' . $_SESSION['usuario']; ?></a></li>
                    <li><a href="logout.php">Cerrar sesión</a></li>
                    <?php else: ?>
                    <li><a href="login.php">Iniciar sesión</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </header>

        <main>
            <h1>CINEMA <span>CUENCA</span></h1>
            <p>Tu lugar para vivir el cine a lo grande. Las mejores películas, el mejor sonido, y la mejor experiencia en Cuenca</p>
            <a href="#" class="boton">EXPLORAR</a>
        </main>
    </div>

    <!-- NUEVA SECCIÓN QUIENES SOMOS -->
    <section id="quienes-somos" class="quienes-somos">
        <h2>¿Quiénes somos?</h2>
        <p>
            Somos Cinema Cuenca, un espacio dedicado a ofrecer la mejor experiencia cinematográfica en la ciudad.  
            Nos apasiona el cine y queremos compartir esa pasión contigo, brindando películas de calidad, eventos especiales y un ambiente cómodo y amigable.
        </p>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const seccion = document.querySelector('.quienes-somos');

        function revisarVisibilidad() {
            const rect = seccion.getBoundingClientRect();
            if(rect.top < window.innerHeight - 100) {
                seccion.classList.add('visible');
                window.removeEventListener('scroll', revisarVisibilidad);
            }
        }

        window.addEventListener('scroll', revisarVisibilidad);
        revisarVisibilidad(); // también revisa al cargar
    });
    </script>

    <footer>
        <a href="#"><img src="icono-facebook.png" alt="Facebook"></a>
        <a href="#"><img src="icono-twitter.png" alt="Twitter"></a>
        <a href="#"><img src="icono-instagram.png" alt="Instagram"></a>
    </footer>

</body>
</html>
