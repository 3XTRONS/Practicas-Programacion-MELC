<?php
include_once("../conexion.php");

$mensaje = "";
$idalumn = $_GET['idalumn'] ?? $_POST['idalumn'] ?? 0;

// Procesar la actualización si se envió el formulario por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre           = $_POST['nombre'] ?? '';
    $apellido_paterno = $_POST['apellido_paterno'] ?? '';
    $apellido_materno = $_POST['apellido_materno'] ?? '';
    $numero_control   = $_POST['numero_control'] ?? '';
    $correo           = $_POST['correo'] ?? '';

    $sql_update = "UPDATE alumnos SET matricula_al=?, nombre_al=?, apaterno_al=?, amaterno_al=?, mail_al=? WHERE idalumn=?";
    $stmt = $conexion->prepare($sql_update);
    $stmt->bind_param("sssssi", $numero_control, $nombre, $apellido_paterno, $apellido_materno, $correo, $idalumn);

    if ($stmt->execute()) {
        header("Location: ../catalogos/list_alumno.php?status=updated");
        exit();
    } else {
        $mensaje = '<div class="alert alert-danger mt-3">Error al actualizar: ' . $conexion->error . '</div>';
    }
    $stmt->close();
}

// Consultar los datos actuales del alumno para llenar el formulario
$sql = "SELECT * FROM alumnos WHERE idalumn = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $idalumn);
$stmt->execute();
$resultado = $stmt->get_result();
$alumno = $resultado->fetch_assoc();
$stmt->close();

if (!$alumno) {
    header("Location: ../catalogos/list_alumno.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f3f1f4; }
        .formulario { background-color: white; max-width: 1000px; margin: 50px auto; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.15); }
        .titulo { background-color: #172554; color: white; padding: 15px; text-align: center; border-radius: 5px 5px 0 0; }
        .titulo h2 { margin: 0; }
        .contenido { padding: 20px; }
        .btn-sae { background-color: #9f1239; color: white; border: none; }
        .btn-sae:hover { background-color: #881337; color: white; }
        .pie { text-align: center; padding: 10px; color: #666; border-top: 1px solid #eee; }
        .regresar { margin-top: 15px; }
    </style>
</head>
<body>

<div class="formulario">
    <div class="titulo">
        <h2>Modificar Alumno</h2>
    </div>

    <div class="contenido">
        <?php echo $mensaje; ?>

        <form method="post" action="modif_alum.php">
            <input type="hidden" name="idalumn" value="<?php echo $alumno['idalumn']; ?>">

            <div class="mb-3">
                <label class="form-label">Número de control</label>
                <input type="text" name="numero_control" class="form-control" value="<?php echo htmlspecialchars($alumno['matricula_al']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($alumno['nombre_al']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido paterno</label>
                <input type="text" name="apellido_paterno" class="form-control" value="<?php echo htmlspecialchars($alumno['apaterno_al']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Apellido materno</label>
                <input type="text" name="apellido_materno" class="form-control" value="<?php echo htmlspecialchars($alumno['amaterno_al']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" name="correo" class="form-control" value="<?php echo htmlspecialchars($alumno['mail_al']); ?>" required>
            </div>

            <button type="submit" class="btn btn-sae">
                Guardar Cambios
            </button>
        </form>

        <div class="regresar">
            <a href="../catalogos/list_alumno.php">Cancelar y regresar al catálogo</a>
        </div>
    </div>

    <div class="pie">
        Modificación de alumnos - Programación II Emmanuel Lopez Cornejo
    </div>
</div>

</body>
</html>
