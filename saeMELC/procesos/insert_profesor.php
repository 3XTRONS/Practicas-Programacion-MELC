<?php
// Incluir el archivo de conexión
include_once("../conexion.php");

// Procesar los datos enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_empleado     = $_POST['num_empleado'] ?? '';
    $nombre           = $_POST['nombre'] ?? '';
    $apellido_paterno = $_POST['apellido_paterno'] ?? '';
    $apellido_materno = $_POST['apellido_materno'] ?? '';
    $correo           = $_POST['correo'] ?? '';

    // Consulta SQL respetando la tabla 'profesores'
    $sql = "INSERT INTO profesores (num_empleado, nombre_prof, apaterno_prof, amaterno_prof, mail_prof, estatus_prof) VALUES (?, ?, ?, ?, ?, 'ALTA')";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $num_empleado, $nombre, $apellido_paterno, $apellido_materno, $correo);

    if ($stmt->execute()) {
        header("Location: ../registro/reg_profesor.php?status=success");
        exit();
    } else {
        header("Location: ../registro/reg_profesor.php?status=error&msg=" . urlencode($conexion->error));
        exit();
    }

    $stmt->close();
} else {
    header("Location: ../registro/reg_profesor.php");
    exit();
}
?>
