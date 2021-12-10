<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css" media="screen"/>
    <script type="text/javascript" src="../js/sweetalert2.all.min.js" charset="utf-8"></script>
</head>
</html>
<?php
    //Inicio de La sesion
    session_start();  
    if(isset($_SESSION["Email"])) {  

        /*Imagen */
        $usuarioCompro  = $_SESSION["Iden"];
        @$urlTemp       = $_FILES['comprobante']['tmp_name'];
        @$foto          = $_FILES['comprobante']['name'];
        $comprobante    = $_FILES["comprobante"];
        $nombreFoto     = $comprobante['name'];
        $type           = $comprobante['type'];
        
        $folioventa     = $_POST["foliovent"];
        //echo($folioventa);
    

        if($nombreFoto != ''){
            $destino            = '../img/comprobante_pago/';
            $imgNombre          = $usuarioCompro.'-'.'imgComprobante-'.date('d-m-Y_Hms');// Se le agrega un npmbre aleatorio a la foto
            $imgComprobante     = $imgNombre .'.jpg'; // Las imagenes se almacenaran con formato jpg -> Se utiliza para
            $imgComprobanteI    = 'img/comprobante_pago/'. $imgComprobante;
            $src                =  $destino.$imgComprobante;// alamacena el destino y ala vez el nombre de la foto
        

            include("../model/conexion.php");
            $consultComprobante ="UPDATE venta SET ImgComprobante = '$imgComprobanteI' WHERE FolioVenta = $folioventa and idUsuario = $usuarioCompro;";           
            if(mysqli_query($conect,$consultComprobante)){
                move_uploaded_file($urlTemp,$src);
                echo'<script type="text/javascript">Swal.fire("¡¡Hecho!!","¡¡Comprobante de pago almacenado correctamente!!", "success");window.location.href="../crudperfilusuario/perfil.php";</script>';
                exit();
            }else{
                echo'<script type="text/javascript">Swal.fire("¡¡Lo siento!!","¡¡Fallo al agregar el comprobante de pago!!", "error");window.location.href="../crudperfilusuario/perfil.php";</script>';
                exit();
                echo "Error: " . $consultComprobante . "<br>" . mysqli_error($conect);
            }                                       
            mysqli_close($conect); 
        }else if($nombreFoto == ''){
            echo'<script type="text/javascript">Swal.fire("¡¡Ocrrio un error!!","¡¡No has agregado el comprobante de pago!!", "error");window.location.href="../crudperfilusuario/perfil.php";</script>';
            exit();
        }else{
            echo'<script type="text/javascript">Swal.fire("¡¡Lo siento!!","¡¡Fallo al agregar el comprobante de pago!!", "error");window.location.href="../crudperfilusuario/perfil.php";</script>';
            exit();
        }  

    }else{
       // echo '<script type="text/javascript">Swal.fire("¡¡Lo siento!!","¡¡Aún no has iniciado sesión seras dirijido al login", "error");window.location.href="../login/login.php";</script>';
       echo '<script type="text/javascript">
        Swal.fire({
            title: "¡¡Lo siento!!",
            text: "¡¡Aún no has iniciado sesión serás dirigido al Login!!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "ok",
            cancelButtonText: "cancel",
            allowOutsideClick: false
        }).then((result) => {
            if (result.dismiss !== "cancel") {
                window.location.href="../login/login.php";
            }
            if (result.dismiss == "cancel") {
                window.location.href="../index.php";
            }
        })
            
        </script>';
    }
?>


