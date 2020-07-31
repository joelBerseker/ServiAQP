<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formServicio" name="formServicio"enctype="multipart/form-data">
          <div class="form-row form-group">
            <div class="col-4"><label for="recipient-name">Nombre:</label></div>
            <div class="col"><input type="text" class="form-control form-control-sm" name="nombre" id="recipient-name"></div>
          </div>
          <div class="form-row form-group">
            <div class="col-4"><label for="message-text">Descripcion:</label></div>
            <div class="col"><textarea class="form-control form-control-sm" name="descripcion" id="message-text"></textarea></div>
          </div>
          <div class="form-row form-group">
          <div class="col-4"><label for="message-text">Categoria:</label></div>
            <?php
            $db = new mysqli('localhost', 'root', '', 'serviaqp');
            $query = $db->query("SELECT * FROM categoria ORDER BY CatId ASC");
            $rowCount = $query->num_rows;
            ?>
            <div class="col"><select class="form-control form-control-sm" name="categoria" id="categoria">
              <option value="">Selecciona una categoria</option>
              <?php
              if ($rowCount > 0) {
                while ($row = $query->fetch_assoc()) {
                  echo '<option value="' . $row['CatId'] . '">' . $row['CatNom'] . '</option>';
                }
              } else {
                echo '<option value="">Provincia no disponible</option>';
              }
              ?>
            </select></div>
          </div>
          <div class="form-row form-group">
          <div class="col-4"><label for="message-text">Subcategoria:</label></div>
          <div class="col"><select name="subcategoria" class="form-control form-control-sm" id="subcategoria">
              <option value="">Selecciona una categoria</option>
            </select></div>
          </div>
          <div class="form-row form-group">
          <div class="col-4"><label for="message-text">Preguntas frecuentes:</label></div>
          <div class="col"><textarea class="form-control form-control-sm" name="preguntas" id="message-text"></textarea></div>
          </div>
          <div class="form-row form-group">
          <div class="col-4"><label for="message-text">Añadir imagenes:</label></div>
          <div class="col"><input type="file" name="ServicioImagenes" id="ServicioImagenes" required multiple class="form-control-file"></div>
          </div>
          <div class="form-row form-group">
          <div class="col-4"><label for="recipient-name">Precio de servicio:</label></div>
          <div class="col"><input type="number" class="form-control form-control-sm" name="precio" step="0.01" min="0" id="recipient-name"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success btn-sm" id="btnGuardarServicio">Enviar</button>
      </div>
    </div>
  </div>
</div>