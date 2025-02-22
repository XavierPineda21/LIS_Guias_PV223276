<?php
// Cargar el XML
$xmlFile = '../data/productos.xml';
$productos = simplexml_load_file($xmlFile);
$searchTerm = isset($_GET['search']) ? trim($_GET['search']) : '';
$searchLower = mb_strtolower($searchTerm, 'UTF-8');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TextilExport</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Buscador -->
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
            $foundResults = false;
            foreach ($productos->producto as $producto): 
                $nombre = mb_strtolower((string)$producto->nombre, 'UTF-8');
                $descripcion = mb_strtolower((string)$producto->descripcion, 'UTF-8');
                
                //Verificar coincidencias/palabras clave
                $showCard = empty($searchLower) || (strpos($nombre, $searchLower) !== false) || (strpos($descripcion, $searchLower) !== false);

                if ($showCard): $foundResults = true;
            ?>
                <div class="col-md-4">
                    <!-- Tarjetas -->
                    <div class="card producto-card mb-4">
                        <!-- Imagen -->
                        <img src="../assets/img/<?php echo htmlspecialchars($producto->imagen); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto->nombre); ?>" style="object-fit: cover; height: 200px;">
                        <div class="card-body">
                            <!-- nombre -->
                            <h5 class="card-title"><?php echo htmlspecialchars($producto->nombre); ?></h5>
                            <!-- descripcion -->
                            <p class="card-text"><?php echo htmlspecialchars($producto->descripcion); ?></p>
                            <!-- precio -->
                            <p><strong>Precio: </strong>$<?php echo number_format((float)$producto->precio, 2); ?></p>
                            <!-- existencias -->
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
            
            if (!$foundResults && !empty($searchTerm)): ?>
                <div class="col-12">
                    <div class="alert alert-warning text-center mt-4">
                        No se encontraron resultados para "<?php echo htmlspecialchars($searchTerm); ?>"
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>