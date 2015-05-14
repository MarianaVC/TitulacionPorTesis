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
		<script src="assets/js/validadorSTC.js"></script>
		<script src="assets/js/jquery-1.11.2.js"></script>
		<script src="assets/js/bootstrap.js"></script>
		<body>
			<div class="container">
				<?php require_once 'navbarST.php';?>
				<div class="main-container ">
					<div class="sidebar" id="sidebar">
						<ul class="nav nav-list">
							<li class="active">
								<a href="PerfilST.php">
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
									<i class="icon-list"></i>
									<span class="menu-text"> Revisar NTT </span>
								</a>
							</li>
							<li>
								<a href="#" class="dropdown-toggle">
									<i class="icon-edit"></i>
									<span class="menu-text"> Exámenes</span>
									<b class="arrow icon-angle-down"></b>
								</a>
								<ul class="submenu">
									<li>
										<a href="RevisarFechas.php">
											<i class="icon-double-angle-right"></i>
											Revisar fechas
										</a>
									</li>
									<li>
										<a href="RegistrarResultados.php">
											<i class="icon-double-angle-right"></i>
											Registrar Resultados
										</a>
									</li>
								</ul>
							</li>
							<li>
							<a href="AsignarSinodales.php">
								<i class="icon-double-angle-right"></i>
							Asignar Sinodales									</a>
						</li>
						</div>
						<div class="page-content">
							<div class="row-fluid">
								<div class="span8">
									<div class="widget-box" style="padding-left:200px">
										<div class="widget-header">
											<h4>Agregar un nuevo usuario de Departamento de títulos</h4>
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
													<form id="agregarSTC" action="" method="post" accept-charset="utf-8">
														<label for="nombre_STC" class="sr-only">Nombre</label>
														<input type="text" id="nombre_STC" name='nombre_STC' class="form-control" placeholder="Nombre/Nombres">
														<div id="e_nombre_STC"></div>
														<label for="apaterno_STC" class="sr-only">Apellido Paterno</label>
														<input type="text" id="apaterno_STC" name='apaterno_STC' class="form-control" placeholder="Apellido Paterno" >
														<div id="e_apaterno_STC"></div>
														<label for="amaterno_STC" class="sr-only">Apellido Materno</label>
														<input type="text" id="amaterno_STC" name='amaterno_STC' class="form-control" placeholder="Apellido Materno" >
														<div id="e_amaterno_STC"></div>
														<label for="contrasenia_STC" class="sr-only">Contraseña</label>
														<input type="password" id="contrasenia_STC" name='contrasenia_STC' class="form-control" placeholder="Contraseña" required>
														<div id="e_contrasenia_STC"></div><!--Aquí se muestran los mensajes de error para este input-->
														<label for="correo_STC" class="sr-only">Correo Electrónico</label>
														<input type="text" id="correo_STC" name='correo_STC' class="form-control" placeholder="Correo electrónico">
														<div id="e_correo_STC"></div><!-- Aquí se muestran los mensajes de error para este input-->
														<button id='boton_registro_STC' class="btn btn-primary " type="submit">Registrar nuevo usuario</button>
														
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div><!--/span-->
				<div class="container">
					<?php require_once'footer.php' ?>
				</div>
				<script type="text/javascript">
				if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
				</script>
				<script src="assets/js/bootstrap.min.js"></script>
				<!--page specific plugin scripts-->
				<!--[if lte IE 8]>
				<script src="assets/js/excanvas.min.js"></script>
				<![endif]-->
				<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
				<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
				<script src="assets/js/jquery.slimscroll.min.js"></script>
				<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
				<script src="assets/js/jquery.sparkline.min.js"></script>
				<script src="assets/js/flot/jquery.flot.min.js"></script>
				<script src="assets/js/flot/jquery.flot.pie.min.js"></script>
				<script src="assets/js/flot/jquery.flot.resize.min.js"></script>
				<!--ace scripts-->
				<script src="assets/js/ace-elements.min.js"></script>
				<script src="assets/js/ace.min.js"></script>
			</body>
		</html>