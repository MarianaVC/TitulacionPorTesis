<?php
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
						<h2>Resultado de tu Examen Profesional.</h2>
					</div>
				</div>
			</div>
			<div class="col-md-offset-0 col-md-10">
				Aquí puedes verificar el resultado que obtuviste en tu Examen Profesional.<br>
				<?php
				//$id_alumno = $_SESSION['id_alumno'];
				$id_alumno = 0;
				$nombre_alumno = "Juan Pérez";
				//hacemos una consulta en la BD para determinar los datos del examen del alumno
				$edificio = "Tlahuizcalpan";
				$aula = "Sistemas Simbólicos";
				$fecha = date('Y-m-d');
				$aprobado = 0;//0 reprobado, 1 aprobado, 2 aprobado con honores, 4 sin especificar
				//mensaje que dejó el DT como observación del por qué no se aprobó el examen ó del
				//por qué aprobó con honores
				$mensaje_resultado_na="Lamentamos informarle que por falta de conocimientos usted no aprobó el examen.";
				$mensaje_resultado_a="Aprobado con honores por su excelente desempeño y rendimiento académico.";
				$mensaje_resultado;
				if($aprobado == 0){
					$mensaje_resultado = $mensaje_resultado_na;
				}
				else{
					$mensaje_resultado = $mensaje_resultado_a;
				}
				$mensaje;
				$color;
				if($aprobado == 4){
					$mensaje = "Aún no se registra tu resultado";
					$color = "default";
				}
				if($aprobado == 0){
					$mensaje = "No aprobado";
					$color = "danger";
				}
				if($aprobado == 1){
					$mensaje = "Aprobado";
					$color = "success";
				}
				if($aprobado == 2){
					$mensaje = "Aprobado con honores";
					$color = "success";
				}

				?>
				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">Nombre del alumno:</li>
					<li class="list-group-item list-group-item-default"><?php echo $nombre_alumno ?></li>
				</ul>

				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">Fecha de presentación:</li>
					<li class="list-group-item list-group-item-default"><?php echo $fecha ?></li>
				</ul>
				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">Resultado:</li>
					<li class="list-group-item list-group-item-<?php echo $color ?>"><?php echo $mensaje ?></li>
				</ul>
				<?php
				if($aprobado == 0 || $aprobado == 2){
					?>
					<ul class="list-group">
						<li class="list-group-item list-group-item-info active">Observaciones:</li>
						<li class="list-group-item list-group-item-<?php echo $color ?>"><?php echo $mensaje_resultado ?></li>
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