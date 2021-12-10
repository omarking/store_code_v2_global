<?php   
include("../model\conexion.php");

@$loEmailU = $_POST["txtEmailL"];
@$loContraU = $_POST["txtContraseniaL"];
@$correo = $_POST["txtEmailL"];

if($loEmailU != '') {
    include("../model\conexion.php");        
    $buscarCorreo = "CALL psFiltroCorreo('$loEmailU');"; 
    $resBC=mysqli_query($conect,$buscarCorreo);   
    mysqli_close($conect);                                                              
    while($rowBC=mysqli_fetch_row($resBC)){
        $exisC = $rowBC[0];
    }
    if($exisC = 1){   
        echo "Correo Existente <br>";     
        include("../model\conexion.php");        
        $buscarCorreoA = "CALL psValidacionActivoE('$loEmailU','1');"; 
        $resBCA=mysqli_query($conect,$buscarCorreoA);   
        mysqli_close($conect);                                                              
        while($rowBCA=mysqli_fetch_row($resBCA)){
            $exisCA = $rowBCA[0];
        }
        
        if($exisCA = 1){
                                //Consulta Final 
                                include("../model/conexion.php");   
                                $sql = "SELECT usuario.emailUsuario AS 'Email', 
                                                usuario.contraUsuario AS 'Contra',
                                                CONCAT(usuario.nombreUsuario,' ',usuario.apellido1Usuario) AS 'Nombre',
                                                usuario.idUsuario AS 'Iden'
                                            FROM usuario 
                                            WHERE usuario.contraUsuario = '$loContraU' 
                                            AND usuario.emailUsuario = '$loEmailU' 
                                            AND usuario.statusUsuario = '1';  ";                    
                                $ejecSQL = mysqli_query($conect,$sql);
                                mysqli_close($conect);                                  
                            
                                        while($extraer = mysqli_fetch_assoc($ejecSQL)){                
                                            $extNombreU = $extraer['Nombre'];                
                                            $extEmailU = $extraer['Email'];	
                                            $extContraU = $extraer['Contra'];		
                                            $extidUsu = $extraer['Iden'];
                                        }
                            
                                        if(@$extEmailU && @$extContraU){
                                            session_start();
                                            $_SESSION["Email"] = @$extEmailU;
                                            $_SESSION["Nombre"] = @$extNombreU;		
                                            $_SESSION["Iden"] = @$extidUsu;		                                
                                            header("location:../index.php");	                                            		
                                        }else{									
                                                    echo "<script >alert('Datos incorrectos, intente de nuevo')</script>";					
                                                    echo "<script >return false</script>";	                                        
                                        }
                                //Fiin Consulta Final
        }else{            
            echo'<script type="text/javascript"> alert("Cuenta aún no activada, ¡¡¡Accede a tu Correo y activa tu cuenta!!!");window.location.href="login.php";</script>';
        }
        
    }
    if($exisC = 0){        
        echo'<script type="text/javascript"> alert("No has creado tu cuenta en StoreCode, ¡Regístrate ahora!!");window.location.href="../vistasCRUDRegistro/vistaAltaUsuario.php";</script>';        
    }

 
}else{
    echo'<script type="text/javascript"> alert("Campos vacíos, intente de nuevo");window.location.href="login.php";</script>';
}                                     
                     
?>