<?php
include("../../includes/sesion.php");
include("../../includes/global_variable.php");

include("../../includes/navbar.php");
include("../../includes/data_base.php");
$categoria = true;
$titulo_html = "Categorias";
include("../../includes/header.php");

$id_categoria = $_GET["id"];
$nom_categoria = $_GET["nombre"];
?>
<div class="section pt-3">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb p-0">

				<li class="breadcrumb-item"><a href="<?php echo $dirEjec ?>/categorias">Categorias</a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $nom_categoria?></li>

			</ol>
		</nav>
	</div>
	<div class="container pt-4">

		<div class="mb-4">
			<h5>Subcategorias disponibles en <?php echo $nom_categoria?></h5>
			<p>Revisa todos los servicios clasificados en sus categorias</p>
		</div>
		<div class="row justify-content-right">
			<?php
			$query = "SELECT * FROM subcategoria WHERE SubCatCatId=".$id_categoria;
			$resultProduct = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_array($resultProduct)) {
			?>
				<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
					<div class="card mb-4 border-0 ">

						<div class="card-body text-center pad_body_ser">



							<h3 class="card-title "> <?= $row['SubCatNom'] ?> </h3>
							<hr class="pt-0 mt-0 mb-1">
							<textarea disabled class="descrip text-center"><?= $row['SubCatDes'] ?></textarea>
							<hr class="pt-0 mt-0 mb-2">


							<a href="servicio?scid=<?= $row['SubCatId'] ?>&cid=<?= $id_categoria ?>&scn=<?= $row['SubCatNom'] ?>&cn=<?= $nom_categoria?>" class="btn btn-primary btn-sm float-right"><em class="fas fa-chevron-right"></em></a>


						</div>
					</div>
				</div>
			<?php
			}
			?>

		</div>
	</div>
	<?php
	include("../../includes/footer.php");
	?>