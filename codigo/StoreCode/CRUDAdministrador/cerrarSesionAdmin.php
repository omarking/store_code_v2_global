<?php
session_start();//Inicio de SESION
unset($_SESSION["nombreUsuario"]);
unset($_SESSION["idUsuario"]);
header("Status: 301 Moved Permanenty");
echo'<script type="text/javascript">alert("¡¡Has cerrado sesión con éxito!!");</script>';
echo'<script type="text/javascript">window.location.href="./loginAdm.php";</script>';      
exit();
 ?>