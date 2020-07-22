<button type="button" class="btn btn-outline-success btn-sm float-right mb-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="crud_categoria/save.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

          <!--<div class="form-row form-group ">
                <div class="col" align="center" >
                  <img src="../image/objeto-sin-imagen.png"  class="img-fluid"id="imagenmuestra" alt="Img blob" />
                </div>
        </div>-->
          <div class="form-row form-group ">
            <div class="col-4"><label>Nombre:</label></div>
            <div class="col"><input class="form-control form-control-sm " value="" type="text" name="nombre" required></div>
          </div>
          <div class="form-row form-group ">
            <div class="col-4"><label>Descripción:</label></div>
            <div class="col"><input class="form-control form-control-sm " value="" type="text" name="descripcion" required></div>
          </div>
          <!--<div class="form-row form-group ">
              <div class="col-4"><label>Imagen:</label></div>
              <div class="col"><input type="file" name="myFile" accept="image/* "class="form-control-file"></div>
        </div>-->
          <div class="form-row form-group ">
            <div class="col-4">
              <label>Estado:</label>
            </div>
            <div class="col">
              <select name="estado" class="form-control form-control-sm">
                <option value="1"> Activo </option>
                <option value="0"> Inactivo </option>
              </select>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-success btn-sm" type="submit" name="save_product">Enviar</button>
        </div>
      </form>


    </div>
  </div>
</div>
