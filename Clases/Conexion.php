<?php
//session_start();
/**
* clase que gestiona la conexion con la base de datos
*/
class Conexion
{
	 public $_servidor   = "localhost";
	 public $_usuario    = "root";
	 public $_pass       = "password";
	 public $_base_datos = "titulacion";
	 public $_conexion;

	function __construct(){
		//$this -> _servidor   = $servidor;
		//$this -> _usuario    = $usuario;
		//$this -> _pass       = $pass;
		//$this -> _base_datos = $base_datos;
		$this -> conectar();
	}
	//metodo encargado de realizar la conexion
	public function conectar(){
		$this -> _conexion = mysqli_connect($this -> _servidor, $this -> _usuario, $this -> _pass)or die("Error al conectar con el servidor: ".mysqli_error($this -> _servidor));;
		mysqli_select_db($this -> _conexion,$this -> _base_datos);
		mysqli_query($this-> _conexion, "set textsize 10000000");
		//echo "Me conecté";
	}
	//metodo encargado de ejecutar los querys
	public function consulta($query){
		//si no se ejecuta el query retorna falso
		if(!$this -> result = mysqli_query($this -> _conexion,$query) ){
			return false;
		}else{
			return $this -> result = mysqli_query($this -> _conexion,$query);
		}
	}
	//metodo encargado de contar las filas de un query
	public function numeroFilas(){
		return mysqli_num_rows($this -> result);
	}
	//metodo encargado de traer la informacion en un array fetch_array
	public function fetchArray(){

		if(!is_resource($this -> result)){
			return false;
		}else{
			return mysqli_fetch_array($this -> result);
		}
	}
	//metodo encargado de traer la informacion en un array fetch_assoc
	public function fetchAssoc(){
	
			return mysqli_fetch_assoc($this -> result);
		
	}
	//metodo encragado de contar las filas afectadas
	public function filasAfectadas(){
		return mysqli_affected_rows($this -> _result);
	}
	//metodo encargado de ver el ultimo insertado solo sirve para mysql
	public function ultimaFila(){
		//mysql_insert_id($this -> _conexion);
	}
	//metod encargado de desconectar de la base de datos
	public function desconectar(){
		mysqli_close($this -> _conexion);
	}
}
?>