<?php
$conexion = new mysqli("localhost", "root", "", "mi_base");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$nombre   = $_POST['nombre'] ?? '';
$correo   = $_POST['correo'] ?? '';
$mensaje  = $_POST['mensaje'] ?? '';


// Usar sentencia preparada (seguridad primero, siempre)
$stmt = $conexion->prepare(
    "INSERT INTO usuarios (nombre, correo, mensaje) VALUES (?, ?, ?)"
);

$stmt->bind_param("sss", $nombre, $correo, $mensaje);

if ($stmt->execute()) {
    echo "Guardado correctamente";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>