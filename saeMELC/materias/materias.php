<?php
// Incluir el archivo de conexión (sube un nivel a la carpeta raíz para encontrar conexion.php)
include_once("../conexion.php");

$mensaje = "";

// Procesar los datos cuando el usuario envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_materia = $_POST['nombre_materia'] ?? '';

    // Mapeo del campo a la columna 'descripcion_mat' de la tabla 'materias'
    $sql = "INSERT INTO materias (descripcion_mat) VALUES (?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $nombre_materia);

    if ($stmt->execute()) {
        $mensaje = '<div class="alert alert-success mt-3">¡Materia registrada correctamente!</div>';
    } else {
        $mensaje = '<div class="alert alert-danger mt-3">Error al registrar: ' . $conexion->error . '</div>';
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Materias</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {
            background-color: #f3f1f4;
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

        .formulario {
            background-color: white;
            max-width: 1000px;
            margin: 50px auto;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.15);
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
        }

        .regresar {
            margin-top: 15px;
        }

    </style>

</head>

<body>

<div class="formulario">

    <div class="titulo">
        <h2>Registro de Materias</h2>
    </div>

    <div class="contenido">

        <!-- Mensaje de confirmación o error al insertar -->
        <?php echo $mensaje; ?>

        <form method="post" action="materias.php">

            <div class="mb-3">
                <label class="form-label">
                    Nombre de la materia
                </label>

                <input
                    type="text"
                    name="nombre_materia"
                    class="form-control"
                    required
                >
            </div>


            <div class="mb-3">
                <label class="form-label">
                    Clave de la materia
                </label>

                <input
                    type="text"
                    name="clave"
                    class="form-control"
                >
            </div>


            <div class="mb-3">
                <label class="form-label">
                    Créditos
                </label>

                <input
                    type="number"
                    name="creditos"
                    class="form-control"
                >
            </div>


            <div class="mb-3">
                <label class="form-label">
                    Horas semanales
                </label>

                <input
                    type="number"
                    name="horas"
                    class="form-control"
                >
            </div>


            <button type="submit" class="btn btn-sae">
                Registrar materia
            </button>

        </form>


        <div class="regresar">

            <a href="../index.php">
                Regresar al inicio
            </a>

        </div>

    </div>


    <div class="pie">

        Registro de materias - Programación II Emmanuel Lopez Cornejo

    </div>

</div>

</body>

</html>
