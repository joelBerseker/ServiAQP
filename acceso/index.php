<?php
	include("../includes/navbar.php");
    include("../includes/data_base.php");
    $titulo_html="Accesos";
    include("../includes/header.php");
?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4">
			<?php
				if(isset($_SESSION['message'])){
			?>
				<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
					<?=$_SESSION['message'] ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

			<?php 
				session_unset();
			}
			?>
			<div class="card card-body">
				<form action="crud_acceso/save.php" method="POST">
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" placeholder="nombre del acceso" autofocus>
					</div>
					Seleccione el rol <br>
					
					<?php
					$querya=mysqli_query($conn,"SELECT id_rol, nombre FROM rol");
					?>
					<select name="rol">
						<?php
						while($datosa = mysqli_fetch_array($querya)){ 
						?>
						<option value="<?php echo $datosa['id_rol'] ?>"> <?php echo $datosa['nombre'] ?> </option>
						<?php
						}
						?>
					</select><br>
					Seleccione el recurso <br>
					<?php
					$queryb=mysqli_query($conn,"SELECT recurso_id, nombre FROM recurso");
					?>
					<select name="recurso">
						<?php
						while($datosb = mysqli_fetch_array($queryb)){ 
						?>
						<option value="<?php echo $datosb['recurso_id'] ?>"> <?php echo $datosb['nombre'] ?> </option>
						<?php
						}
						?>
					</select><br>
					<input type="submit" class="btn btn-success btn-block" name="save_acceso" value="Enviar">
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<table class='table table-bordered'>
				<thead>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>ID DEL ROL</th>
					<th>ID DEL RECURSO</th>
					<th>ESTADO</th>
					<th>FECHA DE CREACION</th>
				</thead>
				<tbody>
				<?php
				$query = "SELECT * FROM acceso";
				$resultAcceso= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultAcceso)){
				?>
					<tr>
						<td><?php echo $row['id_acceso']?></td>
						<td><?php echo $row['nombre']?></td>
						<td><?php echo $row['id_rol']?></td>
						<td><?php echo $row['id_recurso']?></td>
						<td><?php echo $row['estado']?></td>
						<td><?php echo $row['fecha_creacion']?></td>
						<td>
							<a href="crud_acceso/edit.php?id=<?php echo $row['id_acceso']?>" class="btn btn-warning">
								Edit
							</a>
							<a href="crud_acceso/delete.php?id=<?php echo $row['id_Acceso']?>" class="btn btn-danger">
								Delete
							</a>
						</td>
					</tr>


				<?php } ?>
				</tbody>
			</table
			>
		</div>
	</div>
</div>

<?php
	include("includes/footer.php")
?>
	