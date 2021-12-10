
<?php 

$servidor="localhost";
$usuario="root";
$contrasenia="1234";
$bd="storecode";
/*
    $conect = mysql_connect($this->host.'127.0.0.1:'.$this->port, $this->uname, $this->pw);
    */
    $conect = mysqli_connect($servidor,$usuario,$contrasenia,$bd)
    or die ("Error con la conexion");
   mysqli_query($conect,"SET NAMES'utf8'");
   
?>                                                                                                      