<?php
include("../includes/sesion.php");
include("../includes/global_variable.php");

include("../includes/navbar.php");
include("../includes/data_base.php");
$titulo_html = "Usuarios";
include("../includes/header.php");;
//$recurso = "/Usuario";
//include("../includes/acl.php");
?>
<div class="section">
	<div class="container pt-4">
		<div class="mb-2">
			<a href="<?= $dirEjec ?>/acceso" class="btn btn-primary btn-sm mb-1">Accesos</a>
			<a href="<?= $dirEjec ?>/categoria/tabla.php" class="btn btn-primary btn-sm mb-1">Categorias</a>
			<a href="<?= $dirEjec ?>/producto/tabla.php" class="btn btn-primary btn-sm mb-1">Servicios</a>
			<a href="<?= $dirEjec ?>/recurso" class="btn btn-primary btn-sm mb-1">Recursos</a>
			<a href="<?= $dirEjec ?>/rol" class="btn btn-primary btn-sm mb-1">Roles</a>
			<a href="<?= $dirEjec ?>/usuario" class="btn btn-primary btn-sm mb-1 btn-disabled disabled">Usuarios</a>

		</div>
		<hr class="mt-3">
		<div class="mt-3 row">
			<div class="col-10 ">
				<h5>Tabla de Usuarios</h5>
				<p>Usuarios existentes en el sistema.</p>
			</div>
			<div class="col-2 align-self-center mb-3">
				<?php
				include("crud_usuario/add.php");
				?>
			</div>
		</div>
		<div>
			<?php
			$query = "SELECT * FROM usuario";
			$resultAcceso = mysqli_query($conn, $query);
			if (mysqli_num_rows($resultAcceso) > 0) {
			?>
				<div class="table-responsive table-bordered tb">
					<table class='table '>
						<thead class="thead-light">
							<th>ID</th>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Imagen</th>
							<th>Id del rol</th>
							<th>Estado</th>
							<th>Fecha de Creación</th>
							<th>Acciones</th>
						</thead>
						<tbody>
							<?php
							
							while ($row = mysqli_fetch_array($resultAcceso)) {
							?>
								<tr>
									<td><?php echo $row['UsuID'] ?></td>
									<td><?php echo $row['UsuNom'] ?></td>
									<td><?php echo $row['UsuCor'] ?></td>
									<td><img src="mostrar.php?id=<?php echo $row['UsuID'] ?>" width="75" alt="Img blob" /></td>
									<td><?php echo $row['UsuRolID'] ?></td>
									<td><?php echo $row['UsuEst'] ?></td>
									<td><?php echo $row['created_at'] ?></td>
									<td>
										<a href="crud_usuario/edit.php?id=<?php echo $row['UsuID'] ?>">
											<button class="btn btn-warning icon-pencil"></button>
										</a>

								

										<button type="button" onclick="edit_rol(<?php echo $row['RolId'] ?>)" class="btn btn-outline-warning btn-sm mb-1" data-toggle="modal" data-target="#editModal" data-whatever="@mdo">Edit</button>
										<a href="crud_usuario/delete.php?id=<?php echo $row['UsuID'] ?>" class="btn btn-outline-danger btn-sm mb-1">
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
</div>
</div>
</div>

<?php
include("../includes/footer.php")
?>