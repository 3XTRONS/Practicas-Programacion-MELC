<?php
// Incluir el archivo de conexión (sube un nivel desde 'catalogos' hasta la raíz)
include_once("../conexion.php");

// Consultar los alumnos registrados que tengan estatus 'ALTA'
$sql = "SELECT idalumn, matricula_al, nombre_al, apaterno_al, amaterno_al, mail_al FROM alumnos WHERE estatus_al = 'ALTA'";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Catálogo de Alumnos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body {
            background-color: #f3f1f4;
        }

        .contenedor-tabla {
            background-color: white;
            max-width: 1100px;
            margin: 40px auto;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
        }

        .titulo {
            background-color: #172554;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .titulo h2 {
            margin: 0;
        }

        .contenido {
            padding: 20px;
        }

        .btn-sae {
            background-color: #9f1239;
            color: white;
            border: none;
        }

        .btn-sae:hover {
            background-color: #881337;
            color: white;
        }

        .pie {
            text-align: center;
            padding: 10px;
            color: #666;
            border-top: 1px solid #eee;
        }

        .acciones-gap {
            gap: 5px;
        }

    </style>

</head>

<body>

<div class="contenedor-tabla">

    <div class="titulo">
        <h2>Catálogo de Alumnos</h2>
    </div>

    <div class="contenido">

        <!-- Botón para agregar un nuevo alumno -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="../registro/reg_alumno.php" class="btn btn-sae">
                <i class="bi bi-person-plus-fill"></i> Registrar nuevo alumno
            </a>
            <a href="../index.php" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Regresar al inicio
            </a>
        </div>

        <div class="table-responsive">

            <table class="table table-striped table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Número de control</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido paterno</th>
                        <th scope="col">Apellido materno</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                    if ($resultado && $resultado->num_rows > 0) {
                        while ($alumno = $resultado->fetch_assoc()) { 
                    ?>
                        <tr>
                            <td><?php echo $alumno["idalumn"]; ?></td>
                            <td><?php echo htmlspecialchars($alumno["matricula_al"]); ?></td>
                            <td><?php echo htmlspecialchars($alumno["nombre_al"]); ?></td>
                            <td><?php echo htmlspecialchars($alumno["apaterno_al"]); ?></td>
                            <td><?php echo htmlspecialchars($alumno["amaterno_al"]); ?></td>
                            <td><?php echo htmlspecialchars($alumno["mail_al"]); ?></td>
                            <td>
                                <div class="d-flex justify-content-center acciones-gap">
                                    <!-- Botón Editar -->
                                    <a href="../modificacion/modif_alum.php?idalumn=<?php echo $alumno['idalumn']; ?>" 
                                       class="btn btn-primary btn-sm" 
                                       title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>

                                    <!-- Botón Dar de Baja -->
                                    <a href="../baja/baja_alum.php?idalumn=<?php echo $alumno['idalumn']; ?>" 
                                       class="btn btn-danger btn-sm" 
                                       title="Dar de baja"
                                       onclick="return confirm('¿Estás seguro de dar de baja a este alumno?');">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php 
                        }
                    } else { 
                    ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted p-4">
                                No se encontraron alumnos registrados.
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>

    </div>

    <div class="pie">
        Catálogo de alumnos - Programación II Emmanuel Lopez Cornejo
    </div>

</div>

</body>

</html>
