<!-- Modal para editar producto -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="editLabel">Editar Producto</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="editar.php" enctype="multipart/form-data">
                    <input type="hidden" name="codigo_antiguo" id="edit_codigo_antiguo">
                    
                    <div class="form-group">
                        <label for="edit_codigo">Código:</label>
                        <input type="text" class="form-control" name="codigo" id="edit_codigo" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="edit_nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_descripcion">Descripción:</label>
                        <textarea class="form-control" name="descripcion" id="edit_descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_categoria">Categoría:</label>
                        <select class="form-control" name="categoria" id="edit_categoria">
                            <option value="Textil" <?php if($producto->categoria == 'Textil') echo 'selected'; ?>>Textil</option>
                            <option value="Promocional" <?php if($producto->categoria == 'Promocional') echo 'selected'; ?>>Promocional</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_precio">Precio:</label>
                        <input type="number" class="form-control" name="precio" id="edit_precio" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_existencias">Existencias:</label>
                        <input type="number" class="form-control" name="existencias" id="edit_existencias" min="0" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Imagen actual:</label><br>
                        <img id="edit_imagen_preview" src="" width="100">
                    </div>

                    <div class="form-group">
                        <label for="edit_imagen">Nueva Imagen (opcional):</label>
                        <input type="file" class="form-control" name="imagen" accept=".jpg, .png">
                        <input type="hidden" name="imagen_actual" id="edit_imagen_actual">
                    </div>

                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>
