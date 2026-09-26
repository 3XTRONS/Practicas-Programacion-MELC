<?php
include_once("../conexion.php");

$mensaje = "";
$idgrupo = $_GET['idgrupo'] ?? $_POST['idgrupo'] ?? 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clave_grupo  = $_POST['clave_grupo'] ?? '';
    $nombre_grupo = $_POST['nombre_grupo'] ?? '';

    $sql_update = "UPDATE grupos SET clave_grupo=?, nombre_grupo=? WHERE idgrupo=?";
    $stmt = $conexion->prepare($sql_update);
    $stmt->bind_param("ssi", $clave_grupo, $nombre_grupo, $idgrupo);

    if ($stmt->execute()) {
        header("Location: ../catalogos/list_grupos.php?status=updated");
        exit();
    } else {
        $mensaje = '<div class="alert alert-danger mt-3">Error al actualizar: ' . $conexion->error . '</div>';
    }
    $stmt->close();
}

$sql = "SELECT * FROM grupos WHERE idgrupo = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idgrupo);
$stmt->execute();
$resultado = $stmt->get_result();
$grupo = $resultado->fetch_assoc();
$stmt->close();

if (!$grupo) {
    header("Location: ../catalogos/list_grupos.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Grupo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f3f1f4; }
        .formulario { background-color: white; max-width: 1000px; margin: 50px auto; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.15); }
        .titulo { background-color: #172554; color: white; padding: 15px; text-align: center; border-radius: 5px 5px 0 0; }
        .contenido { padding: 20px; }
        .btn-sae { background-color: #9f1239; color: white; border: none; }
    </style>
</head>
<body>

<div class="formulario">
    <div class="titulo"><h2>Modificar Grupo</h2></div>
    <div class="contenido">
        <?php echo $mensaje; ?>
        <form method="post" action="modif_grupo.php">
            <input type="hidden" name="idgrupo" value="<?php echo $grupo['idgrupo']; ?>">
            <div class="mb-3">
                <label class="form-label">Clave del Grupo</label>
                <input type="text" name="clave_grupo" class="form-control" value="<?php echo htmlspecialchars($grupo['clave_grupo']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre / Descripción del Grupo</label>
                <input type="text" name="nombre_grupo" class="form-control" value="<?php echo htmlspecialchars($grupo['nombre_grupo']); ?>" required>
            </div>
            <button type="submit" class="btn btn-sae">Guardar Cambios</button>
        </form>
        <div class="mt-3"><a href="../catalogos/list_grupos.php">Cancelar</a></div>
    </div>
</div>

</body>
</html>
