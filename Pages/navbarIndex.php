<!--Este script es para la barra de navegación donde inician sesión la secrecretaría técnica-->
<nav class="navbar navbar-default" role="navigation" style="color: #438eb9">
  <!-- El logotipo y el icono que despliega el menú se agrupan
  para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
    data-target=".navbar-ex1-collapse">
    <span class="sr-only">Desplegar navegación</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand " href="#"><i class="glyphicon glyphicon-wrench"></i></a>
  </div>
     <form id="login_admin" method="post" class="navbar-form navbar-left">
      <div class="form-group">
        <input id="correo_admin" name="correo_admin" type="text" class="form-control" placeholder="usuario administrador">
        <input id ="contrasenia_admin" name="contrasenia_admin" type="password" class="form-control" placeholder="contraseña">
      <button id="boton_login_admin" name="boton_login_admin" type="submit" class="btn btn-success">Iniciar Sesión</button>
    </form>
</nav>
<?php
//Esta parte se encarga del login de stc.
// Con isset checamos que las variables _post esté definida.
require_once 'Clases/SecretariaTecnica.php';
if((isset($_POST['correo_admin'])) && (isset($_POST['contrasenia_admin']))){
$correo = $_POST['correo_admin'];
$pass = $_POST['contrasenia_admin'];
// ---> Pa checar si sí está jalando los datos.
echo $correo + " ";
echo $pass+" ";
$st = new SecretariaTecnica();//---> Construimos un st.
$st-> setCorreo($correo);
$st-> setPass($pass);
//---> Pa checar que sí está funcionando el set:
//echo $st -> numeroCuenta;
//echo $st -> pass;
//Aquí comienza el Login, usamos la funcion puedeIniciarSesion. Definida
$puedeLoguearse = $st -> puedeIniciarSesionST($st -> getCorreo(), $st -> getPass());
//---> Pa checar que sí está funcionando:
//echo $puedeLoguearse;
if($puedeLoguearse == "NO") {
// Si el st no puede loguearse quiere decir que no está registrado o que el usuario y/o contraseña son incorrectos.
// Lanzamos un window alert de javascript.
echo "<script type='text/javascript'> alert('Usuario y/o contraseña incorrectos'); window.location.href='index.php'; </script>";
}else {
    $conexion = new Conexion();
                $query= "SELECT id_usuario,nombre, apaterno, amaterno, correo, tipo_usuario FROM secretaria_tecnica WHERE correo = '$correo' AND contrasenia = '$pass'";
                //echo $query;
                $conexion -> consulta($query);
                if ($conexion -> numeroFilas()>=1){
                while ($row = $conexion -> fetchAssoc()){
                $id_usuario = $row['id_usuario'];
                $nombre =$row['nombre'];
                $apaterno   =$row['apaterno'];
                $amaterno   =$row['amaterno'];
                $correo =$row['correo'];
                $tipo_usuario=$row['tipo_usuario'];
                }
                }else{
                echo "No se pudo conectar a la base de datos o hay un error, intente más tarde. ";
                }
                //guardamos los datos para la sesión. 
                $_SESSION['tipo_usuario']   = $tipo_usuario;
                $_SESSION['correo']         = $correo;
                $_SESSION['nombre']         = $nombre;
                $_SESSION['apaterno']       = $apaterno;
                $_SESSION['amaterno']       = $amaterno;
                $_SESSION['id_usuario']      = $id_usuario;
              header('Location: Pages/PerfilST.php');
}}?>