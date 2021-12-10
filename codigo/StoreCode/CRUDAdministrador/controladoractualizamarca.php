<?php
session_start();
if(isset($_SESSION["nombreUsuario"])) {        

//print_r($_POST);
$idMarca=$_POST["txtIdMarca"]; 
$nomMarca=$_POST["txtMarca"];
$estatusMar=$_POST["rbestatus"];
include("../model/conexion.php");
$sqlActCategoria ="UPDATE marca SET marca.desMarca = '$nomMarca',marca.statusMarca = '$estatusMar' WHERE idMarca = '$idMarca';";
if(mysqli_query($conect,$sqlActCategoria)){
    echo'<script type="text/javascript">alert("¡¡Marca actualiza con éxito!!");</script>';
    echo'<script type="text/javascript">window.location.href="Administrador.php";</script>';  
    exit();
  }else{
    echo'<script type="text/javascript">alert("Error al actualizar marca ; (");</script>';
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