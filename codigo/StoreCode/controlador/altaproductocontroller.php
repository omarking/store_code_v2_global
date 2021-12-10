<?php

session_start();
if(isset($_SESSION["Email"])) {
    
    $identU             = $_SESSION["Iden"];

    @$proNomPro         = $_POST["txtNonProduc"];
    @$proDesPro         = $_POST["txtDesProduct"];
    @$proMarcaPro       = $_POST["cmbMarcaP"];
    @$proCategoriaPro   = $_POST["cmbCategoriaP"];
    @$proCantidadPro    = $_POST["txtCanP"];
    @$proPrecioPro      = $_POST["txtPrecioU"];
    @$direccion         = $_POST['textarea'];
    $DirecUsu           = substr($direccion, 81, 100);
    @$razon             = $_POST["razon"];

   
    @$urlTemp           =  $_FILES["foto"]["tmp_name"];
    @$foto              =  $_FILES["foto"]["name"];//array de la imagen
    @$foto1             =  $_FILES["foto"];//array de la imagen
    $nombreFoto         =  $foto1['name'];
    $typeFoto           =  $foto1['type'];
     
   
       
        


    if($nombreFoto != ''){
        $destino = '../img/productos/';
        $imgNombre = 'imgProd'.date('d-m-Y_Hms');// Se le agrega un npmbre aleatorio a la foto
        $imgProducto = $imgNombre .'.jpg'; // Las imagenes se almacenaran con formato jpg -> Se utiliza para
        $imgProductoI = 'img/productos/'. $imgProducto;
        $src =  $destino.$imgProducto;// alamacena el destino y ala vez el nombre de la foto
    }
    if ($direccion=="" && $razon==""){
        echo'<script type="text/javascript">alert("¡¡Fallo al agregar  :( !!");window.location.href="../crudperfilusuario/perfil.php";</script>';
        exit();
    }else if($razon==""){
        include("../model/conexion.php");
        $consultaaltp ="CALL psInsertProducto2('$proNomPro','$proDesPro','$proPrecioPro','$proCantidadPro','$imgProductoI','$proMarcaPro','$proCategoriaPro','$identU','$DirecUsu');";           
        if(mysqli_query($conect,$consultaaltp)){
            move_uploaded_file($urlTemp,$src);
            echo'<script type="text/javascript">alert("¡¡Producto almacenado correctamente!!");window.location.href="../crudperfilusuario/perfil.php";</script>';
            exit();
        }else{
            echo'<script type="text/javascript">alert("¡¡Fallo al agregar  :( !!");window.location.href="../crudperfilusuario/perfil.php";</script>';
            exit();
            //echo "Error: " . $consultaaltp . "<br>" . mysqli_error($conect);
        }                                       
        mysqli_close($conect); 
    }else if($direccion==""){
        include("../model/conexion.php");
        $consultaPro3 ="CALL psInsertProducto3('$proNomPro','$proDesPro','$proPrecioPro','$proCantidadPro','$imgProductoI','$proMarcaPro','$proCategoriaPro','$identU','$razon');";           
        if(mysqli_query($conect,$consultaPro3)){
            move_uploaded_file($urlTemp,$src);
            echo'<script type="text/javascript">alert("¡¡Producto almacenado correctamente!!");window.location.href="../crudperfilusuario/perfil.php";</script>';
            exit();
        }else{
            echo'<script type="text/javascript">alert("¡¡Fallo al agregar  :( !!");window.location.href="../crudperfilusuario/perfil.php";</script>';
            exit();
            //echo "Error: " . $consultaPro3 . "<br>" . mysqli_error($conect);
        }                                       
        mysqli_close($conect);
    }
    
    
            
}else{
    echo "Sesion Incorrecta";
    }
//Fin de la condicion de la sesion
?>
