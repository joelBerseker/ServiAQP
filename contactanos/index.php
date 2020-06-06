<?php
include("../includes/sesion.php");
include("../includes/navbar.php");
$titulo_html="Contactanos";
include("../includes/header.php");
?>

<nav aria-label="breadcrumb" style="">
  <ol class="breadcrumb" style="border-radius: 0px; margin-bottom: 0px!important; padding-left: 48px;">
    <li class="breadcrumb-item"><a href="<?php echo $dirEjec?>">Inicio</a></li>
	<li class="breadcrumb-item active" aria-current="page">Contactanos</li>
  </ol>
</nav>
<div class="section2">
	<div class="pru pt-3"  id="principal">
		<div class="container">
			<div class="card mb-4 border-0 p-3">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<div class="container text-center">
							<p class="h3">Contáctanos</p>
							<div class="row justify-content-center">
								<hr class="style14" width="50%">
							</div>
							<!-- Contact Form Area -->
							<div class="contact-form-area">
								<form action="#" method="post">
									<div class="row">
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group">
												<input type="text" class="form-control" id="contact-name" placeholder="Nombre">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group">
												<input type="email" class="form-control" id="contact-email" placeholder="Email">
											</div>
										</div>
										<div class="col-12 ">
											<div class="form-group">
												<textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Mensaje"></textarea>
											</div>
										</div>
										<div class="col-12">
											<button type="submit" class="btn foode-btn">Enviar</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<div class="container text-center">
							<br>
							<p class="h3">Información</p>
							<div class="row justify-content-center">
								<hr class="style14" width="50%">
							</div>
							<blockquote class="blockquote">
								<div class="single-contact-info d-flex">
									<div class="icon">
										<i class="fa fa-phone" aria-hidden="true"></i>
									</div>
									<p>+51 941 739 015</p>
								</div>
								<!-- Single Contact Info -->
								<div class="single-contact-info d-flex">
									<div class="icon">
										<i class="fa fa-envelope" aria-hidden="true"></i>
									</div>
									<p>info.switch4play@gmail.com</p>
								</div>
							</blockquote>
						</div>
					</div>
				</div>
			</div>
		</div><br><br><br>
	</div>
</div>

<?php
	include("../includes/footer.php")
?>