<?php
session_start(); 
if(isset($_SESSION["Email"])) {
class AltaProductoImg{      
    public function insertimgp4($datosaltP){
        include("../model/conexion.php");                          
        $consultaaltp ="CALL psInserImgs('$datosaltP[0]','$datosaltP[1]','$datosaltP[2]','$datosaltP[3]','$datosaltP[4]');";           
        return $ejeconsultaaltp=mysqli_query($conect,$consultaaltp);                                       
        mysqli_close($conect);                            
    }
}
}
?>


    