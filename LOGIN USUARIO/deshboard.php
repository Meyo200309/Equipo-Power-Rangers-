<?php
require 'db.php';
if(!isset($_SESSION['user_id'])){ set_flash('error','Debes iniciar sesión.'); header('Location: index.php'); exit; }


// Obtener nombre de usuario guardado en sesión
$nombre = $_SESSION['user_name'];
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Dashboard - Biblioteca</title>
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<nav class="navbar">
<div class="nav-left">Biblioteca</div>
<div class="nav-right">
<span>Hola, <?=htmlspecialchars($nombre)?></span>
<a href="config.php" class="btn-link">Configuración</a>
<a href="logout.php" class="btn-link">Cerrar sesión</a>
</div>
</nav>


<main class="container">
<h1>Menú</h1>
<p>Aquí irían las opciones del sistema (préstamos, búsqueda, administración, etc.)</p>
</main>
</body>
</html>