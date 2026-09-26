<?php
// Incluir el archivo de conexión (sube un nivel para llegar a la raíz)
include_once("../conexion.php");

// Procesar los datos enviados mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre           = $_POST['nombre'] ?? '';
    $apellido_paterno = $_POST['apellido_paterno'] ?? '';
    $apellido_materno = $_POST['apellido_materno'] ?? '';
    $numero_control   = $_POST['numero_control'] ?? '';
    $correo           = $_POST['correo'] ?? '';

    // Consulta SQL respetando la estructura de la tabla 'alumnos'
    $sql = "INSERT INTO alumnos (matricula_al, nombre_al, apaterno_al, amaterno_al, mail_al, estatus_al) VALUES (?, ?, ?, ?, ?, 'ALTA')";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $numero_control, $nombre, $apellido_paterno, $apellido_materno, $correo);

    if ($stmt->execute()) {
        // Redirige de vuelta a reg_alumno.php indicando éxito
        header("Location: ../registro/reg_alumno.php?status=success");
        exit();
    } else {
        // Redirige con el mensaje de error
        header("Location: ../registro/reg_alumno.php?status=error&msg=" . urlencode($conexion->error));
        exit();
    }

    $stmt->close();
} else {
    // Si entran directo sin enviar POST, regresa al formulario
    header("Location: ../registro/reg_alumno.php");
    exit();
}
?>
