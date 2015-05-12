$("#document").ready(function(){
/**
* Este escript js es un validador para el registro de los alumnos. +
* Utiliza ajax y un buscador en php para buscar el número de cuenta ingresado por el usuario. 
*/
	//función en keyup para que cuando el usuario teclee el número de cuenta, cuando la longitud sea mayor a ocho se active la búsqueda del alumno
	$("#numerocuenta_registro").keyup(function(event) {
		var ncta = $("#numerocuenta_registro").val();
		if(ncta.length > 8){
			$("#resultado").css({
			display: 'block'
		});


		$.ajax({
			url: 'BuscadorAlumno.php',
			type: 'POST',
			dataType: 'html',
			data: {"mariana": ncta},
			beforeSend: function(){
				//imagen de carga
				$("#resultado").html("<p align='left'><img src='../Imagenes/loader.gif' width='25' height='25'/></p>");
			},
			success: function(data){
				$("#resultado").empty();
				$("#resultado").append(data);
			}
		})
	}});

	//mandar a buscar al alumno con el buscador  y cuando se dá click los campos nombre, apellido paterno y apellido materno se rellenan
	$('a[id^="sugerencias"]').click(function(event) {
		var ncta = $(this).attr('numero_cuenta');
		"hola";
		var id_alumno = $(this).attr('accion')
		var nombre = $(this).attr('name');
		var apellidoP = $(this).attr('apellidop');
		var apellidoM = $(this).attr('apellidom');

		$('#id_alumno_hidden').val(id_alumno);		
			
		$("#numerocuenta_registro").val(ncta);

		$("#nombre_registro").val(nombre);

		$("#apaterno_registro").val(apellidoP);

		$("#amaterno_registro").val(apellidoM);

		$("#resultado").css({
			display: 'none'
		});

	});

    $("#boton_registro").click(function(){

        if($("#numerocuenta_registro").val().length != 9){
            $("#e_numerocuenta_registro").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un número de cuenta de 9 dígitos</div>");
            $("#numerocuenta_registro").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
       		$("#numerocuenta_registro").css({ "border": '#00FF00 1px solid'});
       		$("#e_numerocuenta_registro").css({display: 'none'});
        }
        if(($("#contrasenia_registro").val(). length== 0)){
            $("#e_contrasenia_registro").html("<div class='alert alert-danger' role='alert'>Por favor ingresa una contraseña</div>");
            $("#contrasenia_registro").css({ "border": '#FF0000 1px solid'});
            return false;
        } else {
        	$("#e_contrasenia_registro").css({display: 'none'});
        	$("#contrasenia_registro").css({ "border": '#00FF00 1px solid'});
        }
        if(($("#correo_registro").val().length)==0){
            $("#e_correo_registro").html("<div class='alert alert-danger' role='alert'>Por favor ingresa un correo electrónico</div>");
            $("#correo_registro").css({ "border": '#FF0000 1px solid'});
            return false;
        }else {
			$("#e_correo_registro").css({display: 'none'});
        	$("#contrasenia_registro").css({ "border": '#00FF00 1px solid'});
        }

        $("#form_registro").submit();


    });


});