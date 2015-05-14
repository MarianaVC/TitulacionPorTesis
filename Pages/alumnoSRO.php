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
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="assets/js/jquery-1.11.2.js"></script>
		<script src="assets/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<?php require_once 'navbarST.php';?>
			<!--Main-->
			<div class="main-container">
				<!--Comienza el sidebar-->
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
					</div>
					</div><!--Termina Main container-->
					</div><!--Termina container principal-->
					<div class="page-content"><!--Comienza page content-->
					<div class="row-fuid"><!--Row fluid-->
					<div class="span9" style="padding-left:500px">
						<div id="user-profile-1" class="user-profile row-fluid" >
							<div class="span6 center">
								<span class="profile-picture">
									<img id="avatar" class="editable" alt="Alex's Avatar" src="assets/avatars/profile-pic.jpg" />
								</span>
								<div class="space-4"></div>
								<div class="width-80 label label-info label-large arrowed-in arrowed-in-right">
									<div class="inline position-relative">
										<a href="#" class="user-title-label dropdown-toggle" data-toggle="dropdown">
											<i class="icon-circle light-green middle"></i>
											&nbsp;
											<span class="white middle bigger-120">Juan Alberto Rámirez</span>
										</a>
									</div>
								</div>
							</div>
							<div class="space-8">
								<div class="profile-contact-info">
									<div class="profile-contact-links align-left">
										<a class="btn btn-link" href="#">
											<i class="icon-envelope bigger-120 pink"></i>
											Enviar Notificacion
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="span8 widget-container-span" style="padding-left:400px">
						<div class="widget-box" >
							<div class="widget-header header-color-blue">
								<h5 class="bigger lighter">
								<i class="icon-table"></i>
								Estado del trámite de titulacion
								</h5>
								<div class="widget-toolbar widget-toolbar-light no-border">
								</div>
							</div>
							<div class="widget-body">
								<div class="widget-main no-padding">
									<table class="table table-striped table-bordered table-hover">
										<thead>
											<tr>
												<th>
													<i class="icon-check"></i>
													Campo
												</th>
												<th>
												<i class="icon-check"></i>Informacion</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="">Títulos de Tesis</td>
												<td class="">"Titulo chido"</td>
											</tr>
											<tr>
												<td class="">Nombre:</td>
												<td class="">Juan Alberto Ramirez Mora</td>
											</tr>
											<tr>
												<td>Número de cuenta:</td>
												<td>341754788</td>
											</tr>
											<tr>
												<td>Correo Electrónico:</td>
												<td>juan@gmail.com</td>
											</tr>
											<tr>
												<td>Teléfono:</td>
												<td>56613491</td>
											</tr>
											<tr>
												<td>Licenciatura:</td>
												<td>Licenciatura en Matemáticas Aplicadas</td>
											</tr>
											<tr>
												<td>Estado de trámite:</td>
												<td>
													<strong>Soliciturd de registro de opción realizada <i class ="icon-check"></i></strong>
												</td>
											</tr>
											<tr>
												<td>Solicitud de Registro de Opción</td>
												<td><a href="a"><img id="pf" src="../Imagenes/pdf.jpg" /></a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="widget body" style="padding-left: 250px">
							<form action="" method="get" accept-charset="utf-8">
								<button type="submit" class="btn btn-success">Aprobar</button>
								<button type="submit" class="btn btn-danger">No Aprobar</button>
							</form>
						</div>
					</div>
					</div><!--Row fluid-->
					</div><!--Termina page content-->
					<div class="container">
						<?php require_once'footer.php' ?>
					</div>
					<script type="text/javascript">
					if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
					</script>
					<script src="assets/js/bootstrap.min.js"></script>
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