<?php 
session_start();
if(isset($_SESSION["nombreUsuario"])) {    

$txtMarca = $_POST["txtMarcaN"];
//echo $txtMarca;

include("../model/conexion.php");
$sqlActuImgPro ="CALL psInsertMarca('$txtMarca');";
if(mysqli_query($conect,$sqlActuImgPro)){
    echo'<script type="text/javascript">alert("¡¡Marca insertada Satisfactoriamente!!");</script>';
    echo'<script type="text/javascript">window.location.href="Administrador.php";</script>';  
    exit();
  }else{
    echo'<script type="text/javascript">alert("Error al Insertar Marca ;( ");</script>';
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
