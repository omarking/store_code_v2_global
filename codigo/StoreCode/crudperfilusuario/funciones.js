
function agregaform(datos){
	
    d=datos.split('||');
	console.log(d[0]);


	$('#IdDireccionu').val(d[0]);
	$('#CodigoPostalUsuariou').val(d[1]);
	$('#estadou').val(d[2]);
	$('#municipiou').val(d[3]);
	$('#coloniau').val(d[4]);
    $('#callePrincipalu').val(d[5]);
	$('#numeroExterioru').val(d[6]);
	$('#calle1u').val(d[7]);
    $('#calle2u').val(d[8]);
    $('#referenciau').val(d[9]);


    
    
}

function bajaform(datos){
	
    d=datos.split('||');

	$('#IdDireccionu').val(d[0]);

    
}

function baja2(datos){
	
    d=datos.split('||');
	console.log(d[0]);


	$('#IdDirecciond').val(d[0]);
	$('#estatus').val(d[10]);

}

function alta2(datos){
	
    d=datos.split('||');
	console.log(d[0]);


	$('#IdDirecciond').val(d[0]);
	$('#estatus').val(d[10]);

}