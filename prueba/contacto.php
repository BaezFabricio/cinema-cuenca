<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Contacto - Cinema Cuenca</title>
    <link rel="stylesheet" href="estilo.css" />
    <style>
        body {
            background-color: #000;
            color: white;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .form-contacto {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 40px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 10px rgba(255,255,255,0.1);
        }
        .form-contacto h2 {
            margin-bottom: 25px;
            font-size: 2em;
            text-align: center;
        }
        .form-contacto input[type="text"],
        .form-contacto input[type="email"],
        .form-contacto textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: none;
            background-color: #222;
            color: white;
            font-size: 1.1em;
            box-sizing: border-box;
            resize: vertical;
        }
        .form-contacto textarea {
            height: 120px;
        }
        .form-contacto .boton {
            background-color: #ffcc00;
            color: black;
            border: none;
            padding: 15px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            font-size: 1.2em;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .form-contacto .boton:hover {
            background-color: #ffaa00;
        }
        .form-contacto a {
            color: #ccc;
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            font-size: 1em;
        }
        .form-contacto a:hover {
            color: #fff;
        }
        .volver-inicio {
    display: inline-block;
    margin-top: 30px;
    color: #ccc;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.volver-inicio:hover {
    color: #fff;
}

    </style>
</head>
<body>

<section class="contacto" id="contacto">
    <h2>Contacto</h2>
    <p>¿Tienes dudas, sugerencias o quieres trabajar con nosotros? ¡Escríbenos!</p>
    <form action="enviar_contacto.php" method="POST">
        <input type="text" name="nombre" placeholder="Tu nombre" required>
        <input type="email" name="email" placeholder="Tu correo" required>
        <textarea name="mensaje" placeholder="Tu mensaje" rows="5" required></textarea>
        <button type="submit" class="boton">Enviar mensaje</button>
    </form>
    <a href="index.php" class="volver-inicio">← Volver al inicio</a>

</section>
</body>

</html>
