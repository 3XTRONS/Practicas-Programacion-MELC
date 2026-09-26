<?php
include_once("../conexion.php");

$idprof = $_GET['idprof'] ?? 0;

if ($idprof > 0) {
    $sql = "UPDATE profesores SET estatus_prof = 'BAJA' WHERE idprof = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idprof);

    if ($stmt->execute()) {
        header("Location: ../catalogos/list_profesores.php?status=deleted");
        exit();
    }
    $stmt->close();
}
header("Location: ../catalogos/list_profesores.php");
exit();
?>
