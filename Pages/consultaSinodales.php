<?php
// Con esto vamos a empezar la sesión
session_set_cookie_params(0);
session_start();
//require_once '../Clases/Conexion.php';
//require_once '../Clases/Alumno.php';
//require_once '../Clases/SRO.php';
//require_once '../Clases/fpdf17/PDF_solicitud_sinodales.php';
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
						<h2>Consulta los sinodales asignados a tu tesis.</h2>
					</div>
				</div>
			</div>
			<div class="col-md-offset-2 col-md-8">
				Aquí puedes ver la lista de los sinodales aginados a tu trabajo de tesis e imprimir tu Solicitud de Sinodales para que la firmen y la entregues a la Secretaría Técnica de Carrera.<br><br>
				<?php
				$aprobada = true;//hay que determinar esto bien en el sistema
				if($aprobada){
					//echo "Tu Solicitud de Sinodales ha sido aprobada";
				}
				//hacemos una consulta en la BD para determinar cuáles sinodales están asignados a la tesis del alumno
				$sinodales = array(0 => "Hanna Jadwiga Oktaba",1 => "José David Flores Peñaloza",2 => "German Ernesto Zapata Ledesma",3 => "Gabriela Martínez Quezada",4 => "Miguel Angel Piña Avelino");
				$_SESSION['sinodales']=$sinodales;
				$titulo = "Solicitud de Sinodales";
				$contenido = "";
				for($i=0;$i<5;$i++){
					$contenido = $contenido."\n".($sinodales[$i]);
				}
				//$pdf = new PDF($titulo,$contenido);
				//$pdf -> genera();
				?>
				Estos son los sinodales asignados a tu tesis:
				<div class="panel-body">
					<ol class="list-group">
						<?php 
						for($i=0;$i<5;$i++){
							?>
							<li class="list-group-item list-group-item-info"><?php echo $sinodales[$i] ?></li>
							<?php
						}
						?>
					</ol>
					<div class="panel-footer text-center">
						<form action="../Clases/fpdf17/PDF_solicitud_sinodales.php">
							<button id='boton_consultaSinodales' class="btn btn-primary" type="submit">Imprimir Solicitud de Sinodales</button>
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