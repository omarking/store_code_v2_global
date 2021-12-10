<?php
    //Inicio de La sesion
    session_start(); 
    if(isset($_SESSION["Email"])) {

?>

        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">  
                <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css" media="screen"/>
                <script type="text/javascript" src="../js/sweetalert2.all.min.js" charset="utf-8"></script>
                        
            </head>
        </html>
<?php
            $idTransferencia    = $_POST['idTransferenciass'];
            $nombreCompañia     = $_POST['nombreCompañia'];
            $nombreBanco        = $_POST['nombreBanco'];
            $numeroTarjeta      = $_POST['numeroTarjeta'];
            $numeroCuenta       = $_POST['NumeroCuenta'];
            $ClaveInter         = $_POST['ClaveInter'];
                    

            if($idTransferencia != ''){
                    
                include("../model/conexion.php");
                $consultaupdate ="UPDATE transfCobroStoreCode SET nombreEmpresa = '$nombreCompañia', claveInterbancaria = '$ClaveInter', numeroTarjeta = '$numeroTarjeta', numeroCuenta = '$numeroCuenta', nombreBanco = '$nombreBanco'  WHERE idTransferencia = $idTransferencia";           
                if(mysqli_query($conect,$consultaupdate)){
                    echo'<script type="text/javascript">                        
                            Swal.fire({
                                title: "¡¡Hecho!!",
                                text: "¡¡Los datos se han actualizado correctamente!!",
                                type: "success",
                                showCancelButton: true,
                                confirmButtonText: "ok",
                                cancelButtonText: "cancel",
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.dismiss !== "cancel") {
                                    window.location.href="datos_tarjetaCodeWay.php";
                                }
                                if (result.dismiss == "cancel") {
                                    window.location.href="datos_tarjetaCodeWay.php";
                                }
                            })
                        </script>';
                        exit();
                }else{
                    echo'<script type="text/javascript">Swal.fire("¡¡Lo siento!!","¡¡Fallo al actualizar los datos de la tarjeta!!", "error");window.location.href="datos_tarjetaCodeWay.php";</script>';
                    exit();
                    echo "Error: " . $consultaupdate . "<br>" . mysqli_error($conect);
                }                                       
                mysqli_close($conect); 
            }else if($idTransferencia == ''){
                echo'<script type="text/javascript">Swal.fire("¡¡Ocrrio un error!!","¡¡No se detecto algún dato!!", "error");window.location.href="datos_tarjetaCodeWay.php";</script>';
                exit();
            }else{
                echo'<script type="text/javascript">Swal.fire("¡¡Lo siento!!","¡¡Fallo al actualizar!!", "error");window.location.href="datos_tarjetaCodeWay.php";</script>';
                exit();
            } 
    }else{
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