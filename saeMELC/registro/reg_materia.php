<?php
// Capturar respuestas enviadas desde procesos/insert_materia.php
$mensaje = "";
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        $mensaje = '<div class="alert alert-success mt-3">¡Materia registrada correctamente!</div>';
    } elseif ($_GET['status'] == 'error') {
        $msgError = $_GET['msg'] ?? 'Ocurrió un error inesperado.';
        $mensaje = '<div class="alert alert-danger mt-3">Error al registrar: ' . htmlspecialchars($msgError) . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Materias</title>

    <!-- Bootstrap CSS -->
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
            border-top: 1px solid #eee;
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

        <!-- Mensaje de confirmación o error -->
        <?php echo $mensaje; ?>

        <form method="post" action="../procesos/insert_materia.php">

            <div class="mb-3">
                <label class="form-label">Clave de la Materia</label>
                <input type="text" name="clave_mat" class="form-control" required placeholder="Ej. MAT101">
            </div>

            <div class="mb-3">
                <label class="form-label">Nombre de la Materia</label>
                <input type="text" name="nombre_mat" class="form-control" required placeholder="Ej. Matematicas Discretas">
            </div>

            <div class="mb-3">
                <label class="form-label">Créditos</label>
                <input type="number" name="creditos" class="form-control" required min="1" max="15" placeholder="Ej. 5/4/etc">
            </div>

            <button type="submit" class="btn btn-sae">
                Registrar materia
            </button>

        </form>

        <div class="regresar">
            <a href="../index.php">Regresar al inicio</a>
        </div>

    </div>

    <div class="pie">
        Registro de materias - Programación II Emmanuel Lopez Cornejo
    </div>

</div>

</body>
</html>
