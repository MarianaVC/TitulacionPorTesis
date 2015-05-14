<?php
session_start();
?>

<!DOCTYPE html>

<html>
<head>
<meta charset = "UTF-8">
<title>Asignacion de Sinodales</title>
<link href="assets/css/bootstrap.css" rel="stylesheet"/>
<script src="assets/js/jquery-2.0.3.min.js"></script>
<script src="assets/js/vistaSinodal.js" ></script>
<style>
.icon-success {color: #5CB85C;}
.centrado{margin-left: auto;margin-right: auto;}
</style>

</head>
<body>

<?php
//Solo para hacer prueba de sesion; 
$_SESSION['correo'] = "enrique@92espartan@hotmail.com";  
$_SESSION['nombre'] = "Jose";
?>

<?php 
//Ya esta cargado de la base de datos solo es validar no vacios
if(strcmp($_SESSION["correo"],"")==0)
    header('Location: ../index.php');
?>
<header>
 <div class ='container'>
 <?php require_once 'header.php'; ?>
 </div>
</header>

<div style = "margin: 3% 7% 7% 7%;">
<h2 class= "container-fluid" style = margin: 3%>Bienvenido <?php echo $_SESSION["nombre"]; ?></h2>

<ul class="nav nav-pills" style = "margin: 3% 10% 4% 10%;">
  <li role="presentation"><button type="button" class="btn btn-primary active" id = "alumnos">Alumnos</button></li>
  <li role="presentation"><button type="button" class="btn btn-link" id ="pendientes">Pendientes</button></li>
  <li role="presentation"><button type="summit" class="btn btn-link" id = "cerrarSesion">Cerrar Sesión</button></li>
  
</ul>

                              
 
<div id = "contenido" class="table-responsive">


</div>
</div>
<div class="container">
<?php require_once 'footer.php';?>
</div>
</body>

</html>