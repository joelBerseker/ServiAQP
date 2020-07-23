<div class="modal fade" id="notificarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notificar servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formServicio" enctype="multipart/form-data">
          
          
          <div class="form-row form-group">
            <div class="col-4"><label for="message-text">Enviar a:</label></div>
           
            <div class="col">
              <select class="form-control form-control-sm" name="categoria" id="categoria">
                <option value="">Favoritos</option>
                <option value="">Adquiridos</option>
                <option value="">Ambos</option>
              </select>
            </div>
          </div>
          <div class="form-row form-group">
            <div class="col-4"><label for="recipient-name">Motivo:</label></div>
            <div class="col"><input type="text" class="form-control form-control-sm" name="nombre" id="recipient-name"></div>
          </div>
          <div class="form-row form-group">
            <div class="col-4"><label for="message-text">Descripcion:</label></div>
            <div class="col"><textarea class="form-control form-control-sm" name="preguntas" id="message-text"></textarea></div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-success btn-sm" id="btnGuardarServicio">Enviar</button>
      </div>
    </div>
  </div>
</div>