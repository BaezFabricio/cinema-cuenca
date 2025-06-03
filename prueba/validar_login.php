<?php
session_start();
include("db.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuario WHERE nombreUsuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $fila = $result->fetch_assoc();

    // DEBUG: Mostrar para confirmar
    echo "Ingresado: $contrasena<br>";
    echo "Hash guardado: " . $fila['contrasenia'] . "<br>";

    if (password_verify($contrasena, $fila['contrasenia'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit;
    } else {
        echo "❌ Contraseña incorrecta";
    }
} else {
    echo "❌ Usuario no encontrado";
}
?>
