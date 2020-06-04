<?php
	include('global_variable.php');
	include('navbar.php');
	include('data_base.php');
	function estadosGenerales($valor)
	{
		if ($valor == 1) {
			return "Activo";
		} else {
			return "Inactivo";
		}
	}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153099513-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
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
	<link rel="stylesheet" type="text/css" href="<?php echo $dirEjec ?>/frontend/css/style.css">
	<link rel="icon" href="<?php echo $dirEjec ?>/image/page_icon.png">
	<!--<script src="<?php echo $dirEjec ?>/frontend/library/jquery-3.4.1.min.js"></script>	
	<script src="<?php echo $dirEjec ?>/frontend/library/bootstrap/js/bootstrap.js"></script>
	-->
</head>

<body>
	<nav id="pri" class="container-fluid navbar navbar-expand-lg navbar-light sticky-top">
		<div class="container">
		<a href="<?php echo $dirEjec ?>/"><img src="<?php echo $dirEjec ?>/frontend/images/logo.png" height="35" alt="logo de traveline"></a>
	
		
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
				
			<ul class="navbar-nav ml-auto">

			<form class="form-inline mr-0 mr-lg-4 mt-lg-0 mt-2">
					<input class="form-control form-control-sm mr-sm-2" type="search" placeholder="">
					<button class="btn btn-sm btn-primary mr-sm-2 mt-lg-0 mt-1" type="submit">Buscar</button>
				</form>

				<li class="nav-item <?php if ($inicio) { ?>menu_link<?php } ?>">
					<a class="nav-link <?php if (!$inicio) { ?> menu_link<?php } ?>" style="color: white;<?php if ($inicio) { ?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php } ?>" href="<?php echo $dirEjec ?>/">Inicio</a>
				</li>
				<li class="nav-item <?php if ($producto) { ?>menu_link<?php } ?>">
					<a class="nav-link <?php if (!$producto) { ?> menu_link<?php } ?>" style="color: white;<?php if ($producto) { ?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php } ?>" href="<?php echo $dirEjec ?>/Intercambio">Servicios</a>
				</li>
				<li class="nav-item <?php if ($nosotros) { ?>menu_link<?php } ?>">
					<a class="nav-link <?php if (!$nosotros) { ?> menu_link<?php } ?>" style="color: white;<?php if ($nosotros) { ?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php } ?>" href="<?php echo $dirEjec ?>/Nosotros">Nosotros</a>
				</li>
				<li class="nav-item <?php if ($contactanos) { ?>menu_link<?php } ?>">
					<a class="nav-link  <?php if (!$contactanos) { ?> menu_link<?php } ?>" style="color: white;<?php if ($contactanos) { ?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php } ?>" href="<?php echo $dirEjec ?>/Contactanos">Contactanos</a>
				</li>


				<?php if (!empty($user)) : ?>


				<li class="nav-item dropdown ">
					<a style="color: white; white; text-transform: uppercase;" class="nav-link menu_link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<?= $user['UsuCor']; ?>
					</a>
					<div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
						<?php
							$correo 	= 	$user['UsuCor'];
							$conn1 = mysqli_connect($database_red,$database_nombre,$database_contraseña,$database_name) or die("Error al conectar al servidor");
							$queryUser = "SELECT UsuID FROM usuario WHERE UsuCor = '$correo'";
							$resultUser = mysqli_query($conn1, $queryUser);
							if (mysqli_num_rows($resultUser) == 1) {
								$row 		= mysqli_fetch_array($resultUser);
								$idUser 	= $row['UsuID'];
							}
							?>
						<a class="dropdown-item" href="<?php echo $dirEjec ?>/Usuario/view?id=<?php echo $idUser ?>">VER PERFIL</a>
						<a class="dropdown-item" href="<?php echo $dirEjec ?>/Autenticacion/logout.php">SALIR</a>
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


				<li class="nav-item dropdown ">
					<a style="color: white;" class="nav-link menu_link " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class=" icon-cog"></span>
					</a>
					<div class="dropdown-menu  dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo $dirEjec ?>/Acceso">ACCESOS</a>
						<a class="dropdown-item" href="<?php echo $dirEjec ?>/Categoria/tabla.php">CATEGORIAS</a>
						<a class="dropdown-item" href="<?php echo $dirEjec ?>/Intercambio/tabla.php">INTERCAMBIO</a>
						<a class="dropdown-item" href="<?php echo $dirEjec ?>/Producto/tabla.php">PRODUCTOS</a>
						<a class="dropdown-item" href="<?php echo $dirEjec ?>/Recurso">RECURSOS</a>
						<a class="dropdown-item" href="<?php echo $dirEjec ?>/Rol">ROLES</a>
						<a class="dropdown-item" href="<?php echo $dirEjec ?>/Usuario">USUARIOS</a>					
					</div>
				</li>


				<?php } ?>
				<?php else : ?>


				<li class="nav-item <?php if ($login) { ?>menu_link<?php } ?>">
					<a class="nav-link <?php if (!$login) { ?> menu_link<?php } ?>" style="color: white;<?php if ($login) { ?>border-bottom: 2px solid #FF1F7B;bottom: 15px; <?php } ?>" href="<?php echo $dirEjec ?>/Autenticacion/Login">Ingresar</a>
				</li>
					

				<?php endif; ?>
			
			</ul>
		</div>
		</div>
	</nav>