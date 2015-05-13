var sinodales = new Array();

$(document).ready(function(){

$(".fila").on("click", function(){

	var noCuenta = 	$(this).find("td:first").html();
	console.log(noCuenta); //B
	var res = elimina(noCuenta);

	if(!res){
	if(sinodales.length==5){
		alert("Solo puedes elegir 5 sinodales");
		return;
	}		
	sinodales.push(noCuenta);
	var palomita = "<span class='glyphicon glyphicon-ok icon-success' aria-hidden='true'></span>";
	$(this).find("td:last").html(palomita);
    }else{
    $(this).find("td:last").html("");
    }

    console.log("Este es mi arreglo "+sinodales.toString());

});

$("#confirmar").click(function() {
	
  if(sinodales.length==0){
	alert("Selecciona al menos 1 sinodal");
	return;
   }
   //Pasamos a Json el arreglo
   var json = sinodales.toString();
     $.ajax({
            url : 'NotificacionSinodal.php',
            type: "Post",
            datatype: "text",
            data : {json:json}, 
            success : function(r){alert(r);}
        });

});


});

function elimina(noCuenta){
	for(var i=0;i<sinodales.length;i++){
		if(sinodales[i]==noCuenta){
			sinodales.splice(i,i);
			return true;
		}
	}
	return false;
}


