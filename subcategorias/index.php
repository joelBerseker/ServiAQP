<?php
$recurso="/subcategoria";
include("../includes/sesion.php");
include("../includes/global_variable.php");

include("../includes/navbar.php");
include("../includes/data_base.php");
$configuracion = true;
$titulo_html = "SubCategorias";
include("../includes/header.php");
?>
<div class="section">
	<div class="container pt-4">
		<div class="mb-2">
			<?php
			$table_ms = 6;
			include("../includes/tables_menu.php");
			?>

		</div>
		<hr class="mt-3">
		<div class="mt-3 row">
			<div class="col-10 ">
				<h5>Tabla de subcategorias</h5>
				<p>Subcategorias existentes en el sistema.</p>
			</div>
			<div class="col-2 align-self-center mb-3">
				<?php
				include("crud_subcategoria/add.php");
				?>
			</div>
		</div>
		<div>
			<?php
			$query = "SELECT  `SubCatId`,`CatNom`,`SubCatNom`,`SubCatDes`,`SubCatEstReg`, `SubCatFecCre` FROM\n"
				. "    subcategoria t1\n"
				. "INNER JOIN categoria t2 \n"
				. "    ON t1.SubCatCatId = t2.CatId";
			$resultProduct = mysqli_query($conn, $query);
			if (mysqli_num_rows($resultProduct) > 0) {
			?>
			<div class="table-responsive table-bordered tb">
				<table class='table'>
					<thead class="thead-light">
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

						while ($row = mysqli_fetch_array($resultProduct)) {
						?>
							<tr>
								<td><?php echo $row['SubCatId'] ?></td>
								<td><?php echo $row['CatNom'] ?></td>
								<td><?php echo $row['SubCatNom'] ?></td>
								<td><?php echo $row['SubCatDes'] ?></td>
								<td><?php echo $row['SubCatEstReg'] ?></td>
								<td><?php echo $row['SubCatFecCre'] ?></td>
								<td>
									
									<button type="button" onclick="edit_subcategoria(<?php echo $row['SubCatId'] ?>)" class="btn btn-outline-warning btn-sm mb-1" data-toggle="modal" data-target="#editModal" data-whatever="@mdo">Edit</button>
									
									<a href="crud_subcategoria/delete.php?id=<?php echo $row['SubCatId'] ?>" class="btn btn-sm btn-outline-danger mb-1">
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
					<h5 class="modal-title" id="exampleModalLabel">Editar subcategoria</h5>
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