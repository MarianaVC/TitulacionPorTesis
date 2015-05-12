<?php
require_once "Conexion.php";
require_once "Alumno.php";
require_once "Notificacion.php";
//modela una Solicitud de Registro de Opción
//esta clase permite facilitar la creación y modifcación de SRO's así como la generación
//automática de notificaciones de cambios a los usuarios correspondientes
class SRO extends Conexion{

	public $idAlumno;
	public $titulo;
	public $objetivo;
	public $resumen;
	public $documento;

	function _construct($idAlumno, $titulo, $objetivo, $resumen, $documento){
		$this -> idAlumno = $idAlumno;
		$this -> titulo = $titulo;
		$this -> objetivo = $objetivo;
		$this -> resumen = $resumen;
		$this -> documento = $documento;
	}
	//getters y setters:
	public function getIdAlumno(){
		return $this -> idAlumno;
	}
	public function getTitulo(){
		return $this -> titulo;
	}
	public function getObjetivo(){
		return $this -> objetivo;
	}
	public function getResumen(){
		return $this -> resumen;
	}
	public function getDocumento(){
		return $this -> documento;
	}
	public function setIdAlumno($newIdAlumno){
		$this -> idAlumno = $newIdAlumno;
	}
	public function setTitulo($newTitulo){
		$this -> titulo = $newTitulo;
	}
	public function setObjetivo($newObjetivo){
		$this -> objetivo = $newObjetivo;
	}
	public function setResumen($newResumen){
		$this -> resumen = $newResumen;
	}
	public function setDocumento($newDocumento){
		$this -> $newDocumento;
	}

	//crea una SRO en la base de datos y genera las notificaciones necesarias
	public function creaSRO(){
		$this -> conectar();
		$query = "INSERT INTO sro ('idAlumno','titulo','objetivo','resumen','documento') VALUES"."('".$this->getIdAlumno()."','".$this->getTitulo()."','".$this->getObjetivo()."','".$this->getResumen()."','".$this->getDocumento()."');";
		$this -> consultar($query);
		$this -> desconectar();
		return $this -> generaNotificaciones();
	}
	//modifica una SRO en la base de datos y genera las notificaciones necesarias
	public function modificaSRO(){
		$this -> conectar();
		$query = "UPDATE sro SET titulo='".$this->getTitulo()."' objetivo='".$this->getObjetivo()."' resumen='".$this->getResumen()."' documento='".$this->getDocumento()."' WHERE idAlumno='".$this->getIdAlumno()."';";
		$this -> consultar($query);
		$this -> desconectar();
		return $this -> generaNotificaciones();
	}
	//crea notificaciones para los usuarios correspondientes
	private function generaNotificaciones(){
		//obtenemos el nombre del alumno
		$al = new Alumno();
		$alumno = $al -> getAlumno($this->getIdAlumno());
		$nombreAlumno = ($alumno->getNombre())." ".($alumno->getApaterno())." ".($alumno.getAmaterno());
		//obtenemos todos los usuarios de STC:
		$this -> conectar();
		$query = "SELECT id FROM SECRETARIA_TECNICA;";
		$result = $this -> consulta($query);
		$this -> desconectar();
		//para cada uno generamos una notificación
		while ($row = mysqli_fetch_assoc($result)) {
			$id_destinatario = $row['id'];
			$tipo_destinatario = "STC";
			$id_remitente = $this -> getIdAlumno();
			$tipo_remitente = "ALUMNO";
			$estado = "sin revisar";
			$tipo = "actualización SRO";
			$mensaje = $nombreAlumno." ha actualizado su Solicitud de Registro de Opción";
			$notificacion = new Notificacion($id_destinatario,$tipo_destinatario,$id_remitente,$tipo_remitente,$estado,$tipo,$mensaje);
			$notificacion -> creaNotificacion();
		}
		return true;
	}
}
?>