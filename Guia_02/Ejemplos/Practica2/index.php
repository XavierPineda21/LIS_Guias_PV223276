<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Calculadora de CUM</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>

    </head>
<body>
<div class="container">
    <h1 class="page-header text-center">Calculadora de CUM</h1>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Agregar materia</a>
            
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Uv</th>
                    <th>Notas</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    <?php 
                        $materias = simplexml_load_file('materias.xml');
                        //var_dump($materias);
                        $cum = 0;
                        $numerador = 0;
                        $denominador = 0;
                        foreach($materias->materia as $materia){
                            $numerador+=$materia->nota * $materia->uvs;
                            $denominador+=$materia->uvs;                       
                    ?>
            
                <tr>
                    <td><?=$materia->codigo?></td>
                    <td><?=$materia->nombre?></td>
                    <td><?=$materia->uvs?></td>
                    <td><?=$materia->nota?></td>
                    <td>
                    <a href="#edit_<?=$materia->codigo?>" class="btn btn-success" data-toggle="modal">Editar</a>
                        <a href="borrar.php?codigo=<?=$materia->codigo?>"  class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
                        <!-- Editar -->
<?php foreach ($materias->materia as $materia): ?>
<div class="modal fade" id="edit_<?=$materia->codigo?>" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="editar.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Materia</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="codigo_original" value="<?=$materia->codigo?>">
                    
                    <div class="form-group">
                        <label>Código</label>
                        <input type="text" name="codigo" class="form-control" value="<?=$materia->codigo?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?=$materia->nombre?>" required>
                    </div>
                    <div class="form-group">
                        <label>UV</label>
                        <input type="number" name="uvs" class="form-control" value="<?=$materia->uvs?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nota</label>
                        <input type="number" step="0.01" name="nota" class="form-control" value="<?=$materia->nota?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>




            </table>
            <?php 
            if($denominador != 0){
                $cum=round($numerador/$denominador, 2);
                echo "<h2>CUM: $cum</h2>";
            }
            ?>
         
        </div>
    </div>
</div>

<?php 
    include_once('nueva_modal.php');
    if(isset($_GET['exito'])){      
?>

<script>alertify.success('Materia Agregada'); </script>

<?php } ?>

<?php if (isset($_GET['exito']) && $_GET['exito'] == 'editado'): ?>
<script>alertify.success('Materia Editada');</script>
<?php endif; ?>




<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>