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
</head>
<body>

<?php
//Solo para hacer prueba de sesion; 
$numero_cuenta = "308299966";    
$_SESSION["numero_cuenta"] = $numero_cuenta;

?>

<?php 
//Ya esta cargado de la base de datos solo es validar no vacios
if(strcmp($_SESSION["numero_cuenta"],"")==0)
    header('Location: index.php');
?>
<header>
 <div class ='container'>
                <?php require_once 'header.php'; ?>
            </div>
</header>

<div class = "container" style = "margin-top: 5%; padding-bottom:17%;">
<h2 style = "margin-top: 1%; padding-bottom:2%;">Estas son las notificaciones pendientes</h2>

<div class = "row">
  <div class="col-md-2">
  <table class='table table-hover table-bordered' id = 'tabla'>
  <tr>
  <td>
  Secretaria
  </td>
  </tr>
  <tr>
  <td>
  Alumno
  </td>
  </tr>
  </table>
  </div>
  <div class="col-md-6">
  <div class= "container-fluid">
  <p class = "text-left"><strong><span id="remitente">Secretaria tecnica</span></strong></p>
  <p class = "text-right"><span id="fecha" class = "label label-default">19/04/2015</span></p>
  

  <p id = "mensaje" class ="text-center">Todavia no estas registrado</p>

  </div>
  </div>
  <div class="col-md-2">
  <table class='table table-hover table-bordered' id = 'tabla'>
  <tr>
  <td>
  Secretaria
  </td>
  </tr>
  <tr>
  <td>
  Alumno
  </td>
  </tr>
  </table>
  </div>
  </div>
  </div>



<div class="container">
<?php require_once 'footer.php';?>
</div>
</body>

</html>