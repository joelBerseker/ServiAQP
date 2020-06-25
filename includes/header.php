<?php
include('global_variable.php');
include('data_base.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153099513-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'UA-153099513-1');
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $titulo_html ?> - ServiAQP</title>
	<link rel="stylesheet" type="text/css" href="<?= $dirEjec ?>/frontend/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $dirEjec ?>/frontend/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= $dirEjec ?>/frontend/fontawesome-free-5.13.1-web/css/all.min.css">
	<link rel="icon" href="<?= $dirEjec ?>/frontend/images/page_icon.png">
</head>

<body>
	<nav id="pri" class="container-fluid navbar navbar-expand-lg navbar-light position-fixed fixed-top">
		<div class="container">
			<a href="<?= $dirEjec ?>/"><img src="<?= $dirEjec ?>/frontend/images/logo.png" height="35" alt="logo"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<form class="form-inline mr-0 mr-lg-4 mt-lg-0 mt-2">
						<input class="form-control form-control-sm mr-sm-2 " type="search" placeholder="Busca un servicio">
						<button class="btn btn-sm btn-primary mr-sm-2 mt-lg-0 mt-1" type="submit"><em class="fas fa-search"></em></button>
					</form>
					<li class="nav-item">
						<a class="nav-link menu_link <?php if ($inicio) { ?>select<?php } ?>" href="<?= $dirEjec ?>/"> Inicio</a>
					</li>
					<li class="nav-item dropdown disp_primero_servicios">
						<a class="nav-link menu_link<?php if ($servicio) { ?> select<?php } ?>" href="<?= $dirEjec ?>/servicios"  style="color: white;"   id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
						 Servicios
						</a>
						<div class="dropdown-menu dropdown-menu-right disp_segundo_servicios" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here proband o larfgi</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link menu_link<?php if ($categoria) { ?> select<?php } ?>" href="<?= $dirEjec ?>/categorias"> Categorias</a>
					</li>
					<li class="nav-item">
						<a class="nav-link menu_link<?php if ($nosotros) { ?> select<?php } ?>" href="<?= $dirEjec ?>/nosotros">Nosotros</a>
					</li>


					<?php if (!empty($user)) :  ?>


						<li class="nav-item dropdown disp_primero_perfil">
							<a class="nav-link menu_link " style="color: white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<em class="fas fa-user"></em> <?= $user['UsuCor'] ?>
							</a>
							<div class="dropdown-menu  dropdown-menu-right disp_segundo_perfil" aria-labelledby="navbarDropdown">
								<?php
								$correo 	= 	$user['UsuCor'];
								$conn1 = mysqli_connect($database_red, $database_nombre, $database_contraseña, $database_name) or die("Error al conectar al servidor");
								$queryUser = "SELECT UsuID FROM usuario WHERE UsuCor = '$correo'";
								$resultUser = mysqli_query($conn1, $queryUser);
								if (mysqli_num_rows($resultUser) == 1) {
									$row 		= mysqli_fetch_array($resultUser);
									$idUser 	= $row['UsuID'];
								}
								?>
								<a class="dropdown-item" href="<?= $dirEjec ?>/Usuario/view?id=<?= $idUser ?>">Ver perfil</a>
								<a class="dropdown-item" href="<?= $dirEjec ?>/Autenticacion/logout.php"><em class="fas fa-sign-out-alt"></em> Salir</a>
							</div>
						</li>


						<li class="nav-item dropdown disp_primero_notificaciones">
							<a class="nav-link menu_link" style="color: white;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<em class="fas fa-bell rot_bell rot_bell2"></em> 2
							</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								<div class=" pl-2 pr-2 pt-1">
									<div class="card-body PT-0  notifi pt-2 pb-2">
										<p class="card-text mb-0 card-noti">
											Este es as
										</p>
										<hr class="mb-1 mt-2">

										<p class="card-text ">
											<small class="text-muted ">
												Hace 10 minutos
											</small>
										</p>

									</div>
								</div>
							</div>

						</li>

						<?php
						$queryUser2 = "SELECT UsuRolID FROM usuario WHERE UsuCor = '$correo'";
						$resultUser2 = mysqli_query($conn1, $queryUser2);
						if (mysqli_num_rows($resultUser2) == 1) {
							$row2 		= mysqli_fetch_array($resultUser2);
							$idRolUser 	= $row2['UsuRolID'];
						}

						if ($idRolUser == 1) {
						?>


							<li class="nav-item dropdown disp_primero_configuracion">
								<a class="nav-link menu_link" style="color: white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<div class=""><em class="fas fa-cog cog_rot"></em></div>
								</a>
								<div class="dropdown-menu  dropdown-menu-right disp_segundo_configuracion " aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?= $dirEjec ?>/Acceso">Accesos</a>
									<a class="dropdown-item" href="<?= $dirEjec ?>/Categoria/tabla.php">Categorias</a>
									<a class="dropdown-item" href="<?= $dirEjec ?>/Producto/tabla.php">Servicios</a>
									<a class="dropdown-item" href="<?= $dirEjec ?>/Recurso">Recursos</a>
									<a class="dropdown-item" href="<?= $dirEjec ?>/Rol">Roles</a>
									<a class="dropdown-item" href="<?= $dirEjec ?>/Usuario">Usuarios</a>
								</div>
							</li>


						<?php  }  ?>
					<?php else :  ?>


						<li class="nav-item menu_link">
							<a class="nav-link menu_link<?php if ($login) { ?> select<?php } ?>" href="<?= $dirEjec ?>/autenticacion/Login"><em class="fas fa-sign-in-alt "></em> Ingresar</a>
						</li>


					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>