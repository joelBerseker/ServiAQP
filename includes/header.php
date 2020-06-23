<?php
include('global_variable.php');
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
	<title><?php echo $titulo_html; ?> - ServiAQP</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $dirEjec ?>/frontend/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $dirEjec ?>/frontend/css/fonts.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $dirEjec ?>/frontend/css/icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $dirEjec ?>/frontend/css/style.css">
	<link rel="icon" href="<?php echo $dirEjec ?>/frontend/images/page_icon.png">

</head>

<body>
	<nav id="pri" class="container-fluid navbar navbar-expand-lg navbar-light position-fixed fixed-top">
		<div class="container">
			<a href="<?php echo $dirEjec ?>/"><img src="<?php echo $dirEjec ?>/frontend/images/logo.png" height="35" alt="logo"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<form class="form-inline mr-0 mr-lg-4 mt-lg-0 mt-2">
						<input class="form-control form-control-sm mr-sm-2 " type="search" placeholder="">
						<button class="btn btn-sm btn-primary mr-sm-2 mt-lg-0 mt-1" type="submit"><span class=" icon-search"></span></button>
					</form>
					<li class="nav-item">
						<a class="nav-link menu_link <?php if ($inicio) { ?>select<?php } ?>" href="<?php echo $dirEjec ?>/">Inicio</a>
					</li>
					<li class="nav-item dropdown ">
						<a class="nav-link menu_link disp_primero_servicios" style="color: white;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Servicios
						</a>

						<div class="dropdown-menu dropdown-menu-right disp_segundo_servicios" style="" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here proband o larfgi</a>
						</div>

					</li>
					<li class="nav-item">
						<a class="nav-link menu_link<?php if ($categoria) { ?> select<?php } ?>" href="<?php echo $dirEjec ?>/categorias">Categorias</a>
					</li>
					<li class="nav-item">
						<a class="nav-link menu_link<?php if ($nosotros) { ?> select<?php } ?>" href="<?php echo $dirEjec ?>/nosotros">Nosotros</a>
					</li>


					<?php/*  if (!empty($user)) : */ ?>


					<li class="nav-item dropdown ">
						<a class="nav-link menu_link disp_primero_perfil" style="color: white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<? /* $user['UsuCor']; */ ?>Jhon Mamani Mamani
						</a>
						<div class="dropdown-menu  dropdown-menu-right disp_segundo_perfil" aria-labelledby="navbarDropdown">
							<?php
							/* $correo 	= 	$user['UsuCor'];
								$conn1 = mysqli_connect($database_red, $database_nombre, $database_contraseña, $database_name) or die("Error al conectar al servidor");
								$queryUser = "SELECT UsuID FROM usuario WHERE UsuCor = '$correo'";
								$resultUser = mysqli_query($conn1, $queryUser);
								if (mysqli_num_rows($resultUser) == 1) {
									$row 		= mysqli_fetch_array($resultUser);
									$idUser 	= $row['UsuID'];
								} */
							?>
							<a class="dropdown-item" href="<?php echo $dirEjec ?>/Usuario/view?id=<?php echo $idUser ?>">Ver perfil</a>
							<a class="dropdown-item" href="<?php echo $dirEjec ?>/Autenticacion/logout.php">Salir</a>
						</div>
					</li>



					<li class="nav-item dropdown ">
						<a class="nav-link menu_link" style="color: white;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="icon-bell"></span> 2</a>
						</a>

						<div class="dropdown-menu dropdown-menu-right" style="" aria-labelledby="navbarDropdownMenuLink">
							<div class=" pl-2 pr-2 pt-1">
								<div class="card-body PT-0  notifi pt-2 pb-2">
									<p class="card-text mb-0 card-noti">
										Este es as
									</p>
									<hr class="mb-1 mt-2">

									<p class="card-text">
										<small class="text-muted ">
											Hace 10 minutos
										</small>
									</p>

								</div>
							</div>
						</div>

					</li>

					<?php
					/* $queryUser2 = "SELECT UsuRolID FROM usuario WHERE UsuCor = '$correo'";
						$resultUser2 = mysqli_query($conn1, $queryUser2);
						if (mysqli_num_rows($resultUser2) == 1) {
							$row2 		= mysqli_fetch_array($resultUser2);
							$idRolUser 	= $row2['UsuRolID'];
						}
						if ($idRolUser == 1) { */
					?>


					<li class="nav-item dropdown ">
						<a class="nav-link menu_link disp_primero_configuracion " style="color: white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class=" icon-cog"></span>
						</a>
						<div class="dropdown-menu  dropdown-menu-right disp_segundo_configuracion" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?php echo $dirEjec ?>/Acceso">Accesos</a>
							<a class="dropdown-item" href="<?php echo $dirEjec ?>/Categoria/tabla.php">Categorias</a>
							<a class="dropdown-item" href="<?php echo $dirEjec ?>/Producto/tabla.php">Servicios</a>
							<a class="dropdown-item" href="<?php echo $dirEjec ?>/Recurso">Recursos</a>
							<a class="dropdown-item" href="<?php echo $dirEjec ?>/Rol">Roles</a>
							<a class="dropdown-item" href="<?php echo $dirEjec ?>/Usuario">Usuarios</a>
						</div>
					</li>


					<?php /* } */ ?>
					<?php /* else : */ ?>


					<li class="nav-item menu_link">
						<a class="nav-link menu_link<?php if ($login) { ?> select<?php } ?>" href="<?php echo $dirEjec ?>/autenticacion/Login">Ingresar</a>
					</li>


					<?php /* endif; */ ?>
				</ul>
			</div>
		</div>
	</nav>