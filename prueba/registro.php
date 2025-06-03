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

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-registro {
            background-color: #1a1a1a;
            padding: 40px;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.5);
            border: 1px solid #2a2a2a;
            animation: fadeIn 0.6s ease;
        }

        .form-registro h2 {
            margin-bottom: 25px;
            font-size: 2em;
            color: #ffcc00;
        }

        .form-registro input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #333;
            border-radius: 8px;
            background-color: #2a2a2a;
            color: white;
            font-size: 1em;
            outline: none;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        .form-registro input:focus {
            border-color: #ffcc00;
            background-color: #1f1f1f;
        }

        .form-registro .boton {
            margin-top: 15px;
            background-color: #ffcc00;
            color: black;
            padding: 12px;
            font-weight: bold;
            font-size: 1.1em;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .form-registro .boton:hover {
            background-color: #ffaa00;
            transform: scale(1.02);
        }

        .form-registro a {
            color: #ccc;
            display: block;
            margin-top: 15px;
            text-decoration: none;
            font-size: 0.9em;
        }

        .form-registro a:hover {
            color: white;
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
