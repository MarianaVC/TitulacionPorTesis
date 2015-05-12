<?php
// Con esto vamos a empezar la sesión
session_set_cookie_params(0);
session_start();
require_once '../Clases/Conexion.php';
require_once '../Clases/Alumno.php';
require_once '../Clases/SRO.php';
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
<script src='assets/js/bootstrap.js'></script>
<!--
<script src= "Pages/js/validadorSRO.js"></script>
-->
<body>
	<div class ='container'>
		<!--Nos traemos el header2-->
		<div class ='container'>
			<?php require_once 'header.php'; ?>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-offset-0 col-md-10">
					<div class="page-header position-relative">
						<h2>Realiza tu Solicitud de Registro de Opción.</h2>
					</div>
				</div>
			</div>
			<div class="col-md-offset-0 col-md-10">
				Proporciona los siguientes datos para realizar tu Solicitud de Registro de Opción.
				<form class="form" method="post">
					<div class="panel-body">
						<label for="titulo_de_tesis" class="sr-only">Título de tesis</label>
						Título de tesis:
						<input type="text" id="titulo_de_tesis" name='titulo_de_tesis' class="form-control" placeholder="Título de tesis" required autofocus>
						<div id="e_titulo_de_tesis"></div><!--Aquí se muestran los mensajes de error para este input(ver validadorSRO.js)-->
						Objetivo:
						<input type="text" id="objetivo" name='objetivo' class="form-control" placeholder="Objetivo" required autofocus>
						<div id="e_objetivo"></div><!--Aquí se muestran los mensajes de error para este input(ver validadorSRO.js)-->
						Resumen:
						<input type="text" id="resumen" name='resumen' class="form-control" placeholder="Resumen" required autofocus>
						<div id="e_resumen"></div><!--Aquí se muestran los mensajes de error para este input(ver validadorSRO.js)-->
						Documento de anteproyecto:
						<input type="file" id="documento" name='documento' class="file" placeholder="Documento" required autofocus>
						<div id="e_documento"></div><!--Aquí se muestran los mensajes de error para este input(ver validadorSRO.js)-->
						<div class="panel-footer text-center">
							<button id='boton_SRO' class="btn btn-primary " type="submit">Aceptar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
                // Con isset checamos que las variables _post esté definida.
		if( (isset($_POST['titulo_de_tesis'])) && (isset($_POST['objetivo'])) && (isset($_POST['resumen'])) && (isset($_POST['documento'])) ){
			$idAlumno = $_SESSION['id_alumno'];
			$titulo = $_POST['titulo_de_tesis'];
			$objetivo = $_POST['objetivo'];
			$resumen = $_POST['resumen'];
			$documento = $_POST['documento'];
			$sro = new SRO($idAlumno,$titulo,$objetivo,$resumen,$documento);
			$exito = $sro -> creaSRO();
			if($exito){
				echo "<script type='text/javascript'> alert('Se realizó con éxito tu Solicitud'); window.location.href='realizarSRO.php'; </script>";
				header('Location: Pages/PerfilAlumno.php');
			}
			else{
				echo "<script type='text/javascript'> alert('Hubo un error, inténtalo después'); window.location.href='realizarSRO.php'; </script>";
			}
		}
		?>
		<div class="container">
			<?php require_once 'footer.php';?>
		</div>
	</div>
</body>
</html>