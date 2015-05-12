<?php
// Con esto vamos a empezar la sesión
session_set_cookie_params(0);
session_start();
require_once 'Clases/Conexion.php';
require_once 'Clases/Alumno.php';
?>
<!DOCTYPE html>
<!--Inicia documento html-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Facultad de Estudios Superiores Acatlán</title>
        <link href="Pages/assets/css/bootstrap.css" rel="stylesheet"/>
    </head>
    <!--Se agregaron los scripts de bootstrap para el comportamiento de la página.-->
    <script src="Pages/assets/js/jquery-1.11.2.js"></script>
    <script src='Pages/assets/js/bootstrap.js'></script>
    <script src= "Pages/assets/js/validadorLogin.js"></script>
    <body>
        <div class ='container'>
            <!--Nos traemos el header2-->
            <div class ='container'>
                <?php require_once 'header2.php'; ?>
                <!--Barra navegación para inciar sesión como admin-->
                <?php require_once 'Pages/navbarIndex.php';?>
            </div>
            <br>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <div class="page-header position-relative">
                            <h2> Trámite de titulación por tesis </h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Inicia sesión para revisar el estado de tu trámite:</h3>
                                </div>
                                <form class="form-signin" method='post'>
                                    <div class="panel-body">
                                        <label for="numerocuenta_login" class="sr-only">Número de cuenta</label>
                                        <input type="text" id="numerocuenta_login" name='numerocuenta_login' class="form-control" placeholder="Número de cuenta a 9 dígitos" required autofocus>
                                        <div id="e_numerocuenta_login"></div><!--Aquí se muestran los mensajes de error para este input(ver validadorLogin.js)-->
                                        <label for="contrasenia_login" class="sr-only">Contraseña</label>
                                        <input type="password" id="contrasenia_login" name='contrasenia_login' class="form-control" placeholder="Contraseña" required>
                                        <div id="e_contrasenia_login"></div><!--Aquí se muestran los mensajes de error para este input-->
                                    </div>
                                    <div class="panel-footer text-center">
                                        <button id='boton_login' class="btn btn-primary " type="submit">Iniciar Sesión</button>
                                    </div>
                                </form>
                                <div class="panel-footer text-center">
                                    <form class="form-signin" method="post" action="Pages/Registro.php">
                                        <h5><strong>Si no has iniciado un trámite aún, regístrate para hacerlo:</strong></h5>
                                        <button id='boton_login_registro' class="btn btn-success " type="submit">Registrarse</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <br><br>
                <?php
                //Esta parte se encarga del login del alumno.
                // Con isset checamos que las variables _post esté definida.
                if((isset($_POST['numerocuenta_login'])) && (isset($_POST['contrasenia_login']))){
                $numerocuenta = $_POST['numerocuenta_login'];
                $password = $_POST['contrasenia_login'];
                //$conexion = new Conexion("localhost", "mariana","hp,swyjg","titulacion");
                // ---> Pa checar si sí está jalando los datos.
                //echo $numerocuenta + " ";
                //echo $password+" ";
                $alumno = new Alumno();//---> Construimos un alumno.
                $alumno-> setNumeroCuenta($numerocuenta);
                $alumno-> setPass($password);
                //---> Pa checar que sí está funcionando el set:
                //echo $alumno -> numeroCuenta;
                //echo $alumno -> pass;
                //Aquí comienza el Login, usamos la funcion puedeIniciarSesion. Definida
                $puedeLoguearse = $alumno -> puedeIniciarSesion($alumno -> getNumeroCuenta(), $alumno -> getPass());
                //---> Pa checar que sí está funcionando:
                //echo $puedeLoguearse;
                if($puedeLoguearse == "NO") {
                // Si el alumno no puede loguearse quiere decir que no está registrado o que el usuario y/o contraseña son incorrectos.
                // Lanzamos un window alert de javascript.
                echo "<script type='text/javascript'> alert('Usuario y/o contraseña incorrectos'); window.location.href='index.php'; </script>";
                }else {
                $conexion = new Conexion();
                $query= "SELECT id_alumno,numerocuenta, nombre, apaterno, amaterno, correo, tipo_usuario FROM alumno WHERE numerocuenta = $numerocuenta AND contrasenia = '$password'";
                $conexion -> consulta($query);
                if ($conexion -> numeroFilas()>=1){
                while ($row = $conexion -> fetchAssoc()){
                $id_alumno = $row['id_alumno'];
                $numero_cuenta  =$row['numerocuenta'];
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
                $_SESSION['numero_cuenta']  = $numero_cuenta;
                $_SESSION['nombre']         = $nombre;
                $_SESSION['apaterno']       = $apaterno;
                $_SESSION['amaterno']       = $amaterno;
                $_SESSION['id_alumno']      = $id_alumno;
                header('Location: Pages/PerfilAlumno.php');
                }}?>
                <!--Nos traemos el footer2-->
                <div class="container">
                    <?php require_once 'footer2.php';?>
                </div>
            </div>
        </body>
    </html>