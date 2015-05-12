<?php
/**
* User: Mariana
* Date: 17/04/2015
* Clase para los alumnos
*/
require_once 'Conexion.php';
class Alumno extends Conexion{
		//	Atributos para la clase alumno
	public $_alumno;
	public $idAlumno;
	public $nombre;
	public $apaterno;
	public $amaterno;
	public $numeroCuenta;
	public $correo;
	public $pass;
	public $tipo_usuario;
	//	Método constructor
	//  El atributo idAlumno se asigna en la base de datos, así que no es necesario asignarlo en el método constructor.
	function _construct($nombre, $apaterno, $amaterno,$numeroCuenta,$correo,$pass){
			$this-> nombre 			= $nombre;
			$this-> apaterno 		= $apaterno;
			$this->	amaterno 		= $amaterno;
			$this->	numeroCuenta 	= $numeroCuenta;
			$this-> correo 			= $correo;
			$this->	pass 			= $pass;
	}
	//	getters y setters:
	public function setIdAlumno($idAlumno){
		$this -> idAlumno = $idAlumno;
	}
	public function setNombre($nombre){
		$this -> nombre= $nombre;
	}
	
	public function setApaterno($apaterno){
		$this -> apaterno= $apaterno;
	}
	
	public function setAmaterno($amaterno){
		$this -> amaterno= $amaterno;
	}
	
	public function setNumeroCuenta($numeroCuenta){
		$this -> numeroCuenta= $numeroCuenta;
	}
	public function setPass($pass){
		$this -> pass= $pass;
	}
	
	public function setCorreo($correo){
		$this -> correo= $correo;
	}

	public function setTipoUsuario($tipo_usuario){
		$this -> tipo_usuario = $tipo_usuario;
	}

	public function getIdAlumno(){
		return $this -> idAlumno;
		}
	
	public function getNombre(){
		return $this -> nombre;
	}
	
	public function getApaterno(){
		return $this -> apaterno;
	}
	public function getAmaterno(){
		return $this -> amaterno;
	}
	
		public function getNumerocuenta	(){
		return $this -> numeroCuenta;
	}
	
	public function getCorreo(){
		return $this -> correo;
	}
	public function getPass(){
		return $this -> pass;
	}

	public function getTipoUsuario(){
		return $this -> tipo_usuario;
	}
// Método para consultar un alumno de la base de datos usando el id del alumno.
	public function getAlumno($idAlumno){
		$this -> conectar();
			$query = "SELECT	id_alumno,numerocuenta, nombre, apaterno, amaterno, correo, direccion
						FROM		alumno
						WHERE		id_alumno = '$idAlumno'";
			$this ->consultar($query);
				//		Si hubo resultados:
		if($this -> numeroFilas() > 0){
			//llenamos los datos en un array
			while ($row = $this -> fetchArray()) {
				
				$this -> _alumno[] = $row;
			}
			return $this -> _alumno;
// No se encontró un alumno con esos datos:
		}else echo "Alumno no encontrado en la base de datos";
		$this -> desconectar();
		}
// 	Método para consultar un alumno de la base de datos usando el número de cuenta.		
	public function getAlumnoByNcta($numeroCuenta){
		$this -> conectar();
			$query = "SELECT	id_alumno,numerocuenta, nombre, apaterno, amaterno, correo, direccion
						FROM		alumno
						WHERE		numerocuenta = '$numeroCuenta'";
			$this ->consultar($query);
				//		Si hubo resultados:
		if($this -> numeroFilas() > 0){
			//llenamos los datos en un array
			while ($row = $this -> fetchArray()) {
				
				$this -> _alumno[] = $row;
			}
			return $this -> _alumno;
// No se encontró un alumno con esos datos:
		}else echo "Alumno no encontrado en la base de datos";
		$this -> desconectar();
	}
// 	Método para insertar un alumno a la base de datos:
	public function insertaAlumno(){
		$this -> conectar();
		$query = "INSERTO INTO `alumno` (`numerocuenta`,`nombre`,`apaterno`,`amaterno`,`correo`,`direccion`,`contrasenia`,`tipo_usuario`) VALUES
					('" . $this->getNumerocuenta() . "', '" . $this->getNombre() . "', '" . $this->getApaterno() . "', '" . $this->getAmaterno() . "', '" . $this->getCorreo() . "','" . $this->getDireccion() . "', '" . $this->getApaterno() . "', '" . $this->getPass() ."', '" . $this->getTipoUsuario() ."');";
				$this ->consultar($query);
			$this -> desconectar();
	}
//	Método para decidir si un alumno puede iniciar sesión en la aplicación, Un alumno sólo puede iniciar sesión si se ha registrado anteriormente. Es decir si ya tiene un password.
//	Regresa "SI" si lo encontró "NO" en otro caso.
	public function puedeIniciarSesion($numeroCuenta,$pass){
		$puede = "NO";
		$this-> conectar();
		$query = "SELECT numerocuenta, contrasenia
				FROM alumno
				WHERE numerocuenta = '$numeroCuenta'
					AND 	contrasenia = '$pass'";
//		echo $query;
		$this -> consulta($query);
		
		if ($this -> numeroFilas() >= 1) {
			
			while($row = $this-> fetchAssoc()) {
				$ncta = $row['numerocuenta'];
				$password = $row['contrasenia'];
			}
//			Si los dos datos son iguales quiere decir que puede iniciar sesión. 
			if (($password == $pass) && ($ncta == $numeroCuenta)){
				
				$puede = "SI";
			}
		}
			$this -> desconectar();
			return $puede;
	}
//  Método para decidir si un alumno ya está registrado en la aplicación.
	public function yaRegistrado($id_alumno,$numeroCuenta, $correo){
		$registrado = "NO";
		$this -> conectar();
		$query = "SELECT id_alumno, numerocuenta, correo, tipo_usuario
				FROM alumno
				WHERE numerocuenta='$numeroCuenta'
				AND id_alumno = $id_alumno
				AND correo = '$correo'
				AND tipo_usuario= 1";
		echo $query;		
		$this-> consulta($query);
		
		if ($this-> numeroFilas()>=1){
			
			while($row = $this-> fetchAssoc()){
				$ncta = $row['numerocuenta'];
				$id   = $row['id_alumno'];
				$mail = $row['correo'];
				$tipous = $row['tipo_usuario'];
				echo $ncta;
				echo $id;
				echo $mail;
				echo $tipous;
			}
//			Si todos los datos son iguales quiere decir que ya está registrado
			if (($id_alumno == $id) && ($numeroCuenta == $ncta) && ($correo == $mail) && ($tipous == 1)){

				$registrado = "SI";

			}

			$this-> desconectar();
			return $registrado;

		}
	}

// Método para registrar un alumno	en la aplicacion(No confundir con insertaAlumno)Este método ACTUALIZA los datos de un alumno cuando se registra 
// en la aplicación. 	
	public function RegistraAlumno($id_alumno,$numeroCuenta,$correo, $contrasenia,$tipo_usuario){
	$this-> conectar();
	$query = "UPDATE alumno
			  SET 
			  correo = '$correo',
			  contrasenia = '$contrasenia',
			  tipo_usuario = 1
			  WHERE numerocuenta= '$numeroCuenta'
			  AND id_alumno = $id_alumno";
	$result = $this -> consulta($query);		  
	echo $query;
	if (!$result){
		echo "No se pudo realizar el update en la base de datos.";
	}

	$this -> desconectar();

	}
}
?>