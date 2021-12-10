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

session_start();
if(isset($_SESSION["Email"])) {

    if (isset($_POST["submit"])){
        //conexion base de datos
        include("../model\conexion.php"); 
        $idUsuDireccion      = $_SESSION["Iden"];
        $codigoPostalUsuario = $_POST["CodigoPostalUsuario"];
        $estado              = $_POST["estado"];
        $municipio           = $_POST["municipio"];
        $colonia             = $_POST["colonia"];
        $callePrincipal      = $_POST["callePrincipal"];
        $numeroExterior      = $_POST["numeroExterior"];
        $calle1              = $_POST["calle1"];
        $calle2              = $_POST["calle2"];
        $referencia          = $_POST["referencia"];
        
        $consultarDirec = "SELECT * FROM direccion;";                                                                            
        $consultaDireccion = mysqli_query($conect,$consultarDirec);                                                                         
        while($rows             = mysqli_fetch_array($consultaDireccion)){
            $idUsuDirec         = $rows["idUsuario"];
            $CodigoPost         = $rows["codigoPostalUsuario"]; 
            $EstadoUsu          = $rows["estado"];
            $municipioUsu       = $rows["municipio"];
            $coloniaUsu         = $rows["colonia"];
            $callePrincipalUsu  = $rows["callePrincipal"];
            $numeroExteriorUsu  = $rows["numeroExterior"];
            $calle1Usu          = $rows["calle1"];
            $calle2Usu          = $rows["calle2"];
        } 

        if($idUsuDirec == $idUsuDireccion  && $CodigoPost == $codigoPostalUsuario && $EstadoUsu == $estado && $municipioUsu == $municipio && $coloniaUsu == $colonia && $callePrincipalUsu == $callePrincipal && $numeroExteriorUsu == $numeroExterior && $calle1Usu == $calle1 && $calle2Usu == $calle2 ){
            
            echo'<script type="text/javascript">Swal.fire("Error","Ya existe esta dirección", "error");window.location.href="../vistacrudproducto/vistaaltaproducto.php";</script>';
            exit();
        }elseif($codigoPostalUsuario == "" || $estado  == "" || $municipio == "" || $colonia == "" || $callePrincipal == "" || $numeroExterior == "" || $calle1 == "" || $calle2 == "" || $referencia == ""){
            
            echo'<script type="text/javascript">Swal.fire("Error","Alguno de los campos está vacio", "error");window.location.href="../vistacrudproducto/vistaaltaproducto.php";</script>';
            exit();
        }else{
            
            $sentencias="INSERT INTO direccion(idUsuario,codigoPostalUsuario,estado,municipio,colonia,callePrincipal,numeroExterior,calle1,calle2,referencia,statusDireccion)
            VALUES('$idUsuDireccion','$codigoPostalUsuario','$estado','$municipio','$colonia','$callePrincipal','$numeroExterior','$calle1','$calle2','$referencia','1')"; 

            if (mysqli_query($conect, $sentencias)) {

                echo'<script type="text/javascript">Swal.fire("Success","Se ingreso tu nueva dirección", "success");window.location.href="../vistacrudproducto/vistaaltaproducto.php";</script>';
                exit();
            }else {
                echo "Error: " . $sentencias . "<br>" . mysqli_error($conect);
                    
            }
        }
        mysqli_close($conect);
    }


}else{
    echo "Sesion Incorrecta";
    }
//Fin de la condicion de la sesion
?>