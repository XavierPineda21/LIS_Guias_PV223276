<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dolares = $_POST['dolares'];
}
?>

    <?php
    //Variables
    $dolares = $_POST['dolares'];
    $euros = $dolares * 0.974;
    ?>
    <div class="container">
        <div class="row">
            <h2>Moneda Convertida</h2>
            <table class="table table-bordered">
                <tr>
                    <td>Dolares</td>
                    <td><?=$dolares?> </td>
                </tr>
                <tr>
                    <td>Euros</td>
                    <td><?=$euros?></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>