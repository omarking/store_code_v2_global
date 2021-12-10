function limpiar(){
  $("#tarjetas").val(0);
  $("#form-checkout__cardholderEmail").val(" ");
  $("#form-checkout__identificationNumber").val(" ");
  $("#form-checkout__cardholderName").val(" ");
  $("#form-checkout__cardExpirationMonth").val("");
  $("#form-checkout__cardExpirationYear").val(" ");
  $("#form-checkout__cardNumber").val(" ");
  $("#form-checkout__securityCode").val(" ");
  $("#form-checkout__issuer").val(" ");
  $("#form-checkout__identificationType").val(" ");
  $("#form-checkout__installments").val(" ");
}

function limpiarfedex(){
  $("#nombreComprador").val(" ");
  $("#numeroTelefono").val(" ");
  $("#pais").val(" ");
  $("#estado").val(" ");
  $("#ciudad").val("");
  $("#codigoPostal").val(" ");
  $("#callePrincipal").val(" ");
  $("#calle1").val(" ");
  $("#calle2").val(" ");
}


function insertar(){
  var textarea = $("#textarea").val();
  var Direccion = $("#DireccionVendedor option:selected").text();
  var llenotextarea = $("#textarea").val();
    
  if( textarea == ""){
    $("#textarea").text(llenotextarea +"¿Son correctos tus datos?"+"\nLa dirección donde se recogerá el producto es: "+Direccion);
  }

}
  
function limpiarTexarea() {
  $("#textarea").val(" ");
}





  

