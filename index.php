<?php
include("includes/sesion.php");
include("includes/global_variable.php");

include('includes/navbar.php');
$inicio = true;
$titulo_html = "Inicio";
include("includes/header.php");
?>

<div>
	<div id="carouselExampleIndicators" class="carousel slide mb-3 carousel-fade" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active "></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ul>
		<div class="carousel-inner" role="listbox">
			<div class="carousel-item active" style="height: 100vh;">
				<div class="imageny_carrusel" style="background-image:url('frontend/images/anuncio1.jpg');"></div>
				<div class="carousel-caption d-md-block carrusel-background">
					<h3>Brindamos una plataforma donde puedes publicar servicios.</h3>
				</div>
			</div>
			<div class="carousel-item" style="height: 100vh;">
				<div class="imageny_carrusel" style="background-image:url('frontend/images/anuncio2.jpg');"></div>
				<div class="carousel-caption d-md-block carrusel-background">
					<h3>Publicar tus servicios y genera ingresos extra.</h3>
				</div>
			</div>
			<div class="carousel-item" style="height: 100vh;">
				<div class="imageny_carrusel" style="background-image:url('frontend/images/anuncio3.jpg');"></div>
				<div class="carousel-caption d-md-block carrusel-background">
					<h3>Busca entre una gran cantidad de servicios publicados.</h3>
				</div>
			</div>

		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<div class="section-index ">
	<div class="container">
		<div class="mt-4">
			<h5>Servicios destacados</h5>
			<p>Prueba los servicios que han sido mejor calificados.</p>
		</div>
		<div class="row justify-content-center">
			<?php
			
				include('includes/data_base.php');
			  	$query = "SELECT * FROM `servicio` WHERE `SerEstReg`= 1 ORDER by `SerVal` desc";
				$resultProduct = mysqli_query($conn, $query);
				$cont = 0;
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
					}else{
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
										if($totalA>0){
											
									?>
									<button class="btn  btn-sm informacion-btn mb-1" disabled><i class="fas fa-check"></i></button>
									<?php 
										}
									?>
									<?php
										if($row['SerUsuID']==$user1){
											
									?>
									<button class="btn  btn-sm informacion-btn mb-1" disabled><i class="fas fa-user"></i></button>
									<?php 
										}
									?>
								</div>
								<div class="card-body text-center pad_body_ser">
									<h3 class="card-title pad_title_serv"><?= $row['SerNom'] ?></h3>
									<hr class="pt-0 mt-0 mb-1">
									<textarea disabled class="descrip text-center"><?= $row['SerDes'] ?></textarea>
									<hr class="pt-0 mt-0 mb-2">
									<a href="/ServiAQP/serviciosview/?id=<?= $row['SerID'] ?>" class="float-right btn btn-primary btn-sm ml-1"><em class="fas fa-chevron-right"></em></a>
									<?php if (!empty($user)) : ?>
										<a class="float-right btn btn-primary btn-sm ml-1 ani_heart fav_<?= $row['SerID'] ?> <?php if ($totalF > 0) echo "heart_select" ?>" onclick="favoritos(<?= $row['SerID'] ?>)"><em class="fas fa-heart"></em></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
				   <?php
					$cont = $cont +1;
					if($cont>=4){
						break;
					}
				} 
			?>
		</div>
		<hr class="mt-2">
		<div class="mt-3">
			<h5>Elección del editor</h5>
			<p>Prueba los servicios que nuestros editores te recomiendan.</p>
		</div>

		<div class="row justify-content-center">
		<?php
			
			include('includes/data_base.php');
			  $query= "SELECT * FROM `servicio` WHERE `SerEstReg`= 1 ORDER by `SerPre`";
			$resultProduct = mysqli_query($conn, $query);
			$cont = 0;
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
				}else{
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
									if($totalA>0){
										
								?>
								<button class="btn  btn-sm informacion-btn mb-1" disabled><i class="fas fa-check"></i></button>
								<?php 
									}
								?>
								<?php
									if($row['SerUsuID']==$user1){
										
								?>
								<button class="btn  btn-sm informacion-btn mb-1" disabled><i class="fas fa-user"></i></button>
								<?php 
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
				$cont = $cont +1;
				if($cont>=4){
					break;
				}
			} 
		?>
		</div>
	</div>
</div>
</div>
<?php
include("includes/footer.php");
?>