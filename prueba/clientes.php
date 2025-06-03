<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes - Cinema Cuenca</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <video autoplay muted loop id="videoFondo">
    <source src="fondocine.mp4" type="video/mp4">
    Tu navegador no soporta video HTML5.
    </video>

    <div class="contenido">
        <!-- Acá va la sección de clientes -->
         <section class="clientes-section" id="clientes">
    <h2>Lo que dicen nuestros clientes</h2>
    <p class="intro">En Cinema Cuenca, nuestros clientes son lo más importante. Compartí tu experiencia y ayudanos a mejorar.</p>

    <!-- Testimonios simulados -->
    <div class="testimonios">
        <blockquote>
            <p>“¡Excelente servicio y salas impecables! Volveré sin duda.”</p>
            <footer>— María Gómez ⭐⭐⭐⭐⭐</footer>
        </blockquote>
        <blockquote>
            <p>“Me encantó la película y la atención fue muy buena.”</p>
            <footer>— Juan Pérez ⭐⭐⭐⭐☆</footer>
        </blockquote>
    </div>

    <!-- Formulario de opinión -->
    <form class="form-opinion" action="guardar_opinion.php" method="POST">
        <input type="text" name="nombre" placeholder="Tu nombre" required>
        <textarea name="comentario" placeholder="Tu experiencia..." required></textarea>
        <label for="puntuacion">Puntuación:</label>
        <select name="puntuacion" id="puntuacion" required>
            <option value="5">⭐⭐⭐⭐⭐</option>
            <option value="4">⭐⭐⭐⭐</option>
            <option value="3">⭐⭐⭐</option>
            <option value="2">⭐⭐</option>
            <option value="1">⭐</option>
        </select>
        <button type="submit" class="boton">Enviar opinión</button>
    </form>

    <a href="index.php" class="volver-inicio">← Volver al inicio</a>
</section>
    </div> <!-- cierre de .contenido -->
</body>
</html>
