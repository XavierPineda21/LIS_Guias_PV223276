<!DOCTYPE html>
<html>
<head>
    <title>Mis Cupones</title>
</head>
<body>
    <h2>Mis Cupones</h2>
    <table>
    <tr>
        <th>Código</th>
        <th>Oferta</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($cupones as $cupon) { ?>
        <tr>
            <td><?php echo $cupon['codigo']; ?></td>
            <td><?php echo $cupon['titulo_oferta']; ?></td>
            <td><?php echo $cupon['estado']; ?></td>
            <td>
                <?php if ($cupon['estado'] == 'Disponible') { ?>
                    <a href="index.php?action=generar_pdf&codigo=<?php echo $cupon['codigo']; ?>">Descargar PDF</a>
                <?php } else { ?>
                    <span>No disponible</span>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
