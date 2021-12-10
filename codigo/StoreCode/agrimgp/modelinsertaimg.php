<?php
session_start();              
if(isset($_SESSION["Email"])) {

@$idProInsert = $_POST["txtIdProducto"];

//Imahen 1
@$Imagen1    =  $_FILES['img_natural1'];
@$nombreImg1 =  $Imagen1 ['name'];
@$type1   =  $Imagen1 ['type'];
@$urlTemp1 = $Imagen1 ['tmp_name'];

if($nombreImg1 != ''){        
    @$destino1 = '../img/productos/';//Ruta donde almacena la foto    
    @$imgNombre1 = 'pro1'.date('dmYHms').'.jpg';// Se le agrega un npmbre aleatorio a la foto    
    @$imgProd1 = 'img/productos/'.$imgNombre1; // Las imagenes se almacenaran con formato jpg -> Se utiliza para 
    @$src1 =  $destino1.$imgNombre1;// alamacena el destino y ala vez el nombre de la foto            
    
}else{
    if($nombreImg1 == ''){
        @$imgProd1 = 'img/productos/productodefault.jpg';                
    }    
}
//Imageen 1

//Imahen 2
@$Imagen2    =  $_FILES['img_natural2'];
@$nombreImg2 =  $Imagen2['name'];
@$type2   =  $Imagen2['type'];
@$urlTemp2 = $Imagen2['tmp_name'];

if($nombreImg2 != ''){        
    @$destino2 = '../img/productos/';//Ruta donde almacena la foto    
    @$imgNombre2 = 'pro2'.date('dmYHms').'.jpg';// Se le agrega un npmbre aleatorio a la foto    
    @$imgProd2 = 'img/productos/'.$imgNombre2; // Las imagenes se almacenaran con formato jpg -> Se utiliza para 
    @$src2 =  $destino2.$imgNombre2;// alamacena el destino y ala vez el nombre de la foto            
    
}else{
    if($nombreImg2 == ''){
        @$imgProd2 = 'img/productos/productodefault.jpg';                
    }    
}
//Fin Imageen 2

//Imahen 3
@$Imagen3    =  $_FILES['img_natural3'];
@$nombreImg3 =  $Imagen3['name'];
@$type3   =  $Imagen3['type'];
@$urlTemp3 = $Imagen3['tmp_name'];


if($nombreImg3 != ''){        
    @$destino3 = '../img/productos/';//Ruta donde almacena la foto    
    @$imgNombre3 = 'pro3'.date('dmYHms').'.jpg';// Se le agrega un npmbre aleatorio a la foto    
    @$imgProd3 = 'img/productos/'.$imgNombre3; // Las imagenes se almacenaran con formato jpg -> Se utiliza para 
    @$src3 =  $destino3.$imgNombre3;// alamacena el destino y ala vez el nombre de la foto            
    
}else{
    if($nombreImg3 == ''){
        @$imgProd3 = 'img/productos/productodefault.jpg';                
    }    
}
//Fin Imageen 3

//Imahen 4
@$Imagen4    =  $_FILES['img_natural4'];
@$nombreImg4 =  $Imagen4['name'];
@$type4   =  $Imagen4['type'];
@$urlTemp4 = $Imagen4['tmp_name'];
if($nombreImg4 != ''){        
    @$destino4 = '../img/productos/';//Ruta donde almacena la foto    
    @$imgNombre4 = 'pro4'.date('dmYHms').'.jpg';// Se le agrega un npmbre aleatorio a la foto    
    @$imgProd4 = 'img/productos/'.$imgNombre4; // Las imagenes se almacenaran con formato jpg -> Se utiliza para 
    @$src4 =  $destino4.$imgNombre4;// alamacena el destino y ala vez el nombre de la foto            
    
}else{
    if($nombreImg4 == ''){
        @$imgProd4 = 'img/productos/productodefault.jpg';                        
    }    
}



        include("../model/conexion.php");                          
        $consultaaltp ="CALL psInserImgs('$idProInsert','$imgProd1','$imgProd2','$imgProd3','$imgProd4');";           
        return $ejeconsultaaltp=mysqli_query($conect,$consultaaltp);                                       
        if(mysqli_close($conect)){
        move_uploaded_file($urlTemp1,$src1);                
        move_uploaded_file($urlTemp2,$src2);                
        move_uploaded_file($urlTemp3,$src3);
        move_uploaded_file($urlTemp4,$src4);                
            echo'<script type="text/javascript">alert("¡¡Las imágenes del producto se insertaron correctamente!!");window.location.href="../crudperfilusuario/perfil.php";</script>';   
            exit();
      }else{                          
            echo'<script type="text/javascript">alert("¡¡Error al insertar las imágenes del producto!!");window.location.href="agreimgpro4.php";</script>';
            exit();  			
      }      
}    
?>