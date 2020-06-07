<?php
    include("../includes/navbar.php");
    include("../includes/data_base.php");
    $titulo_html="Roles";
    include("../includes/header.php");
?>
<div class="section">
    <div class="container pt-4">
	<div class="row">
		<div class="col-md-2">
		<?php
			include("crud_rol/add.php");
		?>
		</div>
		<div class="col-md-11 pt-2">
			<table class='table table-bordered'>
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Estado</th>
					<th>Fecha de creacion</th>
					<th>Acciones</th>
				</thead>
				<tbody>
				<?php
				$query = "SELECT * FROM ROL";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
						<td><?php echo $row['RolId']?></td>
						<td><?php echo $row['RolNom']?></td>
						<td><?php echo $row['RolDes']?></td>
						<td><?php echo $row['RolEstReg']?></td>
						<td><?php echo $row['RolFecCre']?></td>
						<td>
							<a href="crud_rol/edit.php?id=<?php echo $row['RolId']?>" class="btn btn-warning">
								Edit
							</a>
							<a href="crud_rol/delete.php?id=<?php echo $row['RolId']?>" class="btn btn-danger">
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
<?php
    include("../includes/footer.php");
?>