<?php 
session_start();
if(isset($_SESSION["nombreUsuario"])) {    
  
$txtCategoria = $_POST["txtCategoriN"];
//echo $txtCategoria;
include("../model/conexion.php");
$sqlInsCta ="CALL psInsertCategoria('$txtCategoria');";
if(mysqli_query($conect,$sqlInsCta)){
    echo'<script type="text/javascript">alert("¡¡Categoría insertada satisfactoriamente!!");</script>';
    echo'<script type="text/javascript">window.location.href="Administrador.php";</script>';  
    exit();
  }else{
    echo'<script type="text/javascript">alert("Error al insertar categoría ; (");</script>';
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