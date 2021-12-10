<?php
session_start();
if(isset($_SESSION["Email"])) {
class AltaProducto{    
    public function insertaraltProducto($datosaltP){
        echo $datosaltP[0];
        echo $datosaltP[1];
        echo $datosaltP[2];
        echo $datosaltP[3];
        echo $datosaltP[4];
        echo $datosaltP[5];
        echo $datosaltP[6];
        echo $datosaltP[7];
        /*
        include("conexion.php");                  
        $consultaaltp ="CALL psInsertProducto('$datosaltP[0]','$datosaltP[1]','$datosaltP[2]','$datosaltP[3]','$datosaltP[4]','$datosaltP[5]','$datosaltP[6]','$datosaltP[7]');";           
        return $ejeconsultaaltp=mysqli_query($conect,$consultaaltp);                                       
        mysqli_close($conect);                            */
    }
}
}
?>

