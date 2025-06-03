<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión - Cinema Cuenca</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Fondo negro desde el principio -->
  <style>
    html, body {
      background-color: #111;
    }
  </style>

  <!-- Estilo del login -->
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: white;
      animation: fadeIn 0.8s ease forwards;
      opacity: 0;
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

    .form-login {
      background-color: #1a1a1a;
      padding: 40px;
      border-radius: 12px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.4);
      text-align: center;
      border: 1px solid #2a2a2a;
    }

    .form-login h2 {
      font-size: 1.8em;
      margin-bottom: 25px;
      color: #ffcc00;
    }

    .form-login input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #333;
      border-radius: 8px;
      background-color: #2a2a2a;
      color: white;
      font-size: 1em;
      outline: none;
      transition: border-color 0.3s ease;
    }

    .form-login input:focus {
      border-color: #ffcc00;
      background-color: #1f1f1f;
    }

    .form-login .boton {
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

    .form-login .boton:hover {
      background-color: #ffaa00;
      transform: scale(1.02);
    }

    .form-login a {
      color: #ccc;
      text-decoration: none;
      display: block;
      margin-top: 20px;
      font-size: 0.9em;
    }

    .form-login a:hover {
      color: white;
    }
  </style>
</head>
<body>

  <div class="form-login">
    <h2>Iniciar Sesión</h2>
    <form action="validar_login.php" method="POST">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="contrasena" placeholder="Contraseña" required>
      <button type="submit" class="boton">Entrar</button>
    </form>

    <a href="index.php">← Volver al inicio</a>
    <a href="registro.php">¿No tienes cuenta? Regístrate</a>
    <a href="recuperacion/recuperar.php">Recuperar Contraseña</a>
  </div>

</body>
</html>
