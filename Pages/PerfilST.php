<?php
/**
* User: Mariana
* Date: 17/04/2015
* Página inicial del perfil del alumno.
*/
session_set_cookie_params(0);
session_start(); //---> session_start() sirve para que la sesión esté activa.
require_once '../Clases/Conexion.php';
require_once '../Clases/SecretariaTecnica.php';
require_once '../Clases/Alumno.php';
require_once '../Clases/SRO.php';
require_once '../Clases/Notificacion.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Facultad de Estudios Superiores Acatlán</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--basic styles-->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!--page specific plugin styles-->
		<!--fonts-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<!--ace styles-->
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<!--[if lte IE 8]>
		<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
		<!--inline styles related to this page-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
		<body>
			<div class="container">
				<?php require_once 'navbarST.php';?>
				<div class="main-container ">
					<div class="sidebar" id="sidebar">
						<ul class="nav nav-list">
							<li class="active">
								<a href="index.html">
									<i class="icon-dashboard"></i>
									<span class="menu-text"> Inicio </span>
								</a>
							</li>
							<li>
								<a href="NuevoDT.php">
									<i class="icon-bolt"></i>
									<span class="menu-text"> Nuevo DT </span>
								</a>
							</li>
							<li>
								<a href="NuevoSinodal.php" class="dropdown-toggle">
									<i class="icon-bolt"></i>
									<span class="menu-text"> Nuevo Sinodal </span>
									<b class="arrow icon-angle-down"></b>
								</a>
							</li>
							<li>
								<a href="RevisarSRO.php">
									<i class="icon-list"></i>
									<span class="menu-text"> Revisar SRO </span>
								</a>
							</li>
							<li>
								<a href="RevisarNTT.php" class="dropdown-toggle">
									<i class="icon-edit"></i>
									<span class="menu-text"> Revisar NTT </span>
									<b class="arrow icon-angle-down"></b>
								</a>
							</li>
							</ul><!--/.nav-list-->
						</div>
						<div class="page-content">
							<div class="row-fluid">
								<div class="span9">
									<div class="row-fluid">
										<div class="widget-body" style="padding-left:200px">
											<div class="widget-main no-padding">
												<div class="widget-box">
													<div class="widget-header">
														<h5>¡Bienvenido! Hay nuevas notificaciones</h5>
														<div class="widget-toolbar">
															<a href="#" data-action="settings">
																<i class="icon-cog"></i>
															</a>
															<a href="#" data-action="reload">
																<i class="icon-refresh"></i>
															</a>
															<a href="#" data-action="collapse">
																<i class="icon-chevron-up"></i>
															</a>
															<a href="#" data-action="close">
																<i class="icon-remove"></i>
															</a>
														</div>
													</div>
												</div>
												<div class="widget-body">
													<div class="widget-main">
														<p class="alert alert-info">
															<strong>Hay 4 solicitudes de registro de opción por revisar</strong>
														</p>
														<p class="alert alert-success">
															<strong>Hay 7 notificaciones de terminación de tesis</strong>
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<br>
				<br>
				<br>
				<div class="container">
					<?php require_once'footer.php' ?>
				</div>
			</body>
		</html>