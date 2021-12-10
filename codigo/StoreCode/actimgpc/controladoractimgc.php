<?php
session_start();
if(isset($_SESSION["Email"])) {
    @$idProduct = $_POST['txtIdProducto'];
    @$img3 =  $_POST['txtImgAnte'];
    @$img1 = $_POST['txtImgAnte1'];
    @$img2 = $_POST['txtImgAnte2'];
    @$img4 = $_POST['txtImgAnte4'];

        include("../model/conexion.php");
        $query="SELECT * FROM imgproducto WHERE imgproducto.idProducto = '$idProduct';";
        $sql=mysqli_query($conect, $query);
        mysqli_close($conect);
        $imag=mysqli_fetch_assoc($sql);

    @$archivo1 = $_FILES["img_natural1"]["tmp_name"];
    @$nombreArchivo1 = $_FILES["img_natural1"]["name"];

    @$archivo2 = $_FILES["img_natural2"]["tmp_name"];
    @$nombreArchivo2 = $_FILES["img_natural2"]["name"];

    @$archivo3 = $_FILES["img_natural3"]["tmp_name"];
    @$nombreArchivo3 = $_FILES["img_natural3"]["name"];

    @$archivo4 = $_FILES["img_natural4"]["tmp_name"];
    @$nombreArchivo4 = $_FILES["img_natural4"]["name"];



    if ($nombreArchivo1 == "") {
        @$imgProducto1= $imag['img1'];//Insertar
      }else{
        $c=rand(100,3000);
        @$destino1 = "../img/productos/";
        @$imgNombre1 = 'actpro1'.date('dmYHms').$c.'.jpg';
        @$imgProducto1 = 'img/productos/'.$imgNombre1;//Insertar
        @$src1N =  $destino1.$imgNombre1;//Ruta
        unlink($img1);
        move_uploaded_file($archivo1,$src1N);
    }

    if ($nombreArchivo2 == "") {
        @$imgProducto2= $imag['img2'];//Insertar
      }else{
        $b=rand(100,3000);
        @$destino2 = "../img/productos/";
        @$imgNombre2 = 'actpro2'.date('dmYHms').$b.'.jpg';
        @$imgProducto2 = 'img/productos/'.$imgNombre2;//Insertar
        @$src2N =  $destino2.$imgNombre2;//Ruta
        unlink($img2);
        move_uploaded_file($archivo2,$src2N);
    }

    if ($nombreArchivo3 == "") {
        @$imgProducto3 = $imag['img3'];//Insertar
      }else{
        $d=rand(100,3000);
        @$destino3 = "../img/productos/";
        @$imgNombre3 = 'actpro4'.date('dmYHms').$d.'.jpg';
        @$imgProducto3 = 'img/productos/'.$imgNombre3;//Insertar
        @$src3N =  $destino3.$imgNombre3;//Ruta
        unlink($img3);
        move_uploaded_file($archivo3,$src3N);
    }

    if ($nombreArchivo4 == "") {
        @$imgProducto4 = $imag['img4'];//Insertar
      }else{
        $a=rand(100,3000);
        @$destino4 = "../img/productos/";
        @$imgNombre4 = 'actpro4'.date('dmYHms').$a.'.jpg';
        @$imgProducto4 = 'img/productos/'.$imgNombre4;//Insertar
        @$src4N =  $destino3.$imgNombre4;//Ruta
        unlink($img4);
        move_uploaded_file($archivo4,$src4N);
    }

        include("../model/conexion.php");
        $sqlActuImgPro ="UPDATE imgproducto SET imgproducto.img1 = '$imgProducto1',
                    imgproducto.img2 = '$imgProducto2',
                    imgproducto.img3 = '$imgProducto3',
                    imgproducto.img4 = '$imgProducto4'
                    WHERE imgproducto.idProducto = '$idProduct';";
        if(mysqli_query($conect,$sqlActuImgPro)){
            echo'<script type="text/javascript">alert("¡¡El producto se Actualizo con éxito!!");window.location.href="../agrimgp/masimg.php";</script>';
            header("location:../agrimgp/masimg.php");
            //
            
            exit();
  		}else{
            echo'<script type="text/javascript">alert("Error al Actualizar Intenlalo mas tarde");window.location.href="../agrimgp/masimg.php";</script>';  
            header("location:../agrimgp/masimg.php");
            exit();
  		}
  		mysqli_close($conect);
}
?>
