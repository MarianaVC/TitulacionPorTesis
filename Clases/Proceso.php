<?php
/**
 * User: Mariana
 * Date: 21/04/2015
 * Clase para los procesos de Titulación.
 */
require_once 'Conexion.php';


class Proceso extends Conexion{
//  Atributos para la clase Proceso.
	private $_proceso;
	private $idProceso;
	private $fechaInicio;
	private $fechaFin;
	private $idAlumno;
	private $idExamen;
	private $idSecretaria;
	private $idEstado;
//  Método constructor para la clase proceso. 
//	Como los valores de los atributos, idProceso (Este se asigna al insertar en la base de datos, es un autoincremental),fechaFin, idExamen, idSecretaria se van actualizando conforme el proceso de titulación avanza
// 	no es necesario inicializar un objeto con valores predeterminados, en todo caso, éste sería null. El atributo fecha si se inicializa, para eso 
//	usamos la función date, que nos da la fecha de hoy.  	
	function _construct($idAlumno, $idEstado){

		$this-> idAlumno = $idAlumno;
		$this -> idEstado = $idEstado;
		$this -> fechaInicio = date("Y-m-d");
	}
// Métodos get y set para los atributos de la clase:
	public function setIdProceso(){
	
		$this -> idProceso;
	}

	public function setfechaFin(){
	
		$this -> fechaFin;
	}

	public function setIdAlumno(){
	
		$this -> idAlumno;
	}

	public function setIdExamen(){
	
		$this -> idExamen;
	}

	public function setIdSecretaria(){
	
		$this -> idSecretaria;
	}

	public function setIdEstado(){

		$this -> idEstado;
	}

	public function getIdProceso(){
	
		return $this -> idProceso;		
	}

	public function getFechaInicio(){
	
		return $this -> fechaInicio; 	
	}

	public function getFechaFin(){
	
		return $this -> fechaFin;
	}

	public function getIdAlumno(){
	
		return $this -> idAlumno;
	}

	public function getIdExamen(){
	
		return $this -> idExamen;
	}

	public function getIdSecretaria(){
		
		return $this -> idSecretaria;
	
	}

	public function getIdEstado(){
	
		return $this -> idEstado;
	}
//	Busca un proceso con el número de cuenta del alumno. 
	public function getProcesoByNcta($numeroCuenta){
		
		$this -> conectar();				  

		$query = "SELECT 	p.id_proceso, a.id_alumno, a.numerocuenta ,a.nombre, a.apaterno, a.amaterno, a.correo, p.fecha_inicio, p.id_estado
				  FROM 		alumno a, proceso_titulacion p
				  WHERE 	a.id_alumno= p.id_alumno
				  AND 		a.numerocuenta = '$numerocuenta'";

		$this -> consultar($query);
//		Si hubo resultados:
		if($this -> numeroFilas() > 0){
//		llenamos los datos en un array
			while ($row = $this -> fetchArray()) {

				$this -> _proceso[] = $row;
			}
			return $this -> _proceso;
// 		No se encontró un proceso con ese número de cuenta:
		}else echo "No hay ningún proceso de titulación registrado para este número de cuenta";

		$this -> desconectar();				  

	}
//	Inserta un proceso de titulación en la base de datos
	public function insertaProceso(){
		$this -> conectar();
		
		$query = "INSERT INTO `proceso_titulacion` (`fecha_inicio`,`id_alumno`,`id_estado`) VALUES 
					('" . $this->getFechaInicio() . "', '" . $this->getIdAlumno() . "', '" . $this->getIdEstado() . "')";
		
		$this -> consultar($query);	
		
		$this ->desconectar();		
	}


















}
?>