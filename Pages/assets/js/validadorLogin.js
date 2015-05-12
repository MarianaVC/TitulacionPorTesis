$("#document").ready(function(){
/*Valida que el número de cuenta y e la contraseña no sean nulos durante el inicio de sesión. */
$("#boton_login").click(function() {
    if(($("#numerocuenta_login").val().length !== 9)){
        $("#e_numerocuenta_login").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un número de cuenta de 9 dígitos</div>");
        $("#numerocuenta_login").css({ "border": '#FF0000 1px solid'});

        return false;
    }
    else {
            $("#numerocuenta_login").css({ "border": '#00FF00 1px solid'});
            $("#e_numerocuenta_login").css({display: 'none'});
        }

    if(($("#contrasenia_login").val().length)==0){//Establecemos que la contraseña sea de 8 dígitos. 
        $("#e_contrasenia_login").html("<div class='alert alert-danger' role='alert'>Por favor ingresa una contraseña</div>");
        $("#contrasenia_login").css({ "border": '#FF0000 1px solid'});

        return false;
    } else {
            $("#e_contrasenia_login").css({display: 'none'});
            $("#contrasenia_login").css({ "border": '#00FF00 1px solid'});
        }

    $("#boton_login").submit();

 }); 
/* valida que el correo y la contraseña para los usuarios admin sean correctos*/
     $("#boton_login_admin").click(function(){

        if($("#correo_admin").val().length == 0){
            $("#correo_admin").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
            $("#correo_admin").css({ "border": '#00FF00 1px solid'});
        }
        if(($("#contrasenia_admin").val(). length== 0)){
            $("#contrasenia_admin").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
            $("#contrasenia_admin").css({ "border": '#00FF00 1px solid'});
        }

        $("#login_admin").submit(); 

});

});

	
