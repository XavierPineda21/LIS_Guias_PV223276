
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>TextilExport - Administración de Inventario</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="page-header text-center">TextilExport - Administración de Inventario</h1>
    <a href="#addnew" class="btn btn-primary" data-toggle="modal">
        <span class="glyphicon glyphicon-plus"></span> Agregar Producto
    </a>
    <div class="row" style="margin-top:20px;">
        <?php 
            $productos = simplexml_load_file('../data/productos.xml');
            foreach($productos->producto as $producto){
        ?>
        <div class="col-md-4">
            <div class="card producto-card">
                <img src="../assets/img/<?=$producto->imagen?>" class="card-img-top" alt="<?=$producto->nombre?>" style="object-fit: cover; height: 200px;">
                <div class="card-body">
                    <p><strong>Código: </strong><?=$producto->codigo?></p>
                    <h5 class="card-title"><?=$producto->nombre?></h5>
                    <p class="card-text"><?=$producto->descripcion?></p>
                    <p><strong>Categoría: </strong><?=$producto->categoria?></p>
                    <p><strong>Precio: </strong>$<?=$producto->precio?></p>
                    <p><strong>Existencias: </strong><?=$producto->existencias?></p>
                    <a href="#editModal" class="btn btn-success editBtn"
                        data-codigo="<?=$producto->codigo?>"
                        data-nombre="<?=$producto->nombre?>"
                        data-descripcion="<?=$producto->descripcion?>"
                        data-categoria="<?=$producto->categoria?>"
                        data-precio="<?=$producto->precio?>"
                        data-existencias="<?=$producto->existencias?>"
                        data-imagen="<?=$producto->imagen?>">
                        Editar
                    </a>
                    <a href="javascript:void(0);" class="btn btn-danger" data-toggle="modal" data-target="#delete" data-codigo="<?=$producto->codigo?>">Borrar</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include_once('nueva_modal.php'); ?>
<?php include_once('editar_modal.php'); ?>
<?php include_once('borrar_modal.php'); ?>

<script>
    $(document).ready(function() {
        $('#delete').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var codigo = button.data('codigo');
            var url = "borrar.php?codigo=" + codigo;
            $('#confirmDelete').attr('href', url);
        });

        $('.editBtn').on('click', function() {
            let codigo = $(this).data('codigo');
            let nombre = $(this).data('nombre');
            let descripcion = $(this).data('descripcion');
            let categoria = $(this).data('categoria');
            let precio = $(this).data('precio');
            let existencias = $(this).data('existencias');
            let imagen = $(this).data('imagen');
            
            $('#edit_codigo_antiguo').val(codigo);
            $('#edit_codigo').val(codigo);
            $('#edit_nombre').val(nombre);
            $('#edit_descripcion').val(descripcion);
            $('#edit_categoria').val(categoria);
            $('#edit_precio').val(precio);
            $('#edit_existencias').val(existencias);
            $('#edit_imagen_actual').val(imagen);
            $('#edit_imagen_preview').attr('src', '../assets/img/' + imagen);

            $('#editModal').modal('show');
        });
    });
</script>
<?php
if (isset($_GET['mensaje'])) {
    if ($_GET['mensaje'] == 'editado') {
        echo "<script> alertify.success('Producto editado exitosamente'); </script>";
    } elseif ($_GET['mensaje'] == 'agregado') {
        echo "<script> alertify.success('Producto agregado exitosamente'); </script>";
    } elseif ($_GET['mensaje'] == 'error_codigo') {
        echo "<script> alertify.error('Error: Código de producto ya existe.'); </script>";
    }
}
?>
</body>
</html>
