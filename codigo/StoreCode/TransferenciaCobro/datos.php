<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css" media="screen"/>
    <script type="text/javascript" src="../js/sweetalert2.all.min.js" charset="utf-8"></script>
</head>
</html>
<?php

    session_start();
    if(isset($_SESSION["Email"])) {
    
        $idUsu                  = $_SESSION["Iden"];
        $nombreUsuario          = $_POST["txtNombreU"];
        $claveInterbancaria     = $_POST["txtclaveInterb"];
        $numeroTarjeta          = $_POST["txtnumTarjeta"];
        $nombreBanco            = $_POST["txtnomBanco"];
        $numeroCuenta           = $_POST["numC"];

        include("../model/conexion.php");
        $tarjetacobro = "SELECT  * FROM transfcobro;";                                                                            
        $consultaCobro = mysqli_query($conect,$tarjetacobro);                                                                         
        while($rows                = mysqli_fetch_array($consultaCobro)){
            $idUsuarios            = $rows["idUsuario"];
            $nombreUsuariot        = $rows["nombreUsuario"];
            $claveInterbancariat   = $rows["claveInterbancaria"];
            $numeroTarjetat        = $rows["numeroTarjeta"];
            $numeroCuentap         = $rows["numeroCuenta"];
            $nombreBancot          = $rows["nombreBanco"];
        } 


        
        if($idUsuarios == $idUsu  && $nombreUsuariot == $nombreUsuario && $claveInterbancaria == $claveInterbancariat && $numeroTarjeta == $numeroTarjetat && $numeroCuentap == $numeroCuenta && $nombreBanco == $nombreBancot ){
            
            echo '<script type="text/javascript">Swal.fire("Error","¡¡Error al guardar, ya existe esta tarjeta de cobro!!", "error");window.location.href="../crudperfilusuario/perfil.php";</script>';
            exit();
        }elseif($nombreUsuario  == "" || $claveInterbancaria == "" || $numeroTarjeta == "" || $numeroCuenta == "" || $nombreBanco == ""){
            
            echo '<script type="text/javascript">Swal.fire("Error","¡¡Alguno de los campos está vacío!!", "error");window.location.href="../crudperfilusuario/perfil.php";</script>';
            exit();
        }else{
            $guardado ="INSERT INTO transfcobro(idUsuario,nombreUsuario,claveInterbancaria,numeroTarjeta,numeroCuenta,nombreBanco)
            VALUES('$idUsu','$nombreUsuario','$claveInterbancaria','$numeroTarjeta','$numeroCuenta','$nombreBanco')";
            if(mysqli_query($conect, $guardado)){
                echo '<script type="text/javascript">Swal.fire("Success","¡¡Tarjeta de cobro almacenada correctamente!!", "success");window.location.href="../crudperfilusuario/perfil.php";</script>';
                exit();
            }else{
                echo "error: ".$guardado."<br>". mysqli_error($conect);
            }
        }
        mysqli_close($conect);

    }else{
        echo "sesion incorrecta";
    }
?>
