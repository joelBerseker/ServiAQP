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
			<p>Prueba suerte entre las categorias mas solicitadas</p>
		</div>
		<hr class="mb-3">
		<div>
			<a href="#" class="btn btn-primary btn-sm">Cursos</a>
			<a href="#" class="btn btn-primary btn-sm">Tutoriales</a>
			<a href="#" class="btn btn-primary btn-sm">Ayuda</a>
			<a href="#" class="btn btn-primary btn-sm">Salud</a>
			<a href="#" class="btn btn-primary btn-sm">Cocina</a>
			<a href="#" class="btn btn-primary btn-sm">Videojuegos</a>
			<a href="#" class="btn btn-primary btn-sm">Teconologia</a>
			<a href="#" class="btn btn-primary btn-sm">Programacion</a>
			<a href="#" class="btn btn-primary btn-sm">Diseño</a>
			<a href="#" class="btn btn-primary btn-sm">Consejos</a>

		</div>

		

		<div class="mt-4">
			<h5>Servicios disponibles</h5>
			<p>Revisa todos los servicios que cientos de personas han publicado</p>
		</div>
		<hr class="mb-3">
		<div class="row justify-content-center">

			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
				<div class="card mb-4 border-0 card-ani">



					<div class="imageny card-img" style="background-image:url('https://fiverr-res.cloudinary.com/images/q_auto,f_auto/gigs/129090915/original/cd7c0612dc9b69d9c2539ad982bf6c0f87b076f1/write-interesting-travel-blogs.png');">
					</div>


					<div class="card-img-overlay">
						<a class="btn  btn-sm informacion-btn">$ 23.30</a>
						<a class="btn  btn-sm informacion-btn"><i class="fas fa-star"></i> 4.0</a>
					</div>
					<div class="card-body text-center">
						<h3 class="card-title"> Clases de escritura d sfsd dfsdfsd fds sf </h3>
						<hr class="pt-0 mt-0 mb-2">
						<textarea disabled class="descrip text-center">Enc das das adsa sdasd adsa sdasd sadasdasd asdasdasdasdasd a das dusdfsfsasdasd a dsa da as dfsfsfentra los mejores juegos de plataforma que puedas encontrar</textarea>
						<hr class="pt-0 mt-0 mb-3">

						<a href="" class="btn btn-primary btn-sm card-link ani_heart"><em class="fas fa-heart"></em></a>
						<a href="/Categoria/VerProductos?id=8" class="btn btn-primary btn-sm">Ver más <em class="fas fa-chevron-right"></em></a>
					</div>

				</div>
			</div>



		</div>

	</div>
</div>




<?php
include("../includes/footer.php")
?>