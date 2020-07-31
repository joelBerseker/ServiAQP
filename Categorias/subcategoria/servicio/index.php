<?php
include("../../../includes/sesion.php");
include("../../../includes/global_variable.php");

include("../../../includes/navbar.php");
include("../../../includes/data_base.php");
$categoria = true;
$titulo_html = "Categorias";
include("../../../includes/header.php");

$id_categoria = $_GET["cid"];
$nom_categoria = $_GET["cn"];
$id_subcategoria = $_GET["scid"];
$nom_subcategoria = $_GET["scn"];
?>
<div class="section pt-3">
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb p-0">

				<li class="breadcrumb-item"><a href="<?php echo $dirEjec ?>/categorias">Categorias</a></li>
				<li class="breadcrumb-item"><a href="<?php echo $dirEjec ?>/categorias/subcategoria?id=<?= $id_categoria ?>&nombre=<?= $nom_categoria ?>"><?php echo $nom_categoria ?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $nom_subcategoria ?></li>

			</ol>
		</nav>
	</div>
	<div class="container pt-4">

		<div class="mb-4">
			<h5>Servicios disponibles en <?php echo $nom_subcategoria ?></h5>
			<p>Revisa todos los servicios clasificados en en la categoria <?php echo $nom_subcategoria ?></p>
		</div>

		<div class="row justify-content-right">
			<?php

			$query = "SELECT * FROM `servicio` WHERE `SerEstReg` = 1 and `SerCatID` =" . $id_categoria . " and SerSubCatID=" . $id_subcategoria;


			$resultProduct = mysqli_query($conn, $query);

			if (mysqli_num_rows($resultProduct) > 0) {
				while ($row = mysqli_fetch_array($resultProduct)) {
					$query2 = "SELECT  SerImgNom FROM servicio_img where SerImgSerId=" . $row['SerID'];
					$result = mysqli_query($conn, $query2);
					if ($row2 = mysqli_fetch_array($result)) {
						$dirImg = trim($row2[0]);
					}
					$dirFin = '/ServiAQP/servicios/img/' . $dirImg;
					$id = $row['SerID'];
					if (isset($user)) {
						$user1       = $user['UsuID'];
						$queryA = "SELECT * FROM adquiridos WHERE AdqUsuID = $user1 and AdqSerID=$id";
						$resultProductA = mysqli_query($conn, $queryA);
						$totalA = mysqli_num_rows($resultProductA);
						$queryF = "SELECT * FROM favoritos WHERE FavUsuID = $user1 and FavSerID=$id";
						$resultProductF = mysqli_query($conn, $queryF);
						$totalF = mysqli_num_rows($resultProductF);
					} else {
						$totalA = 0;
						$totalF = 0;
					}
			?>
					<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
						<div class="card mb-4 border-0 card-ani">
							<div class="imageny card-img" style="background-image:url('<?= $dirFin ?>');">
							</div>
							<div class="card-img-overlay pad_serv">
								<button class="btn  btn-sm informacion-btn mb-1" disabled>S/. <?= $row['SerPre'] ?></button>
								<button class="btn  btn-sm informacion-btn mb-1" disabled><i class="fas fa-star"></i> <?php if ($row['SerVal'] == -1) {
																															echo "S/C";
																														} else {
																															echo $row['SerVal'];
																														} ?></button>
		
		
								<?php
								if ($totalA > 0) {
		
								?>
									<button class="btn  btn-sm informacion-btn mb-1" disabled><i class="fas fa-check"></i></button>
								<?php
								}
								?>
								<?php
								if (isset($user)) {
									if ($row['SerUsuID'] == $user1) {
		
								?>
										<button class="btn  btn-sm informacion-btn mb-1" disabled><i class="fas fa-user"></i></button>
								<?php
									}
								}
								?>
							</div>
							<div class="card-body text-center pad_body_ser">
								<h3 class="card-title pad_title_serv"><?= $row['SerNom'] ?></h3>
								<hr class="pt-0 mt-0 mb-1">
								<textarea disabled class="descrip text-center"><?= $row['SerDes'] ?></textarea>
								<hr class="pt-0 mt-0 mb-2">
								<a href="/ServiAQP/servicios/view/?id=<?= $row['SerID'] ?>" class="float-right btn btn-primary btn-sm ml-1"><em class="fas fa-chevron-right"></em></a>
								<?php if (!empty($user)) : ?>
									<a class="float-right btn btn-primary btn-sm ml-1 ani_heart fav_<?= $row['SerID'] ?> <?php if ($totalF > 0) echo "heart_select" ?>" onclick="favoritos(<?= $row['SerID'] ?>)"><em class="fas fa-heart"></em></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php
				}
			} else { ?>
				<p class="col">No hay elementos</p>
			<?php } ?>
		</div>
	</div>


</div>
<?php
include("../../../includes/footer.php");
?>