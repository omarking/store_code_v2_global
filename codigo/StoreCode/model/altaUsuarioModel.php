<?php
class AltaUsuario{    
    public function insertarUsuario($datos){
        include("conexion.php");          
        $consulta ="CALL psInsertUsuariov1('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]');";   
        return $ejeconsulta=mysqli_query($conect,$consulta);                               
        mysqli_close($conect);       
    }
}
?>