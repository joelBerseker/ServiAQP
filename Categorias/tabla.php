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
			include("crud_categoria/add.php");
		?>
		</div>
		<div class="col-md-11">
			<table class='table table-bordered'>
				<thead>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>DESCRIPCION</th>
					<th>ESTADO</th>
					<th>FECHA DE CREACION</th>
					<th>Acciones</th>
				</thead>
				<tbody>
				<?php
				$query = "SELECT * FROM CATEGORIA";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
						<td><?php echo $row['CatId']?></td>
						<td><?php echo $row['CatNom']?></td>
						<td><?php echo $row['CatDes']?></td>
						<td><?php echo $row['CatEstReg']?></td>
						<td><?php echo $row['CatFecCre']?></td>
						
						<td>
							<a href="crud_categoria/edit.php?id=<?php echo $row['CatId']?>" class="btn btn-warning">
								Edit
							</a>
							<a href="crud_categoria/delete.php?id=<?php echo $row['CatId']?>" class="btn btn-danger">
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