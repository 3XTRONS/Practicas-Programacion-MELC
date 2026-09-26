<?php
// Incluir el archivo de conexión
include_once("../conexion.php");

// Procesar los datos enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clave_mat  = $_POST['clave_mat'] ?? '';
    $nombre_mat = $_POST['nombre_mat'] ?? '';
    $creditos   = $_POST['creditos'] ?? 0;

    // Consulta SQL respetando la tabla 'materias'
    $sql = "INSERT INTO materias (clave_mat, nombre_mat, creditos, estatus_mat) VALUES (?, ?, ?, 'ALTA')";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssi", $clave_mat, $nombre_mat, $creditos);

    if ($stmt->execute()) {
        header("Location: ../registro/reg_materia.php?status=success");
        exit();
    } else {
        header("Location: ../registro/reg_materia.php?status=error&msg=" . urlencode($conexion->error));
        exit();
    }

    $stmt->close();
} else {
    header("Location: ../registro/reg_materia.php");
    exit();
}
?>
