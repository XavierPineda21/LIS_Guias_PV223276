<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Autor</title>
    <?php include 'Views/cabecera.php'; ?>
</head>
<body>
    <?php include 'Views/menu.php'; ?>
    <div class="container mt-4">
        <div class="row">
            <h3>Editar Autor</h3>
        </div>
        <div class="row">
            <div class="col-md-7">
                <form role="form" action="<?= PATH ?>/Autores/update" method="POST">
                    <?php 
                        if(isset($errores)){
                            echo "<div class='alert alert-danger'>";
                            echo "<ul>";
                            foreach($errores as $error){
                                echo "<li>$error</li>";
                            }
                            echo "</ul>";
                            echo "</div>";
                        }
                    ?>
                    <div class="mb-3">
                        <label for="codigo_autor" class="form-label">Código del Autor:</label>
                        <input type="text" class="form-control" 
                            name="codigo_autor" id="codigo_autor" 
                            value="<?= $autor['codigo_autor'] ?>" 
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_autor" class="form-label">Nombre del Autor:</label>
                        <input type="text" class="form-control" 
                            name="nombre_autor" id="nombre_autor" 
                            value="<?= $autor['nombre_autor'] ?>" 
                            placeholder="Ingresa el nombre del autor">
                    </div>
                    <div class="mb-3">
                        <label for="nacionalidad" class="form-label">Nacionalidad:</label>
                        <input type="text" class="form-control" 
                            name="nacionalidad" id="nacionalidad" 
                            value="<?= $autor['nacionalidad'] ?>" 
                            placeholder="Ingresa la nacionalidad">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a class="btn btn-danger" href="<?= PATH ?>/Autores">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>