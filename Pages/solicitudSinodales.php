<?php
session_start();
?>

<!DOCTYPE html>

<html>
<head>
<meta charset = "UTF-8">
<title>Asignacion de Sinodales</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="Pages/js/jquery-1.11.2.js"></script>
<script src="Pages/js/jquery-2.1.4.min.js"></script>
<script src="Pages/js/sinodales.js" ></script>
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

?>

<?php 
//Ya esta cargado de la base de datos solo es validar no vacios
if(strcmp($_SESSION["numero_cuenta"],"")==0)
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
<h2 class= "container-fluid">Selecciona tus sinodales</h2>
<h4 class= "container-fluid" style = "margin: 0% 3% 3% 3%">(Maximo 5)</h4>

<?php
  $filas = 6; // tamaño de la tabla sinodales
  $noCuenta = Array();
  $nombre = Array();
  array_push($noCuenta,("308299966"));
  array_push($nombre,("Jose enrique Vargas Benitez"));
  ?>                                                   
 
<div style = "margin : 3%;padding : 0% 15% 0% 0%;">
<table class="table table-hover table table-bordered" id = "tabla">
 <?php
 //Iniciamos el bucle de las filas
 for($t=0;$t<$filas;$t++){
  echo "<tr class = 'fila'> <td>".$noCuenta[0].$t."</td>";
  echo "<td>".$nombre[0]."</td>";
  echo "<td></td></tr>";
  }
 ?>
</table>
</div>

<button id= "confirmar" type="button" class="btn btn-primary centrado" data-toggle="button" style = "margin:5%">
  Enviar
</button>
<div class="container">
                    <?php require_once 'footer2.php';?>
                </div>

</body>

</html>