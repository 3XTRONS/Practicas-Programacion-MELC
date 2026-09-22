<?php

// Constantes
define("DESCUENTO", 0.10); // 10%
define("IVA", 0.16);       // 16%

// Variable para saber si ya se enviaron los datos
$mostrarResultado = false;

// Cuando el usuario presiona el botón
if (isset($_POST["calcular"])) {

    // Obtener los datos escritos por el usuario
    $horas = $_POST["horas"];
    $costoHora = $_POST["costoHora"];

    // Calcular subtotal
    $subtotal = $horas * $costoHora;

    // Calcular descuento
    $descuento = $subtotal * DESCUENTO;

    // Restar descuento
    $subtotalDescuento = $subtotal - $descuento;

    // Calcular IVA
    $impuesto = $subtotalDescuento * IVA;

    // Calcular total
    $total = $subtotalDescuento + $impuesto;

    $mostrarResultado = true;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mantenimiento de Redes</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color: #f3f1f4;">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header text-white text-center" style="background-color: #172554;">

            <h2>Costo de Mantenimiento de Redes</h2>

        </div>

        <div class="card-body">

            <!-- Formulario -->

            <h4>Ingresar datos</h4>

            <form method="POST">

                <div class="mb-3">

                    <label class="form-label">
                        Horas laboradas
                    </label>

                    <input
                        type="number"
                        name="horas"
                        class="form-control"
                        required
                        min="1"
                    >

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Costo por hora
                    </label>

                    <input
                        type="number"
                        name="costoHora"
                        class="form-control"
                        required
                        min="1"
                        step="0.01"
                    >

                </div>

                <button
                    type="submit"
                    name="calcular"
                    class="btn text-white"
                    style="background-color: #9f1239; border: none;"
                >
                    Calcular costo
                </button>

            </form>


            <?php

            // Mostrar resultados solamente si se presionó el botón

            if ($mostrarResultado == true) {

            ?>

                <hr>

                <h4 class="mb-3">
                    Resumen del servicio
                </h4>

                <table class="table table-bordered">

                    <tr>

                        <th>Horas laboradas</th>

                        <td>
                            <?php echo $horas; ?> horas
                        </td>

                    </tr>

                    <tr>

                        <th>Costo por hora</th>

                        <td>
                            $<?php echo number_format($costoHora, 2); ?>
                        </td>

                    </tr>

                    <tr>

                        <th>Subtotal</th>

                        <td>
                            $<?php echo number_format($subtotal, 2); ?>
                        </td>

                    </tr>

                    <tr>

                        <th>Descuento (10%)</th>

                        <td>
                            -$<?php echo number_format($descuento, 2); ?>
                        </td>

                    </tr>

                    <tr>

                        <th>Subtotal con descuento</th>

                        <td>
                            $<?php echo number_format($subtotalDescuento, 2); ?>
                        </td>

                    </tr>

                    <tr>

                        <th>IVA (16%)</th>

                        <td>
                            $<?php echo number_format($impuesto, 2); ?>
                        </td>

                    </tr>

                    <tr class="table-success">

                        <th>Total a pagar</th>

                        <th>
                            $<?php echo number_format($total, 2); ?>
                        </th>

                    </tr>

                </table>

            <?php

            }

            ?>

        </div>

        <div class="card-footer text-center" style="color: #666;">

            Servicio de mantenimiento de redes

        </div>

    </div>

</div>

</body>

</html>
