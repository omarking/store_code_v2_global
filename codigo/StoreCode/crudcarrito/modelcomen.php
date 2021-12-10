<?php 
@$comentario =$_POST['desComentario'];
@$idProducto=$_POST['txtipProducto'];
@$idUsuario =$_POST['txtipUsuario'];            
include("../model/conexion.php");                  
$sqlInsertCP ="CALL psInsertComenUsuario('$comentario','$idUsuario','$idProducto');";           
$ejeconsultaCP=mysqli_query($conect,$sqlInsertCP);              z                                         
mysqli_close($conect); 
if($ejeconsultaCP){                            
    //echo "<script> alert('".$var."'); </script>";    
    echo "<script> alert('Comentario Realizado con éxito!!'); </script>";
    header("location:venModal.php?idproducto=$idProducto");    
    
}else{    
    echo "";
}                       
?>