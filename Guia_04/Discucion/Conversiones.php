<?php
function convertir($valor, $de, $a) {
    $conversiones = [
        "metro" => 1,
        "yarda" => 1.09361,
        "pie" => 3.28084,
        "vara" => 1.19631
    ];
    
    if (!isset($conversiones[$de]) || !isset($conversiones[$a])) {
        return "Conversión no válida";
    }
    
    $valorEnMetros = $valor / $conversiones[$de];
    return $valorEnMetros * $conversiones[$a];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = floatval($_POST["valor"]);
    $de = $_POST["de"];
    $a = $_POST["a"];
    $resultado = convertir($valor, $de, $a);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Unidades</title>
</head>
<body>
    <h2>Conversor de Unidades</h2>
    <form method="post">
        <label for="valor">Valor:</label>
        <input type="number" step="any" name="valor" required>
        <br>
        <label for="de">Convertir de:</label>
        <select name="de" required>
            <option value="metro">Metros</option>
            <option value="yarda">Yardas</option>
            <option value="pie">Pies</option>
            <option value="vara">Varas</option>
        </select>
        <br>
        <label for="a">Convertir a:</label>
        <select name="a" required>
            <option value="metro">Metros</option>
            <option value="yarda">Yardas</option>
            <option value="pie">Pies</option>
            <option value="vara">Varas</option>
        </select>
        <br>
        <button type="submit">Convertir</button>
    </form>
    
    <?php if (isset($resultado)): ?>
        <h3>Resultado: <?= htmlspecialchars($valor) ?> <?= htmlspecialchars($de) ?> equivale a <?= htmlspecialchars(round($resultado,2)) ?> <?= htmlspecialchars($a) ?></h3>
    <?php endif; ?>
</body>
</html>