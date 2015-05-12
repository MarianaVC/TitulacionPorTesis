$("#document").ready(function(){
$("#boton_registro_sinodal").click(function(){

        if($("#nombre_sinodal").val().length == 0){
            $("#e_nombre_sinodal").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un nombres</div>");
            $("#nombre_sinodal").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
       		$("#nombre_sinodal").css({ "border": '#00FF00 1px solid'});
       		$("#e_nombre_sinodal").css({display: 'none'});
        }
            if($("#apaterno_sinodal").val().length == 0){
            $("#e_apaterno_sinodal").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un apellido paterno</div>");
            $("#apaterno_sinodal").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
       		$("#apaterno_sinodal").css({ "border": '#00FF00 1px solid'});
       		$("#e_apaterno_sinodal").css({display: 'none'});
        }
            if($("#amaterno_sinodal").val().length == 0){
            $("#e_amaterno_sinodal").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un apellido materno</div>");
            $("#amaterno_sinodal").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
       		$("#amaterno_sinodal").css({ "border": '#00FF00 1px solid'});
       		$("#e_amaterno_sinodal").css({display: 'none'});
        }
        if(($("#correo_sinodal").val().length)==0){
            $("#e_correo_sinodal").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un correo electrónico</div>");
            $("#correo_sinodal").css({ "border": '#FF0000 1px solid'});
            return false;
        }else {
			$("#e_correo_sinodal").css({display: 'none'});
        	$("#correo_sinodal").css({ "border": '#00FF00 1px solid'});
        }
        $("#agregarSinodal").submit();


    });
});
