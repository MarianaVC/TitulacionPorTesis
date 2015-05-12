<?php 
/**
* User: Mariana
* Date : 05/05/2015
* En este script se realiza formalmente el registro de los usuarios en la base de datos. 
* Se utilizan como auxiliares las clases Alumno.php, Conexion.php y Proceso.php
* Antes de registrar al usuario en la base de datos, se verifica que no esté registrado 
* como usuario (que no tenga ya una contraseña y un correo electrónico dados de alta)
* 
*/
session_start();
require_once '../Clases/Alumno.php';
require_once '../Clases/Conexion.php';
require_once '../Clases/Proceso.php';
// Nos traemos los datos ingresados por el usuario con _Post[]:
//Número de cuenta:
echo $numero_cuenta =  $_POST['numerocuenta_registro'];
// Id del alumno de la base de datos.:
echo $id_alumno = $_POST['id_alumno_hidden'];
// Nombre:
echo $nombre= $_POST['nombre_registro'];
// Apellido Paterno:
echo $apaterno= $_POST['apaterno_registro'];
// Apellido Materno:
echo $amaterno= $_POST['amaterno_registro'];
// Contraseña:
echo $contrasenia= $_POST['contrasenia_registro'];
// Correo Electrónico:
echo $correo = $_POST['correo_registro'];
// creamos una instancia de alumno y de conexión:
$alumno = new Alumno();
$Conexion = new Conexion();
// construimos al alumno con todos sus valores. 
$alumno -> setIdAlumno($id_alumno);
$alumno -> setNumeroCuenta($numero_cuenta);
$alumno -> setIdAlumno($id_alumno);
$alumno -> setCorreo($correo);
$alumno -> setNombre($nombre);
$alumno -> setApaterno($apaterno);
$alumno -> setAmaterno($amaterno);
$alumno -> setPass($contrasenia);
$alumno -> setTipoUsuario(1);

$registrado = $alumno -> yaRegistrado($alumno -> getIdAlumno(), $alumno -> getNumeroCuenta(), $alumno -> getCorreo());

//checamos si ya está registrado el alumno y lo mandamos a que inicie sesión:
	if ($registrado == "SI"){
		
		echo "<script type='text/javascript'> alert('Ya estás registrado en la página, inicia sesión. Si has olvidado tu contraseña, dirígete a la Secretaría Técnica de la FES Acatlán'); window.location.href='../index.php'; </script>";
	
	}else{
	
	$alumno -> RegistraAlumno($alumno -> getIdAlumno(),$alumno -> getNumeroCuenta(),$alumno -> getCorreo(), $alumno -> getPass(),$alumno -> getTipoUsuario());
//  guardamos los datos de la sesión		
	$_SESSION['tipo_usuario'] 	= $alumno -> getTipoUsuario(); 
	$_SESSION['correo']     	= $alumno -> getCorreo();
	$_SESSION['numero_cuenta'] 	= $alumno -> getNumeroCuenta();  
	$_SESSION['nombre']   		= $alumno -> getNombre(); 
	$_SESSION['apaterno'] 		= $alumno -> getApaterno();  
	$_SESSION['amaterno']  		= $alumno -> getAmaterno();  
	$_SESSION['id_alumno']  	= $alumno -> getIdAlumno();  
//	lo enviamos a su nuevo perfil
	header('Location: PerfilAlumno.php');
}





?>