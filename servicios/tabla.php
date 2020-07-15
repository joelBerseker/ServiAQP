<?php
    include("../includes/navbar.php");
    include("../includes/data_base.php");
    $titulo_html="Servicios";
    include("../includes/header.php");
?>
<div class="section">
    <div class="container pt-4">
	
	<div class="row">
		<div class="col-md-2">
		<?php
			include("crud_servicio/add.php");
		?>
		</div>
		<div class="col-md-11 pt-2">
			<table class='table table-bordered'>
				<thead>
                    <th>ID</th>
                    <th>Nombre</th>
					<th>Categoria</th>
					<th>Subcategoria</th>
					<th>Creador por</th>
					<th>Estado</th>
					<th>Fecha de creacion</th>
					<th>Acciones</th>
				</thead>
				<tbody>
				<?php
				$query = "SELECT * FROM `servicio_tabla`";

				$resultProduct= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultProduct)){
				?>
					<tr>
                        <td><?php echo $row['SerID']?></td>
                        <td><?php echo $row['SerNom']?></td>
						<td><?php echo $row['CatNom']?></td>
						<td><?php echo $row['SubCatNom']?></td>
						<td><?php echo $row['UsuNom']?></td>
						<td><?php echo $row['SerEstReg']?></td>
						<td><?php echo $row['SerFecCre']?></td>
						<td>
							<a href="crud_subcategoria/edit.php?id=<?php echo $row['SubCatId']?>" class="btn btn-warning">
								Edit
							</a>
							<a href="crud_subcategoria/delete.php?id=<?php echo $row['SubCatId']?>" class="btn btn-danger">
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