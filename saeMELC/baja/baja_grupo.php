<?php
include_once("../conexion.php");

$idgrupo = $_GET['idgrupo'] ?? 0;

if ($idgrupo > 0) {
    $sql = "UPDATE grupos SET estatus_grupo = 'BAJA' WHERE idgrupo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idgrupo);

    if ($stmt->execute()) {
        header("Location: ../catalogos/list_grupos.php?status=deleted");
        exit();
    }
    $stmt->close();
}
header("Location: ../catalogos/list_grupos.php");
exit();
?>
