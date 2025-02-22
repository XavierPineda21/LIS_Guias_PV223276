<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productos = simplexml_load_file('../data/productos.xml');
    $codigoNuevo = $_POST['codigo'];

    // Verificar si el código ya existe
    foreach ($productos->producto as $producto) {
        if ((string)$producto->codigo === $codigoNuevo) {
            header("Location: index.php?mensaje=error_codigo");
            exit();
        }
    }

    // Agregar nuevo producto
    $nuevoProducto = $productos->addChild('producto');
    $nuevoProducto->addChild('codigo', $codigoNuevo);
    $nuevoProducto->addChild('nombre', $_POST['nombre']);
    $nuevoProducto->addChild('descripcion', $_POST['descripcion']);
    $nuevoProducto->addChild('categoria', $_POST['categoria']);
    $nuevoProducto->addChild('precio', $_POST['precio']);
    $nuevoProducto->addChild('existencias', $_POST['existencias']);

    // Verificar si se subió una imagen
    if (!empty($_FILES['imagen']['name'])) {
        $imagen_nombre = time() . "_" . basename($_FILES["imagen"]["name"]); 
        $ruta_destino = "../assets/img/" . $imagen_nombre;

        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_destino)) {
            $nuevoProducto->addChild('imagen', $imagen_nombre);
        } else {
            echo "Error al subir la imagen.";
        }
    }

    file_put_contents('../data/productos.xml', $productos->asXML());
    header('location: index.php?mensaje=agregado');
}
?>

