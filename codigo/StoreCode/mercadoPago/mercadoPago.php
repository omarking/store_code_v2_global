<?php
    //Inicio de La sesion
session_start();  
if(isset($_SESSION["Email"])) {             
    
    $total               = 0;
    $productoo           = "";

    $nombrefedex         = "";
    $numeroTelefonoFedex = "";
    $pais                = "";
    $estado              = "";
    $ciudad              = "";
    $codigoPostal        = "";
    $colonia             = "";
    $callePrincipal      = "";
    $calle1              = "";
    $calle2              = "";
    $referencia          = "";
    
    
    if(isset($_POST['enviarbtn'])){
        $nombrefedex         = $_POST['nombreComprador'];
        $numeroTelefonoFedex = $_POST['numeroTelefono'];
        $pais                = $_POST['pais'];
        $estado              = $_POST['estado'];
        $ciudad              = $_POST['ciudad'];
        $codigoPostal        = $_POST['codigoPostal'];
        $colonia             = $_POST['colonia'];
        $callePrincipal      = $_POST['callePrincipal'];
        $calle1              = $_POST['calle1'];
        $calle2              = $_POST['calle2'];
        $referencia          = $_POST['referencia'];
       
    }
    $SID = session_id();
    //echo $SID ."<br>";      
    foreach(($_SESSION['CARRITO']) as $indice=>$producto){ //Recolecta los prodcutos dentro del carrito              
        $total=$total+($producto['precio']*$producto['cantidad']);
        $productoo = $producto['nombre'];
    }


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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script type="text/javascript" src="../js/funciones.js" defer></script>
        
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
                        <form  method="POST" action="mercadoPago.php">
                            <div class="block-heading">
                                <h2>Tus tarjetas disponibles</h2>
                            </div>
                            
                            <select style="width:250px;" name="tarjetas" id="tarjetas" class="custom-select mb-15">
                                <option selected>Selecciona tu tarjeta de pago</option>
                                <?php 
                                    $idUsuarioss = $_SESSION["Iden"];
                                    include("../model\conexion.php");                                 
                                    $optionTarje = "SELECT  * FROM metodopago WHERE idUsuario='$idUsuarioss';";                                                                            
                                    $tarjetaoption = mysqli_query($conect,$optionTarje);                                                                         
                                    mysqli_close($conect); 
                                    while($fila=mysqli_fetch_row($tarjetaoption)){
                                        $tarjetaPago       = $fila[2];
                                        $newtarj = substr($tarjetaPago, 12, 4);
                                        $nuevatarjeta="************".$newtarj;
                                ?>
                                        <option value="<?php echo $tarjetaPago?>"> <?php echo $nuevatarjeta?></option>
                                    <?php
                                    }
                                    ?>
                            </select>
                            <br>
                            <br>

                            <button id="submit"  name="submit" type="submit" class="btn btn-primary btn-block">Seleccionar tarjeta</button>
                            <br>
                            <a href="./AgregarTarjeta.php">Agregar una nueva Tarjeta</a>
                        </form>
                        <form id="form-checkout"method="POST" action="mercadoPago.php">
                            <div class="block-heading">
                                <h2>
                                    Proceder a Pagar
                                </h2>
                            </div>
                            <?php
                                $idUsuarios          = "";
                                $nombreTarj          = "";
                                $email               = "";
                                $idUsuarioTar        = "";
                                $NumeroTarjeta       = "";
                                $AnoExp              = "";         
                                $MesExp              = ""; 
                                $NumSeg              = ""; 
                                $StatusTarg          = ""; 
                                $nuevasTarjetas      = ""; 
                                
                                if (isset($_POST['tarjetas'])){
                                    $opcionUsu     =$_POST['tarjetas'];
                                    $idUsuarios    = ($_SESSION["Iden"]);
                                    include("../model\conexion.php");                                 
                                    $ConsultTarj = "SELECT  * FROM metodopago WHERE idUsuario='$idUsuarios' AND numTarjeta='$opcionUsu';";                                                                            
                                    $Tarje = mysqli_query($conect,$ConsultTarj);                                                                         
                                    mysqli_close($conect); 
                                    while($row=mysqli_fetch_row($Tarje)){
                                        $idUsuarioTar        = $row[1];
                                        $NumeroTarjeta       = $row[2];
                                        $AnoExp              = $row[3];              
                                        $MesExp              = $row[4];
                                        $NumSeg              = $row[5];
                                        $StatusTarg          = $row[6];
                                        $nuevasTarjetas      = substr($NumeroTarjeta, 12, 4);
                                        $nombreTarj          = $_SESSION["Nombre"];
                                        $email               = $_SESSION["Email"];
                                    }
                                }
                                            
                            ?>
                            <div class="payment-details">
                                <input type="hidden" name="nombrefedex" class="form-control" value="<? echo $nombrefedex;?>">
                                <input type="hidden" name="numeroTelefonoFedex" class="form-control" value="<? echo $numeroTelefonoFedex;?>">
                                <input type="hidden" name="pais" class="form-control" value="<? echo $pais;?>">
                                <input type="hidden" name="estado" class="form-control" value="<? echo $estado;?>">
                                <input type="hidden" name="ciudad" class="form-control" value="<? echo $ciudad;?>">
                                <input type="hidden" name="codigoPostal" class="form-control" value="<? echo $codigoPostal;?>">
                                <input type="hidden" name="colonia" class="form-control" value="<? echo $colonia;?>">
                                <input type="hidden" name="callePrincipal" class="form-control" value="<? echo $callePrincipal;?>">
                                <input type="hidden" name="calle1" class="form-control" value="<? echo $calle1;?>">
                                <input type="hidden" name="calle2" class="form-control" value="<? echo $calle2;?>">
                                <input type="hidden" name="referencia" class="form-control" value="<? echo $referencia;?>">
                                
                                <div class="products">
                                    <h2 class="title">Productos</h2>
                                    <div class="item">
                                        <span class="price" id="producto"></span>
                                        <p class="item-name"><?php echo $productoo ?><span id="summary-quantity"></span></p>
                                    </div>
                                    <p>Total:</p>
                                    <div class="total"><?php echo '$'.$total;?><span class="price" id="summary-total"></span></div>
                                    
                                    <input type="hidden" id="amount" value="<?php echo $total;?>"/>
                                    <input type="hidden" id="description" value="<?php echo $productoo;?>"/>
                                </div>
                                <h3 class="title">Datos del comprador</h3>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="email" class="form-control"  name="cardholderEmail" id="form-checkout__cardholderEmail"  value="<?php echo $email ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-5">
                                        <select id="form-checkout__identificationType" name="identificationType" class="form-control"></select>
                                    </div>
                                    <div class="form-group col-sm-7">
                                        <input type="text" class="form-control" name="identificationNumber" id="form-checkout__identificationNumber" value="<?php echo $nuevasTarjetas?>" >
                                        
                                    </div>
                                </div>
                                <br>
                                <h3 class="title">Detalles de la tarjeta</h3>
                                <div class="row">
                                    <div class="form-group col-sm-7">
                                        <input type="text" class="form-control" name="cardholderName" id="form-checkout__cardholderName"  value="<?php echo $nombreTarj?>">
                                    </div>
                                    <div class="form-group col-sm-5">
                                        <div class="input-group expiration-date">
                                            <input type="text" class="form-control" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth" name="securityCode" id="form-checkout__securityCode" minlength="2" maxlength="2" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $MesExp ?>">
                                            <span class="date-separator">/</span>
                                            <input type="text" class="form-control" name="cardExpirationYear" id="form-checkout__cardExpirationYear"name="securityCode" id="form-checkout__securityCode" minlength="2" maxlength="2" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $AnoExp ?>"/>
                                        </div>
                                    </div>
                                
                                    <div class="form-group col-sm-8">
                                            <input type="text" class="form-control" name="cardNumber" id="form-checkout__cardNumber" minlength="16" maxlength="16" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $NumeroTarjeta ?>"/>
                                    </div>
                                        
                                    <div class="form-group col-sm-4">
                                        <input type="text" class="form-control" name="securityCode" id="form-checkout__securityCode" minlength="3" maxlength="3" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $NumSeg ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <select class="form-control" name="issuer" id="form-checkout__issuer"></select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control"  name="identificationType" id="form-checkout__identificationType"></select>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="issuer">Mensualidades(selecciona una):</label>
                                    <select class="form-control" name="installments" id="form-checkout__installments"></select>
                                </div>

                                <button type="submit" id="form-checkout__submit"class="btn btn-primary btn-block">pagar</button>
                                <progress value="0" class="progress-bar">loading...</progress>
                                <br>
                                <button type="button" class="btn btn-primary btn-block" onclick="limpiar()">Reiniciar Formulario</button>  
                                <br>
                                <a href="../crudcarrito/vistaaltacarrito.php">
                                    Regresar al carrito de compras
                                </a>
                                <progress value="0" class="progress-bar">loading...</progress>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </section>
        
            <script src="https://sdk.mercadopago.com/js/v2"></script>
            <script>
                const productCost = document.getElementById('amount').value;
                const productDescription = document.getElementById('description').innerText;
                const mp = new MercadoPago('TEST-ece54f90-a71f-4b6d-941a-f214b3e3891f', {
                    locale: 'es-MX'
                })
               
                
                
                const cardForm = mp.cardForm({
                    amount: productCost,
                    autoMount: true,
                    processingMode: 'aggregator',
                    form: {
                        id: 'form-checkout',
                        cardholderName: {
                            id: 'form-checkout__cardholderName',
                            placeholder: 'Nombre del Titular',
                        },
                        cardholderEmail: {
                            id: 'form-checkout__cardholderEmail',
                            placeholder: 'E-mail',
                        },
                        cardNumber: {
                            id: 'form-checkout__cardNumber',
                            placeholder: 'Número de la tarjeta',
                        },
                        cardExpirationMonth: {
                            id: 'form-checkout__cardExpirationMonth',
                            placeholder: 'MM'
                        },
                        cardExpirationYear: {
                            id: 'form-checkout__cardExpirationYear',
                            placeholder: 'YYYY'
                        },
                        securityCode: {
                            id: 'form-checkout__securityCode',
                            placeholder: 'CVV',
                        },
                        installments: {
                            id: 'form-checkout__installments',
                            placeholder: 'Total de mensualidades'
                        },
                        identificationType: {
                            id: 'form-checkout__identificationType',
                            placeholder: 'Document type'
                        },
                        identificationNumber: {
                            id: 'form-checkout__identificationNumber',
                            placeholder: 'Número de identificación'
                        },
                        issuer: {
                            id: 'form-checkout__issuer',
                            placeholder: 'Emisor'
                        }
                    },
                    callbacks: {
                        onFormMounted: error => {
                            if (error) return console.warn('Form Mounted handling error: ', error)
                            console.log('Form mounted')
                        },
                        onFormUnmounted: error => {
                            if (error) return console.warn('Form Unmounted handling error: ', error)
                            console.log('Form unmounted')
                        },
                        onIdentificationTypesReceived: (error, identificationTypes) => {
                            if (error) return console.warn('identificationTypes handling error: ', error)
                            console.log('Identification types available: ', identificationTypes)
                        },
                        onPaymentMethodsReceived: (error, paymentMethods) => {
                            if (error) return console.warn('paymentMethods handling error: ', error)
                            console.log('Payment Methods available: ', paymentMethods)
                        },
                        onIssuersReceived: (error, issuers) => {
                            if (error) return console.warn('issuers handling error: ', error)
                            console.log('Issuers available: ', issuers)
                        },
                        onInstallmentsReceived: (error, installments) => {
                            if (error) return console.warn('installments handling error: ', error)
                            console.log('Installments available: ', installments)
                        },
                        onCardTokenReceived: (error, token) => {
                            if (error) return console.warn('Token handling error: ', error)
                            console.log('Token available: ', token)
                        },
                        onSubmit: (event) => {
                            event.preventDefault();
                            const cardData = cardForm.getCardFormData();
                            console.log('CardForm data available: ', cardData)
                        },
                        onFetching:(resource) => {
                            console.log('Fetching resource: ', resource)

                            // Animate progress bar
                            const progressBar = document.querySelector('.progress-bar')
                            progressBar.removeAttribute('value')

                            return () => {
                                progressBar.setAttribute('value', '0')
                            }
                        },
                    }
                })
            </script>
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