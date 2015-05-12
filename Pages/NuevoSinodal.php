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
		<script src="assets/js/jquery-1.11.2.js"></script>
		<script src="assets/js/bootstrap.js"></script>
		<script src="assets/js/validadorSinodal.js"></script>
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
									<div class="widget-box" style="padding-left:200px">
										<div class="row-fluid">
											<div class="widget-header">
												<h4>Agregar un nuevo Sinodal a la base de datos</h4>
												<span class="widget-toolbar">
													<a href="#" data-action="collapse">
														<i class="icon-chevron-up"></i>
													</a>
													<a href="#" data-action="close">
														<i class="icon-remove"></i>
													</a>
												</span>
											</div>
											<div class="widget-body">
												<div class="widget-main">
													<div class="row-fluid">
														<form id="agregarSinodal" method="post" accept-charset="utf-8">
															<label for="nombre_sinodal" class="sr-only">Nombre</label>
															<input type="text" id="nombre_sinodal" name='nombre_sinodal' class="form-control" placeholder="Nombre/Nombres">
															<div id="e_nombre_sinodal"></div>
															<label for="apaterno_sinodal" class="sr-only">Apellido Paterno</label>
															<input type="text" id="apaterno_sinodal" name='apaterno_sinodal' class="form-control" placeholder="Apellido Paterno" >
															<div id="e_apaterno_sinodal"></div>
															<label for="amaterno_Sinodal" class="sr-only">Apellido Materno</label>
															<input type="text" id="amaterno_Sinodal" name='amaterno_Sinodal' class="form-control" placeholder="Apellido Materno" >
															<div id="e_amaterno_Sinodal"></div>
															<label for="Grado" class="sr-only">Grado de estudios</label>
															<select name="Grado" id="Grado" multiple placeholder="Grado de estudios">
																<option value="licenciatura">Licenciatura</option>
																<<option value="Maestria">Maestría</option>
																<<option value="Doctorado">Doctorado</option>
															</select>
															<label for="correo_sinodal" class="sr-only">Correo Electrónico</label>
															<input type="text" id="correo_sinodal" name='correo_sinodal' class="form-control" placeholder="Correo electrónico">
															<div id="e_correo_sinodal"></div><!-- Aquí se muestran los mensajes de error para este input-->
															<button id='boton_registro_sinodal' class="btn btn-primary " type="submit">Registrar nuevo Sinodal</button>
														</form>
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
			</body>
		</html>