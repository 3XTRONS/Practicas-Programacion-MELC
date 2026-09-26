<?php
include_once("../conexion.php");

$idmat = $_GET['idmat'] ?? 0;

if ($idmat > 0) {
    $sql = "UPDATE materias SET estatus_mat = 'BAJA' WHERE idmat = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idmat);

    if ($stmt->execute()) {
        header("Location: ../catalogos/list_materias.php?status=deleted");
        exit();
    }
    $stmt->close();
}
header("Location: ../catalogos/list_materias.php");
exit();
?>
