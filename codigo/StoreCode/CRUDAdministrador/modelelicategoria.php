<?php 
session_start();
if(isset($_SESSION["nombreUsuario"])) {        

$idEliCate = $_GET["elicatego"];

include("../model/conexion.php");
$sqlECategoria ="UPDATE categoria SET statusCategoria = '0' WHERE categoria.idCategoria = '$idEliCate';";
if(mysqli_query($conect,$sqlECategoria)){
    echo'<script type="text/javascript">alert("¡¡Categoría Eliminada satisfactoriamente!!");</script>';
    echo'<script type="text/javascript">window.location.href="Administrador.php";</script>';  
    exit();
  }else{
    echo'<script type="text/javascript">alert("Error al eliminar categoría ; (");</script>';
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