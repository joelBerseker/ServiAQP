<?php
include("../includes/sesion.php");
include("../includes/global_variable.php");

include("../includes/navbar.php");
include("../includes/data_base.php");
$categoria = true;
$titulo_html = "Subcategorias";
include("../includes/header.php");

?>
<div class="section pt-3">
	<div class="container">
		<div class="mb-4">
			<h5>Categorias disponibles</h5>
			<p>Revisa todos los servicios clasificados en sus categorias</p>
		</div>
		<div class="row justify-content-right">
			<?php
			$query = "SELECT * FROM CATEGORIA";
			$resultProduct = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_array($resultProduct)) {
			?>
				<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
					<div class="card mb-4 border-0 ">

						<div class="card-body text-center pad_body_ser">



							<h3 class="card-title "> <?= $row['CatNom'] ?> </h3>
							<hr class="pt-0 mt-0 mb-1">
							<textarea disabled class="descrip text-center"><?= $row['CatDes'] ?></textarea>
							<hr class="pt-0 mt-0 mb-2">


							<a href="subcategoria?id=<?= $row['CatId'] ?>&nombre=<?= $row['CatNom'] ?>" class="btn btn-primary btn-sm float-right"><em class="fas fa-chevron-right"></em></a>


						</div>
					</div>
				</div>
			<?php
			}
			?>

		</div>
	</div>
	<?php
	include("../includes/footer.php");
	?>