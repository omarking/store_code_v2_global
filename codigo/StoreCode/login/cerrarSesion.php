<?php
session_start();//Inicio de SESION
session_destroy();//cerrar una sesion
header("Status: 301 Moved Permanenty");
//header("location:login.php");
echo "<script language='javascript'>window.location='login.php'</script>;";
exit();
 ?>