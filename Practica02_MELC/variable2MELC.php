<?php

// Variable para saber si ya se enviaron los datos
$mostrarResultado = false;

// Cuando el usuario presiona el botón de calcular
if (isset($_POST["calcular"])) {

    // Obtener las tres calificaciones enviadas desde el formulario
    $unidad1 = floatval($_POST["unidad1"]);
    $unidad2 = floatval($_POST["unidad2"]);
    $unidad3 = floatval($_POST["unidad3"]);

    // Calcular el promedio aritmético de las tres unidades
    $promedio = ($unidad1 + $unidad2 + $unidad3) / 3;

    // Estructura de decisión if-else anidada para determinar el dictamen
    if ($promedio >= 90) {
        $dictamen = "Excelente (Competencia alcanzada con honor)";
        $claseAlerta = "alert-success";
    } elseif ($promedio >= 70) {
        $dictamen = "Aprobado (Competencia estándar)";
        $claseAlerta = "alert-info";
    } else {
        $dictamen = "Reprobado (Requiere nivelación)";
        $claseAlerta = "alert-danger";
    }

    // Estructura switch para determinar la letra equivalente según el rango numérico
    switch (true) {
        case ($promedio >= 90):
            $letra = "A";
            break;
        case ($promedio >= 80):
            $letra = "B";
            break;
        case ($promedio >= 70):
            $letra = "C";
            break;
        default:
            $letra = "F";
            break;
    }

    $mostrarResultado = true;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calificaciones - Programación II</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color: #f3f1f4;">

<div class="container mt-5 mb-5">

    <div class="card shadow">

        <div class="card-header text-white text-center" style="background-color: #172554;">

            <h2>Evaluación de Programación II</h2>

        </div>

        <div class="card-body">

            <!-- Formulario de captura de calificaciones -->

            <h4>Ingresar calificaciones por unidad</h4>

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Calificación Unidad 1
                    </label>

                    <input
                        type="number"
                        name="unidad1"
                        class="form-control"
                        required
                        min="0"
                        max="100"
                        step="0.1"
                        value="<?php echo isset($_POST['unidad1']) ? $_POST['unidad1'] : ''; ?>"
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Calificación Unidad 2
                    </label>

                    <input
                        type="number"
                        name="unidad2"
                        class="form-control"
                        required
                        min="0"
                        max="100"
                        step="0.1"
                        value="<?php echo isset($_POST['unidad2']) ? $_POST['unidad2'] : ''; ?>"
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Calificación Unidad 3
                    </label>

                    <input
                        type="number"
                        name="unidad3"
                        class="form-control"
                        required
                        min="0"
                        max="100"
                        step="0.1"
                        value="<?php echo isset($_POST['unidad3']) ? $_POST['unidad3'] : ''; ?>"
                    >

                </div>

                <button
                    type="submit"
                    name="calcular"
                    class="btn text-white"
                    style="background-color: #9f1239; border: none;"
                >
                    Calcular Promedio
                </button>

            </form>


            <?php

            // Mostrar resultados solamente si se presionó el botón de envío

            if ($mostrarResultado == true) {

            ?>

                <hr>

                <h4 class="mb-3">
                    Resumen Académico
                </h4>

                <div class="alert <?php echo $claseAlerta; ?> text-center fw-bold fs-5 mb-3">
                    Dictamen: <?php echo $dictamen; ?>
                </div>

                <table class="table table-bordered">

                    <tr>

                        <th>Calificación Unidad 1</th>

                        <td>
                            <?php echo number_format($unidad1, 2); ?>
                        </td>

                    </tr>

                    <tr>

                        <th>Calificación Unidad 2</th>

                        <td>
                            <?php echo number_format($unidad2, 2); ?>
                        </td>

                    </tr>

                    <tr>

                        <th>Calificación Unidad 3</th>

                        <td>
                            <?php echo number_format($unidad3, 2); ?>
                        </td>

                    </tr>

                    <tr>

                        <th>Promedio Final</th>

                        <td class="fw-bold">
                            <?php echo number_format($promedio, 2); ?>
                        </td>

                    </tr>

                    <tr>

                        <th>Calificación en Letra (Equivalente)</th>

                        <td class="fw-bold fs-5">
                            <?php echo $letra; ?>
                        </td>

                    </tr>

                </table>

            <?php

            }

            ?>

        </div>

        <div class="card-footer text-center" style="color: #666;">

            Sistema de Evaluación - Programación II Emmanuel Lopez Cornejo

        </div>

    </div>

</div>

</body>

</html>
