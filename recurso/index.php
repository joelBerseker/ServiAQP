<?php
	include("../includes/navbar.php");
    include("../includes/data_base.php");
    $titulo_html="Recursos";
    include("../includes/header.php");
?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4">
			<?php
				if(isset($_SESSION['message'])){
			?>
				<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
					<?=$_SESSION['message'] ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

			<?php 
				session_unset();
			}
			?>
			<div class="card card-body">
				<form action="crud_recurso/save.php" method="POST">
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" placeholder="nombre del recurso" autofocus>
					</div>
					<input type="submit" class="btn btn-success btn-block" name="save_recurso" value="Enviar">
				</form>
			</div>
		</div>
		<div class="col-md-8">
			<table class='table table-bordered'>
				<thead>
					<th>ID</th>
					<th>NOMBRE</th>
					<th>ESTADO</th>
					<th>FECHA DE CREACION</th>
				</thead>
				<tbody>
				<?php
				$query = "SELECT * FROM recurso";
				$resultRecurso= mysqli_query($conn, $query);
				while($row= mysqli_fetch_array($resultRecurso)){
				?>
					<tr>
						<td><?php echo $row['recurso_id']?></td>
						<td><?php echo $row['nombre']?></td>
						<td><?php echo $row['estado']?></td>
						<td><?php echo $row['fecha_creacion']?></td>
						<td>
							<a href="crud_recurso/edit.php?id=<?php echo $row['recurso_id']?>" class="btn btn-warning">
								Edit
							</a>
							<a href="crud_recurso/delete.php?id=<?php echo $row['recurso_id']?>" class="btn btn-danger">
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
	include("includes/footer.php")
?>
	