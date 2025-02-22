<?php
if (isset($_GET['codigo'])) {
    $codigo = $_GET['codigo'];

    // Cargar el archivo XML que contiene los productos
    $productos = simplexml_load_file('../data/productos.xml');

    // Buscar el producto por código
    $indexToDelete = -1;
    $i = 0;

    foreach ($productos->producto as $producto) {
        if ((string)$producto->codigo === $codigo) {
            $indexToDelete = $i;
            break;
        }
        $i++;
    }

    // Si el producto fue encontrado, eliminarlo
    if ($indexToDelete != -1) {
        unset($productos->producto[$indexToDelete]);
        file_put_contents('../data/productos.xml', $productos->asXML());
    }

    // Redirigir al index después de eliminar el producto
    header('Location: index.php');
    exit();
}
?>
