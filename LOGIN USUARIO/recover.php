<?php
require 'db.php';
$flash = get_flash();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Recuperar contraseña</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="card">
<h2>Recuperar contraseña</h2>
<?php if($flash): ?>
<div class="alert <?=htmlspecialchars($flash['type'])?>"><?=htmlspecialchars($flash['message'])?></div>
<?php endif; ?>
<form action="recover_process.php" method="post">
<label>Nombre de usuario</label>
<input type="text" name="usuario" required>


<label>Correo electrónico</label>
<input type="email" name="correo" required>


<label>Nueva contraseña</label>
<input type="password" name="password" required>


<label>Confirmar contraseña</label>
<input type="password" name="password2" required>


<div class="actions">
<button type="submit">Guardar cambios</button>
<a class="btn-link" href="index.php">Cancelar</a>
</div>
</form>
</div>
</body>
</html>