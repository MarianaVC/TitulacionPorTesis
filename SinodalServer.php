<?php
  $noCuenta = Array();
  $nombre = Array();
  $correo = Array();
  $telefono = Array();

 $tipo = $_POST["tipo"];

 switch($tipo){

 	case "carga":
 	$tem = pendientes();
 	echo  "<span class='badge'>".$tem."</span>";
 	break;
 	case "alumno":
 	cargarAlumnos();
 	echo mandaAlumnos();
 	break;
 	case "pendiente":
 	cargaPendiente();
 	echo mandaPendiente();
 	break;

 }


 function pendientes(){
 	return 5;
 }
 
 function cargaPendiente(){
 global $nombre,$noCuenta;
  array_push($noCuenta,("3080343246"));
  array_push($nombre,("Anuar Tapia Romero"));
 }

 function mandaPendiente(){
  $tabla = "<table class='table table-hover' id = 'tabla'>";
  global $nombre,$noCuenta,$correo,$telefono;
 for($t=0;$t<count($nombre)+5;$t++){
  $tabla.="<tr class = 'fila'> <td>".$noCuenta[0].$t."</td>";
  $tabla.="<td>".$nombre[0]."</td>";
  $tabla.="<td><input type='checkbox'> ¿ Revisado ?</td> </tr>";
  }
 
  $tabla.="</table>";

  $boton = "<button onclick='confirmar()' type='button' class='btn btn-primary centrado' data-toggle='button'>";
  $boton .=  "Enviar </button>";

  return "<h2>Alumnos pendientes de revición de tesis </h2> <br>".$tabla." ".$boton;
 }

 function cargarAlumnos(){
  global $nombre,$noCuenta,$correo,$telefono;
  array_push($noCuenta,("308299966"));
  array_push($nombre,("Jose enrique Vargas Benitez"));
  array_push($correo,("enrique92espartan@hotmail.com"));
  array_push($telefono,("55-43-23-43-67"));
  
 }
 function mandaAlumnos(){
  $tabla = "<table class='table table-hover' id = 'tabla'>";
  global $nombre,$noCuenta,$correo,$telefono;
 for($t=0;$t<count($nombre)+5;$t++){
  $tabla.="<tr class = 'fila'> <td>".$noCuenta[0].$t."</td>";
  $tabla.="<td>".$nombre[0]."</td>";
  $tabla.="<td>".$correo[0]."</td>";
  $tabla.="<td>".$telefono[0]."</td> </tr>";
  }
 
  $tabla.="</table>";
  return $tabla;
 }
  ?>                     