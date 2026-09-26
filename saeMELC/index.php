<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema SAE - Inicio</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #f3f1f4;
        }

        .contenedor-principal {
            max-width: 1000px;
            margin: 50px auto;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        }

        .titulo {
            background-color: #172554;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }

        .titulo h1 {
            margin: 0;
            font-size: 2rem;
        }

        .contenido {
            padding: 30px;
        }

        .tarjeta-modulo {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            background-color: #ffffff;
        }

        .tarjeta-modulo:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .tarjeta-modulo i {
            font-size: 2.5rem;
            color: #172554;
            margin-bottom: 15px;
        }

        .btn-sae {
            background-color: #9f1239;
            color: white;
            border: none;
            width: 100%;
            margin-top: 8px;
        }

        .btn-sae:hover {
            background-color: #881337;
            color: white;
        }

        .btn-sae-secundario {
            background-color: #172554;
            color: white;
            border: none;
            width: 100%;
            margin-top: 8px;
        }

        .btn-sae-secundario:hover {
            background-color: #0f172a;
            color: white;
        }

        .pie {
            text-align: center;
            padding: 15px;
            color: #666;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>

    <div class="contenedor-principal">

        <div class="titulo">
            <h1>Sistema de Administración Escolar (SAE)</h1>
        </div>

        <div class="contenido">

            <p class="text-center text-muted mb-4 fs-5">Selecciona un módulo para registrar o consultar información:</p>

            <div class="row g-4">

                <!-- Módulo Alumnos -->
                <div class="col-md-6 col-lg-3">
                    <div class="tarjeta-modulo">
                        <i class="bi bi-people-fill"></i>
                        <h4>Alumnos</h4>
                        <a href="registro/reg_alumno.php" class="btn btn-sae btn-sm">
                            <i class="bi bi-person-plus"></i> Registrar
                        </a>
                        <a href="catalogos/list_alumno.php" class="btn btn-sae-secundario btn-sm">
                            <i class="bi bi-table"></i> Catálogo
                        </a>
                    </div>
                </div>

                <!-- Módulo Profesores -->
                <div class="col-md-6 col-lg-3">
                    <div class="tarjeta-modulo">
                        <i class="bi bi-person-badge-fill"></i>
                        <h4>Profesores</h4>
                        <a href="registro/reg_profesor.php" class="btn btn-sae btn-sm">
                            <i class="bi bi-person-plus"></i> Registrar
                        </a>
                        <a href="catalogos/list_profesores.php" class="btn btn-sae-secundario btn-sm">
                            <i class="bi bi-table"></i> Catálogo
                        </a>
                    </div>
                </div>

                <!-- Módulo Materias -->
                <div class="col-md-6 col-lg-3">
                    <div class="tarjeta-modulo">
                        <i class="bi bi-journal-bookmark-fill"></i>
                        <h4>Materias</h4>
                        <a href="registro/reg_materia.php" class="btn btn-sae btn-sm">
                            <i class="bi bi-plus-circle"></i> Registrar
                        </a>
                        <a href="catalogos/list_materias.php" class="btn btn-sae-secundario btn-sm">
                            <i class="bi bi-table"></i> Catálogo
                        </a>
                    </div>
                </div>

                <!-- Módulo Grupos -->
                <div class="col-md-6 col-lg-3">
                    <div class="tarjeta-modulo">
                        <i class="bi bi-diagram-3-fill"></i>
                        <h4>Grupos</h4>
                        <a href="registro/reg_grupo.php" class="btn btn-sae btn-sm">
                            <i class="bi bi-plus-circle"></i> Registrar
                        </a>
                        <a href="catalogos/list_grupos.php" class="btn btn-sae-secundario btn-sm">
                            <i class="bi bi-table"></i> Catálogo
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <div class="pie">
            Sistema SAE - Programación II Emmanuel Lopez Cornejo
        </div>

    </div>

</body>

</html>
