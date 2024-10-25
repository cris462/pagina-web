<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "escuela";  // Cambia por el nombre de tu base de datos

$conexion = new mysqli($host, $user, $pass, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
