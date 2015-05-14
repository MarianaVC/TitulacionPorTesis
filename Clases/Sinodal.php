<?php

class Sinodal{
		//	Atributos para la clase alumno
	public $nombre;
	public $idSinodal;
	
	function _construct($nombre, $idSinodal){
			$this-> nombre 			= $nombre;
			$this-> idSinodal 		= $idSinodal;
	}
	//	getters y setters:
	public function setIdSinodal($idSinodal){
		$this -> idSinodal = $idSinodal;
	}
	public function setNombre($nombre){
		$this -> nombre= $nombre;
	}
	
	public function getIdSinodal(){
		return $this -> idSinodal;
		}
	
	public function getNombre(){
		return $this -> nombre;
	}
	function getNumeroCuenta(){
     $noCuenta = Array();
     array_push($noCuenta,"308299966","408294681","423453126","298712323","122344876","167304372");
     return $noCuenta;
   }

   function getNombres(){
     $nombres = Array();
     array_push($nombres,("German Zapata"));
     array_push($nombres,("Jorge Urrutia"));
     array_push($nombres,("Elisa Viso Gurovich"));
     array_push($nombres,("Hanna Oktawa"));
     array_push($nombres,("Gabriela Martinez"));
     array_push($nombres,("Gerardo Avíles Rosas"));
     return $nombres;
   }
	
}
	

	

?>