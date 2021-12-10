<?php 
session_start();
if(isset($_SESSION["nombreUsuario"])) {    

$txtEMarca =$_GET["elimar"];


include("../model/conexion.php");
$sqlEliMar ="UPDATE marca SET statusMarca = '0' WHERE idMarca = '$txtEMarca';";
if(mysqli_query($conect,$sqlEliMar)){
    echo'<script type="text/javascript">alert("¡¡Marca Desactivada Satisfactoriamente!!");</script>';
    echo'<script type="text/javascript">window.location.href="Administrador.php";</script>';  
    exit();
  }else{
    echo'<script type="text/javascript">alert("Error al Desactivar Marca ;( ");</script>';
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