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
                <script type="text/javascript" src="../js/sweetalert2.all.min.js" charset="utf-8"></script>
                <link rel="stylesheet" href="../css\index.css" type="text/css">
                
            </head>
            <body>
            </body>
        </html>
<?php
    $idTransferencia = $_GET["idTransferencia"];

    include("../model\conexion.php"); 
    $consultaDelete                 = "DELETE FROM transfCobroStoreCode WHERE idTransferencia=$idTransferencia;";                                                                            
    //$consulTransferencia           = mysqli_query($conect,$consultaDelete);

    if(mysqli_query($conect,$consultaDelete)){
        echo'<script type="text/javascript">                        
                Swal.fire({
                    title: "¡¡Hecho!!",
                    text: "¡¡Los datos se han Eliminado correctamente!!",
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