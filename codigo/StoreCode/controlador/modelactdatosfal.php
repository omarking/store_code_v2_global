<?php
session_start();              
if(isset($_SESSION["Email"])) {    
    $ideU =($_SESSION["Iden"] );      
      
    $nomACTU = $_POST["txtNombreActU"];
    $ape1ACTU = $_POST["txtApellido1ActU"];
    $ape2ACTU = $_POST["txtApe2ActU"];
    $contraACTU = $_POST["txtcontraActU"];
    $confirmcontraACTU = $_POST["txtconfirmacontraActU"];
    $telefonACTU = $_POST["txtTelefonoActU"];
    $rfcACTU = $_POST["txtRFCActU"];
    $direccionACTU = $_POST["txtDireccionActUsu"];
    $cpACTU = $_POST["txtCodiPostalActU"];
    $fecnACTU = $_POST["txtFechaNaCU"];

    if( $nomACTU == '' || $ape1ACTU == '' || $ape2ACTU == '' || $contraACTU == '' || $confirmcontraACTU == '' || $telefonACTU == '' || $rfcACTU == '' || $direccionACTU == ''  || $cpACTU  == '' || $fecnACTU  == ''){        
        echo'<script type="text/javascript">alert("¡¡Campos vacios!!");window.location.href="../crudperfilusuario/perfil.php";</script>';
        exit();
    }else if( $nomACTU != '' && $ape1ACTU != '' && $ape2ACTU != '' && $contraACTU != '' && $confirmcontraACTU != '' && $telefonACTU != '' && $rfcACTU != '' && $direccionACTU != ''  && $cpACTU  != '' && $fecnACTU  != ''){
        if($contraACTU == $confirmcontraACTU){
            include("../model/conexion.php");
            $sqlActuDatUsuT ="CALL psUpdateUsuarioT('$nomACTU','$ape1ACTU','$ape2ACTU','$contraACTU','$confirmcontraACTU','$telefonACTU','$rfcACTU','$direccionACTU','$cpACTU','$fecnACTU','$ideU');";            
            if(mysqli_query($conect,$sqlActuDatUsuT)){
                echo'<script type="text/javascript">alert("¡¡Datos insertados correctamente!!");window.location.href="../crudperfilusuario/perfil.php";</script>';                            
                exit();
              }else{
                echo'<script type="text/javascript">alert("Error Intentalo mas tarde");window.location.href="../crudperfilusuario/perfil.php";</script>';            
                exit();
              }
              mysqli_close($conect);
        }else if($contraACTU != $confirmcontraACTU){            
            echo'<script type="text/javascript">alert("¡¡Las contraseñas no coinciden!!");window.location.href="../crudperfilusuario/perfil.php";</script>';
            exit();
        }
    }

    
    
}
?>