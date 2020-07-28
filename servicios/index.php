<?php
include("../includes/sesion.php");
include("../includes/global_variable.php");

include("../includes/navbar.php");
$servicio = true;
$titulo_html = "Servicios";
include("../includes/header.php");
?>
<div class="section pt-3 ">
	<div class="container">
		<div>
			<h5>Categorias</h5>
			<p>Prueba suerte entre las categorias mas buscadas.</p>
		</div>
		<div>
			<a class="btn btn-sm mb-1 boton_menu bm_select filc" onclick="filtrarC(-1)" id="filc-1">Todos</a>

			<?php
			$queryC = "SELECT * FROM categoria where CatEstReg = 1";
			$resultProduct = mysqli_query($conn, $queryC);
			while ($rowC = mysqli_fetch_array($resultProduct)) {
			?>
				<a class="btn btn-sm mb-1 boton_menu filc" id="filc<?= $rowC['CatId'] ?>" onclick="filtrarC(<?= $rowC['CatId'] ?>)"><?= $rowC['CatNom'] ?></a>
			<?php
			}
			?>
		</div>

		<hr class="mt-3">


		<div class="row">
			<div id="subcategorias">
				<?php
				include("recargables/subcategoria.php");
				?>
			</div>
			<div class="col">
				<div class="mt-2 mb-2">
					<div class="row">
						<div class="col ">
							<h5>Servicios disponibles</h5>
							<p>Revisa todos los servicios que nuestros usuarios han publicado.</p>
						</div>
						<?php if (!empty($user)) :
						
							if ($user['UsuRolID'] != 2) {
						?>
								<div class="col-auto align-self-center mb-3">
									<button type="button" class="btn btn-primary btn-sm float-right mb-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar</button>
								</div>
						<?php }
						endif; ?>
					</div>
				</div>
				<div id="ServicioCard">
					<?php
					include("recargables/ServiciosCard.php");
					?>
				</div>
			</div>
		</div>

	</div>
</div>
<?php
include("crud_servicio/add.php");
include("../includes/footer.php")
?>