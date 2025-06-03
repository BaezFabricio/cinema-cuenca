<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="recuperar.css">


</head>
<body>

<div class="form-recuperar">
    <h2>Restablecer contraseña</h2>
    <form action="procesar_recuperacion.php" method="POST">
        <input type="text" name="usuario" placeholder="Nombre de usuario" required>
        <input type="email" name="email" placeholder="Correo registrado" required>
        <input type="password" name="nueva_contrasena" placeholder="Nueva contraseña" required>
        <button type="submit" class="boton">Actualizar Contraseña</button>
    </form>
    <a href="../login.php">← Volver a iniciar sesión</a>
</div>

</body>
</html>
