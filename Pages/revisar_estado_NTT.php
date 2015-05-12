assets/<?php
session_set_cookie_params(0);
session_start();
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
<body>
	<div class ='container'>
		<!--Nos traemos el header-->
		<div class ='container'>
			<?php require_once 'header.php'; ?>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-offset-0 col-md-10">
					<div class="page-header position-relative">
						<h2>Estado de aprobación de Notificación de Terminación de Tesis.</h2>
					</div>
				</div>
			</div>
			<div class="col-md-offset-0 col-md-10">
				Aquí puedes verificar si tu Notificación de Terminación de Tesis ha sido aprobada.<br>
				<?php
				//$id_alumno = $_SESSION['id_alumno'];
				$id_alumno = 0;
				//hacemos una consulta en la BD para determinar los datos de la NTT del alumno
				//la ntt tiene la forma (id_alumno, titulo, estado_aprobacion, fecha_aprobacion, mesaje)
				$titulo = "Mi tesis";
				$aprobada = false;
				$fecha_aprobacion = date('Y-m-d');
				//mensaje que dejó la STC como observación del por qué no se aprobó la NTT
				$mensaje_desaprobacion="Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido. Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido. Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido. Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido. Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido. Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido.";
				$ntt = $arrayName = array(0 => $id_alumno, 1 => $titulo, 2 => $aprobada, 3 => $fecha_aprobacion, 4 => $mensaje_desaprobacion);
				?>
					<ul class="list-group">
						<li class="list-group-item list-group-item-info active">Título de Tesis:</li>
						<li class="list-group-item list-group-item-default"><?php echo $titulo ?></li>
					</ul>
					<?php
				if($aprobada){
					echo "Tu Notificación de Terminación de Tesis ha sido aprobada el ".$fecha_aprobacion;
				}
				else{
					?>
					Tu Notificación de Terminación de Tesis no ha sido aprobada.
					<ul class="list-group">
						<li class="list-group-item list-group-item-danger">Motivos de la desaprobación:</li>
						<li class="list-group-item list-group-item-default"><?php echo $mensaje_desaprobacion ?></li>
					</ul>
					<?php
				}
				?>
			</div>
		</div>
		<div class="container">
			<?php require_once 'footer.php';?>
		</div>
	</div>
</body>
</html>