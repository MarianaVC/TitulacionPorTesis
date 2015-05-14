$(document).ready(function(){

 $(function(){
 	carga();
 	alumnos();
});

$("#pendientes").click(function(event) {
	alumnosPendientes();
	$("#pendientes").addClass('btn-primary','active');
	$("#pendientes").removeClass('btn-link');
	$("#alumnos").addClass('btn-link');
	$("#alumnos").removeClass('btn-primary','active');
	

});
$("#alumnos").click(function(event) {
	alumnos();
	$("#alumnos").addClass('btn-primary','active');
	$("#alumnos").removeClass('btn-link');
	$("#pendientes").addClass('btn-link');
	$("#pendientes").removeClass('btn-primary','active');
	
});
$("#cerrarSesion").click(function(event) {
	window.location = "../ PerfilAlumno.php";
});

});

function confirmar(){
	$("#contenido").empty();
    $("#contenido").append('<h2>Por el momento no hay alumnos pendientes</h2>');
    $("#span").text('0');
};
function alumnos(){
	$.ajax({
            url : 'SinodalServer.php',
            type: "Post",
            datatype: "text",
            data : {tipo:"alumno"}, 
            success : function(display){
            	$("#contenido").empty();
            	$("#contenido").append(display);
            }
        });
}
function carga(){
	$.ajax({
            url : 'SinodalServer.php',
            type: "Post",
            datatype: "text",
            data : {tipo:"carga"}, 
            success : function(pendiente){
            	$("#pendientes").append(pendiente);
            }
        });
}
function alumnosPendientes(){
	$.ajax({
            url : 'SinodalServer.php',
            type: "Post",
            datatype: "text",
            data : {tipo:"pendiente"}, 
            success : function(display){
            	$("#contenido").empty();
            	$("#contenido").append(display);
            }
        });
}
