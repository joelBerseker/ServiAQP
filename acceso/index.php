<?php
    include("../includes/navbar.php");
    include("../includes/data_base.php");
    $titulo_html="Acceso";
    include("../includes/header.php");
?>
<div class="section">
    <div class="container pt-4">
	<div class="row">
		<div class="col-md-2">
		<?php
			include("crud_acceso/add.php");
		?>
		</div>
		<div class="col-md-11 pt-2">
		<div class="table-responsive">
						<table class='table table-hover'>
							<thead>
								<th>Id</th>
								<th>Nombre</th>
								<th>Id del rol</th>
								<th>Id de recurso</th>
								<th>Estado</th>
								<th>Fecha de creación</th>
								<th>Acciones</th>
							</thead>
							<tbody>
								<?php
								$query = "SELECT * FROM acceso";
								$resultAcceso = mysqli_query($conn, $query);
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
							<a href="crud_acceso/edit.php?id=<?php echo $row['AccId']?>" class="btn btn-warning">
								Edit
							</a>
							<a href="crud_acceso/delete.php?id=<?php echo $row['AccId']?>" class="btn btn-danger">
								Delete
							</a>
						</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
			
			</div>
		</div>
	</div>
</div>
</div>
<?php
    include("../includes/footer.php");
?>