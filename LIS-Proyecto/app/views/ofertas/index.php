<!DOCTYPE html>
<html>
<head>
    <title>Ofertas Disponibles</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>Ofertas Disponibles</h1>
    <?php foreach ($ofertas as $oferta): ?>
        <div class="oferta">
            <h2><?php echo $oferta['titulo']; ?></h2>
            <p>Precio: $<?php echo $oferta['precio_oferta']; ?> (Antes: $<?php echo $oferta['precio_regular']; ?>)</p>
            <a href="index.php?action=detalle&id=<?php echo $oferta['id']; ?>">Ver más</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
