<?php
$recurso="/rol";
include("../includes/sesion.php");
include("../includes/global_variable.php");

include("../includes/navbar.php");
include("../includes/data_base.php");
$configuracion = true;
$titulo_html = "Roles";
include("../includes/header.php");
?>
<div class="section">
	<div class="container pt-4">
		<div class="mb-2">
		<?php
			$table_ms = 4;
			include("../includes/tables_menu.php");
			?>

		</div>
		<hr class="mt-3">
		<div class="mt-3 row">
			<div class="col-10 ">
				<h5>Tabla de roles</h5>
				<p>Roles existentes en el sistema.</p>
			</div>
			<div class="col-2 align-self-center mb-3">
				<?php
				include("crud_rol/add.php");
				?>
			</div>
		</div>
		<div>
			<?php
			$query = "SELECT * FROM ROL";
			$resultProduct = mysqli_query($conn, $query);
			if (mysqli_num_rows($resultProduct) > 0) {
			?>
				<div class="table-responsive table-bordered tb">
					<table class='table'>
						<thead class="thead-light">
							<th>ID</th>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Estado</th>
							<th>Fecha de creacion</th>
							<th>Acciones</th>
						</thead>
						<tbody>
							<?php
							while ($row = mysqli_fetch_array($resultProduct)) {
							?>
								<tr>
									<td><?php echo $row['RolId'] ?></td>
									<td><?php echo $row['RolNom'] ?></td>
									<td><?php echo $row['RolDes'] ?></td>
									<td><?php echo $row['RolEstReg'] ?></td>
									<td><?php echo $row['RolFecCre'] ?></td>
									<td>

										<button type="button" onclick="edit_rol(<?php echo $row['RolId'] ?>)" class="btn btn-outline-warning btn-sm mb-1" data-toggle="modal" data-target="#editModal" data-whatever="@mdo">Edit</button>
										<a href="crud_rol/delete.php?id=<?php echo $row['RolId'] ?>" class="btn btn-outline-danger btn-sm mb-1">
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
					<h5 class="modal-title" id="exampleModalLabel">Editar rol</h5>
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