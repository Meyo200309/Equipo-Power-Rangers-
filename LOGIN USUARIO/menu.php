<?php
require 'db.php';

// Si no está logueado, redirige al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit();
}
$usuario = $_SESSION['usuario_nombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Dashboard - Biblioteca</title>
<style>
/* 🔹 Estilos generales */
body {
    margin: 0;
    font-family: "Poppins", sans-serif;
    background: #f8f9fa;
}

/* 🔹 Barra de navegación */
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: linear-gradient(135deg, #4b6cb7, #182848);
    color: white;
    padding: 12px 30px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    position: sticky;
    top: 0;
}

/* 🔹 Logo (lado izquierdo) */
.logo {
    font-size: 1.3em;
    font-weight: 600;
}

/* 🔹 Lista de enlaces (lado derecho) */
.nav-links {
    display: flex;
    align-items: center;
    list-style: none;
    margin: 0;
    padding: 0;
    gap: 20px;
}

/* 🔹 Enlaces */
.nav-links a {
    color: white;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.2s;
}

.nav-links a:hover {
    color: #ffd166;
}

/* 🔹 Nombre del usuario centrado */
.user-center {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    font-weight: 600;
    background: rgba(255,255,255,0.15);
    padding: 8px 18px;
    border-radius: 20px;
    backdrop-filter: blur(4px);
}

/* 🔹 Botón de logout */
.btn-logout {
    background: #ff4d4d;
    padding: 6px 14px;
    border-radius: 5px;
    color: white;
    transition: background 0.2s;
}

.btn-logout:hover {
    background: #e63946;
}

/* 🔹 Contenido principal */
.contenido {
    text-align: center;
    margin-top: 100px;
}

.contenido h1 {
    font-size: 2em;
    color: #182848;
}

.contenido p {
    color: #333;
    font-size: 1.1em;
}
</style>
</head>

<body>
    <nav class="navbar">
        <div class="logo"> Biblioteca</div>

        <div class="user-center">
            👤 <?= htmlspecialchars($usuario) ?>
        </div>

        <ul class="nav-links">
            <li><a href="configuracion.php">⚙ Configuración</a></li>
            <li><a href="logout.php" class="btn-logout">🚪 Cerrar sesión</a></li>
        </ul>
    </nav>

    <div class="contenido">
        <h1>Bienvenido <?= htmlspecialchars($usuario) ?> 😄</h1>
        <p>Este es tu panel principal.</p>
    </div>
</body>
</html>


