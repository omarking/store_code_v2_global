<?php

//echo $_GET['link'];
$code = $_GET['link'];
//echo $_GET['email'];
$email = $_GET['email'];

        include("../model/conexion.php");    
        $consulta ="CALL psEmailConfirm('$code','$email');";  
        if(mysqli_query($conect,$consulta)){
            echo"<script>alert('Cuenta Activada Con Éxito!!!')</script>";
            echo "<script language='javascript'>window.location='../login/login.php'</script>;";
        }else{
            echo"<script>alert('A ocurrido un error ;( , Dar Clic una vez mas en el link de activación desde tu email…')</script>";
        }
        mysqli_close($conect);  
?>

