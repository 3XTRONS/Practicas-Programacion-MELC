<?php
// Configuración de parámetros de la base de datos
$host = "localhost";
$usuario = "root";
$contrasenia = "";
$base_de_datos = "saeMELC";

// Crear conexión MySQLi
$conexion = new mysqli($host, $usuario, $contrasenia, $base_de_datos);

// Verificar si ocurrió un error en la conexión
if ($conexion->connect_error) {
    die("Error al conectar con la base de datos: " . $conexion->connect_error);
}

// Establecer el juego de caracteres a UTF-8
$conexion->set_charset("utf8");
?>
