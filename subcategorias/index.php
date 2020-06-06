<?php
    include("../includes/navbar.php");
    include("../includes/data_base.php");
    $titulo_html="SubCategorias";
    include("../includes/header.php");
?>
<div class="section">
    <div class="container pt-4">
	
	<div class="row">
		<div class="col-md-2">
		<?php
			include("crud_subcategoria/add.php");
		?>
		</div>
		<div class="col-md-11 pt-2">
			<table class='table table-bordered'>
				<thead>
                    <th>ID</th>
                    <th>Categoria</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Estado</th>
					<th>Fecha de creacion</th>
					<th>Acciones</th>
				</thead>
				<tbody>
				<?php
				$query = "SELECT  `SubCatId`,`CatNom`,`SubCatNom`,`SubCatDes`,`SubCatEstReg`, `SubCatFecCre` FROM\n"
                . "    subcategoria t1\n"
                . "INNER JOIN categoria t2 \n"
                . "    ON t1.SubCatCatId = t2.CatId";
				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
                        <td><?php echo $row['SubCatId']?></td>
                        <td><?php echo $row['CatNom']?></td>
						<td><?php echo $row['SubCatNom']?></td>
						<td><?php echo $row['SubCatDes']?></td>
						<td><?php echo $row['SubCatEstReg']?></td>
						<td><?php echo $row['SubCatFecCre']?></td>
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
</div>
<?php
    include("../includes/footer.php");
?>