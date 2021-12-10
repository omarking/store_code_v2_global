<?php 
session_start();
if(isset($_SESSION["nombreUsuario"])) {    
  
$idEminU = $_GET["idElimU"];
echo $idEminU;
include("../model/conexion.php");
$sqlActuImgPro ="CALL   psEdUsuario('$idEminU');";
if(mysqli_query($conect,$sqlActuImgPro)){
    echo'<script type="text/javascript">alert("¡¡Usuario Eliminado Con Éxito!!");</script>';
    echo'<script type="text/javascript">window.location.href="Administrador.php";</script>';  
    exit();
  }else{
    echo'<script type="text/javascript">alert("Error al Eliminar a Usuario ; (");</script>';
    echo'<script type="text/javascript">window.location.href="Administrador.php";</script>';      
    exit();
  }
  mysqli_close($conect);

}else{
  echo'<script type="text/javascript">alert("Iniciar Sesión; (");</script>';
  echo'<script type="text/javascript">window.location.href="./loginAdm.php";</script>';      
  exit();
}
?>
