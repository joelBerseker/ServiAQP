<?php
$recurso="/servicio/tabla";
include("../includes/sesion.php");
include("../includes/global_variable.php");

include("../includes/navbar.php");
$configuracion = true;
$titulo_html = "Servicios";
include("../includes/header.php");
?>
<div class="section">
	<div class="container pt-4">
		<div class="mb-2">
		<?php
			$table_ms = 5;
			include("../includes/tables_menu.php");
			?>

		</div>
		<hr class="mt-3">
		<div class="mt-3 row">
			<div class="col-10 ">
				<h5>Tabla de servicios</h5>
				<p>Servicios existentes en el sistema.</p>
			</div>
			<div class="col-2 align-self-center mb-3">
				<button type="button" class="btn btn-outline-success btn-sm float-right mb-1" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Agregar</button>

				<?php
				include("crud_servicio/add.php");
				?>
			</div>
		</div>

		<div id="recargaTablaServicio">
			<?php
			include("recargables/TablaServicios.php");
			?>

		</div>

	</div>
</div>
<?php
include("../includes/footer.php");
?>