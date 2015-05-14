$(document).ready(function (){
 
var x= 0;
 $(".pendiente").on('click',(function(event) {
 var texto = $(this).text();
 var msj = "";
 var fecha = "";

 	if(x==0){
 	msj = "Bunas tardes se le informa que se le fue asignado el salon de examenes profesionales de la facultad de ciencias el dia 15/07/2015";
 	fecha = "10/05/15";
 	}else
 	if(x==1){
 	msj = "Todos los Sinodales han aprobado tu tesis Felicidades a hora  a la espera de el Departamentos de titulos quien asignara el examen";
 	fecha = "1/05/15";
 	}else{
 	msj = "Jorge Urrutia (sinodal) ha aprobado tu tesis";
 	fecha = "20/04/15";
 	}
 
 $("#remitente").empty();
 $("#fecha").empty();
 $("#mensaje").empty();
 $("#remitente").append(texto);
 $("#fecha").append(fecha);
 $("#mensaje").append(msj);
 if(x>1)
 x =0;
 else	
 x = x+1;

 }));
});

