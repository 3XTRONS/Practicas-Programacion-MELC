<?php
// Incluir el archivo de conexión (sube un nivel a la carpeta raíz para encontrar conexion.php)
include_once("../conexion.php");

$mensaje = "";

// Procesar los datos cuando el usuario da clic en el botón de registrar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre           = $_POST['nombre'] ?? '';
    $apellido_paterno = $_POST['apellido_paterno'] ?? '';
    $apellido_materno = $_POST['apellido_materno'] ?? '';
    $numero_control   = $_POST['numero_control'] ?? '';
    $correo           = $_POST['correo'] ?? '';

    // Preparar la consulta de inserción respetando los nombres de campos de la tabla 'alumnos'
    $sql = "INSERT INTO alumnos (matricula_al, nombre_al, apaterno_al, amaterno_al, mail_al) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssss", $numero_control, $nombre, $apellido_paterno, $apellido_materno, $correo);

    if ($stmt->execute()) {
        $mensaje = '<div class="alert alert-success mt-3">¡Alumno registrado correctamente!</div>';
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

    <title>Registro de Alumnos</title>

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
        <h2>Registro de Alumnos</h2>
    </div>

    <div class="contenido">

        <!-- Mensaje de confirmación o error al insertar -->
        <?php echo $mensaje; ?>

        <form method="post" action="alumnos.php">

            <div class="mb-3">
                <label class="form-label">Nombre</label>

                <input
                    type="text"
                    name="nombre"
                    class="form-control"
                    required
                >
            </div>


            <div class="mb-3">
                <label class="form-label">Apellido paterno</label>

                <input
                    type="text"
                    name="apellido_paterno"
                    class="form-control"
                    required
                >
            </div>


            <div class="mb-3">
                <label class="form-label">Apellido materno</label>

                <input
                    type="text"
                    name="apellido_materno"
                    class="form-control"
                    required
                >
            </div>


            <div class="mb-3">
                <label class="form-label">Número de control</label>

                <input
                    type="text"
                    name="numero_control"
                    class="form-control"
                    required
                >
            </div>


            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>

                <input
                    type="email"
                    name="correo"
                    class="form-control"
                    required
                >
            </div>


            <button type="submit" class="btn btn-sae">
                Registrar alumno
            </button>

        </form>


        <div class="regresar">

            <a href="../index.php">
                Regresar al inicio
            </a>

        </div>

    </div>


    <div class="pie">

        Registro de alumnos - Programación II Emmanuel Lopez Cornejo

    </div>

</div>

</body>

</html>
