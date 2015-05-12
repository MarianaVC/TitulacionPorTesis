<?php
require_once "Conexion.php";
require_once "Alumno.php";
require_once "Notificacion.php";
//modela un Examen profesional
//esta clase permite facilitar la creación de un examen en la BD así como la generación
//automática de notificaciones de cambios a los usuarios correspondientes
class Examen extends Conexion{

	public $idAlumno;
	public $fecha;
	public $lugar;
	public $resultado;

	public function _construct($idAlumno, $fecha, $lugar, $resultado){
		$this -> idAlumno = $idAlumno;
		$this -> fecha = $fecha;
		$this -> lugar = $lugar;
		$this -> resultado = $resultado;
	}
	//getters y setters:
	public function getIdAlumno(){
		return $this -> idAlumno;
	}
	public function getFecha(){
		return $this -> fecha;
	}
	public function getLugar(){
		return $this -> lugar;
	}
	public function getResultado(){
		return $this -> resultado;
	}
	public function setIdAlumno($newIdAlumno){
		$this -> idAlumno = $newIdAlumno;
	}
	public function setFecha($newFecha){
		$this -> fecha = $newFecha;
	}
	public function setLugar($newLugar){
		$this -> lugar = $newLugar;
	}
	public function setResultado($newResultado){
		$this -> resultado = $newResultado;
	}
	//crea un examen en la base de datos y genera las notificaciones necesarias
	//recibe el identificador del usuario DT que lo está asignando
	public function creaExamen($idDT){
		$this -> conectar();
		$query = "INSERT INTO examen ('idAlumno','fecha','lugar','resultado') VALUES"."('".$this->getIdAlumno()."','".$this->getFecha()."','".$this->getLugar()."','".$this->getResultado()."');";
		$this -> consultar($query);
		$this -> desconectar();
		return $this -> generaNotificaciones($idDT);
	}
	//crea notificaciones para los usuarios correspondientes
	//recibe el identificador del usuario DT que lo está asignando
	private function generaNotificaciones($idDT){

		//avisamos al alumno:
		$id_destinatario = $this->getIdAlumno();
		$tipo_destinatario = "Alumno";
		$id_remitente = $idDT;
		$tipo_remitente = "DT";
		$estado = "sin revisar";
		$tipo = "agendación de examen";
		$mensaje = "Presentarás tu Examen Profesional el día ".($this->getFecha())." en ".($this->getLugar());
		$notificacion = new Notificacion($id_destinatario,$tipo_destinatario,$id_remitente,$tipo_remitente,$estado,$tipo,$mensaje);
		$notificacion -> creaNotificacion();

		//obtenemos todos los usuarios de STC:
		$this -> conectar();
		$query = "SELECT id FROM SECRETARIA_TECNICA;";
		$result = $this -> consulta($query);
		$this -> desconectar();
		//para cada uno generamos una notificación
		while ($row = mysqli_fetch_assoc($result)) {
			$id_destinatario = $row['id'];
			$tipo_destinatario = "STC";
			$id_remitente = $idDT;
			$tipo_remitente = "DT";
			$estado = "sin revisar";
			$tipo = "agendación de examen";
			$mensaje = $nombreAlumno." presentará su Examen Profesional el día ".($this->getFecha())." en ".($this->getLugar());
			$notificacion = new Notificacion($id_destinatario,$tipo_destinatario,$id_remitente,$tipo_remitente,$estado,$tipo,$mensaje);
			$notificacion -> creaNotificacion();
		}

		//obtenemos los sinodales involucrados:
		$this -> conectar();
		$query = "SELECT ...";//join extraño
		$result = $this -> consulta($query);
		$this -> desconectar();
		//para cada uno generamos una notificación
		while ($row = mysqli_fetch_assoc($result)) {
			$id_destinatario = $row['id'];
			$tipo_destinatario = "Sinodal";
			$id_remitente = $idDT;
			$tipo_remitente = "DT";
			$estado = "sin revisar";
			$tipo = "agendación de examen";
			$mensaje = $nombreAlumno." presentará su Examen Profesional el día ".($this->getFecha())." en ".($this->getLugar());
			$notificacion = new Notificacion($id_destinatario,$tipo_destinatario,$id_remitente,$tipo_remitente,$estado,$tipo,$mensaje);
			$notificacion -> creaNotificacion();
		}
		return true;
	}
}
?>