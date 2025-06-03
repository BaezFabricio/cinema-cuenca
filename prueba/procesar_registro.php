<?php
include("db.php");

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$confirmar = $_POST['confirmar'];

if ($contrasena !== $confirmar) {
    echo "<script>alert('Las contraseñas no coinciden'); window.location.href='registro.php';</script>";
    exit;
}

// Verifica si ya existe
$sql = "SELECT * FROM usuario WHERE nombreUsuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$res = $stmt->get_result();
if ($res->num_rows > 0) {
    echo "<script>alert('Usuario ya existe'); window.location.href='registro.php';</script>";
    exit;
}

// Insertar en persona
$dni = rand(10000000, 99999999);
$nombre = 'Nombre';
$apellido = 'Apellido';

$sqlPersona = "INSERT INTO persona (DNI, nombre, apellido, email) VALUES (?, ?, ?, ?)";
$stmtPersona = $conexion->prepare($sqlPersona);
$stmtPersona->bind_param("ssss", $dni, $nombre, $apellido, $email);
$stmtPersona->execute();
$idPersona = $stmtPersona->insert_id;

// Insertar en usuario
$hash = password_hash($contrasena, PASSWORD_DEFAULT);
$sqlUser = "INSERT INTO usuario (contrasenia, nombreUsuario, Persona_idPersona, rol) VALUES (?, ?, ?, 'cliente')";
$stmtUser = $conexion->prepare($sqlUser);
$stmtUser->bind_param("ssi", $hash, $usuario, $idPersona);

if ($stmtUser->execute()) {
    echo "<script>alert('Usuario registrado'); window.location.href='login.php';</script>";
} else {
    echo "<script>alert('Error registrando usuario'); window.location.href='registro.php';</script>";
}

$stmtUser->close();
$stmtPersona->close();
$conexion->close();
?>
