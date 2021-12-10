<?php
include("../model/conexion.php"); 
session_start();
if(isset($_SESSION["Email"])) {
$Iden = ($_SESSION["Iden"]);
$numTarjeta=$_POST["numTarjeta"];
$expYear=$_POST["expYear"];
$expMonth=$_POST["expMonth"];
$codigoSeguridad=$_POST["codigoSeguridad"];



$sentencia= mysqli_query($conect,"INSERT INTO metodopago(idUsuario,numTarjeta,expYear,expMonth,codigoSeguridad,statusMetodoPago)
VALUES($Iden,'$numTarjeta','$expYear','$expMonth','$codigoSeguridad','1')");


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
