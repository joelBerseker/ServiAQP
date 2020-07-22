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
			<?php 
				$queryC = "SELECT * FROM categoria where CatEstReg = 1";
				$resultProduct = mysqli_query($conn, $queryC);
				while ($rowC = mysqli_fetch_array($resultProduct)) {
			?>
				<button  class="btn btn-primary btn-sm mb-1" onclick="filtrarC(<?=$rowC['CatId']?>)"><?=$rowC['CatNom']?></button>
			<?php 
				}
			?>
		</div>

		<hr class="mt-3">

		<div class="mt-3">
			<h5>Servicios disponibles</h5>
			<p>Revisa todos los servicios que nuestros usuarios han publicado.</p>
		</div>
		<div id="ServicioCard">
			<?php
				include("recargables/ServiciosCard.php");
			?>
		</div>
	</div>
</div>
<?php
include("../includes/footer.php")
?>