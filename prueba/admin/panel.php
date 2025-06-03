<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: prueba/login.php");
    exit;
}
?>
<h2>Bienvenido, <?php echo $_SESSION['usuario']; ?></h2>
<a href="logout.php">Cerrar sesión</a>