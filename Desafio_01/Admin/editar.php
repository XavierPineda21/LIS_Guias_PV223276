<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productos = simplexml_load_file('../data/productos.xml');

    // Datos recibidos del formulario
    $codigo_antiguo = $_POST['codigo_antiguo'];
    $codigoNuevo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $existencias = $_POST['existencias'];
    $imagen_actual = $_POST['imagen_actual'];

    // Verificar si el nuevo código ya existe en otro producto
    foreach ($productos->producto as $producto) {
        if ((string)$producto->codigo === $codigoNuevo && (string)$producto->codigo !== $codigo_antiguo) {
            header("Location: index.php?mensaje=error_codigo");
            exit();
        }
    }

    // Editar el producto correcto
    foreach ($productos->producto as $producto) {
        if ((string)$producto->codigo === $codigo_antiguo) {
            $producto->codigo = $codigoNuevo;
            $producto->nombre = $nombre;
            $producto->descripcion = $descripcion;
            $producto->categoria = $categoria;
            $producto->precio = $precio;
            $producto->existencias = $existencias;

            // Subir una nueva imagen si se selecciona
            if (!empty($_FILES['imagen']['name'])) {
                $imagen_nombre = time() . "_" . basename($_FILES["imagen"]["name"]);
                $ruta_destino = "../assets/img/" . $imagen_nombre;

                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_destino)) {
                    // Eliminar la imagen antigua si existe
                    if (!empty($imagen_actual) && file_exists("../assets/img/" . $imagen_actual)) {
                        unlink("../assets/img/" . $imagen_actual);
                    }
                    $producto->imagen = $imagen_nombre;
                }
            }
            break;
        }
    }

    // Guardar los cambios en el archivo XML
    file_put_contents('../data/productos.xml', $productos->asXML());

    // Redirigir con el mensaje de éxito
    header("Location: index.php?mensaje=editado");
    exit();
}
?>
