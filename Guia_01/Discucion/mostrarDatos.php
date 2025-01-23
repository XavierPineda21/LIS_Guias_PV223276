<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Script php que muestre mis datos por medio de variables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<?php  
    $nombre = "Xavier Isaac Pineda Villatoro";
    $nacimiento = "San Salvador, El Salvador";
    $edad = 22;
    $carnet = "PV223276";
?>


<div class="container">
    <div class="row">
        <div>
        <table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Lugar de nacimiento</th>
            <th>Edad</th>
            <th>Carnet</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo "$nombre" ?></td>
            <td><?php echo "$nacimiento" ?></td>
            <td><?php echo "$edad" ?></td>
            <td><?php echo "$carnet" ?></td>
        </tr>
    </tbody>
</table>
        </div>
    </div>
</div>
</body>
</html>