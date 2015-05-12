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
										<div id="user-profile-1" class="user-profile row-fluid" style="padding-left:200px">
											<div class="span6 center">
												<div>
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
												<br>
												<div class="space-8"></div>
												<div class="profile-contact-info">
													<div class="profile-contact-links align-left">
														<a class="btn btn-link" href="#">
															<i class="icon-envelope bigger-120 pink"></i>
															Enviar Notificacion
														</a>
													</div>
												</div>
												<br>
												<div class="row-fluid">
													<div class="row-fluid">
														<div class="span12 widget-container-span">
															<div class="widget-box" >
																<div class="widget-header header-color-blue">
																	<h5 class="bigger lighter">
																	<i class="icon-table"></i>
																	Esto del trámite de titulacion																	</h5>
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
																					<i class="icon-check"></i>											Informacion					</th>
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
																						<td>Estado de trámite:</td>
																						<td>Soliciturd de registro de opción realizada</td>
																					</tr>
																				</tbody>
																			</table>
																		</div>
																	</div>
																	<br>
																	<div class="widget body">
																		<form action="" method="get" accept-charset="utf-8">
																			<button type="submit" class="btn btn-success">Aprobar</button>			<button type="submit" class="btn btn-danger">No Aprobar</button>
																		</form>
																		
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="container">
											<?php require_once'footer.php' ?>
										</div>
									</body>
								</html>