<?php
    include("../includes/navbar.php");
    include("../includes/data_base.php");
    $titulo_html="Categorias";
    include("../includes/header.php");
?>
    <div class="container p-4">
	
	<div class="row">
		<div class="col-md-2">
		<?php
			include("crud_tipo_producto/add.php")
		?>

		</div>
		<div class="col-md-11">
			<table class='table table-bordered'>
				<thead>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>ESTADO</th>
					<th>FECHA DE CREACION</th>
					<th>Acciones</th>
				</thead>
				<tbody>
				<?php
				$query = "SELECT * FROM tb_tipo_producto ";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
						<td><?php echo $row['ID_TIPO_PRODUCTO']?></td>
						<td><?php echo $row['DSC_TIPO_PRODUCTO']?></td>
						<td><?php echo $row['estado']?></td>
						<td><?php echo $row['created_at']?></td>
						
						<td>
							<a href="crud_tipo_producto/edit.php?id=<?php echo $row['ID_TIPO_PRODUCTO']?>" class="btn btn-warning">
								Edit
							</a>
							<a href="crud_tipo_producto/delete.php?id=<?php echo $row['ID_TIPO_PRODUCTO']?>" class="btn btn-danger">
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
    include("../includes/footer.php");
?>