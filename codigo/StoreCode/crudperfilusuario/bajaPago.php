<?php

include("../model/conexion.php"); 
session_start();
if(isset($_SESSION["Email"])) {
$Iden = ($_SESSION["Iden"]);
$idMetodoPago=$_POST["idMetodoPagod"];
$statusMetodoPago=$_POST["statusM"];


if($statusMetodoPago=='1'){
    $sentencia= mysqli_query($conect,"UPDATE metodopago SET statusMetodoPago = '0'
    WHERE idMetodoPago = '$idMetodoPago'");
    if($sentencia){
        return header("Location:perfil.php");
    }
    else{
        echo "<br>ERRor";
        return "error";
    }
}else{
    $sentencia= mysqli_query($conect,"UPDATE metodopago SET statusMetodoPago = '1'
    WHERE idMetodoPago = '$idMetodoPago'");
    if($sentencia){
        return header("Location:perfil.php");
    }
    else{
        echo "<br>ERRor";
        return "error";
    }
}
/*
$codigoPostalUsuario=$_POST["CodigoPostalUsuario"];
$estado=$_POST["estado"];
$municipio=$_POST["municipio"];
$colonia=$_POST["colonia"];
$callePrincipal=$_POST["callePrincipal"];
$numeroExterior=$_POST["numeroExterior"];
$calle1=$_POST["calle1"];
$calle2=$_POST["calle2"];
$referencia=$_POST["referencia"];


/*
$sentencia= mysqli_query($conect,"INSERT INTO direccion(CodigoPostalUsiario,estado,municipio,colonia,callePrincipal,numExterior,calle1,calle2,referencia)
VALUES(:codigoPostalUsuario:estado,:municipio,:colonia,:callePrincipal,:numeroExterior,:calle1,:calle2,:referencia)");
*/


/*
$sentencia->binParam(':codigoPostal',$codigoPostal);
$sentencia->binParam(':estado',$estado);
$sentencia->binParam(':municipio',$municipio);
$sentencia->binParam(':colonia',$colonia);
$sentencia->binParam(':callePrincipal',$callePrincipal);
$sentencia->binParam(':numeroExterior',$numeroExterior);
$sentencia->binParam(':calle1',$calle1);
$sentencia->binParam(':calle2',$calle2);
$sentencia->binParam(':referencia',$referencia);
*/

}
/*
-----Otra conexion-------------------------------------------
$identificador = ($_SESSION["Iden"]);                                                                                
include("../model/conexion.php");                
$sqlarraycu="CALL psUpdateDaFa('$identificador')";
$resultadarraycu=mysqli_query($conect,$sqlarraycu);                                                             
while($row=mysqli_fetch_row($resultadarraycu)){

  */

/*
  session_start();
  if(isset($_SESSION["Email"])) {
  print_r($_POST);
  $Iden = ($_SESSION["Iden"]);
  
      $codigoPostalUsuario= $_POST["txtCodigoPostalDir"];
      $estado = $_POST["txtEstadoDir"];
      $municipio = $_POST["txtMunicipioDir"];
      $colonia = $_POST["txtColoniaDir"];
      $callePrincipal= $_POST["txtCallePrncipalDir"];
      $numeroExterior = $_POST["txtNumeroEsteriorDir"];
      $calle1 = $_POST["txtCalle1Dir"];
      $calle2 = $_POST["txtCalle2Dir"];
      $referencia = $_POST["txtReferenciaDir"];
      
  
      if($codigoPostalUsuario == '' && $estado  == '' && $municipio  == '' && $colonia  == '' && $callePrincipal  == '' && $numeroExterior  == '' && $calle1  == '' && $calle2  == '' && $referencia  == ''){
          echo'<script type="text/javascript">alert("????Campos vac??os Int??ntelo de nuevo !!");window.location.href="../crudperfilusuario/perfil.php";</script>';        
          exit();        
      }else if($codigoPostalUsuario!= '' &&  $estado  != '' && $municipio  != '' && $colonia  != '' && $callePrincipal  != '' && $numeroExterior  != '' && $calle1  != '' && $calle2  != '' && $referencia  != ''){        
          include("../model/conexion.php");
          $sqlActuImgPro ="CALL PsingDireccion('$codigoPostalUsuario','$estado','$municipio','$colonia','$callePrincipal','$numeroExterior','$calle1','$calle2','$referencia');";
          if(mysqli_query($conect,$sqlActuImgPro)){
              echo'<script type="text/javascript">alert("????Datos insertados correctamente!!");window.location.href="../crudperfilusuario/perfil.php";</script>';
              
              
              exit();
            }else{
                echo'<script type="text/javascript">alert("Error Intenlalo mas tarde");window.location.href="../crudperfilusuario/perfil.php";</script>';            
                exit();
              }
              mysqli_close($conect);
        } 
    }
*/
  
?>
