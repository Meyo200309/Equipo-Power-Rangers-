<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE nombre_usuario = ?");
    if (!$stmt) {
        die("Error en consulta SQL: " . $mysqli->error);
    }

    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['contraseña'])) {
            $_SESSION['usuario_id'] = $row['id_usuario'];
            $_SESSION['usuario_nombre'] = $row['nombre_usuario'];

            set_flash("success", "Bienvenido " . $row['nombre_usuario']);
            header("Location: menu.php");
            exit();
        } else {
            set_flash("error", "Contraseña incorrecta");
            header("Location: index.php");
            exit();
        }
    } else {
        set_flash("warning", "Usuario no encontrado");
        header("Location: index.php");
        exit();
    }
}
?>

