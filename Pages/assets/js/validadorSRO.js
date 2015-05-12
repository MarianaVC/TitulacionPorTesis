$("#boton_SRO").click(function() {
if(($("#titulo_de_tesis").val().length < 1)){
    $("#e_titulo_de_tesis").html("<div class='alert alert-danger' role='alert'>Introduce un título</div>");
    $("#titulo_de_tesis").focus();
    return false;
}
if(($("#objetivo").val().length < 1)){
    $("#e_objetivo").html("<div class='alert alert-danger' role='alert'>Introduce un objetivo</div>");
    $("#objetivo").focus();
    return false;
}
if(($("#resumen").val().length < 1)){
    $("#e_resumen").html("<div class='alert alert-danger' role='alert'>Introduce un resumen</div>");
    $("#resumen").focus();
    return false;
}
$("#boton_SRO").submit();
});    

});




