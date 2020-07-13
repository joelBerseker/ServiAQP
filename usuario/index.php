<?php
include("../includes/sesion.php");
	include("../includes/navbar.php");
	$login=true;
	$titulo_html="Usuarios";
	include("../includes/header.php");
	include("../includes/data_base.php");
	$recurso="/Usuario";
	include("../includes/acl.php");
?>
<div class="section2">
<div class="container pt-4">
		<div class="card p-3">
					<div class="mb-2">
			<caption>
				<?php
				//Usuario\crud_usuario\add.php
				include("crud_usuario/add.php")
				?>		
			</caption>		
		</div>
			
			<div class="table-responsive">
			<table class='table table-hover' >
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Imagen</th>
						<th>Id del rol</th>
						<th>Estado</th>
						<th>Fecha de Creación</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</thead>
					<tbody>
					<?php
					$query = "SELECT * FROM usuario";
					$resultAcceso= mysqli_query($conn, $query);
					while($row= mysqli_fetch_array($resultAcceso)){
					?>
						<tr>
							<td><?php echo $row['UsuID']?></td>
							<td><?php echo $row['UsuNom']?></td>
							<td><?php echo $row['UsuCor']?></td>
							<td><img src="mostrar.php?id=<?php echo $row['UsuID']?>"  width="75" alt="Img blob" /></td>
							<td><?php echo $row['UsuRolID']?></td>
							<td><?php echo $row['UsuEst']?></td>
							<td><?php echo $row['created_at']?></td>
							<td>
								<a href="crud_usuario/edit.php?id=<?php echo $row['UsuID']?>">
									<button class="btn btn-warning icon-pencil"></button>
								</a>
							</td>
							<td>
								<a href="crud_usuario/delete.php?id=<?php echo $row['UsuID']?>">
									<button class="btn btn-danger icon-cross"></button>
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
</div>

<?php
	include("../includes/footer.php")
?>
	