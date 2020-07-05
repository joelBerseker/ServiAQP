<?php
include("includes/sesion.php");
include("includes/global_variable.php");

include('includes/navbar.php');
$inicio = true;
$titulo_html = "Inicio";
include("includes/header.php");
?>

<div class="" >
	<div id="carouselExampleIndicators" class="carousel slide mb-3" data-ride="carousel">
		<ul class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ul>
		<div class="carousel-inner" role="listbox" >
	
			<div class="carousel-item active" style="height: 100vh;">
				<div class="imageny_carrusel" style="background-image:url('frontend/images/anuncio1.jpg');"></div>
				<div class="carousel-caption d-md-block carrusel-background">
					<h3>En estos tiempos de dificultad, te ayudamos brindando una plataforma donde puedes ofrecer servicios y ganar un ingreso extra.</h3>
				</div>
			</div>
	
			<div class="carousel-item" style="height: 100vh;">
			<div class="imageny_carrusel" style="background-image:url('frontend/images/anuncio2.jpg');"></div>
				<div class="carousel-caption d-md-block carrusel-background">
					<h3>Publicar un servicio desde casa y genera millones</h3>
				</div>
			</div>
	
			<div class="carousel-item" style="height: 100vh;">
			<div class="imageny_carrusel" style="background-image:url('frontend/images/anuncio3.jpg');"></div>
				<div class="carousel-caption d-md-block carrusel-background">
					<h3>Se tu propio jefe, no dependas de nadie para ganar dinero</h3>
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
			<h5>Destacados</h5>
			<p>Prueba los servicios destacados que tenemos para ti</p>
		</div>
		<hr class="mb-3">
		<div class="row justify-content-center">
			<?php for ($i = 1; $i <= 4; $i++) { ?>
				<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
					<div class="card mb-4 border-0 card-ani">
						<div class="img-animtion">
							<div class="imageny" style="background-image:url('https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/129090915/original/cd7c0612dc9b69d9c2539ad982bf6c0f87b076f1/write-interesting-travel-blogs.png');">
							</div>
							<div class="card-img-overlay">
								<a class="btn  btn-sm informacion-btn">$ 23.30</a>
								<a class="btn  btn-sm informacion-btn"><i class="fas fa-star"></i>  4.0</a>
							</div>
						</div>
						<div class="card-body text-center">
							<h3 class="card-title"> Clases de escritura d sfsd dfsdfsd fds sf </h3>
							<hr class="pt-0 mt-0 mb-2">
							<textarea disabled class="descrip text-center">Enc das das adsa sdasd adsa sdasd sadasdasd asdasdasdasdasd a das dusdfsfsasdasd a dsa da as dfsfsfentra los mejores juegos de plataforma que puedas encontrar</textarea>
							<hr class="pt-0 mt-0 mb-3">

							<a href="/ServiAQP" class="btn btn-primary btn-sm ani_heart"><em class="fas fa-heart"></em></a>
							<a href="servicios/view/" class="btn btn-primary btn-sm ani_ver">Ver más <em class="fas fa-chevron-right"></em></a>
						</div>
					</div>
				</div>
			<?php } ?>

		</div>
		
		<div class="mt-3">
			<h5>Elecciones del editor</h5>
			<p>Prueba los servicios que los editores tienen para ti</p>
		</div>
		<hr class="mb-3">
		<div class="row justify-content-center">

			<?php for ($i = 1; $i <= 4; $i++) { ?>
				<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
					<div class="card mb-4 border-0 card-ani">
						<div class="img-animtion">
							<div class="imageny" style="background-image:url('https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/129090915/original/cd7c0612dc9b69d9c2539ad982bf6c0f87b076f1/write-interesting-travel-blogs.png');">
							</div>
							<div class="card-img-overlay">
								<a class="btn  btn-sm informacion-btn">$ 23.30</a>
								<a class="btn  btn-sm informacion-btn"><i class="fas fa-star"></i>  4.0</a>
							</div>
						</div>
						<div class="card-body text-center">
							<h3 class="card-title"> Clases de escritura d sfsd dfsdfsd fds sf </h3>
							<hr class="pt-0 mt-0 mb-2">
							<textarea disabled class="descrip text-center">Enc das das adsa sdasd adsa sdasd sadasdasd asdasdasdasdasd a das dusdfsfsasdasd a dsa da as dfsfsfentra los mejores juegos de plataforma que puedas encontrar</textarea>
							<hr class="pt-0 mt-0 mb-3">

							<a href="" class="btn btn-primary btn-sm ani_heart"><em class="fas fa-heart"></em></a>
							<a href="servicios/view/" class="btn btn-primary btn-sm ani_ver">Ver más <em class="fas fa-chevron-right"></em></a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>






	</div>
</div>
</div>
<?php
include("includes/footer.php");
?>