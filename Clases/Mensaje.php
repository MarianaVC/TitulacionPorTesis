<?php

class Mensaje{
		//	Atributos para la clase alumno
	public $msj;
	public $remitente;
	public $fecha;
	public $leido;

	function _construct(){}
			
	function getRemitente(){
     $remitente = Array();
     array_push($remitente,"Departamento de titulos","Secretaria tecnica academica","Sinodal","Secretaria tecnica academica","Secretaria tecnica academica");
     return $remitente;
   }

   function getFecha(){
   	 $fecha = Array();
     array_push($fecha,"10/05/15","1/05/15","20/04/15","5/04/15","1/4/15");
     return $fecha;
   }
    function getMsj(){
     $msj = Array();
     array_push($msj,"Bunas tardes de le informa que se le fue asignado el salon de examenes profesionales de la facultad de ciencias el dia 15/07/2015");
     array_push($msj,"Todos los Sinodales han aprobado tu tesis Felicidades a hora  a la espera de el Departamentos de titulos quien asignara el examen");
     array_push($msj,"Jorge Urrutia (sinodal) ha aprobado tu tesis");
     array_push($msj,"Fue aprobado tu registro de tesis Por favor selecciona tus sinodales");
     array_push($msj,"Fue aprobado tu registro al sistema");
     return $msj;
   }
	
}
	

?>