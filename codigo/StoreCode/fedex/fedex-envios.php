<?php
  session_start();  
  if(isset($_SESSION["Email"])) { 

?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">        
            <title>Envios Fedex</title>                                   
            <link rel="stylesheet" href="../css\estiloproducto.css" type="text/css">
            <link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>                                        
            <link rel="stylesheet" href="../css\index.css" type="text/css">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <script type="text/javascript" src="../js/funciones.js" defer></script>
            <script type="text/javascript">
                function buscar(){
                    var option = document.getElementById("clientess").value;
                        window.location.href='http://storecode.test/fedex/fedex-envios.php?option='+option;
                }
            </script>
                
        </head>
        <body>
            <main>
                <nav class="navbar  text-white">
                    <div class="container-fluid p-7">        
                        <div class="col-sm-2">
                            <img src="../img\utilidades\storetransblan.png" width="200" height="200" class="img-fluid" >
                        </div>                
                        <div class="col-sm-5 text-wrap">             
                            <p  class="navbar-brand"><H2>Fedex envios</H2></p>         
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
                                include("../model/conexion.php");                
                                $sqlimgP="CALL psImagenUsuarioPerfil('$identificador');";
                                $resultadosqlimgP=mysqli_query($conect,$sqlimgP);                                                             
                                while($row=mysqli_fetch_row($resultadosqlimgP)){
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
                        </div>
                    </div>
                </nav>
                <section class="payment-form dark">
                    <div class="jumbotron text-center">                                    
                        <div class="form-payment">
                            <form method="POST" action="../mercadoPago/mercadoPago.php">
                                <div class="block-heading">
                                    <h3>Tus direcciónes disponibles</h3>
                                </div>
                                <select style="width:450px;" name="clientess" id="clientess" class="custom-select mb-15" onchange="return buscar();" >
                                    <option style="text-align:center" value="selecciona una dirección" disabled selected>Selecciona la dirección donde se enviara el producto</option>
                                    <?php 
                                    $idUsua = $_SESSION["Iden"];
                                    include("../model\conexion.php");                                 
                                    //$optionDireccionClientes = "SELECT  * FROM direccion WHERE idUsuario='$idUsua';";                                                                            
                                    $optionDireccionClientes ="SELECT * FROM direccion dc INNER JOIN usuario u ON dc.idUsuario = u.idUsuario WHERE dc.idUsuario = '$idUsua';";
                                    $direccionesClient = mysqli_query($conect,$optionDireccionClientes);                                                                         
                                    mysqli_close($conect); 
                                    while(  $rowss      = mysqli_fetch_array($direccionesClient)){
                                        $idDireccion    = $rowss["idDireccion"];
                                        $numeroTelef    = $rowss["telefonoUsuario"];
                                        $direcciones    ="CP: ".$rowss["codigoPostalUsuario"].", Estado: ".$rowss["estado"].", Municipio: ".$rowss["municipio"].", Col: ".$rowss["colonia"].", Calle principal: ".$rowss["callePrincipal"].", Núm: ".$rowss["numeroExterior"].".";
                                    ?>
                                            <option value="<?php echo $idDireccion?>"> <?php echo $direcciones?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="payment-details">
                                    <!--<button id="direccionCliente"  name="direccionCliente" type="submit" class="btn btn-primary btn-block">Selecciona tú dirección</button>-->
                                    <a href="../mercadoPago/Direccion.php">
                                        agregar nueva dirección
                                    </a>
                    
                                    <div class="block-heading">
                                        <h2>Envio de tu producto</h2>
                                    </div>
                    
                                    <h3 class="title">Datos del comprador</h3>
                                    <?php
                                    $pais           = "Mex";
                                    $codiPost       = "";
                                    $estadou        = "";
                                    $ciudad         = "";
                                    $colonias       = "";
                                    $callePrincipal = "";
                                    $numeros        = "";
                                    $calle1         = "";
                                    $calle2         = "";
                                    $nombre = $_SESSION["Nombre"];
                                    $referencia     ="";
                                    
                                    if(isset($_GET["option"])){
                                        $option=$_GET["option"];
                                    
                                        include("../model\conexion.php");                                 
                                        $dire = "SELECT  * FROM direccion WHERE idDireccion='$option';";                                                                            
                                        $direc = mysqli_query($conect,$dire);                                                                         
                                        mysqli_close($conect); 
                                        while($fil=mysqli_fetch_array($direc)){
                                            $codiPost       = $fil["codigoPostalUsuario"];
                                            $estadou        = $fil["estado"];
                                            $ciudad         = $fil["municipio"];
                                            $colonias       = $fil["colonia"];
                                            $callePrincipal = $fil["callePrincipal"];
                                            $numeros        = $fil["numeroExterior"];
                                            $calle1         = $fil["calle1"];
                                            $calle2         = $fil["calle2"];
                                            $referencia     = $fil["referencia"];
                                        }
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="form-group col-sm-5">
                                            <b>
                                                <label for="nombreComprador">Nombre:</label>
                                            </b>
                                            <input type="text" style="text-align:center" class="form-control" id="nombreComprador" name="nombreComprador" value="<?php echo $nombre?>">
                                        </div>
                                        <div class="form-group col-sm-7">
                                            <b>
                                                <label for="numeroTelefono">Número Telefonico:</label>
                                            </b>
                                            <input type="text" class="form-control" name="numeroTelefono" id="numeroTelefono" value="<?php echo $numeroTelef?>">
                                        </div>
                                    </div>
                                    <br>
                                    <h3 class="title">Datos de la dirección</h3>
                                    <div class="form-group">
                                        <b>
                                            <label for="pais">País:</label>
                                        </b>
                                        <input type="text" class="form-control" name="pais" id="pais" placeholder="país" value="<?php echo $pais;?>">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <b>
                                                <label for="estado">Estado:</label>
                                            </b>
                                            <input type="text" class="form-control" name="estado" id="estado"  placeholder="Estado" value="<?php echo $estadou?>">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <b>
                                                <label for="Ciudad">Ciudad:</label>
                                            </b>
                                            <input type="text" class="form-control" name="ciudad" id="ciudad"  placeholder="ciudad" value="<?php echo $ciudad?>">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <b>
                                                <label for="codigoPostal">Codigo Postal:</label>
                                            </b>
                                            <input type="text" class="form-control" name="codigoPostal" id="codigoPostal"  placeholder="codigo post" minlength="4" maxlength="5" value="<?php echo $codiPost;?>"> 
                                        </div>
                                    </div>
                                    <b>
                                        <label for="Colonia">Colonia:</label>
                                    </b>
                                    <input type="text" class="form-control" name="colonia" id="colonia"  placeholder="Colonia" value="<?php echo $colonias?>">
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <b>
                                                <label for="CallePrincipal">Calle Principal:</label>
                                            </b>
                                            <input type="text" class="form-control" name="callePrincipal" id="callePrincipal"  placeholder="Calle principal" value="<?php echo $callePrincipal;?>">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <b>
                                                <label for="Calle1">Calle 1:</label>
                                            </b>
                                            <input type="text" class="form-control" name="calle1" id="calle1"  placeholder="calle 1" value="<?php echo $calle1;?>">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <b>
                                                <label for="Calle2">Calle 2:</label>
                                            </b>
                                            <input type="text" class="form-control" name="calle2" id="calle2"  placeholder="calle 2"  value="<?php echo $calle2;?>">   
                                        </div>
                                    </div>      
                                    <b>
                                        <label for="referencia">Referencia:</label>
                                    </b>
                                    <input type="text" class="form-control" name="referencia" id="referencia"  placeholder="Referencia"  value="<?php echo $referencia;?>">  
                                    <br>
                                    <!--Botones-->
                                  
                                    <input type="submit" class="btn boton_crear text-black nav1" name="enviarbtn" value="Enviar">
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
}
?>