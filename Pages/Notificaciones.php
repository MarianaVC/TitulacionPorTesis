<?php
require_once '../Clases/Mensaje.php';
session_start();
?>

<!DOCTYPE html>

<html>
<head>
<meta charset = "UTF-8">
<title>Asignacion de Sinodales</title>
<link href="assets/css/bootstrap.css" rel="stylesheet"/>
<script src="assets/js/jquery-2.0.3.min.js"></script>
<script src="assets/js/notificacion.js" ></script>
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

<div class = "container" style = "margin-top: 5%; padding-bottom:10%;">
<h2 style = "margin-top: 1%; padding-bottom:2%;">Centro de notificaciones</h2>

<div class = "row">
  <div class="col-md-2">
  <p class = "container"> Notificaciones pendientes<span class='badge' id = 'span'>4</span></p>
  <table class='table table-hover table-bordered' id = 'tablaPendiente'>
  <?php 
  $notificaciones = new Mensaje();
  $remitente = $notificaciones -> getRemitente();
  $tabla = "";
   for($t=0;$t<count($remitente)-1;$t++){
  $tabla.="<tr class = 'pendiente' data-id = '".$t."'> <td>".$remitente[$t]."</td></tr>";
  }
  echo $tabla;

  ?>
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
  <p class = "container"> Notificaciones leidas</p>
  
  <table class='table table-hover table-bordered' id = 'tablaLeido'>
  <?php
  echo "<tr class = 'leido'> <td>".$remitente[2]."</td></tr>";
   ?>
  </table>
  </div>
  </div>
  </div>



<div class="container">
<?php require_once 'footer.php';?>
</div>
</body>

</html>