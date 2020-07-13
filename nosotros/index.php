<?php
include("../includes/sesion.php");
include("../includes/global_variable.php");

include("../includes/navbar.php");
$nosotros=true;
$titulo_html="Nosotros";
include("../includes/header.php");
?>
<div class="">
	<img src="../frontend/images/imagen1.jpg" class="d-block img-fluid w-100">

</div>
<!--
<div class="section">
<nav aria-label="breadcrumb" style="">
	<ol class="breadcrumb" style="">
		<li class="breadcrumb-item"><a href="<?=$dirEjec?>">Inicio</a></li>
		<li class="breadcrumb-item active" aria-current="page">Nosotros</li>
	</ol>
</nav>
--->
	<div class="container text-center mt-2 ">
		
		<p class="display-4">¿Quiénes somos?</p>
		<div class="row justify-content-center">
			<hr class="style14" width="50%">
		</div>
		<blockquote class="blockquote">
			<p class="mb-0">Somos un sitio especializado en brindar un espacio de intercambio de juegos de consolas a diferentes usuarios de manera rápida, segura y accesible.</p>
		</blockquote>
	</div>

	<div class="container text-center">
		<p class="display-4">Misión</p>
		<div class="row justify-content-center">
			<hr class="style14" width="50%">
		</div>
		<blockquote class="blockquote">
			<p class="mb-0">Satisfacer las necesidades de clientes jóvenes y adultos interesados en intercambiar juegos de consola a través de una plataforma virtual que les ofrezca la mejor experiencia de intercambio de juegos en internet.</p>
		</blockquote>
	</div>
	<div class="container text-center">
	
		<p class="display-4">Visión</p>
		<div class="row justify-content-center">
			<hr class="style14" width="50%">
		</div>
		<blockquote class="blockquote">
			<p class="mb-0">Convertirnos en la plataforma virtual de mayor acceso y confiabilidad al intercambio de videojuegos al sur del país.</p>
		</blockquote>
		<br><br>
		<br><br>
	</div>
</div>
<?php
include("../includes/footer.php")
?>