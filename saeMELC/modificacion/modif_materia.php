<?php
include_once("../conexion.php");

$mensaje = "";
$idmat = $_GET['idmat'] ?? $_POST['idmat'] ?? 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clave_mat  = $_POST['clave_mat'] ?? '';
    $nombre_mat = $_POST['nombre_mat'] ?? '';
    $creditos   = $_POST['creditos'] ?? 0;

    $sql_update = "UPDATE materias SET clave_mat=?, nombre_mat=?, creditos=? WHERE idmat=?";
    $stmt = $conexion->prepare($sql_update);
    $stmt->bind_param("ssii", $clave_mat, $nombre_mat, $creditos, $idmat);

    if ($stmt->execute()) {
        header("Location: ../catalogos/list_materias.php?status=updated");
        exit();
    } else {
        $mensaje = '<div class="alert alert-danger mt-3">Error al actualizar: ' . $conexion->error . '</div>';
    }
    $stmt->close();
}

$sql = "SELECT * FROM materias WHERE idmat = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idmat);
$stmt->execute();
$resultado = $stmt->get_result();
$materia = $resultado->fetch_assoc();
$stmt->close();

if (!$materia) {
    header("Location: ../catalogos/list_materias.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Materia</title>
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
    <div class="titulo"><h2>Modificar Materia</h2></div>
    <div class="contenido">
        <?php echo $mensaje; ?>
        <form method="post" action="modif_materia.php">
            <input type="hidden" name="idmat" value="<?php echo $materia['idmat']; ?>">
            <div class="mb-3">
                <label class="form-label">Clave de la Materia</label>
                <input type="text" name="clave_mat" class="form-control" value="<?php echo htmlspecialchars($materia['clave_mat']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre de la Materia</label>
                <input type="text" name="nombre_mat" class="form-control" value="<?php echo htmlspecialchars($materia['nombre_mat']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Créditos</label>
                <input type="number" name="creditos" class="form-control" value="<?php echo htmlspecialchars($materia['creditos']); ?>" required>
            </div>
            <button type="submit" class="btn btn-sae">Guardar Cambios</button>
        </form>
        <div class="mt-3"><a href="../catalogos/list_materias.php">Cancelar</a></div>
    </div>
</div>

</body>
</html>
