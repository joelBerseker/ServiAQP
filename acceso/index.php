<?php
include("../includes/sesion.php");
include("../includes/global_variable.php");

include("../includes/navbar.php");
include("../includes/data_base.php");
$titulo_html = "Acceso";
include("../includes/header.php");
?>
<div class="section">
	<div class="container pt-4">
		<div class="mb-2">
			<a href="<?= $dirEjec ?>/acceso" class="btn btn-primary btn-sm mb-1 btn-disabled disabled">Accesos</a>
			<a href="<?= $dirEjec ?>/categoria/tabla.php" class="btn btn-primary btn-sm mb-1">Categorias</a>
			<a href="<?= $dirEjec ?>/producto/tabla.php" class="btn btn-primary btn-sm mb-1">Servicios</a>
			<a href="<?= $dirEjec ?>/recurso" class="btn btn-primary btn-sm mb-1">Recursos</a>
			<a href="<?= $dirEjec ?>/rol" class="btn btn-primary btn-sm mb-1 ">Roles</a>
			<a href="<?= $dirEjec ?>/usuario" class="btn btn-primary btn-sm mb-1">Usuarios</a>

		</div>
		<hr class="mt-3">
		<div class="mt-3 row">
			<div class="col-10 ">
				<h5>Tabla de accesos</h5>
				<p>Accesos existentes en el sistema.</p>
			</div>
			<div class="col-2 align-self-center mb-3">

				<?php
				include("crud_acceso/add.php");
				?>

			</div>
		</div>

		<div>
			<?php
			$query = "SELECT * FROM acceso";
			$resultAcceso = mysqli_query($conn, $query);
			if (mysqli_num_rows($resultAcceso) > 0) {
			?>
				<div class="table-responsive table-bordered tb">
					<table class='table'>
						<thead class="thead-light">
							<th>ID</th>
							<th>Nombre</th>
							<th>Id del rol</th>
							<th>Id de recurso</th>
							<th>Estado</th>
							<th>Fecha de creación</th>
							<th>Acciones</th>
						</thead>
						<tbody>
							<?php
							while ($row = mysqli_fetch_array($resultAcceso)) {
							?>
								<tr>
									<td><?php echo $row['AccId'] ?></td>
									<td><?php echo $row['AccNom'] ?></td>
									<td><?php echo $row['AccRolId'] ?></td>
									<td><?php echo $row['AccRecId'] ?></td>
									<td><?php echo $row['AccEstReg'] ?></td>
									<td><?php echo $row['AccFecCre'] ?></td>
									<td>
										<button type="button" onclick="edit_acceso(<?php echo $row['AccId'] ?>)" class="btn btn-outline-warning btn-sm mb-1" data-toggle="modal" data-target="#editModal" data-whatever="@mdo">Edit</button>
										<a href="crud_acceso/delete.php?id=<?php echo $row['AccId'] ?>" class="btn btn-outline-danger btn-sm mb-1">
											Delete
										</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>
			<?php } else { ?>
				<p>No hay elementos</p>
			<?php } ?>
		</div>

	</div>
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Editar Rol</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal_body_edit">
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include("../includes/footer.php");
?>