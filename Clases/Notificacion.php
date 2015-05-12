<?php
require_once 'Conexion.php';
/**
* esta clase permite el envio de notificaciones entre los usuarios
*/
class Notificacion extends Conexion{

	public $id_destinatario;
	public $tipo_destinatario;
	public $id_remitente;
	public $tipo_remitente;
	public $estado;
	public $tipo;
	public $mensaje;
	public $fecha_envio;

	public function _construct($id_destinatario,$tipo_destinatario,$id_remitente,$tipo_remitente,$estado,$tipo,$mensaje){
		$this -> id_destinatario = $id_destinatario;
		$this -> tipo_destinatario = $tipo_destinatario;
		$this -> id_remitente = $id_remitente;
		$this -> tipo_remitente = $tipo_remitente;
		$this -> estado = $estado;
		$this -> tipo = $tipo;
		$this -> mensaje = $mensaje;
		$this -> fecha_envio = date("c");
	}

	//getters y setters
	public function getIdDestinatario(){
		return $this -> id_destinatario;
	}
	public function getTipoDestinatario(){
		return $this -> tipo_destinatario;
	}
	public function getIdRemitente(){
		return $this -> id_remitente;
	}
	public function getTipoRemitente(){
		return $this -> tipo_remitente;
	}
	public function getEstado(){
		return $this -> estado;
	}
	public function getTipo(){
		return $this -> tipo;
	}
	public function getMensaje(){
		return $this -> mensaje;
	}
	public function getFechaEnvio(){
		return $this -> fecha_envio;
	}
	public function setIdDestinatario($newIdDestinatario){
		$this -> id_destinatario = $newIdDestinatario;
	}
	public function setTipoDestinatario($newTipoDestinatario){
		$this -> tipo_destinatario = $newTipoDestinatario;
	}
	public function setIdRemitente($newIdRemitente){
		$this -> id_remitente = $newIdRemitente;
	}
	public function setTipoRemitente($newTipoRemitente){
		$this -> tipo_remitente = $newTipoRemitente;
	}
	public function setEstado($newEstado){
		$this -> estado = $newEstado;
	}
	public function setTipo($newTipo){
		$this -> tipo = $newTipo;
	}
	public function setMensaje($newMensaje){
		$this -> mensaje = $newMensaje;
	}
	public function setFechaEnvio($newFechaEnvio){
		$this -> fecha_envio = $newFechaEnvio;
	}

	//inserta esta notificación en la base de datos
	public function creaNotificacion(){
		$this -> conectar();
		$query = "INSERT INTO 'notificacion' ('id_destinatario','tipo_destinatario','id_remitente','tipo_remitente','estado"."','tipo','mensaje','fecha_envio') VALUES ('".$this->getIdDestinatario()."','".$this->getTipoDestinatario."','".$this->getIdRemitente()."','".$this->getTipoRemitente()."','".$this->getEstado()."','".$this->getTipo()."','".$this->getMensaje()."','".$this.getFechaEnvio()."');";
		$this -> consultar($query);
		$this -> desconectar();
	}
}
?>