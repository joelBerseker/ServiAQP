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
			<p>Revisa todos los servicios que nuestros usuarios personas han publicado.</p>
		</div>
		<?php
			$query = "SELECT * FROM `servicio`";
			$resultProduct= mysqli_query($conn, $query);
			while($row= mysqli_fetch_array($resultProduct))
			{
				$query2="SELECT  SerImgNom FROM servicio_img where SerImgSerId=".$row['SerID'];
				$result=mysqli_query($conn, $query2);
				if ($row2= mysqli_fetch_array($result)) 
				{
					$dirImg = trim($row2[0]);
				} 
				$dirFin='/ServiAQP/servicios/img/'.$dirImg;
		?>
					<div class="row justify-content-center">

						<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
							<div class="card mb-4 border-0 card-ani">
								<div class="imageny card-img" style="background-image:url('<?=$dirFin?>');">
								</div>
								<div class="card-img-overlay">
									<a class="btn  btn-sm informacion-btn"><?=$row['SerPre'] ?></a>
									<a class="btn  btn-sm informacion-btn"><i class="fas fa-star"></i> <?=$row['SerVal'] ?></a>
								</div>
								<div class="card-body text-center">
									<h3 class="card-title"><?=$row['SerNom']?></h3>
									<hr class="pt-0 mt-0 mb-2">
									<textarea disabled class="descrip text-center"><?=$row['SerDes']?></textarea>
									<hr class="pt-0 mt-0 mb-3">
									<a href="" class="btn btn-primary btn-sm card-link ani_heart"><em class="fas fa-heart"></em></a>
									<a href="view/?id=<?=$row['SerID']?>" class="btn btn-primary btn-sm">Ver más <em class="fas fa-chevron-right"></em></a>
								</div>
							</div>
						</div>
					</div>
		<?php
			}
		?>
	</div>
</div>
<?php
include("../includes/footer.php")
?>