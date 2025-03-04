<?php
//Cargar el archivo XML
$xmlFile = '../data/productos.xml';
$productos = simplexml_load_file($xmlFile);
//Obtener la palabra de búsqueda desde la URL (GET) y limpiarlo
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
//Convertir la palaba de búsqueda a minúsculas para hacer la comparación
$searchLower = mb_strtolower($searchTerm, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TextilExport</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <!-- Librería Alertify.js para mostrar alertas -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    <!-- Bootstrap -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Barra de navegación con el buscador -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <form class="d-flex w-100" method="GET" action="">
                <input 
                    class="form-control me-2" 
                    type="search" 
                    name="search" 
                    placeholder="Buscar productos..." 
                    aria-label="Search"
                    value="<?php echo htmlspecialchars($searchTerm); ?>" 
                >
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <h1 class="page-header text-center">TextilExport</h1>
        
        <div class="row" style="margin-top:20px;">
            <?php 
            //Variable para verificar si hubo resultados
            $foundResults = false; 
            
            //Recorrer cada producto dentro del XML
            foreach ($productos->producto as $producto): 
                // Obtener el nombre y la descripción del producto en minúsculas para la comparación
                $nombre = mb_strtolower((string)$producto->nombre, 'UTF-8');
                $descripcion = mb_strtolower((string)$producto->descripcion, 'UTF-8');
                
                // Verificar si el producto coincide con lo buscado
                // Se muestra si el campo de búsqueda está vacío o si hay coincidencias en nombre o descripción
                $showCard = empty($searchLower) || (strpos($nombre, $searchLower) !== false) || (strpos($descripcion, $searchLower) !== false);

                if ($showCard): 
                    //Se encontró 1 o mas resultados
                    $foundResults = true; 
            ?>
                <div class="col-md-4">
                    <!-- Tarjeta de producto -->
                    <div class="card producto-card mb-4">
                        <!-- Imagen del producto -->
                        <img src="../assets/img/<?php echo htmlspecialchars($producto->imagen); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto->nombre); ?>" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <!-- Nombre del producto -->
                            <h5 class="card-title"><?php echo htmlspecialchars($producto->nombre); ?></h5>
                            <!-- Descripción del producto -->
                            <p class="card-text"><?php echo htmlspecialchars($producto->descripcion); ?></p>
                            <!-- Precio del producto -->
                            <p><strong>Precio: </strong>$<?php echo number_format((float)$producto->precio, 2); ?></p>
                            <!-- Existencias del producto -->
                            <p><strong>Existencias: </strong><?php echo htmlspecialchars($producto->existencias); ?></p>
                            <?php if ((int)$producto->existencias === 0): ?>
                                <p class="text-danger"><strong>Producto no disponible</strong></p>
                            <?php else: ?>
                                <p class="text-success"><strong>Disponible</strong></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php 
                endif;
            endforeach; 
            
            // Si no se encontraron productos y el usuario hizo una búsqueda
            if (!$foundResults && !empty($searchTerm)): ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center mt-4">
                        No se encontraron resultados para "<?php echo htmlspecialchars($searchTerm); ?>"
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Scripts de Bootstrap y jQuery -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
