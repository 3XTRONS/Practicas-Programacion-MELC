<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC - TecNM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card-custom { max-width: 500px; margin: 50px auto; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .bg-tecnm { background-color: #1b396a; color: white; }
    </style>
</head>
<body>

<div class="card card-custom">
    <div class="card-header bg-tecnm text-center">
        <h4>Calculadora de IMC</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Peso (kg):</label>
                <input type="number" step="0.1" min="1" name="peso" class="form-control" required placeholder="Ej. 70.5">
            </div>
            <div class="mb-3">
                <label class="form-label">Estatura (metros):</label>
                <input type="number" step="0.01" min="0.5" max="2.5" name="estatura" class="form-control" required placeholder="Ej. 1.75">
            </div>
            <button type="submit" name="calcular" class="btn btn-primary w-100 bg-tecnm">Calcular IMC</button>
        </form>

        <?php
        if (isset($_POST['calcular'])) {
            $peso = (float)$_POST['peso'];
            $estatura = (float)$_POST['estatura'];

            if ($estatura > 0) {
                // Cálculo del IMC mediante operador aritmético
                $imc = $peso / ($estatura * $estatura);
                $imc_formateado = number_format($imc, 2);

                // Diagnóstico según el valor del IMC
                if ($imc < 18.5) {
                    $diagnostico = "Bajo peso";
                    $clase = "alert-warning";
                } elseif ($imc >= 18.5 && $imc < 24.9) {
                    $diagnostico = "Peso normal";
                    $clase = "alert-success";
                } elseif ($imc >= 25 && $imc < 29.9) {
                    $diagnostico = "Sobrepeso";
                    $clase = "alert-warning";
                } else {
                    $diagnostico = "Obesidad";
                    $clase = "alert-danger";
                }

                echo "<div class='alert $clase mt-4 text-center'>";
                echo "<h5>Tu IMC es: <strong>$imc_formateado</strong></h5>";
                echo "<p class='mb-0'>Diagnóstico: <strong>$diagnostico</strong></p>";
                echo "</div>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>
