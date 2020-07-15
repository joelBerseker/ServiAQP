<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar Servicio</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id ="formServicio" enctype="multipart/form-data" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre de Servicio:</label>
            <input type="text" class="form-control" name="nombre" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Descripcion:</label>
            <textarea class="form-control" name="descripcion" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Categoria:</label>
            <?php
                $db = new mysqli('localhost', 'root','','serviaqp');
                $query = $db->query("SELECT * FROM categoria ORDER BY CatId ASC");
                $rowCount = $query->num_rows;
            ?>
            <select class="form-control" name="categoria" id="categoria">
                <option value="">Selecciona Una Categoria</option>
                <?php 
                    if($rowCount > 0){
                        while($row = $query->fetch_assoc()){
                            echo '<option value="'.$row['CatId'].'">'.$row['CatNom'].'</option>';
                        }      
                    }else{
                        echo '<option value="">Provincia no disponible</option>';  
                     }        
                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Subcategoria:</label>
            <select name="subcategoria" class="form-control" id="subcategoria">
                <option value="">Selecciona una categoria</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Preguntas Frecuentes:</label>
            <textarea class="form-control" name="preguntas" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Añadir Imagenes:</label>
            <input type="file" name="ServicioImagenes" id="ServicioImagenes" multiple class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Precio de Servicio:</label>
            <input type="number" class="form-control" name="precio" step="0.01" min="0" id="recipient-name">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrar" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnGuardarServicio">Send message</button>
      </div>
    </div>
  </div>
</div>