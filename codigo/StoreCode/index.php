<?php
session_start();     
include("./crudcarrito/encriptacion.php"); 
include("./crudcarrito/mostrarcarrito.php");                    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
        <title>Home</title> 
        <link rel="shortcut icon" href="img\utilidades\tiendaonlineico.ico"/>
        <link rel="stylesheet" href="css\estiloindex.css" type="text/css">                                 
        <link rel="stylesheet" href="fontawesome\css\all.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="librerias/bootstrap-5.0.1/css/bootstrap.css">       
        
        <script type="text/javascript">
            
            function deshabilitaRetroceso(){
                window.location.hash="no-back-button";
                window.location.hash="Again-No-back-button" //chrome
                window.onhashchange=function(){window.location.hash="no-back-button";}
                r=confirm("Aún no has cerrado sesion\n¿Deseas salir?");
                if (r==true){
                    window.location.href="../login/cerrarSesion.php";
                }
                
            }
        </script>
    </head>
<!--<body onload="changeHashOnLoad();">-->
<body onload="deshabilitaRetroceso();" >
<!--NAV-->
<!-- <nav class="navbar navbar-dark bg-dark text-white"> -->
    <nav class="navbar  text-white">
        <div class="container-fluid p-7">        
            <div class="col-sm-2">                                
            <a href="#"><img src="./img\utilidades\storetransblan.png" width="120" height="120" class="img-fluid"  data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Home"></a>
            </div>    
            <div class="col-sm-5 text-wrap">                             
                        <form action="">
                            <div class="input-group" id="div-src">
                                <input type="text" id="input-src" class="form-control" placeholder="¡Buscar Productos y más!">
                                <span class="input-group-btn" id="btn-src">
                                    <button class="btn btn-secondary" type="button">                                        
                                        <i class="fas fa-search"></i>                                        
                                    </button>
                                    <button class="btn btn-secondary" type="button">                                        
                                        <a href="#" class="btb btn-secondary" id="close-src">                                        
                                            <i class="fas fa-times"></i>                                        
                                        </a>    
                                    </button>                                    
                                </span>
                            </div>
                        </form>                                      
            </div>
            <div class="col-sm-5">
                <div class="container-fluid">
                <ul class="nav text-white">
                    <!--Divicion 1-->                                            
                            <li class="nav-item">
                                <h6><a class="nav-link active  text-light" aria-current="page" href="#">Home</a></h6>
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


                                    <h6><a class="nav-link active  text-info" aria-current="page" href="./crudcarrito\vistaaltacarrito.php"><i class="fas fa-cart-plus fa-2x "></i>Carrito(<?php 
                                    echo ($aux);
                                    //echo(empty($_SESSION['CARRITO'])?0:count($_SESSION['CARRITO'])+count($_SESSION['CARRITO2']));
                                    //echo(empty($_SESSION['CARRITO2'])?0:count($_SESSION['CARRITO'])+count($_SESSION['CARRITO2']));
                                        //if(empty($_SESSION['CARRITO'])){
                                            /*if(empty($_SESSION['CARRITO2'])){
                                              echo '0 C1';  
                                            }*/
                                        //}/*else{
                                             /*$contCarrito1= count($_SESSION['CARRITO']);
                                             if(empty($_SESSION['CARRITO2'])){
                                                echo '0 C2';
                                             }else{
                                                $contCarrito2= count($_SESSION['CARRITO']);
                                             }*/   
                                        //});

                                        //empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO'])+count($_SESSION['CARRITO2']);
                                    
                                
                                    ?>)</a></h6>                                                                
                            </li>                                        
                            <li class="nav-item">
                                <?php
                                if(isset($_SESSION["Email"]) == '') {   
                                    echo '<h6><a class="nav-link active cerrar" aria-current="page" href="login\login.php">Iniciar Sesión </a> </h6>';                  
                                }else if(isset($_SESSION["Email"])){
                                    //echo '<a class="nav-link active cerrar" aria-current="page" href="login\cerrarSesion.php">Cerrar Sesión </a> ';  
                                    ?>                                    
                                    <div data-toggle="modal" data-target="#ventanaModalCloseIndex">
                                        <h6><a class="nav-link active cerrar" aria-current="page" href="#">Cerrar Sesión</a></h6> 
                                    </div>          
                                <?php
                                }
                                ?>                                                            
                            </li>
                                                                        
                                <?php
                                    if(isset($_SESSION["Email"]) == '') {   
                                        echo '<a class="nav-link active  text-info" aria-current="page" href="vistasCRUDRegistro\vistaAltaUsuario.php">¿Aun no cuentas con una cuenta?, Créala Aquí!!!</a>';                                                          
                                    }else if(isset($_SESSION["Email"])){
                                        $identificador = ($_SESSION["Iden"]);
                                        //echo ; 
                                        include("./model/conexion.php");                
                                        $sqlimgP="CALL psImagenUsuarioPerfil('$identificador');";
                                        $resultadosqlimgP=mysqli_query($conect,$sqlimgP);                                                             
                                        while($row=mysqli_fetch_row($resultadosqlimgP)){
                                            //CALL psImagenUsuarioPerfil(20);
                                ?>  
                            <li class="nav-item">   
                            <h6 data-toggle="modal" data-target="#ventanaModalVerPerfil"><a class="nav-link active  text-info" aria-current="page" href="#"><?php echo ($_SESSION["Nombre"]);?></a> </h6>
                            </li>                 
                            <li class="nav-item"> 
                            <img class="rounded-circle" src="<?php echo "./crudperfilusuario/".$row[0];?>" alt=".." width="50" height="50">  
                            </li>    
                                                                                                                                                    
                                        <?php                
                                            }
                                            mysqli_close($conect);  
                                        }
                                            ?>                                                                                                                                                                                                                                                                                                                                  
                </ul>
                </div>
            </div>
        </div>
    </nav>
<!--FIN NAV-->

<!--Cuerpo de la pagina-->
<!--Alertas-->  
<br>
<br>  
<?php if($mensaje!=""){?>
<div class="alert alert-success container">
    <?php         
    echo $mensaje;                                             
                ?>
</div>
<?php }?>

<!--cards con registros de una tabla-->    
<div class="container mt-3">
    <div class="row">                   
            
                        <!--Modal-->
                        <?php 
                        @$idProductoC = 0;
                        @$con1 = 0;

                        @$con1 = count($_SESSION['CARRITO']);
                    
                        if ($con1<>0){
                            foreach(($_SESSION['CARRITO']) as $indice=>$producto){//recorremos los prouctos que tenemos en el carrito de compras                                                                
                                $idProductoC = $producto['id'] ;
                            }
                        }
                        include("./model\conexion.php");                                 
                        $sqlIU="CALL psBusIdProduCU('$idProductoC');";
                        $resultadosqlIU=mysqli_query($conect,$sqlIU);                                                                         
                        mysqli_close($conect); 
                         while($rowIU=mysqli_fetch_row($resultadosqlIU)){
                             $idUMP = $rowIU[0];
                         } 

                        if($con1 <> 0){
                            include("./model\conexion.php");                                 
                                $sqlMoIDS="CALL psMosProductoConUsuFCPSU('$idUMP', '$idProductoC');";
                                //$sqlMoIDS="CALL psMosProductoConUsuFCPSU('$idUMP');"; 
                                //$sqlMoIDS="CALL psMosProductoConUsuFCPSU('$idProductoC');";                                                                             
                                $resultadoMoIDS=mysqli_query($conect,$sqlMoIDS);                                                                         
                                mysqli_close($conect); 
                                while($rowMoIDS=mysqli_fetch_row($resultadoMoIDS)){                
                                    $identProducto1 = $rowMoIDS[0];
                                    $titulo1 = $rowMoIDS[1];
                                    $descripcion1 = $rowMoIDS[2];              
                                    $precio1 = $rowMoIDS[3];
                                    $imagen1 = $rowMoIDS[4];
                                    $stockR1 = $rowMoIDS[5];

                                    //PRUEBA DE USUARIO
                                    //$usuarioIden = $rowMoIDS[6];
                                    //echo $usuarioIden; 

                                    ?>
                        <div class="col-lg-4 col-lg-4 col-sm-12">            
                            <div class="card-deck">
                                <div class="card">
                                    <form action="./crudcarrito/venModal.php" method="post">                            
                                        <button type="submit"  class="border border-light p-3 mb-2 bg-transparent">
                                            <input type="hidden" name="idprodComModal" id="" value="<?php echo $identProducto1; ?>">
                                            <img class="card-img-top" title="<?php echo $titulo1; ?>" src="<?php echo  $imagen1;?>" id="carruselancho" alt="Card image cap" data-toggle="popover" data-trigger="hover" data-content="<?php echo $descripcion1; ?>">                                                        
                                        </button>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $titulo1; ?></h5>
                                            <p class="card-text"><?php echo $descripcion1; ?></p>
                                            <p class="card-text">Precio <i class="fas fa-dollar-sign"></i>: <?php echo $precio1; ?></p>
                                            <p class="card-text">Productos Disponibles: <?php echo $stockR1; ?></p>                        
                                        </div>                                                                                        
                                    </form>                                                                        
                                    <div class="card-footer text-center">                                                                
                                        <form action="" method="post">
                                            <input type="hidden" name="idenProd" id="" value="<?php echo openssl_encrypt($rowMoIDS[0],COD,KEY); ?>">
                                            <input type="hidden" name="nombre" id="" value="<?php echo openssl_encrypt($rowMoIDS[1],COD,KEY);?>">
                                            <input type="hidden" name="Precio" id="" value="<?php echo openssl_encrypt($rowMoIDS[3],COD,KEY); ?>">
                                            <!--<input type="hidden" name="cantidad" id="" value="<?php// echo openssl_encrypt(1,COD,KEY); ?>">-->                                
                                            <label for="inputProductCan" class="text-success font-weight-bold">Cantidad a comprar:</label>        
                                            <select id="inputProductCan" class="btn btn-success dropdown-toggle" name="cantidad">                                
                                                <?php 
                                                    for($i=1; $i <= $stockR1; $i++){                    
                                                        ?>                                                                                                                
                                                            <option value="<?php echo $i?>"><?php echo $i?></option>                         
                                                    <?php
                                                    }
                                                ?>                                
                                    
                                        </select>
                                        <br>
                                        <br>
                                        <input type="hidden" name="usuventa" id="" value="<?php echo openssl_encrypt($rowMoIDS[6],COD,KEY); ?>">
                                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar a carrito</button>
                                        </form>                                                                
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php }                            
                        }elseif($con1 == 0){?>
                                    <?php
                                include("./model/conexion.php");  
                                if(isset($_SESSION["Email"])) {
                                    $idenNOU = ($_SESSION["Iden"]);  
                                    $sql="CALL psMosProductoConUsu('$idenNOU');";
                                }elseif(isset($_SESSION["Email"]) == '') {
                                    $sql="CALL psMosProducto;";
                                }                                    
                                $resultadosql=mysqli_query($conect,$sql);    
                                mysqli_close($conect);                                                                       
                                while($row=mysqli_fetch_row($resultadosql)){                
                                    $identProducto = $row[0];
                                        $titulo = $row[1];
                                        $descripcion = $row[2];              
                                        $precio = $row[3];
                                        $imagen = $row[4];
                                        $stockR = $row[5];
                                        $usuarioIden = $row[6];                                
                                ?> 
                <div class="col-lg-4 col-lg-4 col-sm-12">            
                    <div class="card-deck">
                        <div class="card">
                            <form action="./crudcarrito/venModal.php" method="post">                            
                                <button type="submit"  class="border border-light p-3 mb-2 bg-transparent">
                                    <input type="hidden" name="idprodComModal" id="" value="<?php echo $identProducto; ?>">
                                    <img class="card-img-top" title="<?php echo $titulo; ?>" src="<?php echo  $imagen;?>" id="carruselancho" alt="Card image cap" data-toggle="popover" data-trigger="hover" data-content="<?php echo $descripcion; ?>">                                                        
                                </button>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $titulo; ?></h5>
                                        <p class="card-text"><?php echo $descripcion; ?></p>
                                        <p class="card-text">Precio <i class="fas fa-dollar-sign"></i>: <?php echo $precio; ?></p>
                                        <p class="card-text">Productos Disponibles: <?php echo $stockR; ?></p>                        
                                    </div>                                                        
                                
                            </form>                                                                        
                            <div class="card-footer text-center">                                                                
                                <form action="" method="post">
                                <input type="hidden" name="idenProd" id="" value="<?php echo openssl_encrypt($row[0],COD,KEY); ?>">
                                <input type="hidden" name="nombre" id="" value="<?php echo openssl_encrypt($row[1],COD,KEY);?>">
                                <input type="hidden" name="Precio" id="" value="<?php echo openssl_encrypt($row[3],COD,KEY); ?>">
                                <!--<input type="hidden" name="cantidad" id="" value="<?php// echo openssl_encrypt(1,COD,KEY); ?>">-->                                
                                <label for="inputProductCan" class="text-success font-weight-bold">Cantidad a comprar:</label>        
                                <select id="inputProductCan" class="btn btn-success dropdown-toggle" name="cantidad">                                
                                    <?php 
                                    for($i=1; $i <= $stockR; $i++){                    
                                    ?>                                                                                                                
                                        <option value="<?php echo $i?>"><?php echo $i?></option>                         
                                    <?php
                                    }
                                    ?>                                
                                    
                                </select>
                                <br>
                                <br>
                                <input type="hidden" name="usuventa" id="" value="<?php echo openssl_encrypt($row[6],COD,KEY); ?>">
                                <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                Agregar a carrito</button>
                                </form>                                                                
                            </div>   
                        </div>   
                    </div>   
                </div>   
                            <?php 
                        }
                    }
                            ?>
                                                                             
                    </div>
                </div>                    
                <br>                
            </div>                    
    </div>
</div>
<!--Fin cards con registros de una tabla-->    
<!-- Inicio del Modal Cerrar Sesion -->
<div class="modal fade" id="ventanaModalCloseIndex" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true"><!--Fade animacion de Pantalla tenue detras-->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="tituloVentana">¡Cerrar Sesión¡</h5>
                <button class="close" data-dismiss="modal" arial-label="Cerrar">
                    <span arial-hiddeen="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<?php echo ($_SESSION["Nombre"]);?> deseas <a class="cerrar" aria-current="page" href="./login/cerrarSesion.php">Cerrar Sesion</a>                    
            </div>
            <div class="modal-footer">
            <button class="btn btn-warning" typr="button" data-dismiss="modal">        
				Cancelar
            </button>            
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal Cerra Sesion-->
<!-- Inicio del Modal Ver Perfil -->
<div class="modal fade" id="ventanaModalVerPerfil" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true"><!--Fade animacion de Pantalla tenue detras-->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white" style="background: #0B3861;">
                <h5 id="tituloVentana">¡Ver perfil¡</h5>
                <button class="close" data-dismiss="modal" arial-label="Cerrar">
                    <span arial-hiddeen="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<a class="text-success font-weight-bold" aria-current="page" href="./crudperfilusuario/perfil.php"> <?php echo ($_SESSION["Nombre"]);?> deseas ver tu perfil </a>                    
            </div>
            <div class="modal-footer">
            <button class="btn btn-warning" typr="button" data-dismiss="modal">        
				Cancelar
            </button>            
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal Ver Perfil-->
        
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
        <script src="alertify/alertify.js"></script>
        <script>
            $(function () {
                $('[data-toggle="popover"]').popover()
            })
        </script>
</body>
</html>


<!--<div class="container"> 
<div id="tabla"></div>
</div>

</body>
</html>

<script type="text/javascript">
     $(document).ready(function(){
         $('#tabla').load('crudperfilusuario/perfil.php');
     });
</script>     

