<?php 
  include("../includes/global_variable.php");
?>
<button type="button" class="btn btn-outline-success btn-sm float-right mb-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar nuevo <span class="icon-plus"></span></button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!--C:\xampp\htdocs\<?//php echo $dirEjec?>\Categoria\crud_tipo_producto\save.php-->
	  <form action="crud_usuario/save.php" method="POST"  enctype="multipart/form-data">
	  
	  <div class="form-row form-group ">
              <div class="col" align="center" >
                <img src="<?php echo $dirEjec?>/image/usuario-sin-imagen.jpg"  style="width: 200px;" id="imagenmuestra" alt="Img blob" />
              </div>
            </div>
					<div class="form-group form-row">
						<div class="col-4"><label>Nombre:</label></div>
						<div class="col"><input type="text" name="nombre" class="form-control form-control-sm" autofocus></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><label>Correo:</label></div>
						<div class="col"><input type="text" name="correo" class="form-control form-control-sm"></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><label>Contraseña:</label></div>
						<div class="col"><input type="password" name="contraseña" class="form-control form-control-sm"  ></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><label>Estado:</label></div>
						<div class="col"><select name="estado" class="form-control form-control-sm">
						<option value="1"> Activo </option>
						<option value="0"> Inactivo </option>
					</select></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><label>Imagen:</label></div>
         				 <div class="col"><input type="file" name="myFile" accept="image/* "class="form-control-file"></div>
     				 </div>
					  <div class="form-group form-row">
						<div class="col-4"><label>Nombre:</label></div>
					
					<?php
					$querya=mysqli_query($conn,"SELECT RolID, RolNom FROM rol");
					?>
					<div class="col"><select name="rol" class="form-control form-control-sm">
						<?php
						while($datosa = mysqli_fetch_array($querya)){ 
						?>
						<option value="<?php echo $datosa['RolID'] ?>"> <?php echo $datosa['RolNom'] ?> </option>
						<?php
						}
						?>
					</select></div></div>
					
					<input type="submit" class="btn btn-success btn-block" name="save_acceso" value="Enviar">
				</form>


      </div>
     <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      --> 
    </div>
  </div>
</div>

	