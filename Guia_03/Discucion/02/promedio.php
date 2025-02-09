<?php
// Definir el listado de estudiantes con sus notas
$estudiantes = [
    ["nombre" => "Xavier Villatoro", "tarea" => 8.5, "investigacion" => 9, "examen" => 7.8],
    ["nombre" => "Daniel Villatoro", "tarea" => 7.5, "investigacion" => 8.8, "examen" => 9.2],
    ["nombre" => "Guillermo Calderon", "tarea" => 9, "investigacion" => 8.5, "examen" => 8],
];

// Pesos de cada actividad
$peso_tarea = 0.50;
$peso_investigacion = 0.30;
$peso_examen = 0.20;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promedio de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2 class="text-center mb-4">Promedio de Estudiantes</h2>
    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Tarea (50%)</th>
                <th>Investigación (30%)</th>
                <th>Examen (20%)</th>
                <th>Promedio</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudiantes as $estudiante): ?>
                <?php 
                    $promedio = ($estudiante["tarea"] * $peso_tarea) + 
                                ($estudiante["investigacion"] * $peso_investigacion) + 
                                ($estudiante["examen"] * $peso_examen);
                ?>
                <tr>
                    <td><?= htmlspecialchars($estudiante["nombre"]) ?></td>
                    <td><?= $estudiante["tarea"] ?></td>
                    <td><?= $estudiante["investigacion"] ?></td>
                    <td><?= $estudiante["examen"] ?></td>
                    <td class="fw-bold bg-success text-white">
                        <?= number_format($promedio, 2) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


        