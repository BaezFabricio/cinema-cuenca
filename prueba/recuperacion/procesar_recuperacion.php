<?php
include("../db.php");

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$nueva = password_hash($_POST['nueva_contrasena'], PASSWORD_DEFAULT);

// Verificamos si existen esos datos
$sql = "SELECT u.idUsuario
        FROM usuario u
        JOIN persona p ON u.Persona_idPersona = p.idPersona
        WHERE u.nombreUsuario = ? AND p.email = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    // Usuario válido, actualizamos contraseña
    $fila = $resultado->fetch_assoc();
    $sqlUpdate = "UPDATE usuario SET contrasenia = ? WHERE idUsuario = ?";
    $update = $conexion->prepare($sqlUpdate);
    $update->bind_param("si", $nueva, $fila['idUsuario']);
    $update->execute();

    echo "<script>alert('✅ Contraseña actualizada'); window.location.href='../login.php';</script>";
} else {
    echo "<script>alert('❌ Usuario o correo incorrectos'); window.location.href='recuperar.php';</script>";
}
?>
