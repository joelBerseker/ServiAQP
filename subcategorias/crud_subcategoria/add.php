<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Acceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="crud_subcategoria/save.php" method="POST">
                    <div class="form-group form-row">
                        <div class="col-4"><label>Nombre:</label></div>
                        <div class="col"><input type="text" name="nombre" class="form-control form-control-sm" autofocus></div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-4"><label>Descripcion:</label></div>
                        <div class="col"><input type="text" name="descripcion" class="form-control form-control-sm" autofocus></div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-4"><label>Categoria:</label></div>
                    <?php
                    $queryb = mysqli_query($conn, "SELECT CatID, CatNom FROM CATEGORIA WHERE CatEstReg = 1");
                    ?>
                    <div class="col">
                        <select name="categoria" class="form-control form-control-sm">
                        <?php
                        while ($datosb = mysqli_fetch_array($queryb)) {
                            ?>
                            <option value="<?php echo $datosb['CatID'] ?>"> <?php echo $datosb['CatNom'] ?> </option>
                        <?php
                        }
                        ?>
                    </select></div></div>
                    <hr>

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
                    <input type="submit" class="btn btn-success btn-block" name="save_subcategoria" value="Enviar">
                </form>
      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      --> 
    </div>
  </div>
</div>

	