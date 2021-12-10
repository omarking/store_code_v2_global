<?php
include("../model/conexion.php"); 
session_start();
if(isset($_SESSION["Email"])) {
$Iden = ($_SESSION["Iden"]);
$idMetodoPago=$_POST["idMetodoPagou"];
$numTarjeta=$_POST["numTarjetau"];
$expYear=$_POST["expYearu"];
$expMonth=$_POST["expMonthu"];
$codigoSeguridad=$_POST["codigoSeguridadu"];

$sentencia= mysqli_query($conect,"UPDATE metodopago SET numTarjeta = '$numTarjeta', expYear = '$expYear', expMonth = '$expMonth', codigoSeguridad = '$codigoSeguridad'
WHERE idMetodoPago = '$idMetodoPago'");

if($sentencia){
    return header("Location:perfil.php");
}
else{
    echo $numTarjeta;
    echo "<br>ERRor";
    return "error";
}
}

  
?>

    
