<?php
require 'db.php';
$flash = get_flash();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Registrarse - Biblioteca</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<style>
  /* ======== ESTILOS GENERALES ======== */
body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #0077cc, #00aaff);
}

/* ======== TARJETA BORDE REDONDO ======== */
.card {
    width: 350px;
    background: #ffffff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
    animation: aparecer .5s ease-in-out;
}

/* Animación */
@keyframes aparecer {
    from {
        opacity: 0;
        transform: translateY(-15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #0077cc;
}

/* ======== CAMPOS DEL FORMULARIO ======== */
label {
    font-size: 15px;
    color: #333;
    margin-bottom: 5px;
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 2px solid #0077cc;
    border-radius: 8px;
    font-size: 16px;
}

input:focus {
    border-color: #005a99;
    outline: none;
}

/* ======== BOTONES ======== */
.actions {
    text-align: center;
    margin-top: 10px;
}

button {
    width: 100%;
    background: #0077cc;
    border: none;
    color: white;
    padding: 12px;
    border-radius: 8px;
    font-size: 17px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #005fa3;
}

.btn-link {
    display: inline-block;
    margin-top: 10px;
    color: #0077cc;
    text-decoration: none;
    font-size: 14px;
}

.btn-link:hover {
    text-decoration: underline;
}

</style>
<body>
<div class="card">
<h2>Registrarse</h2>

<?php if ($flash): ?>
<div class="alert <?= htmlspecialchars($flash['type']) ?>">
    <?= htmlspecialchars($flash['message']) ?>
</div>
<?php endif; ?>

<form action="register_process.php" method="POST">

<label>Nombre de usuario</label>
<input type="text" name="nombre_usuario" required>

<label>Correo electrónico</label>
<input type="email" name="correo" required>

<label>Contraseña</label>
<input type="password" name="contraseña" required>

<label>Confirmar contraseña</label>
<input type="password" name="confirmar" required>

<div class="actions">
<button type="submit">Registrarme</button>
<a class="btn-link" href="index.php">Cancelar</a>
</div>

</form>
</div>
</body>
</html>

