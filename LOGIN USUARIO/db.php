<?php
session_start();


$Servidor = "localhost";
$user = "root";
$pass = "123456789"; 
$database = "bibllioteca"; 

$mysqli = new mysqli($Servidor, $user, $pass, $database);


if ($mysqli->connect_errno) {
    die("Error de conexión: " . $mysqli->connect_error);
}

function set_flash($type, $message) {
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

function get_flash() {
    if (!empty($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}
?>
