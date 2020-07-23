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
			<button class="btn btn-sm mb-1 boton_menu bm_select" onclick="filtrarC(<?= $rowC['CatId'] ?>)">Todos</button>

			<?php
			$queryC = "SELECT * FROM categoria where CatEstReg = 1";
			$resultProduct = mysqli_query($conn, $queryC);
			while ($rowC = mysqli_fetch_array($resultProduct)) {
			?>
				<button class="btn btn-sm mb-1 boton_menu" onclick="filtrarC(<?= $rowC['CatId'] ?>)"><?= $rowC['CatNom'] ?></button>
			<?php
			}
			?>
		</div>

		<hr class="mt-3">


		<div class="row">
			<div class="col-auto mt-2" style="max-width: 150px;">
				<button class="btn btn-sm mb-1 boton_menu bm_select btn-block" onclick="filtrarC(<?= $rowC['CatId'] ?>)">Todos</button>
				<button class="btn btn-sm mb-1 boton_menu  btn-block" onclick="filtrarC(<?= $rowC['CatId'] ?>)">Todos ddd dd  ss ss ss ss</button>
				<button class="btn btn-sm mb-1 boton_menu  btn-block" onclick="filtrarC(<?= $rowC['CatId'] ?>)">Todos</button>

			</div>
			<div class="col">
				<div class="mt-2">



					<div class="row">
						<div class="col ">
							<h5>Servicios disponibles</h5>
							<p>Revisa todos los servicios que nuestros usuarios han publicado.</p>
						</div>
						<div class="col-auto align-self-center mb-3">
							<button type="button" class="btn btn-primary btn-sm float-right mb-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar</button>
						</div>
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