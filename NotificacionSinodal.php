<?php  
$json = $_POST['json'];
//$numero_cuenta = $_SESSION["numero_cuenta"];
$tipo = "Sinodal";
$estado = "STC";
$fecha =  getdate();
echo $fecha["year"].'/'.$fecha["mday"].'/'.$fecha["month"];
//Tenemos los numeros de cuenta que solicito
//echo $json;

//Guardarlo en la base de datos con una noticacion

?>