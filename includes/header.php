<?php
include('global_variable.php');
include('data_base.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $titulo_html ?> - ServiAQP</title>

	<link rel="stylesheet" type="text/css" href="<?= $dirEjec ?>/frontend/bootstrap-4.5.0-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= $dirEjec ?>/frontend/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= $dirEjec ?>/frontend/fontawesome-free-5.13.1-web/css/all.min.css">
	<link rel="icon" href="<?= $dirEjec ?>/frontend/images/page_icon.png">
	
</head>

<body>
	<div class="container position-fixed fixed-top mt-5 pt-2" style="height: 0px;" aria-live="polite">
		<div class="float-right clearfix  noti_push">

		</div>
	</div>
	<nav id="pri" class="container-fluid navbar navbar-expand-lg navbar-light position-fixed fixed-top">
		<div class="container">
			<a class="ani_ico" href="<?= $dirEjec ?>/"><img src="<?= $dirEjec ?>/frontend/images/logo.png" height="35" alt="logo"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
					<form class="form-inline mr-0 mr-lg-1 mt-lg-0 mt-2 primero_buscar">
						<input class="form-control form-control-sm  segundo_buscar" type="search" placeholder="Busca un servicio">
						<a class="nav-link menu_link " type="submit"><em class="fas fa-search"></em></a>
					</form>
					<li class="nav-item">
						<a class="nav-link menu_link <?php if ($inicio) { ?>select<?php } ?>" href="<?= $dirEjec ?>/"> Inicio</a>
					</li>
					<li class="nav-item dropdown disp_primero_servicios">
						<a class="nav-link menu_link<?php if ($servicio) { ?> select<?php } ?>" href="<?= $dirEjec ?>/servicios" style="color: white;" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">
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

					<?php if (!empty($user)) :
						$count_noti = 0;
						$sql_noti = "SELECT * FROM notificacion WHERE NotEst = 0 and NotUsuID = '" . $user['UsuID'] . "'";
						$result_noti = mysqli_query($conn, $sql_noti);
						$count_noti = mysqli_num_rows($result_noti);

					?>
						<li class="nav-item dropdown disp_primero_perfil">
							<a class="nav-link menu_link " style="color: white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<em class="fas fa-user"></em> <?= $user['UsuCor'] ?><?= $user['UsuID'] ?>
							</a>
							<div class="dropdown-menu  dropdown-menu-right disp_segundo_perfil" aria-labelledby="navbarDropdown">

								<a class="dropdown-item" href="<?= $dirEjec ?>/Usuario/view?id=<?= $user['UsuID'] ?>">Ver perfil</a>
								<a class="dropdown-item" href="/ServiAQP/chat/chats.php">Mis chats</a>
								<a class="dropdown-item" href="<?= $dirEjec ?>/Usuario/view?id=<?= $user['UsuID'] ?>">Favoritos</a>
								<a class="dropdown-item" href="<?= $dirEjec ?>/Usuario/view?id=<?= $user['UsuID'] ?>&opcion=1">Notificaciones</a>
								<a class="dropdown-item" href="<?= $dirEjec ?>/Autenticacion/logout.php"><em class="fas fa-sign-out-alt"></em> Salir</a>
							</div>
						</li>
						<li class="nav-item dropdown disp_primero_notificaciones">
							<a class="nav-link menu_link" onclick='notification_display()' style="color: white;" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<em class="fas fa-bell rot_bell rot_bell2"></em> <span class="num_noti" style="position: absolute; font-size: 10px; top:3px"><?= $count_noti ?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right disp_segundo_notificaciones" aria-labelledby="navbarDropdownMenuLink">
								<div class="noti_contenido">

								</div>
								<div align='center' class="pt-0 mb-0">
									<a style="font-size: 13px;" href="<?= $dirEjec ?>/Usuario/view?id=<?= $user['UsuID'] ?>&opcion=1">Ver todas</a>
								</div>
							</div>
						</li>

						<?php
						if ($user['UsuRolID'] == 1) {
						?>

							<li class="nav-item dropdown disp_primero_configuracion">
								<a class="nav-link menu_link" style="color: white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<div class=""><em class="fas fa-cog cog_rot"></em></div>
								</a>
								<div class="dropdown-menu  dropdown-menu-right disp_segundo_configuracion " aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?= $dirEjec ?>/acceso">Accesos</a>
									<a class="dropdown-item" href="<?= $dirEjec ?>/categoria/tabla.php">Categorias</a>
									<a class="dropdown-item" href="<?= $dirEjec ?>/producto/tabla.php">Servicios</a>
									<a class="dropdown-item" href="<?= $dirEjec ?>/recurso">Recursos</a>
									<a class="dropdown-item" href="<?= $dirEjec ?>/rol">Roles</a>
									<a class="dropdown-item" href="<?= $dirEjec ?>/usuario">Usuarios</a>
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