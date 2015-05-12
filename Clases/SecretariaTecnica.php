<?php
/**
* User: Mariana
* Date: 17/04/2015
* Clase para la secretaría técnica de carrera
*/
require_once 'Conexion.php';
class SecretariaTecnica extends Conexion{
	public $_st;
	public $idUsuario;
	public $nombre;
	public $apaterno;
	public $amaterno;
	public $correo;
	public $pass;
	public $tipo_usuario;
		//	Método constructor
	//  El atributo idUsuario se asigna en la base de datos, así que no es necesario asignarlo en el método constructor.
	function _construct($nombre, $apaterno, $amaterno,$numeroCuenta,$correo,$pass){
			$this-> nombre = $nombre;
			$this-> apaterno = $apaterno;
			$this->	amaterno = $amaterno;
			$this->	numeroCuenta = $numeroCuenta;
			$this-> correo = $correo;
			$this->	pass = $pass;
	}

	public function setIdUsuario($idUsuario){
		$this -> idUsuario = $idUsuario;
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

	public function setPass($pass){
		$this -> pass= $pass;
	}
	
	public function setCorreo($correo){
		$this -> correo= $correo;
	}

	public function setTipoUsuario($tipo_usuario){
		$this -> tipo_usuario = $tipo_usuario;
	}

	public function getIdUsuario(){
		return $this -> idUsuario;
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
	
	public function getCorreo(){
		return $this -> correo;
	}
	public function getPass(){
		return $this -> pass;
	}

	public function getTipoUsuario(){
		return $this -> tipo_usuario;
	}
// Método para consultar a un secretario técnico de la base de datos usando el id st.
	public function getST($idUsuario){
		$this -> conectar();
			$query = "SELECT	id_usuario, nombre, apaterno, amaterno, correo
						FROM		secretaria_tecnica
						WHERE		id_usuario = '$idUsuario'";
			$this ->consulta($query);
				//		Si hubo resultados:
		if($this -> numeroFilas() > 0){
			//llenamos los datos en un array
			while ($row = $this -> fetchArray()) {
				
				$this -> _st[] = $row;
			}
			return $this -> _st;
// No se encontró un alumno con esos datos:
		}else echo "Alumno no encontrado en la base de datos";
		$this -> desconectar();
		}
// 	Método para insertar un st a la base de datos:
	public function insertaST(){
		$this -> conectar();
		$query = "INSERTO INTO `secretaria_tecnica` (`nombre`,`apaterno`,`amaterno`,`correo`,`contrasenia`,`tipo_usuario`) VALUES
					(" . $this->getNombre() . "', '" . $this->getApaterno() . "', '" . $this->getAmaterno() . "', '" . $this->getCorreo() ."', '" . $this->getApaterno() . "', '" . $this->getPass() ."', '" . $this->getTipoUsuario() ."');";
			$this ->consulta($query);
			$this -> desconectar();
			echo $query;
	}
//	Método para decidir si un alumno puede iniciar sesión en la aplicación, Un alumno sólo puede iniciar sesión si se ha registrado anteriormente. Es decir si ya tiene un password.
//	Regresa "SI" si lo encontró "NO" en otro caso.
	public function puedeIniciarSesionST($correo,$pass){
		$puede = "NO";
		$this-> conectar();
		$query = "SELECT correo, contrasenia
				FROM secretaria_tecnica
				WHERE correo = '$correo'
					AND 	contrasenia = '$pass'";
//		echo $query;
		$this -> consulta($query);
		
		if ($this -> numeroFilas() >= 1) {
			
			while($row = $this-> fetchAssoc()) {
				$mail = $row['correo'];
				$password = $row['contrasenia'];
			}
//			Si los dos datos son iguales quiere decir que puede iniciar sesión. 
			if (($password == $pass) && ($mail == $correo)){
				
				$puede = "SI";
			}
		}
			$this -> desconectar();
			return $puede;
	}
//  Método para decidir si un alumno ya está registrado en la aplicación.
	public function yaRegistrado($id_usuario,$correo){
		$registrado = "NO";
		$this -> conectar();
		$query = "SELECT id_usuario,correo, tipo_usuario
				FROM secretaria_tecnica
				AND id_usuario = $id_usuario
				AND correo = '$correo'
				AND tipo_usuario= 2";
		echo $query;		
		$this-> consulta($query);
		
		if ($this-> numeroFilas()>=1){
			
			while($row = $this-> fetchAssoc()){
				$id   = $row['id_usuario'];
				$mail = $row['correo'];
				$tipous = $row['tipo_usuario'];
			}
//			Si todos los datos son iguales quiere decir que ya está registrado
			if (($id_usuario == $id) && ($correo == $mail) && ($tipous == 2)){

				$registrado = "SI";

			}

			$this-> desconectar();
			return $registrado;

		}
	}

// Método para registrar un st	en la aplicacion(No confundir con insertaAlumno)Este método ACTUALIZA los datos de un alumno cuando se registra 
// en la aplicación. 	
//	public function RegistraAlumno($id_usuario,$numeroCuenta,$correo, $contrasenia,$tipo_usuario){
//	$this-> conectar();
//	$query = "UPDATE alumno
//			  SET 
//			  correo = '$correo',
//			  contrasenia = '$contrasenia',
//			  tipo_usuario = 1
//			  WHERE numerocuenta= '$numeroCuenta'
//			  AND id_usuario = $id_usuario";
//	$result = $this -> consulta($query);		  
//	echo $query;
//	if (!$result){
//		echo "No se pudo realizar el update en la base de datos.";
//	}
//
//	$this -> desconectar();
//
//	}
//}

}