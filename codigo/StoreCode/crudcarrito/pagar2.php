<?php
//Inicio de La sesion
session_start();  
if(isset($_SESSION["Email"])) {             
include("encriptacion.php"); 
include("mostrarcarrito.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
    <title>Pagar Compra</title> 
    <link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>                                        
    <link rel="stylesheet" href="../css\estiloproducto.css" type="text/css">
    <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
</head>
<body>    
<!--NAV-->
<!-- <nav class="navbar navbar-dark bg-dark text-white"> -->
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
                                                <img class="rounded-circle" src="<?php echo '../crudperfilusuario/'.$row[0];?>" alt=".." width="50" height="50">  
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
                                <!--href="./crudcarrito\vistaaltacarrito.php"-->                
                                <a class="nav-link active  text-info" aria-current="page">
                                    <i class="fas fa-cart-plus fa-3x "></i>Carrito(<?php 
                                    echo ($aux);
                                    //echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                                    ?>)</a>
                    </li>
                    <li class="nav-item">
                    <!--<a class="nav-link active  text-light" aria-current="page" href="../pruebasecion.php"><i class="fas fa-undo-alt"></i>   Regresar</a>-->
                    </li>              
                </ul>
            </div>
        </div>
    </nav>
<!--FIN NAV-->
    <br>
    <br>
<!--Cuerpo de la pagina-->
    
<?php
$email = ($_SESSION["Email"]) ;
if($_POST){    
    $total=0;
    $SID = session_id();
    //echo $SID ."<br>";      
    foreach(($_SESSION['CARRITO2']) as $indice=>$producto){   //Recolecta los prodcutos dentro del carrito              
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
    foreach(($_SESSION['CARRITO2']) as $indice=>$producto){//recorremos los prouctos que tenemos en el carrito de compras                            
        //Insercion del Detalle de la Venta
        include("../model/conexion.php");                       
        $insertCarrito ="CALL psInsCarrito('$idVenta','{$producto['id']}','{$producto['precio']}','{$producto['cantidad']}');";                           
        mysqli_query($conect,$insertCarrito);                                               
        mysqli_close($conect);  
    }

    foreach(($_SESSION['CARRITO2']) as $indice=>$producto){//recorremos los prouctos que tenemos en el carrito de compras                            
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


<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $clien;?>&currency=MXN"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
    </script>

<div class="jumbotron text-center">
    <h1 class="display-4">!Paso Final!</h1>
    <hr class="my-4"></hr>
    <p class="lead">Estas a punto de pagar con paypal la cantidad de:
    <h4><i class="fas fa-dollar-sign"></i> <?php echo number_format($total,2);?></h4></p>        
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>    
</div>



<!--Fin del Cuerpo de la pagina-->    
<br>
<br>
<!--Piede de pagina-->    
<footer>
    <!--<div class="container-fluid bg-dark text-white text-center p-5">-->
    <div class="container-fluid  text-white text-center p-5">
        <p>&copy; Todos los derechos reservados :: Empresa CODEWAY 2020</p>
    </div>
</footer>
<!-- Fin Piede de pagina-->    
        
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        
        <!--Codigo Paypal-->
<script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $total;?>',
                description:"Compra de productos STORECODE: $ <?php echo number_format($total,2);?>",
                custom:"<?php echo $SID;?>#<?php echo openssl_encrypt($idVenta,COD,KEY);?>"//Identificar cual es la venta y cual es la secion que se utilizo
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
              console.log(details);
              //status: "COMPLETED"
              if(details.status == 'COMPLETED'){
                //alert('Transaction completed by ' + details.payer.name.given_name);
                window.location="verificador.php?idVenta=<?php echo $idVenta;?>&metodo=paypal";
              }                
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
<!--Fin Codigo Paypal-->
</body>
</html>



<?php
//Fin de la condicion de la sesion
}else{
    echo "Sesion Incorrecta";
    }
//Fin de la condicion de la sesion
?>
