<?php
session_set_cookie_params(0);
session_start();
$_SESSION['id_alumno']=0;//post porque esta página la puede ver el alumno o la STC
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
						<h2>Estado de aprobación de Registro de Opción.</h2>
					</div>
				</div>
			</div>
			<div class="col-md-offset-0 col-md-10">
				Aquí puedes verificar si tu Solicitud de Registro de Opción de Titulación ha sido aprobada.<br>
				<?php
				$id_alumno = $_SESSION['id_alumno'];
				$nombre_alumno = "Juan Pérez";
				//hacemos una consulta en la BD para determinar los datos de la SRO del alumno
				//la sro tiene la forma (id_alumno, objetivo, resumen, documento, fecha_revision, mesaje_desaprobacion, aprobado)
				$titulo = "Mi tesis";
				$aprobada = true;
				$fecha_revision = date('Y-m-d');
				$objetivo = "User contributions in the form of posts, comments, and votes are essential to the success of online communities.";
				//$fecha_revision = null;
				//mensaje que dejó la STC como observación del por qué no se aprobó la NTT
				$mensaje_desaprobacion="Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido. Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido. Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido. Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido. Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido. Te faltó especificar los motivos por los que consideras que tu trabajo ha conluido.";
				$resumen = "User contributions in the form of posts, comments, and votes are essential to the success of online communities. However, allowing user participation also invites undesirable behavior such as trolling. In this paper, we characterize antisocial behavior in three large online discussion communities by analyzing users who were banned from these communities. We find that such users tend to concentrate their efforts in a small number of threads, are more likely to post irrelevantly, and are more successful at garnering responses from other users. Studying the evolution of these users from the moment they join a community up to when they get banned, we find that not only do they write worse than other users over time, but they also become increasingly less tolerated by the community. Further, we discover that antisocial behavior is exacerbated when community feedback is overly harsh. Our analysis also reveals distinct groups of users with different levels of antisocial behavior that can change over time. We use these insights to identify antisocial users early on, a task of high practical importance to community maintainers.";
				$mensaje;
				$color;
				if($fecha_revision == null){
					$mensaje = "Sin revisión";
					$color = "default";
				}
				else{
					if($aprobada){
						$mensaje = "Aprobada el día ".$fecha_revision;
						$color = "success";
					}
					else{
						$mensaje = "No aprobada el día ".$fecha_revision;
						$color = "danger";
					}
				}

				?>
				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">Título de tesis y autor:</li>
					<li class="list-group-item list-group-item-default"><?php echo "\"".$titulo."\" por ".$nombre_alumno; ?></li>
				</ul>
				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">Objetivo:</li>
					<li class="list-group-item list-group-item-default"><?php echo $objetivo ?></li>
				</ul>
				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">Resumen:</li>
					<li class="list-group-item list-group-item-default"><?php echo $resumen ?></li>
				</ul>

				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">Estado de aprobación:</li>
					<li class="list-group-item list-group-item-<?php echo $color ?>"><?php echo $mensaje ?></li>
				</ul>
			<?php
			if(!$aprobada){
				?>
				<ul class="list-group">
					<li class="list-group-item list-group-item-info active">Motivos de la desaprobación:</li>
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