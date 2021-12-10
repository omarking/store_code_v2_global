<?php 
session_start();
if(isset($_SESSION["Email"])) {
print_r($_POST);
$Iden = ($_SESSION["Iden"]);

    $apellido2 = $_POST["txtApellido2U"];
    //$direccion = $_POST["txtDireccionUsu"];
    //$coPostal = $_POST["txtCodiPostalU"];
    $telefono = $_POST["txtTelefonoU"];
    $rfc = $_POST["txtRFCU"];
    $fechaNA = $_POST["txtFechaNaCU"];

    if($apellido2 == '' && /*$direccion  == '' && $coPostal  == '' &&*/ $telefono  == '' && $rfc  == ''&& $fechaNA  == ''){
        echo'<script type="text/javascript">alert("¡¡Campos vacíos Inténtelo de nuevo !!");window.location.href="../crudperfilusuario/perfil.php";</script>';        
        exit();        
    }else if($apellido2 != '' && /*$direccion  != '' && $coPostal  != '' && */ $telefono  != '' && $rfc  != '' && $fechaNA  != ''){        
        include("../model/conexion.php");
        $sqlActuImgPro ="CALL psDatFalUsu('$apellido2','$telefono','$rfc','$fechaNA','$Iden');";
        if(mysqli_query($conect,$sqlActuImgPro)){
            echo'<script type="text/javascript">alert("¡¡Datos insertados correctamente!!");window.location.href="../crudperfilusuario/perfil.php";</script>';
            //
            
            exit();
  	}else{
            echo'<script type="text/javascript">alert("Error Intenlalo mas tarde");window.location.href="../crudperfilusuario/perfil.php";</script>';            
            exit();
  	    }
  		mysqli_close($conect);
    } 
}
?>