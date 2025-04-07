<!DOCTYPE html>
<html>
<head>
    <title>Gestión de Ofertas</title>
</head>
<body>
    <h2>Ofertas en Espera</h2>
    <?php foreach ($ofertas as $oferta): ?>
        <p><?php echo $oferta['titulo']; ?></p>
        <form method="post" action="index.php?action=aprobar_oferta">
            <input type="hidden" name="oferta_id" value="<?php echo $oferta['id']; ?>">
            <button type="submit">Aprobar</button>
        </form>
        <form method="post" action="index.php?action=rechazar_oferta">
            <input type="hidden" name="oferta_id" value="<?php echo $oferta['id']; ?>">
            <input type="text" name="motivo" placeholder="Motivo de rechazo" required>
            <button type="submit">Rechazar</button>
        </form>
    <?php endforeach; ?>
</body>
</html>
