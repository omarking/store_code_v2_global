<?php
session_start();
if(isset($_SESSION["Email"])) {
    $ideUS=($_SESSION["Iden"] );
    $isUsuarioI = $_POST["txtidUsuPayAct"] ;
    $idClientePyp = $_POST["txtclienIdAct"];    
    
    include("../model/conexion.php");
    $query="CALL psMosCliidU('$ideUS');";
    $sql=mysqli_query($conect, $query);
    mysqli_close($conect);
    $mosidc=mysqli_fetch_assoc($sql);    
    $vacioID =$mosidc['clienidpaypal'];

    if($ideUS == $isUsuarioI){
        if($idClientePyp == ''){            
            include("../model/conexion.php");
            $sqlActuImgPro ="CALL psInsClienIdU('$ideUS','$vacioID');";
            if(mysqli_query($conect,$sqlActuImgPro)){
                echo'<script type="text/javascript">alert("¡¡Datos Actualizados correctamente!!");window.location.href="../crudperfilusuario/perfil.php";</script>';
                exit();
          		}else{
                    echo'<script type="text/javascript">alert("Error Intenlalo mas tarde");window.location.href="../crudperfilusuario/perfil.php";</script>';
                    exit();
          		}
          		mysqli_close($conect);
        }else if($idClientePyp !=''){
            include("../model/conexion.php");
            $sqlActuImgPro ="CALL psInsClienIdU('$ideUS','$idClientePyp');";
            if(mysqli_query($conect,$sqlActuImgPro)){
                echo'<script type="text/javascript">alert("¡¡Datos Actualizados correctamente!!");window.location.href="../crudperfilusuario/perfil.php";</script>';
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