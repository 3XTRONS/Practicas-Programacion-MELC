<?php
// Arreglo asociativo multidimensional que simula el catálogo de libros
$biblioteca = [
    ["isbn" => "978-0131103627", "titulo" => "Fundamentos de Redes", "autor" => "Brian W. Kernighan", "categoria" => "Programación"],
    ["isbn" => "978-6071503152", "titulo" => "Fundamentos de Bases de Datos", "autor" => "Abraham Silberschatz", "categoria" => "Bases de Datos"],
    ["isbn" => "978-0132350884", "titulo" => "Las 48 Leyes del Poder", "autor" => "Robert Greene", "categoria" => "Psicología aplicada, estrategia y desarrollo personal o autoayuda pragmática."],
    ["isbn" => "978-8448156220", "titulo" => "El Nihilismo", "autor" => "Diego Sánchez Meca", "categoria" => "Filosofía / Pensamiento contemporáneo."]
];

$busqueda = isset($_GET['q']) ? trim($_GET['q']) : '';
$resultados = [];

if ($busqueda !== '') {
    foreach ($biblioteca as $libro) {
        // Búsqueda insensible a mayúsculas/minúsculas por título, autor o categoría
        if (
            stripos($libro['titulo'], $busqueda) !== false ||
            stripos($libro['autor'], $busqueda) !== false ||
            stripos($libro['categoria'], $busqueda) !== false
        ) {
            $resultados[] = $libro;
        }
    }
} else {
    $resultados = $biblioteca;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca TecNM - Búsqueda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container-custom { max-width: 800px; margin: 40px auto; }
        .bg-tecnm { background-color: #1b396a; color: white; }
    </style>
</head>
<body>

<div class="container container-custom">
    <div class="card">
        <div class="card-header bg-tecnm text-center">
            <h4>Catálogo de Biblioteca TecNM (Método GET)</h4>
        </div>
        <div class="card-body">
            <!-- Formulario con método GET -->
            <form method="GET" action="" class="row g-2 mb-4">
                <div class="col-8">
                    <input type="text" name="q" class="form-control" placeholder="Buscar por título, autor o categoría..." value="<?php echo htmlspecialchars($busqueda); ?>">
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary bg-tecnm w-100">Buscar</button>
                </div>
            </form>

            <h5>Resultados de la Búsqueda:</h5>
            <table class="table table-striped table-bordered align-middle mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ISBN</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($resultados) > 0): ?>
                        <?php foreach ($resultados as $item): ?>
                            <tr>
                                <td><?php echo $item['isbn']; ?></td>
                                <td><?php echo $item['titulo']; ?></td>
                                <td><?php echo $item['autor']; ?></td>
                                <td><span class="badge bg-secondary"><?php echo $item['categoria']; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">No se encontraron libros que coincidan con "<?php echo htmlspecialchars($busqueda); ?>".</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
