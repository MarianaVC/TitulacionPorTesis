<?php 
session_start();
require_once '../Clases/Alumno.php';
require_once '../Clases/Conexion.php';
require_once '../Clases/Proceso.php';
require_once '../Clases/SecretariaTecnica.php';

echo $nombre= $_POST['nombre_STC'];
echo $apaterno= $_POST['apaterno_STC'];
echo $amaterno= $_POST['amaterno_STC'];
echo $pass= $_POST['contrasenia_STC'];
echo $correo= $_POST['correo_STC'];

$conexion = new Conexion();

$stc = new SecretariaTecnica();

$stc -> setNombre($nombre);
$stc -> setApaterno($apaterno);
$stc -> setAmaterno($amaterno);
$stc -> setPass($pass);
$stc -> setCorreo($correo);

$stc -> insertaST($stc -> getNombre(),$stc -> getApaterno(),$stc -> getAmaterno(), $stc -> getPass(),$stc -> getCorreo(),2);
echo "<script type='text/javascript'> alert('Nuevo usuario registrado'); window.location.href='NuevoSTC.php'; </script>";




?>