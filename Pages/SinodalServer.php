<?php
  $noCuenta = Array();
  $nombre = Array();
  $correo = Array();
  $telefono = Array();
  $fecha = Array();
  $hora = Array();
  $lugar = Array();

 $tipo = $_POST["tipo"];

 switch($tipo){

 	case "carga":
 	$tem = pendientes();
 	echo  "<span class='badge' id = 'span'>".$tem."</span>";
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
 	return 3;
 }
 
 function cargaPendiente(){
  global $nombre,$noCuenta;
  array_push($noCuenta,"3080343246","308299966","307035973");
  array_push($nombre,"Anuar Tapia Romero","Jose Enrique Vargas Benitez","Mariana Valdivia");
 }

 function mandaPendiente(){
  $tabla = "<table class='table table-hover' id = 'tabla'>";
  global $nombre,$noCuenta,$correo,$telefono;
 for($t=0;$t<count($nombre);$t++){
  $tabla.="<tr class = 'fila'> <td>".$noCuenta[$t]."</td>";
  $tabla.="<td>".$nombre[$t]."</td>";
  $tabla.="<td><input type='checkbox'> ¿ Revisado ?</td> </tr>";
  }
 
  $tabla.="</table>";

  $boton = "<button onclick='confirmar()' type='button' class='btn btn-primary centrado' data-toggle='button'>";
  $boton .=  "Confirmar </button>";

  return "<h2>Alumnos pendientes de revisión de tesis </h2> <br>".$tabla." ".$boton;
 }

 function cargarAlumnos(){
  global $nombre,$noCuenta,$correo,$telefono,$fecha,$lugar,$hora;
  array_push($noCuenta,"308299966","273864946","364892648");
  array_push($nombre,"Jose Juarez Cacho","Ignacio Goméz Chaverria","Juan Carlos Urbina Sanchez");
  array_push($correo,"Cachito@ciencias.unam.mx","Go@ciencias.unam.mx","Urban@ciencias.unam.mx");
  array_push($telefono,"55-43-23-43-67","22-13-45-34-31","55-12-30-01-47");
  array_push($fecha,"14/05/15 ","20/05/15","2/06/15");
  array_push($hora,"10:00 AM","16:00 PM","13:00 PM");
  array_push($lugar,"Sala de Examen Profesionales Facultad de Ciencias","Sala de Examen Profesionales Facultad de Ciencias","Sala de Examen Profesionales Facultad de Ciencias");
 }
 function mandaAlumnos(){
  $tabla = "<table class='table table-hover' id = 'tabla'>";
  global $nombre,$noCuenta,$correo,$telefono,$fecha,$lugar,$hora;
 for($t=0;$t<count($nombre);$t++){
  $tabla.="<tr class = 'fila'> <td>".$noCuenta[$t]."</td>";
  $tabla.="<td>".$nombre[$t]."</td>";
  $tabla.="<td>".$correo[$t]."</td>";
  $tabla.="<td>".$telefono[$t]."</td>"; 
  $tabla.="<td>".$fecha[$t]."</td>";
  $tabla.="<td>".$hora[$t]."</td>"; 
  $tabla.="<td>".$lugar[$t]."</td></tr>";
  }
  $tabla.="</table>";
  return "<h2>Fechas de examen de alumnos</h2> <br>".$tabla;
 }
  ?>                     