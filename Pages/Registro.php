<?php
/**
* User: Mariana
* Date: 17/04/2015
* Este script sirve como vista para el registro de los alumnos.
* Se utiliza como auxiliares los siguientes scripts:
* validarRegistro.js
* BuscadorAlumno.php
*/
session_set_cookie_params(0);
session_start(); //---> session_start() sirve para que la sesión esté activa.
require_once '../Clases/Conexion.php';
require_once '../Clases/Alumno.php';
?>
<!DOCTYPE html>
<!--Inicia documento html-->
<html>
	<head>
		<meta charset="utf-8">
		<title>Facultad de Estudios Superiores Acatlán</title>
		<link href="assets/css/bootstrap.css" rel="stylesheet"/>
	</head>
	<!--Se agregaron los scripts de bootstrap para el comportamiento de la página.-->
	<script src="assets/js/jquery-1.11.2.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/validadorRegistro.js"></script>
	<body>
		<div class="container">
			<div class ='container'>
				<?php require_once 'header.php'; ?>
			</div>
			<br>
			<div class="container">
				<div class="col-md-offset-3 col-md-6">
					<div class="page-header position-relative">
						<h2> Registro de Usuario: </h2>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-offset-3 col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Proporciona los datos siguientes :</h3>
							</div>
							<form id ="form_registro" class="form-signin" method='post' action="RegistraAlumno.php">
								<div class="panel-body">
									<label for="numerocuenta_registro" class="sr-only">Número de cuenta</label>
									<input type="text" id="numerocuenta_registro" name='numerocuenta_registro' class="form-control" placeholder="Número de cuenta a 9 dígitos" required autofocus>
									<div id="resultado"></div><!--Aquí salen las sugerencias de número de cuenta con nombre-->
									<!--Nombre, apellido paterno y apellido materno deshabilitados-->
									<div id="e_numerocuenta_registro"></div><!--Aquí se muestran los mensajes de error para este input(validadorRegistro.js)-->
									<input type="hidden" name="id_alumno_hidden" id="id_alumno_hidden"><!--Aquí nos traemos el id del alumno desde BuscadorAlumno.php y validadorRejistro.js Esto para facilitar el Update en la base de datos.--> 
									<label for="nombre_registro" class="sr-only">Nombre</label>
									<input type="text" id="nombre_registro" name='nombre_registro' class="form-control" placeholder="Nombre/Nombres" readonly="readonly">
									<label for="apaterno_registro" class="sr-only">Apellido Paterno</label>
									<input type="text" id="apaterno_registro" name='apaterno_registro' class="form-control" placeholder="Apellido Paterno" readonly="readonly">
									<label for="amaterno_registro" class="sr-only">Apellido Materno</label>
									<input type="text" id="amaterno_registro" name='amaterno_registro' class="form-control" placeholder="Apellido Materno" readonly="readonly">
									<label for="contrasenia_registro" class="sr-only">Contraseña</label>
									<input type="password" id="contrasenia_registro" name='contrasenia_registro' class="form-control" placeholder="Contraseña" required>
									<div id="e_contrasenia_registro"></div><!--Aquí se muestran los mensajes de error para este input-->
									<label for="correo_registro" class="sr-only">Correo Electrónico</label>
									<input type="text" id="correo_registro" name='correo_registro' class="form-control" placeholder="Correo electrónico">
									<div id="e_correo_registro"></div><!-- Aquí se muestran los mensajes de error para este input-->
								</div>
								<div class="panel-footer text-center">
									<button id='boton_registro' class="btn btn-primary " type="submit">Registrarse</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<?php require_once 'footer.php';?>
			</div>
		</div>
	</body>
</html>