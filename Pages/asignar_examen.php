<?php
// Con esto vamos a empezar la sesión
session_set_cookie_params(0);
session_start();
require_once '../Clases/Examen.php';
?>
<!DOCTYPE html>
<!--Inicia documento html-->
<html>
<head>
	<meta charset="utf-8">
	<title>Facultad de Estudios Superiores Acatlán</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet"/>
	<link href="css/datepicker.css" rel="stylesheet"/>
</head>
<!--Se agregaron los scripts de bootstrap para el comportamiento de la página.-->
<script src="assets/js/jquery-1.11.2.js"></script>
<script src='assets/js/bootstrap.js'></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
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
						<h2>Asignación de lugar y fecha de examen.</h2>
					</div>
				</div>
			</div>
			<div class="col-md-offset-2 col-md-8">
				Proporciona los siguientes datos para asignar lugar y fecha de examen.
				<form class="form" method="post">
					<div class="panel-body">
						Número de cuenta del alumno:
						<input type="text" id="num_cta_alumno" name='num_cta_alumno' class="form-control" placeholder="Número de 9 dígitos" required autofocus>
						<div id="e_num_cta_alumno"></div><!--Aquí se muestran los mensajes de error para este input(ver validadorSRO.js)-->
						Lugar:
						<input type="text" id="edificio" name='edificio' class="form-control" placeholder="Edificio" required autofocus>
						<div id="e_edificio"></div><!--Aquí se muestran los mensajes de error para este input(ver validadorSRO.js)-->
						<input type="text" id="aula" name='aula' class="form-control" placeholder="Aula o auditorio" required autofocus>
						<div id="e_aula"></div><!--Aquí se muestran los mensajes de error para este input(ver validadorSRO.js)-->
						Fecha:
						<input type="date" id="fecha" name='fecha' class="form-control" placeholder="AAAA-MM-DD" required autofocus>
						<div id="e_fecha"></div><!--Aquí se muestran los mensajes de error para este input(ver validadorSRO.js)-->
						<div class="panel-footer text-center">
							<button id='boton_asignar_examen' class="btn btn-primary " type="submit">Aceptar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
                // Con isset checamos que las variables _post esté definida.
		if( (isset($_POST['num_cta_alumno'])) && (isset($_POST['lugar'])) && (isset($_POST['fecha'])) ){
			//$idDT = $_SESSION['idDT'];//id del DT actual
			$idDT = 0;
			$numCtaAlumno = $_POST['num_cta_alumno'];
			$fecha = $_POST['fecha'];
			$lugar = $_POST['lugar'];
			$examen = new Examen($numCtaAlumno,$fecha,$lugar,null);
			//$exito = $examen -> creaExamen($idDT);
			$exito = true;
			if($exito){
				echo "<script type='text/javascript'> alert('Se realizó con éxito la Asignación de Examen'); window.location.href='asignar_examen.php'; </script>"; 
			}
			else{
				echo "<script type='text/javascript'> alert('Hubo un error, inténtalo después'); window.location.href='asignar_examen.php'; </script>";
			}
		}
		?>
		<div class="container">
			<?php require_once 'footer.php';?>
		</div>
	</div>
</body>
</html>