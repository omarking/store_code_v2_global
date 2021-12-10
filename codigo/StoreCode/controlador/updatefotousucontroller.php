<?php
session_start();
if(isset($_SESSION["Email"])) {
    //Variables de sesion
include("../model\updateimagenusuariomodel.php");//Modelo
//Extraccion de Variables
$identU = ($_SESSION["Iden"]);

@$imgUsuarioAct = $_POST["foto_actual"];
@$imgRemove = $_POST['foto_remove'];

$upd='';
//Fin Extraccion de Variables

@$foto    =  $_FILES['foto'];
//@$foto       =  $_FILES["foto"]["name"];//array de la imagen
//@$foto1       =  $_FILES["foto"];//array de la imagen
$nombreFoto =  $foto['name'];
$type   =  $foto['type'];
@$urlTemp = $foto['tmp_name'];


//Cambiar Datso de la imagen y ruta de almacenamiento

if($nombreFoto != ''){
    $destino = '../crudperfilusuario/img/clientes/';//Ruta donde almacena la foto
    $imgNombre = 'cliente'.date('d-m-Y_Hms').'.jpg';// Se le agrega un npmbre aleatorio a la foto
    $imgCliente = 'img/clientes/'.$imgNombre; // Las imagenes se almacenaran con formato jpg -> Se utiliza para
    $src =  $destino.$imgNombre;// alamacena el destino y ala vez el nombre de la foto
}else{
    if($imgUsuarioAct != $imgRemove){
        $imgCliente = 'img/definida/user.png';

    }
}

//FinCambiar Datso de la imagen y ruta de almacenamiento

// Creacion de Array datos almacenar

$datosUpdimgU = array(
    $identU,
    @$imgCliente
);

$objModimgUsuario = new ModificarimgUsuario();

if($objModimgUsuario->updateimgUsuario($datosUpdimgU)==1){
        if(($nombreFoto != '' && ($imgUsuarioAct != 'img/clientes/user.png')) || (($imgUsuarioAct != $imgRemove))){
            unlink('../crudperfilusuario/'.$imgUsuarioAct);
        }

        if($nombreFoto != ''){
            move_uploaded_file($urlTemp,$src);//Almacena la imagen en la ruta espesificada
            header("Status: 301 Moved Permanenty");
            echo "Se modificacion la imagen de perfil exitosamente!";
            header("location:../crudperfilusuario/perfil.php");
        }
    exit();
}else{
    echo "Fallo al agregar";
    $aler='<p class="alert alert-danger" role="alert"> Fallo alojar producto :(</p>';
}
// Fin Creacion de Array datos almacenar

//Fin de la condicion de la sesion
}else{
    echo "Sesion Incorrecta";
    echo "Redireccionar al index";
    }
//Fin de la condicion de la sesion
?>
