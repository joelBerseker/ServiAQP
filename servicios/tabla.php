<?php
    include("../includes/navbar.php");
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
			<div id="recargaTablaServicio">
				<?php 
					include("recargables/TablaServicios.php");
				?>
			</div>
		</div>
	</div>
</div>
</div>
<?php
    include("../includes/footer.php");
?>