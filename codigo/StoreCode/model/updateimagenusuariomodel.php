<?php
class ModificarimgUsuario{    
    public function updateimgUsuario($datosUpdimgU){
        include("conexion.php");                          
        $updateimgUsuario ="CALL psUpdateImagenP('$datosUpdimgU[0]','$datosUpdimgU[1]');";
        return $ejeconsultaaltp=mysqli_query($conect,$updateimgUsuario);                                       
        mysqli_close($conect);                            
    }
}
?>
