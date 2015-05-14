<?php
// Con esto vamos a empezar la sesión
session_set_cookie_params(0);
session_start();
require_once '../Clases/Conexion.php';
require_once '../Clases/Alumno.php';
require_once '../Clases/SRO.php';
$_SESSION['id_alumno']=0;
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
						<h2>Realiza tu Notificación de Terminación de Tesis.</h2>
					</div>
				</div>
			</div>
			<div class="col-md-offset-2 col-md-8">
				Explica por qué consideras que has concluido tu trabajo.
				<form class="form" method="post">
					<div class="panel-body">
						<label for="motivos" class="sr-only">Motivos</label>
						Motivos:
						<textarea type="textarea" id="motivos" name='motivos' class="form-control" placeholder="Explicación detallada" rows="10" required autofocus></textarea>
						<div id="e_titulo_de_tesis"></div><!--Aquí se muestran los mensajes de error para este input(ver validadorSRO.js)-->
						<div class="panel-footer text-center">
							<button id='boton_SRO' class="btn btn-primary " type="submit">Aceptar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
                // Con isset checamos que las variables _post esté definida.
		if( (isset($_POST['motivos'])) ){
			$idAlumno = $_SESSION['id_alumno'];
			$motivo = $_POST['motivos'];
			//$ntt = new NTT($idAlumno,$motivo,null,null,null);
			//$exito = $ntt -> creaNTT();
			$exito = true;
			if($exito){
				echo "<script type='text/javascript'> alert('Se realizó con éxito tu Notificación'); window.location.href='realizarNTT.php'; </script>";
			}
			else{
				echo "<script type='text/javascript'> alert('Hubo un error, inténtalo después'); window.location.href='realizarNTT.php'; </script>";
			}
		}
		?>
		<div class="container">
			<?php require_once 'footer.php';?>
		</div>
	</div>
</body>
</html>