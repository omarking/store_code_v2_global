<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

@$reNombreU     = $_POST["txtNombreU"];
@$reApellido1U  = $_POST["txtApellido1U"];
@$reCorreoU     = $_POST["txtCorreoU"];
@$reContraU     = $_POST["txtCon1U"];
@$reConfContraU = $_POST["txtCon2U"];
  
 
//Procederemos a hacer una consulta que buscara el correo del usuario

if($reCorreoU != '') { 
    include("../model/conexion.php");
    echo ($reCorreoU);  
    $buscarCorreo = "CALL psFiltroCorreo('$reCorreoU')";   
    $resultado=mysqli_query($conect,$buscarCorreo);  
    //mysqli_close($conect);
    //echo ($resultado);
    if(mysqli_num_rows($resultado) > 0){

        echo "email already exists";
    
    }else{
        echo 'No existe';
        $string = "";
        $posible = "1234567890abcdefghijklmnopqrstuvwxyz_";
        $i = 0;
        while($i < 20){
            $char = substr($posible, mt_rand(0, strlen($posible)-1),1);
            $string .= $char;
            $i++;
        }
    echo ($reContraU);
    echo("/");
    echo("br");
    echo($reConfContraU);
    if($reContraU == $reConfContraU){
        echo "Contraseñas iguales";
        include("../model/conexion.php");         
        $consulta ="CALL psInsertUsuariov1('$reNombreU','$reApellido1U','$reCorreoU','$reContraU','$reConfContraU','$string');";
        if(mysqli_query($conect,$consulta)){
            $para = $_POST["txtCorreoU"];
            $emailU = $_POST["txtCorreoU"];

            $mail = new PHPMailer(true);

            try {
                //Server settings
                //$mail->SMTPDebug = 2;
                $mail->SMTPDebug = 4;                       //Enable verbose debug output
                $mail->isSMTP();         
                //                              //Protocolo para enviar 
                //$mail->Host       = 'smtp.hostinger.mx';  
                $mail->Host       = 'smtp.gmail.com';     
                //$mail->Host       = 'server.web-hosting.com';               
                $mail->SMTPAuth   = true;                                   //Correo desde donde se envia
                //$mail->Username   = 'miguel_dominguez@codewaymx.com';                     //SMTP username
                //$mail->Password   = 'Miguel2020*';                               //SMTP password
                //$mail->SMTPSecure = 'SSL/TLS';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                //$mail->Port       = 587;   
                //$mail->Username   = 'juliocecar.55@gmail.com'; 
                $mail->Username   = 'patolucas.bbl@gmail.com';                     //SMTP username
                $mail->Password   = 'BranBaLu981129';                    //SMTP username
                //$mail->Password   = 'subcampeon1997diciembre';                               //SMTP password
                //$mail->SMTPSecure = 'SSL/TLS';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                //$mail->SMTPSecure = 'TLS';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;  
                //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            
                //Recipients
                $mail->setFrom ('bran981129@gmail.com');
                $mail->addAddress($para);     //Correo a enviar 
                    
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Link de activacion de Cuenta en STORECODE'; //Asunto
                $mail->Body    = "<html lang ='es'>"
                                . "<head>"
                                . "<title>Link de activación de cuenta</title>"
                                . "<meta charset='utf-8' />"
                                . "</head>"
                                . "<body>"
                                . "Gracias por crear su cuenta en STORECODE, para poder hacer uso de la tienda debe activar su  "
                                . "usuario, haciendo clic en el siguiente enlace: <br>"
                                . "<a href='http://localhost:8080/storecode/controlador/link_activation.php?link=$string&email=$emailU'>"
                                //. "<a href='http://codewaymx.com/storecode/controlador/link_activation.php?link=$string&email=$emailU'>"                                                                    
                                . "¡Activar Cuenta!</a>"
                        //$mensaje .= "</body>"
                        . "</body>"
                         
                        . "</html>  ";                
                $mail->send();
                header("location:../login/login.php");
            } catch (Exception $e) {
                echo "Hubo un error Error: {$mail->ErrorInfo}";
            }
        }else{
            echo"<script>alert('fallo al agregar')</script>";
            echo "<script language='javascript'>window.location='../vistasCRUDRegistro/vistaAltaUsuario.php'</script>;";
        }
        mysqli_close($conect); 

    }else{
        echo"<script>alert('Las contraseñas debe coincidir')</script>";
        echo "<script language='javascript'>window.location='../vistasCRUDRegistro/vistaAltaUsuario.php'</script>;";  
        header("location:../vistasCRUDRegistro/vistaAltaUsuario.php");
        exit();        
    }
    }
}
?>