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
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<link rel="stylesheet" href="assets/css/ace.min.css" />
		<link rel="stylesheet" href="assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="assets/js/jquery-1.11.2.js"></script>
		<script src="assets/js/bootstrap.js"></script>
	</head>
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
							<div class="span12">
								<div class="row-fluid">
									<div class="span12 widget-container-span">
										<div class="widget-box" style="padding-left:200px" >
											<div class="widget-header header-color-blue">
												<h5 class="bigger lighter">
												<i class="icon-table"></i>
												Sinodales por asignar
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
																	<i class="icon-user"></i>
																	Alumno
																</th>
																<th>
																	<i class="icon-user"></i>
																	Número de cuenta
																</th>
																<th>
																	<i>@</i>
																	Email
																</th>
																<th class="hidden-480">Status</th>
																<th><i class ="icon-user"></i>Posibles Sinodales</th>
																<th><i class="icon-edit"></i>Aprobar
																</th>
																<th><i class="icon-ban-circle"></i>No Aprobar
																</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="">Mariana Valdivia Carbonell</td>
																<td class="">305176145</td>
																<td>	<a href="#">marianavc@ciencias.unam.mx</a></td>
																<td class="hidden-480"><span class="label label-warning">Esperando Sinodales</span>
															</td>
															<td>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Julio Carrillo Valdemar</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl">Alberto Ramíerez Pérez</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Alejandra González Ortega</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Roberto Zarco Fuentes</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Maribel Rodríguez Gómez</span>
															</td>
															<td class="">
																<form>
																	<input"button" type="submit "class="btn btn-success">Aprobar</input"button">
																</form>
															</td>
															<td class="">
																<form>
																	<input"button" type="submit " class="btn btn-danger">No Aprobar</input"button">
																</form>
															</td>
															
														</tr>
														<tr>
															<td class=""><a href ="alumnoSRO.php">Juan Alberto Ramírez Mora</a></td>
															<td class=""> 305176149</td>

															<td><a href="#">juan@email.com</a></td>
															<td class="hidden-480">
																<span class="label label-warning">Esperando Sinodales</span>
															</td>
																<td>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Julio Carrillo Valdemar</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl">Alberto Ramíerez Pérez</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Alejandra González Ortega</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Roberto Zarco Fuentes</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Maribel Rodríguez Gómez</span>
															</td>

															<td class="">
																<form>
																	<input"button" type="submit "class="btn btn-success">Aprobar</input"button">
																</form>
															</td>
															<td class="">
																<form>
																	<input"button" type="submit " class="btn btn-danger">No Aprobar</input"button">
																</form>
															</td>
														</tr>
														<tr>
															<td class="">Maribel Martínez Guerrero</td>
															<td class="">305123561</td>
															<td><a href="#">mari@email.com</a></td>
															<td class="hidden-480">
																<span class="label label-warning">Esperando Sinodales</span>
															</td>
																<td>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Julio Carrillo Valdemar</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl">Alberto Ramíerez Pérez</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Alejandra González Ortega</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Roberto Zarco Fuentes</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Maribel Rodríguez Gómez</span>
															</td>

															<td class="">
																<form>
																	<input"button" type="submit "class="btn btn-success">Aprobar</input"button">
																</form>
														

															<td class="">
																<form>
																	<input"button" type="submit " class="btn btn-danger">No Aprobar</input"button">
																</form>
															</td>
														</tr>
														<tr>
															<td class="">Eduardo Martínez Rodrígues</td>
															<td class="">306176145</td>
															<td><a href="#">lalo@email.com</a></td>
															<td class="hidden-480">
																<span class="label label-warning">Esperando Sinodales</span>
															</td>
																<td>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Julio Carrillo Valdemar</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl">Alberto Ramíerez Pérez</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Alejandra González Ortega</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Roberto Zarco Fuentes</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Maribel Rodríguez Gómez</span>
															</td>

															<td class="">
																<form>
																	<input"button" type="submit "class="btn btn-success">Aprobar</input"button">
																</form>
															</td>
															<td class="">
																<form>
																	<input"button" type="submit " class="btn btn-danger">No Aprobar</input"button">
																</form>
															</td>
														</tr>
														<tr>
															<td class="">Juan</td>
															<td class="">307895623</td>
															<td><a href="#">james@email.com</a></td>
															<td class="hidden-480">
																<span class="label label-warning">Esperando sinodales</span>
															</td>
																<td>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Julio Carrillo Valdemar</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl">Alberto Ramíerez Pérez</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Alejandra González Ortega</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Roberto Zarco Fuentes</span>
																<input name="form-field-checkbox" type="checkbox" />
																<span class="lbl"> Maribel Rodríguez Gómez</span>
															</td>

															<td class="">
																<form>
																	<input"button" type="submit "class="btn btn-success">Aprobar</input"button">
																</form>
															</td>
															<td class="">
																<form>
																	<input"button" type="submit " class="btn btn-danger">No Aprobar</input"button">
																</form>
															</td>
														</tr>
													</tbody>
												</table>
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
	</div>
</div>
</div>
<div class="container">
<?php require_once'footer.php' ?>
</div>
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