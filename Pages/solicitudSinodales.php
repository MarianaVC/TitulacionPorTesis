<?php
require_once '../Clases/Sinodal.php';
session_start();
?>

<!DOCTYPE html>

<html>
<head>
<meta charset = "UTF-8">
<title>Asignacion de Sinodales</title>
<link href="assets/css/bootstrap.css" rel="stylesheet"/>
<script src="assets/js/jquery-2.0.3.min.js"></script>
<script src="assets/js/sinodales.js" ></script>

<style>
.icon-success {color: #5CB85C;}
.centrado{margin-left: auto;margin-right: auto;}
</style>

</head>
<body>

<?php
//Solo para hacer prueba de sesion; 
$numero_cuenta = "308299966";    
$_SESSION["numero_cuenta"] = $numero_cuenta;
$_SESSION['nombre'] = "Jose";
$_SESSION['apaterno'] = "Vargas";
$_SESSION['amaterno'] = "Benitez";

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
<div class ='container'>
                <?php require_once 'navbarAlumno.php'; ?>
            </div>            
</header>

<div style = "margin: 1% 7% 2% 7%;">
<h2>Selecciona tus sinodales<small> (Maximo 5)</small></h2>

<?php
  $noCuenta = Array();
  $nombre = Array();
  $sinodal = new Sinodal("Jose","308299966");
  $noCuenta = $sinodal -> getNumeroCuenta();
  $nombre = $sinodal -> getNombres();
  ?>                                                   
 
<div style = "margin : 3%;padding : 0% 15% 0% 0%;">
<table class="table table-hover table table-bordered" id = "tabla">
 <?php
 //Iniciamos el bucle de las filas
 for($t=0;$t<count($noCuenta);$t++){
  echo "<tr class = 'fila'> <td>".$noCuenta[$t]."</td>";
  echo "<td>".$nombre[$t]."</td>";
  echo "<td></td></tr>";
  }
 ?>
</table>
</div>

<button id= "confirmar" type="button" class="btn btn-primary centrado" data-toggle="button" style = "margin:5%">
  Enviar
</button>
<div class="container">
<?php require_once 'footer.php';?>
</div>

</body>

</html>