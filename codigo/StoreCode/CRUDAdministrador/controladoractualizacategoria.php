<?php
session_start();
if(isset($_SESSION["nombreUsuario"])) {        

$idCat=$_POST["txtIdCategoria"]; 
$nombreCat=$_POST["txtCategoriN"];
$estatusCAt=$_POST["rbestatus"];


include("../model/conexion.php");
$sqlActCategoria ="UPDATE categoria SET categoria.desCategoria = '$nombreCat',
            categoria.statusCategoria = '$estatusCAt' WHERE categoria.idCategoria = '$idCat';";
if(mysqli_query($conect,$sqlActCategoria)){
    echo'<script type="text/javascript">alert("¡¡Categoría Actualizada satisfactoriamente!!");</script>';
    echo'<script type="text/javascript">window.location.href="Administrador.php";</script>';  
    exit();
  }else{
    echo'<script type="text/javascript">alert("Error al actualizar categoría ; (");</script>';
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