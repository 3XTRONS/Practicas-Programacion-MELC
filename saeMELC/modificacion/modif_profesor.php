<?php
include_once("../conexion.php");

$mensaje = "";
$idprof = $_GET['idprof'] ?? $_POST['idprof'] ?? 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_empleado     = $_POST['num_empleado'] ?? '';
    $nombre           = $_POST['nombre'] ?? '';
    $apellido_paterno = $_POST['apellido_paterno'] ?? '';
    $apellido_materno = $_POST['apellido_materno'] ?? '';
    $correo           = $_POST['correo'] ?? '';

    $sql_update = "UPDATE profesores SET num_empleado=?, nombre_prof=?, apaterno_prof=?, amaterno_prof=?, mail_prof=? WHERE idprof=?";
    $stmt = $conexion->prepare($sql_update);
    $stmt->bind_param("sssssi", $num_empleado, $nombre, $apellido_paterno, $apellido_materno, $correo, $idprof);

    if ($stmt->execute()) {
        header("Location: ../catalogos/list_profesores.php?status=updated");
        exit();
    } else {
        $mensaje = '<div class="alert alert-danger mt-3">Error al actualizar: ' . $conexion->error . '</div>';
    }
    $stmt->close();
}

$sql = "SELECT * FROM profesores WHERE idprof = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idprof);
$stmt->execute();
$resultado = $stmt->get_result();
$profesor = $resultado->fetch_assoc();
$stmt->close();

if (!$profesor) {
    header("Location: ../catalogos/list_profesores.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Profesor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f3f1f4; }
        .formulario { background-color: white; max-width: 1000px; margin: 50px auto; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.15); }
        .titulo { background-color: #172554; color: white; padding: 15px; text-align: center; border-radius: 5px 5px 0 0; }
        .contenido { padding: 20px; }
        .btn-sae { background-color: #9f1239; color: white; border: none; }
        .btn-sae:hover { background-color: #881337; color: white; }
    </style>
</head>
<body>

<div class="formulario">
    <div class="titulo"><h2>Modificar Profesor</h2></div>
    <div class="contenido">
        <?php echo $mensaje; ?>
        <form method="post" action="modif_profesor.php">
            <input type="hidden" name="idprof" value="<?php echo $profesor['idprof']; ?>">
            <div class="mb-3">
                <label class="form-label">N° Empleado</label>
                <input type="text" name="num_empleado" class="form-control" value="<?php echo htmlspecialchars($profesor['num_empleado']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($profesor['nombre_prof']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido Paterno</label>
                <input type="text" name="apellido_paterno" class="form-control" value="<?php echo htmlspecialchars($profesor['apaterno_prof']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Apellido Materno</label>
                <input type="text" name="apellido_materno" class="form-control" value="<?php echo htmlspecialchars($profesor['amaterno_prof']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="correo" class="form-control" value="<?php echo htmlspecialchars($profesor['mail_prof']); ?>" required>
            </div>
            <button type="submit" class="btn btn-sae">Guardar Cambios</button>
        </form>
        <div class="mt-3"><a href="../catalogos/list_profesores.php">Cancelar</a></div>
    </div>
</div>

</body>
</html>
