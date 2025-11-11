<?php
require 'db.php';
$flash = get_flash();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Login - Biblioteca</title>
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="card">
<h2>Iniciar sesión</h2>
<?php if($flash): ?>
<div class="alert <?=htmlspecialchars($flash['type'])?>"><?=htmlspecialchars($flash['message'])?></div>
<?php endif; ?>
<form action="login_process.php" method="post">
<label>Usuario</label>
<input type="text" name="usuario" required>


<label>Contraseña</label>
<input type="password" name="password" required>


<div class="actions">
<button type="submit">Ingresar</button>
<a class="btn-link" href="register.php">Registrarse</a>
<a class="btn-link" href="recover.php">Olvidé mi contraseña</a>
</div>
</form>
</div>
</body>
</html>