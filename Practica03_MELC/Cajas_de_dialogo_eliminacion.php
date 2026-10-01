<?php
$mensaje = "";

// Proceso simulado de eliminación si el usuario confirmó en el navegador
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_id'])) {
    $id = intval($_POST['eliminar_id']);
    $mensaje = "<div class='alert alert-success mt-3'>¡Registro de empleado #$id eliminado correctamente de la base de datos!</div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminación de Empleados - Cajas de Diálogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container-custom { max-width: 800px; margin: 40px auto; }
        .bg-tecnm { background-color: #1b396a; color: white; }
    </style>

    <script>
        // Función JS que intercepta el envío del formulario con la caja de diálogo confirm()
        function confirmarEliminacion(event, nombreEmpleado) {
            var respuesta = confirm("¿Está seguro de eliminar este registro?\nEmpleado: " + nombreEmpleado);
            if (!respuesta) {
                event.preventDefault(); // Cancela el envío del formulario hacia PHP
                alert("Acción cancelada. El registro permanece intacto.");
            }
        }
    </script>
</head>
<body>

<div class="container container-custom">
    <div class="card">
        <div class="card-header bg-tecnm text-center">
            <h4>Control de Empleados - Eliminación de Registros</h4>
        </div>
        <div class="card-body">
            <?php echo $mensaje; ?>

            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>Carlos Mendoza Ramírez</td>
                        <td>Desarrollador Senior</td>
                        <td>
                            <form method="POST" action="" onsubmit="confirmarEliminacion(event, 'Carlos Mendoza Ramírez');">
                                <input type="hidden" name="eliminar_id" value="101">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>102</td>
                        <td>Sofía Aguilar Torres</td>
                        <td>Administradora BD</td>
                        <td>
                            <form method="POST" action="" onsubmit="confirmarEliminacion(event, 'Sofía Aguilar Torres');">
                                <input type="hidden" name="eliminar_id" value="102">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
