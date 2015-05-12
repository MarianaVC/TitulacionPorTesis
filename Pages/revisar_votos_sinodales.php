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
						<h2>Conteo de votos de aprobación de sinodales.</h2>
					</div>
				</div>
			</div>
			<div class="col-md-offset-0 col-md-10">
				Aquí puedes consultar los sinodales que han votado en aprobación de la tesis.<br>
				<?php
				//$id_alumno = $_SESSION['id_alumno'];
				$id_alumno = 0;
				$nombre_alumno = "Juan Pérez";
				//hacemos una consulta en la BD para determinar los datos de los sinodales asignados
				//a la tesis del alumno
				$titulo = "Mi tesis";
				$sinodales = array(0 => "sinodal 0",1 => "sinodal 1",2 => "sinodal 2",3 => "sinodal 3",4 => "sinodal 4");
				$apobaciones = array(0=>true,1=>false,2=>true,3=>true,4=>false);
				$fechas_aprobacion = array(0=>date('Y-m-d'),1=>null,2=>date('Y-m-d'),3=>date('Y-m-d'),4=>null);
				?>
				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">Alumno:</li>
					<li class="list-group-item list-group-item-default"><?php echo $nombre_alumno ?></li>
				</ul>
				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">Título de Tesis:</li>
					<li class="list-group-item list-group-item-default"><?php echo $titulo ?></li>
				</ul>
				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">
						<span class="badge">Fecha de aprobación</span>
						Votos de sinodales:
					</li>
					<?php
					for($i=0;$i<5;$i++){
						$color;
						if($fechas_aprobacion[$i]){
							$color="success";
						}
						else{
							$color="danger";
						}
					?>
					<li class="list-group-item list-group-item-<?php echo $color ?>">
						<span class="badge"><?php echo $fechas_aprobacion[$i] ?></span>
						<?php echo $sinodales[$i] ?>
					</li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
		<div class="container">
			<?php require_once 'footer.php';?>
		</div>
	</div>
</body>
</html>