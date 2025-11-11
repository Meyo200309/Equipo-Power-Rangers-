<?php
require 'db.php';
if($_SERVER['REQUEST_METHOD'] !== 'POST'){ header('Location: recover.php'); exit; }


$usuario = trim($_POST['usuario']);
$correo = trim($_POST['correo']);
$pass = $_POST['password'];
$pass2 = $_POST['password2'];


if($pass !== $pass2){ set_flash('error','Las contraseñas no coinciden.'); header('Location: recover.php'); exit; }
if(strlen($pass) < 6){ set_flash('error','La contraseña debe tener al menos 6 caracteres.'); header('Location: recover.php'); exit; }


// Verificar que exista el usuario y correo coincida
$stmt = $mysqli->prepare("SELECT id_usuario FROM usuario WHERE nombre_usuario = ? AND correo = ? LIMIT 1");
$stmt->bind_param('ss',$usuario,$correo);
$stmt->execute();
$res = $stmt->get_result();
if($res->num_rows === 0){ set_flash('error','No se encontró un usuario con ese nombre y correo.'); header('Location: recover.php'); exit; }
$row = $res->fetch_assoc();
$id_usuario = $row['id_usuario'];


$hash = password_hash($pass,PASSWORD_DEFAULT);
$stmt_upd = $mysqli->prepare("UPDATE usuario SET contraseña = ? WHERE id_usuario = ?");
$stmt_upd->bind_param('si',$hash,$id_usuario);
if($stmt_upd->execute()){
set_flash('success','Contraseña actualizada correctamente.');
header('Location: index.php'); exit;
} else {
set_flash('error','No se pudo actualizar la contraseña.');
header('Location: recover.php'); exit;
}