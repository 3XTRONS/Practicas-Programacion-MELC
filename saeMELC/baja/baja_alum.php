<?php
include_once("../conexion.php");

$idalumn = $_GET['idalumn'] ?? 0;

if ($idalumn > 0) {
    // Cambiar el estatus a BAJA
    $sql = "UPDATE alumnos SET estatus_al = 'BAJA' WHERE idalumn = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idalumn);

    if ($stmt->execute()) {
        header("Location: ../catalogos/list_alumno.php?status=deleted");
        exit();
    } else {
        echo "Error al dar de baja el alumno: " . $conexion->error;
    }
    $stmt->close();
} else {
    header("Location: ../catalogos/list_alumno.php");
    exit();
}
?>
