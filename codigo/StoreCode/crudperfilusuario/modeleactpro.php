<?php
//Inicio de La sesion
session_start();
if(isset($_SESSION["Email"])) {
    $idPact=$_POST['txtidProducto'];
    $nomPact=$_POST['txtNomActPr'];
    $desPact=$_POST['txtDesActPr'];
    $marcPact=$_POST['cmbMarcaActPr'];
    $categoriPact=$_POST['cmbCategoriaActPr'];
    $cantidad=$_POST['txtCanActPr'];
    $precio=$_POST['txtPrecioActPr'];
    @$fotoActual=$_POST['foto_actual'];
    @$fotoRemove=$_POST['foto_remove'];

    /*Imagen */
    @$foto    =  $_FILES['foto'];
    $nombreFoto =  $foto['name'];
    $type   =  $foto['type'];
    @$urlTemp = $foto['tmp_name'];

    if($nombreFoto != ''){
        $destino = '../img/productos/';//Ruta donde almacena la foto
        $imgNombre = 'actProduct'.date('d-m-Y_Hms').'.jpg';// Se le agrega un npmbre aleatorio a la foto
        @$imgProducto = 'img/productos/'.$imgNombre; // Las imagenes se almacenaran con formato jpg -> Se utiliza para
        $src =  $destino.$imgNombre;// alamacena el destino y ala vez el nombre de la foto
        //echo $src ." SRC <br>";
    }else{
        if(@$fotoActual != @$fotoRemove){
            @$imgProducto = 'img/definidop/cajaProducto.jpg';
            //echo $imgProducto ." Default <br>";
        }
    }
    /*Imagen */
    include("../model/conexion.php");
        $sqlActuPro ="CALL psActualizarProdcuto('$nomPact','$desPact','$precio','$imgProducto','$cantidad','$marcPact','$categoriPact','$idPact');";
        if(mysqli_query($conect,$sqlActuPro)){
            if(($nombreFoto != '' && ($fotoActual != 'img/definidop/cajaProducto.jpg')) || (($fotoActual != $fotoRemove))){
                    unlink('../'.$fotoActual);
            }
            if( $nombreFoto != ''){
                move_uploaded_file($urlTemp,$src);//Almacena la imagen en la ruta espesificada
                header("Status: 301 Moved Permanenty");
                echo'<script type="text/javascript">alert("¡¡El producto se Actualizo con éxito!!");window.location.href="perfil.php";</script>';
            }
            exit();
  		}else{
            echo'<script type="text/javascript">alert("Error al Actualizar Intenlalo mas tarde");window.location.href="perfil.php";</script>';
            exit();
  		}
  		mysqli_close($conect);


}

?>
