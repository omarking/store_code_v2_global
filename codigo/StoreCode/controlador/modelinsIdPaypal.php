<?php
session_start();
if(isset($_SESSION["Email"])) {
    $ideUS=($_SESSION["Iden"] );
    $isUsuarioI = $_POST["txtidUsuPay"] ;
    $idClientePyp= $_POST["txtclienId"];

    if($ideUS == $isUsuarioI){
        if($idClientePyp ==''){            
            echo'<script type="text/javascript">alert("Campos vacíos Inténtelo de nuevo");window.location.href="../crudperfilusuario/perfil.php";</script>';
        }else if($idClientePyp !=''){
            include("../model/conexion.php");
            $sqlActuImgPro ="CALL psInsClienIdU('$ideUS','$idClientePyp');";
            if(mysqli_query($conect,$sqlActuImgPro)){
                echo'<script type="text/javascript">alert("¡¡Datos insertados correctamente!!");window.location.href="../crudperfilusuario/perfil.php";</script>';
                exit();
          		}else{
                    echo'<script type="text/javascript">alert("Error Intenlalo mas tarde");window.location.href="../crudperfilusuario/perfil.php";</script>';
                    exit();
          		}
          		mysqli_close($conect);
        }
    }else if($ideUS != $isUsuarioI){
        echo'<script type="text/javascript">alert("Datos Incorrectos");window.location.href="../crudperfilusuario/perfil.php";</script>';
    }
}
?>
