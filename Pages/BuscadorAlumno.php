<?php
/**
 * User: Mariana
 * Date: 17/04/2015
 * Script para hacer la búsqueda de alumnos por número de cuenta en la base de datos desde la pantalla de registro. 
 * El usuario inserta el número de cuenta y el srcipt hace la búsqueda del número de cuenta en la tabla de alumnos, si lo encuentra despliega 
 * una lista de sugerencias para que el alumno de click en su nombre y los campos de nombre, apaterno y amaterno se autocompleten. 
 * Si no encuentra el número de cuenta no deja que se registre el alumno. 
 * Esto es así por requerimientos del cliente. (Se supone que ellos tienen una base de datos de alumnos y si el alumno no está en esa bd entonces no puede registrarse y hacer un trámite de titulación)
 * Nos auxiliamos del script validadorRegistro.js
 */
$ncta = $_POST['mariana'];
error_reporting(E_ALL ^ E_DEPRECATED);
$conexion = mysqli_connect('localhost','root','password', 'titulacion') or die ("error en conexion " .mysqli_error($conexion));
mysqli_query($conexion,"SET NAMES 'utf8'");
//consulta
        $query = "  SELECT  *
                from    alumno
                where   numerocuenta like '$ncta%'
                limit   10";
//ejecutamos nuestra consulta
$result = mysqli_query($conexion,$query) or die ("error en el query ".mysqli_error($conexion) );
//si hay resultado
if(mysqli_num_rows($result) > 0){
//habilitamos el botón de registro si sí hay resultados en la base de datos. Esto es por si el alumno se equivoca en el primer intento, para que el botón no se quede deshabilitado.     
    echo "<script> $('#boton_registro').removeAttr('disabled'); </script>";
//traemos los datos
while ($row = mysqli_fetch_assoc($result)) {
echo "<a href='javascript:void(0);' id='sugerencias' name='".$row['nombre']."' accion='".$row['id_alumno']."' numero_cuenta='". $row['numerocuenta'] ."' apellidop='".$row['apaterno']."' apellidom='".$row['amaterno']."'>"
    .$row['nombre']." ".$row['apaterno']." ".$row['amaterno']." ".$row['id_alumno']."<br>";
"</a><br>";
}
}else{
// Si no encontramos al alumno le avisamos que no hay ningún alumno con ese número de cuenta y no le dejamos registrarse deshabilitando el botón de registro. 
echo "<div class='alert alert-danger' role='alert'>No hay ningún alumno con ese número de cuenta</div>";
echo "<script> $('#boton_registro').attr('disabled','true'); </script>";
}
?>
<script src="assets/js/validadorRegistro.js"></script>
