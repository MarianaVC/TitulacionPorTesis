$("#document").ready(function(){
    $("#boton_registro_STC").click(function(){

        if($("#nombre_STC").val().length == 0){
            $("#e_nombre_STC").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un nombres</div>");
            $("#nombre_STC").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
       		$("#nombre_STC").css({ "border": '#00FF00 1px solid'});
       		$("#e_nombre_STC").css({display: 'none'});
        }
            if($("#apaterno_STC").val().length == 0){
            $("#e_apaterno_STC").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un apellido paterno</div>");
            $("#apaterno_STC").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
       		$("#apaterno_STC").css({ "border": '#00FF00 1px solid'});
       		$("#e_apaterno_STC").css({display: 'none'});
        }
            if($("#amaterno_STC").val().length == 0){
            $("#e_amaterno_STC").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un apellido materno</div>");
            $("#amaterno_STC").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
       		$("#amaterno_STC").css({ "border": '#00FF00 1px solid'});
       		$("#e_amaterno_STC").css({display: 'none'});
        }
        if(($("#contrasenia_STC").val().length== 0)){
            $("#e_contrasenia_STC").html("<div class='alert alert-danger' role='alert'>Por favor ingresa una contraseña</div>");
            $("#contrasenia_STC").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
        	$("#e_contrasenia_STC").css({display: 'none'});
        	$("#contrasenia_STC").css({ "border": '#00FF00 1px solid'});
        }
        if(($("#correo_STC").val().length)==0){
            $("#e_correo_STC").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un correo electrónico</div>");
            $("#correo_STC").css({ "border": '#FF0000 1px solid'});
            return false;
        }else {
			$("#e_correo_STC").css({display: 'none'});
        	$("#correo_STC").css({ "border": '#00FF00 1px solid'});
        }

        $("#agregarSTC").submit();


    });
});