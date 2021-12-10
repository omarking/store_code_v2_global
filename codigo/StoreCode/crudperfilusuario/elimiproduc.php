<?php 
session_start();              
if(isset($_SESSION["Email"])) {    
    //$ideU=($_SESSION["Iden"] )  

    $idProduct = $_GET['eli'];

    //CALL psEliProduct('30');
//crudperfilusuario/perfil.php

    include("../model/conexion.php");                  
        $sqlEmiP ="CALL psEliProduct('$idProduct');";           
        if(mysqli_query($conect,$sqlEmiP)){            
            echo'<script type="text/javascript">alert("¡¡El producto se eliminó con éxito!!");window.location.href="perfil.php";</script>';
            exit();
  		}else{                
            echo'<script type="text/javascript">alert("Error al Elimnar");window.location.href="perfil.php";</script>';                                    
            exit();  			
  		}
  		mysqli_close($conect);
    }
?>
