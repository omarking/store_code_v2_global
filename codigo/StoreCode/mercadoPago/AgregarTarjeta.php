<?php
    //Inicio de La sesion
session_start();  
if(isset($_SESSION["Email"])) {             
    include("../crudcarrito/encriptacion.php"); 
    include("../crudcarrito/mostrarcarrito.php"); 

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
        <title>Agrega tu Tarjeta</title> 
        <link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>                                        
        <link rel="stylesheet" href="../css\estiloproducto.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css" media="screen"/>
        <script type="text/javascript" src="../js/sweetalert2.all.min.js" charset="utf-8"></script>
        <script type="text/javascript" src="../js/validation.js" charset="utf-8"></script>
    </head>

    <body>
        <main>
            <nav class="navbar  text-white">
                <div class="container-fluid p-7">        
                    <div class="col-sm-2">
                    
                        <img src="../img\utilidades\storetransblan.png" width="200" height="200" class="img-fluid" >
                    </div>                
                    <div class="col-sm-5 text-wrap">             
                        <p  class="navbar-brand"><H2>Vincula tu Tarjeta</H2></p>         
                    </div>
                    <div class="col-sm-5">
                        <ul class="nav text-white">
                            <li class="nav-item">
                            <a class="nav-link active  text-light" aria-current="page" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active cerrar" aria-current="page" href="../login\cerrarSesion.php">Cerrar Sesion</a>                    
                            </li>
                            <li class="nav-item">                                        
                                <?php
                                                $identificador = ($_SESSION["Iden"]);
                                                //$identificador = 11;
                                                //echo ; 
                                                include("../model/conexion.php");                
                                                $sqlimgP="CALL psImagenUsuarioPerfil('$identificador');";
                                                $resultadosqlimgP=mysqli_query($conect,$sqlimgP);                                                             
                                                while($row=mysqli_fetch_row($resultadosqlimgP)){
                                                    //CALL psImagenUsuarioPerfil(20);
                                        ?>  
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img class="rounded-circle" src="<?php echo './crudperfilusuario/'.$row[0];?>" alt=".." width="50" height="50">  
                                                    </div>
                                                    <div class="col-md-9">
                                                    <a class="nav-link active  text-info" aria-current="page" href="#"> <?php echo ($_SESSION["Nombre"]);?></a> 
                                                    </div>
                                                </div>
                                <?php                
                                    }
                                    mysqli_close($conect);                                          
                                ?>                                                                                   
                            </li>
                            <!--href="./crudcarrito\vistaaltacarrito.php"-->   
                            <li class="nav-item">   
                                
                                            <?php
                                            $aux = 0;
                                            $contCarrito1=0;
                                            $contCarrito2=0;
                                                //Si el carrito1 esta vacio
                                                if(!isset($_SESSION['CARRITO'])){
                                                    //Si el carrito2 esta vacio
                                                    $contCarrito1= 0;
                                                    if(!isset($_SESSION['CARRITO2'])){
                                                        $contCarrito2= 0;   
                                                    }else{
                                                        $contCarrito2= count($_SESSION['CARRITO2']);  
                                                    }
                                                }else{
                                                    $contCarrito1= count($_SESSION['CARRITO']);
                                                    //Si el carrito2 esta vacio
                                                    if(!isset($_SESSION['CARRITO2'])){
                                                        $contCarrito2 = 0;
                                                    }else{
                                                        $contCarrito2= count($_SESSION['CARRITO2']);
                                                    }
                                                }
                                                $aux = $contCarrito1 + $contCarrito2;
                                            ?>        

                                        <a class="nav-link active  text-info" aria-current="page">
                                            <i class="fas fa-cart-plus fa-3x "></i>Carrito(<?php 
                                            echo($aux);
                                            //echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                                            ?>)</a>
                            </li>
                            <li class="nav-item">
                        <!-- <a class="nav-link active  text-light" aria-current="page" href="../pruebasecion.php"><i class="fas fa-undo-alt"></i>   Regresar</a>-->
                            </li>              
                        </ul>
                    </div>
                </div>
            </nav>

            <section class="payment-form dark">
                <div class="jumbotron text-center">                                    
                    <div class="form-payment">
                        <div class="block-heading">
                            <h1>Datos de tu Tarjeta</h1>
                        </div>
                        <div class="payment-details">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                                    <div class="form-group col-sm-16">
                                        <label for="Ntarjeta">Número de Tarjeta</label>
                                        <input type="number" class="form-control" name="NumeroTarjeta" id="NumeroTarjeta" placeholder="Ingresa el número de tarjeta a 16 dijitos" min=16 maxlength="16" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                    
                                    <div class="form-group col-sm-18">
                                        <label for="Expiracion">Fecha de Expiración</label>
                                        <div class="input-group expiration-date">
                                            <input id="Mes" name="Mes"  type="number" class="form-control" placeholder="MMM" maxlength="2" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                                            <span class="date-separator">/</span>
                                            <input type="number" id="Ano" name="Ano" class="form-control" placeholder="YYY" maxlength="2" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-18">
                                        <label for="numerSeg">Código de seguridad </label>
                                        <input type="number" class="form-control" name="securityCode" id="securityCode" placeholder="Número de seguridad" maxlength="3" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                <button type="submit" class="btn btn-secondary" name="submit">AGREGAR</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="container-fluid  text-white text-center p-5">
                <p>&copy; Todos los derechos reservados :: Empresa CODEWAY 2020</p>
            </div>
        </footer>
    </body>
</html>

<?php

    if (isset($_POST["submit"])){
        include("../model\conexion.php"); 

        $pIdUsuario     = ($_SESSION["Iden"]);
        $pNumeroTarjeta = $_POST["NumeroTarjeta"];
        $pAnoExp        = $_POST["Ano"];
        $pMesExp        = $_POST["Mes"];
        $pCodidoSeg     = $_POST["securityCode"]; 


        $consultar = "SELECT * FROM metodopago";                                                                            
        $consulTar = mysqli_query($conect,$consultar);                                                                         
        while($row = mysqli_fetch_row($consulTar)){
            $idUsuario2       = $row[1];
            $NumeroTarjeta2   = $row[2];    
        }       
        if($idUsuario2 == $pIdUsuario && $NumeroTarjeta2 == $pNumeroTarjeta){
            echo'<script type="text/javascript">Swal.fire("Error","Ya existe esta tarjeta", "error");</script>';
        }elseif($pIdUsuario == ""|| $pNumeroTarjeta == "" ||$pAnoExp=="" || $pMesExp=="" || $pCodidoSeg==""){
            echo'<script type="text/javascript">Swal.fire("Error","Alguno de los campos está vacio", "error");</script>';
        }else{
            $agrega="CALL psInsertTarjeta('$pIdUsuario','$pNumeroTarjeta','$pAnoExp','$pMesExp','$pCodidoSeg');"; 
            if (mysqli_query($conect, $agrega)) {
                echo'<script type="text/javascript">Swal.fire("Success","Se ingreso tu nueva tarjeta", "success");</script>';
            }else {
                echo "Error: " . $agrega . "<br>" . mysqli_error($conect);
                    
            }
        }
        mysqli_close($conect);

    }
?>

<?php
//Fin de la condicion de la sesion
}else{
    echo "Sesion Incorrecta";
    }
//Fin de la condicion de la sesion
?>