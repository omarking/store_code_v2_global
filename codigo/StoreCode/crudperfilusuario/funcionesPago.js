function agregaformPago(datos){
	
    d=datos.split('||');
	console.log(d[0]);


	$('#idMetodoPagou').val(d[0]);
	$('#numTarjetau').val(d[1]);
	$('#expYearu').val(d[2]);
	$('#expMonthu').val(d[3]);

	   
    
}

function bajaformPago(datos){
	
    d=datos.split('||');

	$('#idMetodoPagou').val(d[0]);

    
}

function baja2P(datos){
	
    d=datos.split('||');
	console.log(d[0]);


	$('#idMetodoPagod').val(d[0]);
	$('#statusM').val(d[4]);

}

function alta2P(datos){
	
    d=datos.split('||');
	console.log(d[0]);


	$('#idMetodoPagod').val(d[0]);
	$('#statusM').val(d[4]);

}