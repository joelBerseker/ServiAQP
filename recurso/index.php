<?php
    include("../includes/navbar.php");
    include("../includes/data_base.php");
    $titulo_html="Recursos";
    include("../includes/header.php");
?>
<div class="section">
    <div class="container pt-4">
	<div class="row">
		<div class="col-md-2">
		<?php
			include("crud_recurso/add.php");
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
				$query = "SELECT * FROM RECURSO";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
						<td><?php echo $row['RecId']?></td>
						<td><?php echo $row['RecNom']?></td>
						<td><?php echo $row['RecDes']?></td>
						<td><?php echo $row['RecEstReg']?></td>
						<td><?php echo $row['RecFecCre']?></td>
						<td>
							<a href="crud_recurso/edit.php?id=<?php echo $row['RecId']?>" class="btn btn-warning">
								Edit
							</a>
							<a href="crud_recurso/delete.php?id=<?php echo $row['RecId']?>" class="btn btn-danger">
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