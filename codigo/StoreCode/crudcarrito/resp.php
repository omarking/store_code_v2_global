<?php
    //Inicio de La sesion
session_start();  
if(isset($_SESSION["Email"])) {             
    include("../crudcarrito/encriptacion.php"); 
    include("../crudcarrito/mostrarcarrito.php"); 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
        <title>Pagar Con Mercado Pago</title> 
        <link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>                                        
        <link rel="stylesheet" href="../css\estiloproducto.css" type="text/css">
        <link rel="stylesheet" href="../css\index.css" type="text/css">
        <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script type="text/javascript" src="../js/index.js" defer></script>
        

    </head>

    <body>
        <main>
            <nav class="navbar  text-white">
                <div class="container-fluid p-7">        
                    <div class="col-sm-2">
                        <img src="../img\utilidades\storetransblan.png" width="200" height="200" class="img-fluid" >
                    </div>                
                    <div class="col-sm-5 text-wrap">             
                        <p  class="navbar-brand"><H2>Pagar Compra</H2></p>         
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
                        </ul>
                    </div>
                </div>
            </nav>
                
            <!-- Hidden input to store your integration public key -->
            <input type="hidden" id="mercado-pago-public-key" value="TEST-ece54f90-a71f-4b6d-941a-f214b3e3891f">

            <!-- Shopping Cart -->
            <section class="shopping-cart dark">
            <?php
                $email = ($_SESSION["Email"]) ;
                if($_POST){    
                    $total=0;
                    $SID = session_id();
                    //echo $SID ."<br>";      
                    foreach(($_SESSION['CARRITO']) as $indice=>$producto){   //Recolecta los prodcutos dentro del carrito              
                        $total=$total+($producto['precio']*$producto['cantidad']);
                    }
                        //Insercion de la Venta
                        include("../model/conexion.php");                  
                        $insertVenta ="CALL psInsVenta('$SID','iofjweojf','$email','$total');";           
                        $ejecutaVenta=mysqli_query($conect,$insertVenta);                                     
                        //$idVenta = last_insert_id($ejecutaVenta);//ID del insert de la ultima venta        
                        mysqli_close($conect); 
                        //Fin Insercion de la Venta
                        //Consulta Para saber cual es la ultima venta          
                        include("../model/conexion.php");                                  
                        $rs = mysqli_query($conect, "SELECT MAX(FolioVenta) AS id FROM venta;");
                        if ($row = mysqli_fetch_row($rs)) {
                        $idVenta = trim($row[0]);        
                        }                   
                        //echo "id ->". $idVenta;        
                        mysqli_close($conect);  
                        //Fin de Consulta Para saber cual es la ultima venta
                    foreach(($_SESSION['CARRITO']) as $indice=>$producto){//recorremos los prouctos que tenemos en el carrito de compras                            
                        //Insercion del Detalle de la Venta
                        include("../model/conexion.php");                       
                        $insertCarrito ="CALL psInsCarrito('$idVenta','{$producto['id']}','{$producto['precio']}','{$producto['cantidad']}');";                           
                        mysqli_query($conect,$insertCarrito);                                               
                        mysqli_close($conect);  
                    }

                    foreach(($_SESSION['CARRITO']) as $indice=>$producto){//recorremos los prouctos que tenemos en el carrito de compras                            
                        $producto['id'] ;
                        $idProductoC = $producto['id'] ;
                    }

                    
                    include("../model/conexion.php");                       
                    $MosClienPay ="CALL psMosIDpCPAl('$idProductoC');";                           
                    $resulMosClienPay =mysqli_query($conect,$MosClienPay);                                               
                    mysqli_close($conect);    
                    while($rowMCP=mysqli_fetch_row($resulMosClienPay)){
                            $clien = $rowMCP[0];
                    }


                    
                }          
                ?>
                <div class="jumbotron text-center">
                    <h1 class="display-4">!Paso Final!</h1>
                    <hr class="my-4"></hr>
                    <p class="lead">Estas a punto de pagar con mercado pago la cantidad de:
                    <h4><i class="fas fa-dollar-sign"></i> <?php echo number_format($total,2);?></h4></p>        
                    <button class="btn btn-primary btn-lg btn-block" id="checkout-btn">Pagar con la tarjeta:</button>
                    <br>
                    <a href="../mercadoPago/AgregarTarjeta.php">Agregar una nueva Tarjeta</a>

                </div>

            </section>
            <!-- Payment -->
            <section class="payment-form dark">
                <div class="container__payment">
                    <div class="block-heading">
                        <h2>Card Payment</h2>
                        <p>This is an example of a Mercado Pago integration</p>
                    </div>
                    <div class="form-payment">
                        <div class="products">
                            <h2 class="title">pagaras la cantidad de:</h2>
                            <div class="item">
                                <span class="price" id="summary-price"></span>
                                <p class="item-name">Book x <span id="summary-quantity"></span></p>
                            </div>
                            <div class="total"><?php echo $total?><span class="price" id="summary-total"></span></div>
                        </div>
                        <div class="payment-details">
                            <form id="form-checkout">
                                <h3 class="title">Buyer Details</h3>
                                <div class="row">
                                    <div class="form-group col">
                                        <input id="form-checkout__cardholderEmail" name="cardholderEmail" type="email" class="form-control"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-5">
                                        <select id="form-checkout__identificationType" name="identificationType" class="form-control"></select>
                                    </div>
                                    <div class="form-group col-sm-7">
                                        <input id="form-checkout__identificationNumber" name="docNumber" type="text" class="form-control"/>
                                    </div>
                                </div>
                                <br>
                                <h3 class="title">Card Details</h3>
                                <div class="row">
                                    <div class="form-group col-sm-8">
                                        <input id="form-checkout__cardholderName" name="cardholderName" type="text" class="form-control"/>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <div class="input-group expiration-date">
                                            <input id="form-checkout__cardExpirationMonth" name="cardExpirationMonth" type="text" class="form-control"/>
                                            <span class="date-separator">/</span>
                                            <input id="form-checkout__cardExpirationYear" name="cardExpirationYear" type="text" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-8">
                                        <input id="form-checkout__cardNumber" name="cardNumber" type="text" class="form-control"/>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <input id="form-checkout__securityCode" name="securityCode" type="text" class="form-control"/>
                                    </div>
                                    <div id="issuerInput" class="form-group col-sm-12 hidden">
                                        <select id="form-checkout__issuer" name="issuer" class="form-control"></select>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <select id="form-checkout__installments" name="installments" type="text" class="form-control"></select>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="hidden" id="amount" />
                                        <input type="hidden" id="description" />
                                        <br>
                                        <button id="form-checkout__submit" type="submit" class="btn btn-primary btn-block">Pay</button>
                                        <br>
                                        <p id="loading-message">Loading, please wait...</p>
                                        <br>
                                        <a id="go-back">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 10 10" class="chevron-left">
                                                <path fill="#009EE3" fill-rule="nonzero"id="chevron_left" d="M7.05 1.4L6.2.552 1.756 4.997l4.449 4.448.849-.848-3.6-3.6z"></path>
                                            </svg>
                                            Go back to Shopping Cart
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Result -->
            <section class="shopping-cart dark">
                <div class="container container__result">
                    <div class="block-heading">
                        <h2>Payment Result</h2>
                        <p>This is an example of a Mercado Pago integration</p>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="items product info product-details">
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-4 product-detail">
                                            <div class="product-info">
                                                <br>
                                                <p><b>ID: </b><span id="payment-id"></span></p>
                                                <p><b>Status: </b><span id="payment-status"></span></p>
                                                <p><b>Detail: </b><span id="payment-detail"></span></p>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            <div class="footer_logo"><img id="horizontal_logo" src="../img/horizontal_logo.png"></div>
                <div class="footer_text">
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