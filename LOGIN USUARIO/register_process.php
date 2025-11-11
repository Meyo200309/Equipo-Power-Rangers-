<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: register.php'); exit;
}

$nombre = trim($_POST['nombre_usuario']);
$correo = trim($_POST['correo']);
$pass = $_POST['contraseña'];

$hash = password_hash($pass, PASSWORD_DEFAULT);
$estado = 1;
$id_rol_default = 2;
$fecha = date('Y-m-d'); // <-- tipo date correcto

$stmt = $mysqli->prepare("INSERT INTO usuario (nombre_usuario, correo, contraseña, estado, fecha_registro, id_rol) VALUES (?,?,?,?,?,?)");
$stmt->bind_param("sssisi", $nombre, $correo, $hash, $estado, $fecha, $id_rol_default);

if ($stmt->execute()) {
    set_flash("success", "✅ Usuario registrado");
    header("Location: index.php");
    exit;
} else {
    die("❌ ERROR SQL: " . $mysqli->error . " | " . $stmt->error);
}
?>

