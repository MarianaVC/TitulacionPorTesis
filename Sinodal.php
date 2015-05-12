<?php
session_start();
?>

<!DOCTYPE html>

<html>
<head>
<meta charset = "UTF-8">
<title>Asignacion de Sinodales</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="Pages/js/jquery-2.1.4.min.js"></script>
<script src="Pages/js/vistaSinodal.js" ></script>
<style>
.icon-success {color: #5CB85C;}
.centrado{margin-left: auto;margin-right: auto;}
</style>

</head>
<body>

<?php
//Solo para hacer prueba de sesion; 
$_SESSION['correo'] = "enrique@..";  
$_SESSION['nombre'] = "Jose";
?>

<?php 
//Ya esta cargado de la base de datos solo es validar no vacios
if(strcmp($_SESSION["correo"],"")==0)
    header('Location: index.php');
?>
<header>
 <div class ='container'>
                <?php require_once 'header2.php'; ?>
            </div>
<div class ='container'>
                <?php require_once 'header3.php'; ?>
            </div>            
</header>

<div style = "margin: 3% 7% 7% 7%;">
<h2 class= "container-fluid" style = margin: 3%>Bienvenido <?php echo $_SESSION["nombre"]; ?></h2>

<ul class="nav nav-pills" style = "margin: 3% 10% 4% 10%;">
  <li role="presentation"><button type="button" class="btn btn-primary active" id = "alumnos">Alumnos</button></li>
  <li role="presentation"><button type="button" class="btn btn-link" id ="pendientes">Pendientes</button></li>
  <li role="presentation"><button type="summit" class="btn btn-link" id = "cerrarSesion">Cerrar Sesión</button></li>
  
</ul>

                              
 
<div id = "contenido">


</div>
<div class="container">
                    <?php require_once 'footer2.php';?>
                </div>
</body>

</html>