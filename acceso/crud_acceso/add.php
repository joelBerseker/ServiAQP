<button type="button" class="btn btn-outline-success btn-sm float-right mb-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar acceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="crud_acceso/save.php" method="POST">
        <div class="modal-body">

          <div class="form-group form-row">
            <div class="col-4"><label>Nombre:</label></div>
            <div class="col"><input type="text" name="nombre" class="form-control form-control-sm" required autofocus></div>
          </div>
          <div class="form-group form-row">
            <div class="col-4"><label>Rol:</label></div>
            <?php
            $querya = mysqli_query($conn, "SELECT RolID, RolNom FROM rol");
            ?>
            <div class="col"><select name="rol" class="form-control form-control-sm">
                <?php
                while ($datosa = mysqli_fetch_array($querya)) {
                ?>
                  <option value="<?php echo $datosa['RolID'] ?>"> <?php echo $datosa['RolNom'] ?> </option>
                <?php
                }
                ?>
              </select></div>
          </div>
          <div class="form-group form-row">
            <div class="col-4"><label>Recurso:</label></div>
            <?php
            $queryb = mysqli_query($conn, "SELECT RecID, RecNom FROM recurso");
            ?>
            <div class="col"><select name="recurso" class="form-control form-control-sm">
                <?php
                while ($datosb = mysqli_fetch_array($queryb)) {
                ?>
                  <option value="<?php echo $datosb['RecID'] ?>"> <?php echo $datosb['RecNom'] ?> </option>
                <?php
                }
                ?>
              </select></div>
          </div>


        </div>

        <div class="modal-footer">
          <button class="btn btn-outline-success  btn-sm" type="submit" name="save_acceso">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>