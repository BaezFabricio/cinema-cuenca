<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrarse - Cinema Cuenca</title>
    <link rel="stylesheet" href="estilo.css">
    <style>
        body {
            background-color: #111;
            font-family: Arial, sans-serif;
            color: white;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-registro {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 40px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
        }

        .form-registro h2 {
            margin-bottom: 25px;
            font-size: 2em;
        }

        .form-registro input {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            background-color: #222;
            color: white;
        }

        .form-registro .boton {
            margin-top: 20px;
            background-color: #ffcc00;
            color: black;
            padding: 12px;
            font-weight: bold;
            font-size: 1.1em;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .form-registro .boton:hover {
            background-color: #ffaa00;
        }

        .form-registro a {
            color: #ccc;
            display: block;
            margin-top: 15px;
            text-decoration: none;
        }

        .form-registro a:hover {
            color: #fff;
        }
    </style>
</head>
<body>

<div class="form-registro">
    <h2>Crear cuenta</h2>
    <form action="procesar_registro.php" method="POST">
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <input type="email" name="email" placeholder="Correo electrónico" required>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
        <input type="password" name="confirmar" placeholder="Confirmar contraseña" required>
        <button type="submit" class="boton">Registrarse</button>
    </form>
    <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
    <a href="index.php">← Volver al inicio</a>
</div>

</body>
</html>
