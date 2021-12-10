<?php
    //Inicio de La sesion
session_start();  
if(isset($_SESSION["Email"])){

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
        <title>Pago por Transferencia</title> 
        <link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>                                        
        <link rel="stylesheet" href="../css\estiloproducto.css" type="text/css">
        <link rel="stylesheet" href="../css\index.css" type="text/css">
        <link rel="stylesheet" href="../css\imagen.css" type="text/css">
        <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    </head>

    <body>
        <main>
            <nav class="navbar  text-white">
                <div class="container-fluid p-7">        
                    <div class="col-sm-2">
                        <img src="../img\utilidades\storetransblan.png" width="200" height="200" class="img-fluid" >
                    </div>                
                    <div class="col-sm-5 text-wrap">             
                        <p  class="navbar-brand"><H2>Pago por Transferencia</H2></p>         
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
                                ?>)
                                </a>
                            </li>             
                        </ul>
                    </div>
                </div>
            </nav>
            <section class="payment-form dark">
                <div class="jumbotron text-center">                                    
                    <div class="form-payment">
                        <form method ="POST" action ="datos.php">
                            <br>
                            <br>
                            <div class="card-body text-info">
                                <b>
                                    <label for="inputNombre">Nombre completo:</label>
                                </b>
                                <input type="text" class="form-control" id="inputNombre" name="txtNombreU" placeholder="nombre(s) y apellidos" >
                                <br>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <b>
                                            <label for="claveInterbanc">Clave interbancaria:</label>
                                        </b>
                                        <input type="text" class="form-control" id="claveInterbanc" name="txtclaveInterb" placeholder="Clave interbancaria" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <b>
                                            <label for="inputnumTarjeta">Número de tarjeta:</label>
                                        </b>
                                        <input type="numeTarjeta" class="form-control" name="txtnumTarjeta"  id="inputnumTarjeta" placeholder="número de tarjeta" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <b>
                                            <label for="inputnomBanco">Nombre del banco:</label>
                                        </b>
                                        <input type="nomBanc" class="form-control" name="txtnomBanco" id="inputnomBanco">
                                    </di>
                                </div>
                                <b>
                                    <label for="numcuenta">Numero de Cuenta:</label>
                                </b>
                                <input type="text" class="form-control" id="numC" name="numC" placeholder="Número de Cuenta" >
                                <br>
                                <br>
                                <!--Botones-->
                                <div class="form-group col-md-12">
                                    <input type="submit" class="btn boton_crear text-black nav1" name="guardar" value="Guardar">
                                </div>   
                                <div class="img">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="container-fluid  text-white text-center p-5">
                <h6>&copy; Todos los derechos reservados :: Empresa CODEWAY 2020</h6>
            </div>
        </footer>
    </body>
</html>

<?php
//Fin de la condicion de la sesion
}else{
    echo "Sesion Incorrecta";
}
//Fin de la condicion de la sesion
?>

