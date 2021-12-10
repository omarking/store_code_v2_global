<?php
    //Inicio de La sesion
    session_start();
    include("encriptacion.php"); 
    include("mostrarcarrito.php");  

?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">        
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
            <title>Carrito de Compras</title> 
            <link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>                                        
            <link rel="stylesheet" href="../css\estiloproducto.css" type="text/css">
            <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">      
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script type="text/javascript" src="../js/funciones.js" defer></script>
            <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css" media="screen"/>
            <script type="text/javascript" src="../js/sweetalert2.all.min.js" charset="utf-8"></script>
            
        </head>
        <body>    
            <!--NAV-->
            <!-- <nav class="navbar navbar-dark bg-dark text-white"> -->
                <nav class="navbar  text-white">
                    <div class="container-fluid p-7">        
                        <div class="col-sm-2">            
                        <a href="../index.php"><img src="../img\utilidades\storetransblan.png" width="200" height="200" class="img-fluid"></a>
                        </div>                
                        <div class="col-sm-5 text-wrap">             
                            <p  class="navbar-brand"><H2>Carrito de Compras</H2></p>
                                    
                        </div>
                        <div class="col-sm-5">
                            <ul class="nav text-white">
                                <li class="nav-item">
                                <a class="nav-link active  text-light" aria-current="page" href="../index.php">Home</a>
                                </li>
                                <?php
                                if(isset($_SESSION["Email"]) == '') {   
                                    echo '<a class="nav-link active cerrar" aria-current="page" href="../login\login.php">Iniciar Sesión </a> ';                  
                                }else if(isset($_SESSION["Email"])) { 
                                    ?>
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
                                <?php 
                                }else{
                                    echo "Sesion Incorrecta";
                                }
                                ?> 
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
                                //echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO'])+count($_SESSION['CARRITO2']);
                                ?>
                                )
                                </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active  text-light" aria-current="page" href="../index.php"><i class="fas fa-undo-alt"></i> Regresar</a>
                                </li>              
                            </ul>
                        </div>
                    </div>
                </nav>
            <!--FIN NAV-->
                <br>
                <br>
            <!--Cuerpo de la pagina-->

            <div class="container">
                <h3>Lista  Carrito de Compras</h3>
            
                <!-- TABLE CARRITO 1-->    
                <table>
                <thead class="text-white" style="background: #0B3861;">
                    <tr>
                    <tr> 
                        <th width="40%">Nombre</th>                
                        <th width="15%" class="text-left">Cantidad</th>
                        <th width="15%" class="text-left">Vendedor</th>
                        <th width="15%" class="text-left">Precio</th>
                        <th width="15%" class="text-left">Total</th>
                        <th width="15%"></th>
                        <th width="15%"></th>     
                    </tr>
                    <tbody>
                        <?php
                        $total = 0;

                        if(!empty($_SESSION['CARRITO'])){

                            $contador = count($_SESSION['CARRITO']);    
                            if($contador == 0){
                                unset($_SESSION['CARRITO']);
                            }    

                            foreach ($_SESSION['CARRITO'] as $rows) :?>
                                <?php 
                                $idUsuario = ($_SESSION["Iden"]);
                                $idProducto = $rows['id'];
                                $idVendedor = $rows['usuventa'];
                                $Precio = $rows['precio'];
                                $CantidadProducto = $rows['cantidad'];
                                $subtotal=$Precio;

                                //mysql_select_db ("storecode");
                                include("../model/conexion.php");
                                $consulta= mysqli_query($conect, "INSERT INTO productocarrito (idProducto,idUsuario,cantidadProducto,statusProductoCarrito,subtotal) VALUES ('$idProducto', '$idUsuario', '$CantidadProducto',1,'$subtotal');");
                                
                                
                                ?>
                                
                                <tr class="item_row">
                                    
                                    <td id="nombreproduc"> <?php  echo $rows['nombre']; ?></td>
                                    <td id="cantidadPro"> <?php echo $CantidadProducto;?></td>
                                    <td> <?php echo $rows['usuventa']; ?></td>
                                    <td id="precios"> <?php echo $rows['precio']; ?></td>
                                    <td id="totaless"> <?php echo number_format($rows['precio']*$rows['cantidad'],2)?></td>
                                
                                    
                                    <!--<td><form action="" method="post"><button class="btn btn-danger" type="submit" name="btnAccion" value="EliminarUnset">Eliminar unsets</button></form></td>-->
                                    <td><form action="" method="post"><input type="hidden" name="id" value="<?php echo openssl_encrypt($rows['id'],COD,KEY); ?>"><button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar1">Eliminar</button></form></td>
                                    <td><form action="" method="post"><input type="hidden" name="id" value="<?php echo openssl_encrypt($rows['id'],COD,KEY); ?>"><button class="btn btn-primary" type="submit" name="btnAccion" value="Guardar" >Guardar</button></form></td>
                                
                                </tr>  
                            <?php endforeach;
                        
                        }else{
                        echo 'Lista Vacia';
                        unset($_SESSION['CARRITO']);
                        }
                    
                        ?>
                            
                        <td colspan="5">
                        <!--Meter en sesion -->
                            <?php
                            if(isset($_SESSION["Email"])) {
                            ?>
                                <form action="pagar.php" method="post">
                                    <div class="alert alert-primary">
                                        <div class="form-group">  
                                            <input type="hidden" name="email" class="form-control" value="<? echo ($_SESSION['Email']);?>">
                                            <input type="hidden" name="Precio" id="" value=";
                                            echo openssl_encrypt($row[3],COD,KEY); 
                                            echo '">
                                        </div>
                                        <?php
                                        if(isset($_SESSION['CARRITO'])){
                                        ?>  <button type="submit" class="btn btn-primary btn-lg btn-block" name="btnAccion" value="proceder">Proceder a pagar</button>
                                        <?php
                                        }else{
                                            //echo "<script>alert('Carrito vacio..');</script>";
                                            unset ($_SESSION['CARRITO']);
                                        }
                                        ?>
                                    </div>
                                </form>                            
                            <?php
                            }if(isset($_SESSION["Email"])) {
                            ?>
                                <!--<form action="../mercadoPago/mercadoPago.php" method="post">-->
                                <form action="../fedex/fedex-envios.php" method="post">
                                    <div class="alert alert-primary">
                                        <div class="form-group">
                                            <input type="hidden" name="email" class="form-control" value="<? echo ($_SESSION['Email']);?>">
                                            <input type="hidden" name="Precio" id="" value=";
                                            echo openssl_encrypt($row[3],COD,KEY); 
                                            echo '">
                                        </div>
                                        <?php
                                        if(isset($_SESSION['CARRITO'])){
                                        ?>  <button type="submit" class="btn btn-primary btn-lg btn-block" name="btnAccion" value="proceder">Proceder a pagar con mercado pago</button>
                                        <?php
                                        }else{
                                            //echo "<script>alert('Carrito vacio..');</script>";
                                            unset ($_SESSION['CARRITO']);
                                        }
                                        ?>
                                    </div>
                                </form>
                            <?php
                            }if(isset($_SESSION["Email"])) {
                            ?>
                                <form action="" method="post">
                                    <div class="alert alert-primary">
                                        <div class="form-group"> 
                                            <input type="hidden" name="email" class="form-control" value="<? echo ($_SESSION['Email']);?>">
                                            <input type="hidden" name="Precio" id="" value=";
                                            echo openssl_encrypt($row[3],COD,KEY); 
                                            echo '">
                                        </div>
                                        <?php
                                        if(isset($_SESSION['CARRITO'])){
                                        ?>  
                                        <button type="button" <i class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Pagar Compra por Transferencia</i></button>
                                        <?php
                                        }else{
                                            //echo "<script>alert('Carrito vacio..');</script>";
                                            unset ($_SESSION['CARRITO']);
                                        }
                                        ?>
                                    </div>
                                </form>
                            <?php
                            }else if(isset($_SESSION["Email"]) == '') {   
                                echo '<a class="nav-link active cerrar" aria-current="page" href="../login/login.php">Si deseas proceder con el pago, es necesario que inicies sesión </a> ';                  
                            }
                            ?>
                                
                        </td>                      
                    </tbody>              
                </table>

                <!--Modal ingresar direcion-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content"  style="width:750px;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Datos StoreCodeWay</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                                <div class="modal-body">
                                    <!--Inicio de formulario dirección-->
                                    <form class="text-dark"> 
                                        <table class='table table-dark'>
                                            <tr>
                                                <th>Compañia</th>
                                                <th>Clave intervancaria</th>
                                                <th>Número de tarjeta</th>
                                                <th>Número de cuenta</th>
                                                <th>Nombre del banco</th>
                                            </tr>
                                            <?php 
                                                include("../model\conexion.php"); 
                                                $consultaCobro          = "SELECT * FROM transfCobroStoreCode;";                                                                            
                                                $consulTransferencia    = mysqli_query($conect,$consultaCobro);                                                                         
                                                while($rows1            = mysqli_fetch_array($consulTransferencia)){

                                            ?>
                                            <tr>
                                                <td><?php  echo $rows1["nombreEmpresa"]?></td>
                                                <td><?php  echo $rows1["claveInterbancaria"]?></td>
                                                <td><?php  echo $rows1["numeroTarjeta"]?></td>
                                                <td><?php  echo $rows1["numeroCuenta"]?></td>
                                                <td><?php  echo $rows1["nombreBanco"]?></td>
                                                
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                            
                                        </table>
                                        
                                        <div class="form-group">
                                            <button type="button" name="comprar" onclick="alerta()" class="btn btn-primary">pagar</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                        <input type="hidden" id="description" value="<?php echo $rows['nombre'];?>"/>
                                    </form> 
                                </div>   
                            </div> 
                        </div>
                </div>

                <script type="text/javascript">
                    function alerta(){
                        var producto = $("#description").val();
                        Swal.fire({
                            title: 'Realizado',
                            text: "Has realizado la compra de un@ "+producto+", tienes un plazo de 24 horas para realizar la transferencia o el deposito de tu producto a la cuenta mencionada y se pueda validar la compra con el vendedor",
                            type: "success",
                            showCancelButton: true,
                            confirmButtonText: 'ok',
                            cancelButtonText: 'cancel',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.dismiss !== 'cancel') {
                                Swal.fire({
                                    title: "Venta Realizada",
                                    text: "Cuando se realice la transferencia de deposito procede ir a tus productos comprados, para cargar el comprobante de tu deposito.",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonText: 'ok',
                                    cancelButtonText: 'cancel',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.dismiss !== 'cancel') {
                                        window.location.href="../TransferenciaCobro/pdf.php";
                                    }
                                })
                            }
                        })
                    }
                </script>
                <p>
                </p>
                <!-- TABLE CARRITO 2-->
                <table>
                    <thead class="text-white navbar-expand-lg" style="background: #0B3861;">
                        <tr>
                            <th width="40%">Nombre</th>                
                            <th width="15%" class="text-left">Cantidad</th>
                            <th width="15%" class="text-left">Vendedor</th>
                            <th width="15%" class="text-left">Precio</th>
                            <th width="15%" class="text-left">Total</th>
                            <th width="15%"></th>  
                            <th width="15%"></th>   
                        </tr>
                    </thead>
                
                    <tbody>
                        <?php
                        $total = 0;
                        
                        if(!empty($_SESSION['CARRITO2'])){
                            
                            $contador2 = count($_SESSION['CARRITO2']);    
                            if($contador2 == 0){
                                unset($_SESSION['CARRITO2']);
                            }    

                            foreach ($_SESSION['CARRITO2'] as $rowss) :?>
                        
                                <tr class="item_row">
                                    <td> <?php echo $rowss['nombre']; ?></td>
                                    <td><?php echo ++$total; ?></td>
                                    <td> <?php echo $rowss['usuventa']; ?></td>
                                    <td> <?php echo $rowss['precio']; ?></td>
                                    <td> <?php echo number_format($rowss['precio']*$rowss['cantidad'],2)?></td>

                                    <!--<td><form action="" method="post"><button class="btn btn-danger" type="submit" name="btnAccion" value="EliminarUnset">Eliminar unsets</button></form></td>-->
                                    <td><form action="" method="post"><input type="hidden" name="id" value="<?php echo openssl_encrypt($rowss['id'],COD,KEY); ?>"><button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar2">Eliminar</button></form></td>
                                    <td><form action="" method="post"><input type="hidden" name="id" value="<?php echo openssl_encrypt($rowss['id'],COD,KEY); ?>"><button class="btn btn-primary" type="submit" name="btnAccion" value="Guardar2" >Guardar</button></form></td>
                                </tr>
                            <?php endforeach;
                        }else{
                            echo 'Lista Vacia';
                            unset($_SESSION['CARRITO2']);
                        }
                        ?>
                        
                        <td colspan="5">
                            <!--Meter en sesion -->
                            <?php
                            if(isset($_SESSION["Email"])) {
                            ?>
                            <form action="pagar2.php" method="post">
                                <div class="alert alert-primary">
                                <div class="form-group">
                                <!--<input type="email" name="email" id="" value="'.($_SESSION["Email"]).'">-->
                                <input type="hidden" name="email" class="form-control" value="<? echo ($_SESSION['Email']);?>">
                                <input type="hidden" name="Precio" id="" value=";
                                echo openssl_encrypt($row[3],COD,KEY); 
                                echo '">
                                </div>
                                <!--
                                <small id="emailHelp" class="form-text text-muted">
                                los productos se enviaran a este correo
                                </small>-->                        
                                <!--<button type="submit" class="btn btn-primary btn-lg btn-block" name="btnAccion" value="proceder">
                                Proceder a pagar 
                                </button>-->
                                <?php
                                if(isset($_SESSION['CARRITO2'])){
                                ?>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="btnAccion" value="proceder"> Proceder a pagar </button>
                                
                                <?php
                                }else{
                                    //echo "<script>alert('Carrito vacio..');</script>";
                                    unset ($_SESSION['CARRITO2']);
                                }
                                ?>
                                </div>
                            </form>
                                <?php     
                                }else if(isset($_SESSION["Email"]) == '') {   
                                    echo '<a class="nav-link active cerrar" aria-current="page" href="../login/login.php">Si deseas proceder con el pago, es necesario que inicies sesión </a> ';                  
                                }
                                ?>                        
                            <!--Meter en sesion -->               
                        </td>
                        
                    </tbody>
                </table>  

            </div>
            <!--------------------------------Guardar producto----------------------------------------------------------------->
            <div class="container">
                <h3>Productos Guardados</h3>

                <?php if(!empty($_SESSION['Guardar'])){
                ?>
                    <br>
                    <table class="table ">
                        <thead class="text-white" style="background: #0B3861;">
                            <tr>
                                <th width="40%">Nombre</th>                
                                <th width="15%" class="text-center">Cantidad</th>
                                <th width="15%" class="text-center">Vendedor</th>
                                <th width="15%" class="text-center">Precio</th>
                                <th width="15%" class="text-center">Total</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody class="font-weight-bold">
                            <?php $total=0; ?>
                            <?php
                                $idUsuario = ($_SESSION["Iden"]);
                                include("../model\conexion.php");                                 
                                $consultar = "SELECT * FROM productocarrito pc INNER JOIN producto p ON pc.idProducto = p.idProducto WHERE pc.idUsuario = '$idUsuario';";                                                                            
                                $CarritoConsul = mysqli_query($conect,$consultar);                                                                         
                                mysqli_close($conect); 
                                while($row=mysqli_fetch_row($CarritoConsul)){
                                    $idProducto        = $row[1];
                                    $idUsuarios        = $row[2];
                                    $cantidadProductos = $row[3];              
                                    $precios           = $row[5];
                                    $idUsu             = $row[8];
                                    $nombre            = $row[11];
                                
                                ?>
                                    <tr>
                                        <td width="40%"><?php echo $nombre ?></td>                
                                        <td width="15%" class="text-center"><?php echo $cantidadProductos?></td>
                                        <td width="15%" class="text-center"><?php echo $idUsu?></td>
                                        <td width="15%" class="text-center"><i class="fas fa-dollar-sign"></i>  <?php echo $precios?></td>
                                        <td width="15%" class="text-center"><i class="fas fa-dollar-sign"></i>  <?php echo number_format($precios * $cantidadProductos,2);?></td><!--Calculo suptotal-->
                                        <td width="15%">

                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY); ?>">                   
                                            <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar2">Eliminar</button> </td>
                                        </form>
                                    
                                    </tr>
                                <?php
                                } 
                                ?>
                                <?php $total=$total+($precios*$cantidadProductos); ?><!--Calculo de Total-->
                            <tr>
                                <td colspan="3" align="right"><h3>Total</h3></td>
                                <td align="right"><h3><i class="fas fa-dollar-sign"></i>  <?php echo number_format($total,2);?></h3></td><!--Formato y la sumatoria de todos los registros--->
                                <td></td>            
                            </tr>

                            <td colspan="5">
                                <!--Meter en sesion -->
                            <?php 
                            if(isset($_SESSION["Email"])) {
                            ?>          
                                <form action="pagar.php" method="post">
                                    <div class="alert alert-primary">
                                    <div class="form-group">
                                    <!--<input type="email" name="email" id="" value="<?php //echo ($_SESSION["Email"]);?>">-->
                                    <input type="hidden" name="email" class="form-control" value="<?echo ($_SESSION['Email']);?>">
                                    <input type="hidden" name="Precio" id="" value="<?php echo openssl_encrypt($row[3],COD,KEY); ?>">
                                    <label for="my-input">Cantidad de Productos: </label>
                                    <?php echo $cantidadProductos= $cantidadProductos ++ ?>
                                    </div>
                                    <!--
                                    <small id="emailHelp" class="form-text text-muted">
                                    os productos se enviaran a este correo
                                    </small>-->                        
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="btnAccion" value="proceder"> Proceder a pagar </button>
                                    </div>
                                </form>     
                            <?php                         
                            }else if(isset($_SESSION["Email"]) == '') {   
                                echo '<a class="nav-link active cerrar" aria-current="page" href="../login/login.php">Si deseas proceder con el pago, es necesario que inicies sesión </a> ';                  
                            }                        
                            ?>
                        <!--Meter en sesion -->               
                        </tbody>
                    </table>
                    <?php 
                }else{ 
                ?>
                <div class="alert alert-success">
                    No hay Productos en el carrito....
                </div>
                <?php } ?>
            </div>

            <!--Fin del Cuerpo de la pagina-->
            <!-------------------------------------------------------------------TABLA VENDEDOR---------------------------------------------------------------------------------------------->
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
            <script>
            $(function () {
                $('[data-toggle="popover"]').popover()
            })
        </script>
                    
        </body>
    </html>
