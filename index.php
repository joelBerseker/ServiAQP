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
			<?php for ($i = 1; $i <= 4; $i++) { ?>
				<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
					<div class="card mb-4 border-0 card-ani">
						<div class="img-animtion">
							<div class="imageny" style="background-image:url('https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/129090915/original/cd7c0612dc9b69d9c2539ad982bf6c0f87b076f1/write-interesting-travel-blogs.png');">
							</div>
							<div class="card-img-overlay pad_serv">
								<a class="btn  btn-sm informacion-btn">$ 23.30</a>
								<a class="btn  btn-sm informacion-btn"><i class="fas fa-star"></i> 4.0</a>
							</div>
						</div>
						<div class="card-body text-center pad_serv">
							<div class="row">
								<div class="col pr-2">
									<h3 class="card-title"> Clases de escritura d sfsd dfsdfsd fds sf </h3>
									<hr class="pt-0 mt-0 mb-2">
									<textarea disabled class="descrip text-left">Es es una descripcion de como e sla clase de escritura</textarea>
									
								</div>
								
								<div class="col-auto pl-2 align-self-center">
									<a onclick="favoritos" class="btn btn-primary btn-sm ani_heart btn-block"><em class="fas fa-heart"></em></a>
									<a href="servicios/view/" class="btn btn-primary btn-sm ani_ver btn-block mt-1"><em class="fas fa-chevron-right"></em></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<hr class="mt-2">
		<div class="mt-3">
			<h5>Elección del editor</h5>
			<p>Prueba los servicios que nuestros editores te recomiendan.</p>
		</div>

		<div class="row justify-content-center">
			<?php for ($i = 1; $i <= 4; $i++) { ?>
				<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
					<div class="card mb-4 border-0 card-ani">
						<div class="img-animtion">
							<div class="imageny" style="background-image:url('https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/129090915/original/cd7c0612dc9b69d9c2539ad982bf6c0f87b076f1/write-interesting-travel-blogs.png');">
							</div>
							<div class="card-img-overlay">
								<a class="btn  btn-sm informacion-btn">$ 23.30</a>
								<a class="btn  btn-sm informacion-btn"><i class="fas fa-star"></i> 4.0</a>
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