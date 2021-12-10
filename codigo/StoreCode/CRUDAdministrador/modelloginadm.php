<?php   
@$nobreAdmin = $_POST["txtnomadmin"];
@$contra = $_POST["txtContraseniaL"];

if($nobreAdmin == "" && $contra ==""){
    echo "campos vacios Intentelo de nuevo";
}elseif($nobreAdmin != "" && $contra != ""){
    include("../model\conexion.php");
    $sql = "SELECT
                usuario.idUsuario,
                usuario.nombreUsuario,
                usuario.apellido1Usuario,
                usuario.contraUsuario,
                usuario.confirmaContraUsuario,
                rol.desRole,
                permiso.desPermiso,
                rolpermiso.idRolPermisoUsuario
                FROM
                rolpermiso
                INNER JOIN usuario ON usuario.idUsuario = rolpermiso.idUsuario
                INNER JOIN rol ON rol.idRole = rolpermiso.idRol
                INNER JOIN permiso ON permiso.idPermiso = rolpermiso.idPermiso
                WHERE rol.desRole = 'Admin' AND permiso.desPermiso = 'SUPERUSUARIO'
                AND usuario.nombreUsuario = '$nobreAdmin'
                AND usuario.contraUsuario = '$contra';";                    
    $ejecSQL = mysqli_query($conect,$sql);
    mysqli_close($conect);                                  

    while($extraer = mysqli_fetch_assoc($ejecSQL)){                
        $extNombreU = $extraer['nombreUsuario'];                        
        $extContraU = $extraer['contraUsuario'];		
        $extidUsu = $extraer['idUsuario'];
    }

    if(@$extNombreU && @$extContraU){
        session_start();        
        $_SESSION["nombreUsuario"] = @$extNombreU;		
        $_SESSION["idUsuario"] = @$extidUsu;		                                
        header("location:./Administrador.php");	                                            		
    }else{									
                echo'<script type="text/javascript">alert("Datos incorrectos, intente de nuevo ; (");</script>';
                echo'<script type="text/javascript">window.location.href="./loginAdm.php";</script>';      
                exit();
    }
}                 
?>