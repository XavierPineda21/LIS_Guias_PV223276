<!-- Modal para agregar producto -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Agregar Producto</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="agregar.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="codigo">Código:</label>
                        <input type="text" class="form-control" name="codigo" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" name="descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" class="form-control" name="imagen" accept=".jpg, .png" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría:</label>
                        <select class="form-control" name="categoria">
                            <option value="Textil">Textil</option>
                            <option value="Promocional">Promocional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" class="form-control" name="precio" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="existencias">Existencias:</label>
                        <input type="number" class="form-control" name="existencias" min="0" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>
