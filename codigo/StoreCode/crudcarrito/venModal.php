<?php
//Inicio de La sesion
session_start();        
include("encriptacion.php"); 
include("mostrarcarrito.php"); 
include("modelcomen.php");
@$idpmc =($_POST["idprodComModal"]);
@$idProductoGet = $_GET['idproducto'];
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
    <title>Descripción detallada del producto</title> 
    <link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>                                        
    <link rel="stylesheet" href="../css\estiloproducto.css" type="text/css">
    <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="../jsproducto\producto.js"></script>                                   
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
                <p  class="navbar-brand"><H2>DESCRIPCION DETALLADA DEL PRODUCTO</H2></p>         
            </div>
            <div class="col-sm-5">
                <ul class="nav text-white">
                    <li class="nav-item">
                    <a class="nav-link active  text-light" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <?php
                    if(isset($_SESSION["Email"]) == '') {   
                        echo '<a class="nav-link active cerrar" aria-current="page" href="../login/login.php">Iniciar Sesión </a> ';                  
                    }else if(isset($_SESSION["Email"])) {       
                        if($idProductoGet == ""){
                            echo "";
                        }else if($idProductoGet != "" ){
                            $idpmc =$idProductoGet ;
                        }
                        $ideUsu=($_SESSION["Iden"] );          
                    ?>
                    <a class="nav-link active cerrar" aria-current="page" href="../login\cerrarSesion.php">Cerrar Sesion</a>                    
                    </li>
                    <li class="nav-item">                                        
                        <?php
                                        $identificador = ($_SESSION["Iden"]);
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
                                            <a class="nav-link active  text-info" aria-current="page" href="#"><?php echo ($_SESSION["Nombre"]);?></a> 
                                            </div>
                                        </div>
                        <?php                
                            }
                            mysqli_close($conect);                                          
                        ?>                                                                                   
                    </li>   
                        <?php
                        //Fin de la condicion de la sesion
                        }else{
                            echo "Sesion Incorrecta";
                            }
                        //Fin de la condicion de la sesion
                        ?>                    
                    <li class="nav-item">                    
                        <a class="nav-link active  text-info" aria-current="page" href="../crudcarrito/vistaaltacarrito.php"><i class="fas fa-cart-plus fa-3x "></i>Carrito(<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?>)</a>
                    </li>                    
                </ul>
            </div>
        </div>
    </nav>
<!--FIN NAV-->
    <br>
    <br>
<!--Cuerpo de la pagina-->
<?php if($mensaje!=""){?>
<div class="alert alert-success container font-weight-bold" style="color: #0B3861;">
    <?php         
    echo $mensaje;                                             
                ?>
</div>
<?php }?>
    
    
<?php    
    include("../model/conexion.php");    
    $sqlMPCImg="CALL psMosProductoCompleImg('$idpmc');";
    $resultadosqlMPCImg=mysqli_query($conect,$sqlMPCImg);                                                                                                     
    while($rowMPCImg=mysqli_fetch_row($resultadosqlMPCImg)){
        //echo  '1->'.$rowMPCImg[0]." <br>";
        //echo  '2->'.$rowMPCImg[1]." <br>";  
        

        
?>         
        <div class="container ">
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="card bg-dark">
                        <!--Carrusel Imagenes Producto-->                
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="<?php echo  "../". $rowMPCImg[2];?>" alt="First slide" width="600" height="600">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo  "../". $rowMPCImg[3];?>" alt="Second slide" width="600" height="600">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo  "../". $rowMPCImg[4];?>" alt="Third slide" width="600" height="600">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?php echo  "../". $rowMPCImg[5];?>" alt="fourth slide" width="600" height="600">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                        </div>
                        </div>
                    </div>
        
                    <?php
                        }
                        mysqli_close($conect);  
                    ?> 

                    <?php
                    include("../model/conexion.php");                
                    $sqlMPC="CALL psMosProductoComple('$idpmc');";
                    $resultadosqlMPC=mysqli_query($conect,$sqlMPC);                                                                                                     
                    while($rowMPC=mysqli_fetch_row($resultadosqlMPC)){  
                        /*echo  '1'.$rowMPC[0]." <br>";
                        echo  '2'.$rowMPC[1]." <br>";
                        echo  '3'.$rowMPC[2]." <br>";
                        echo  '4'.$rowMPC[3]." <br>";    
                        echo  '5'.$rowMPC[5]." <br>";
                        echo  '6'.$rowMPC[6]." <br>";
                        echo  '7'.$rowMPC[7]." <br>";
                        echo  '8'.$rowMPC[8]." <br>";
                        echo  '9'.$rowMPC[9]." <br>";
                        echo  '10'.$rowMPC[10]." <br>";
                        echo  '11'.$rowMPC[11]." <br>";    */
                        $direccion  =  $rowMPC[8];
                        $comentario = $rowMPC[9];
                    ?>
                        <div class="col-12 col-md-7 alert alert-primary">
                            <div class="row">       
                                <!--Imgen-->                                                 
                                <div class="col-12 col-md-4">
                                    <img src="<?php echo  "../". $rowMPC[4];?>" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure." width="100" height="100">                                                         
                                </div>     
                                <!-- Fin Imgen-->
                                <!-- id Nombre Producto-->
                                <div class="col-12 col-md-8">
                                    <label for="inputCanP">Id Producto : <?php echo  $rowMPC[0];?></label>   <br>
                                        <input type="hidden" name="usuventa" id="" value="<?php echo  $rowMPC[0];?>">                                                                
                                    <label for="inputCanP" >Nombre de Producto: <span class="font-weight-bold"><?php echo  $rowMPC[1];?></span></label> 
                                        <input type="hidden" name="usuventa" id="" value="<?php echo  $rowMPC[1];?>">                                                                                                            
                                </div>    
                                <!-- Fin id Nombre Producto--> 
                                <!-- Descripcion --> 
                                <div class="col-12 col-md-12">                                    
                                    <label for="inputCanP">Descripción:</label>
                                        <p class="font-weight-bold">
                                            <?php echo  $rowMPC[2];?>
                                            </p>
                                </div>
                                <!-- Fin Descripcion --> 
                                <!--Marca y Categoria-->
                                <div class="col-12 col-md-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">  
                                            <label for="inputCanP">Marca:  <span class="font-weight-bold"><?php echo  $rowMPC[10];?></span></label>                                    
                                        </div>
                                        <div class="col-12 col-md-6">  
                                            <label for="inputCanP">Categoría:  <span class="font-weight-bold"><?php echo  $rowMPC[11];?></span></label>
                                        </div>
                                    </div>
                                </div>
                                <!--Fin Marca y Categoria-->
                                <!-- Precio Unitario Y fecha --> 
                                <div class="col-12 col-md-12">                                                                                                                                                
                                    <div class="row">
                                        <div class="col-12 col-md-6">  
                                            <label for="inputCanP">Precio Unitario : <span class="font-weight-bold"><?php echo  $rowMPC[3];?></span></label>                                                                                                                
                                        </div>
                                        <div class="col-12 col-md-6">  
                                        <label for="inputCanP">Fecha que sea alojo el producto: <br><span class="font-weight-bold"><?php echo  $rowMPC[5];?></span></label>
                                        </div>
                                    </div>
                                </div> 
                                <!-- Fin Precio Unitario Y fecha -->        
                                <!--Productos existente-->  
                                <div class="col-12 col-md-12">    
                                    <label for="inputCanP">Productos existentes: <span class="font-weight-bold"><?php echo  $rowMPC[6];?></span></label>
                                    <?php $estatus= $rowMPC[7];
                                        if($estatus==1){
                                            ?>                                                                    
                                            <label for="inputCanP"><?php echo "   ";?> <span class="font-weight-bold text-success"><?php echo "   Disponibles";?></span></label><br>                                                                    
                                    <?php                                                                                                                        
                                        }else if($estatus||1){
                                        ?>
                                            <label for="inputCanP"> <?php echo "   ";?> <span class="font-weight-bold text-danger"><?php echo  "Agotados";?></span></label><br>                                                                    
                                        <?php                                 
                                        }
                                    ?>
                                </div>   
                                <!--Productos existente-->      
                                <!--Datos del vendedor-->
                                <div class="col-12 col-md-12">                                        
                                    <div class="row">
                                        <div class="col-12 col-md-6">  
                                        <label for="inputCanP">Datos Vendedor: <br> <span class="font-weight-bold"><?php echo  $rowMPC[12];?></span></label>
                                        </div>
                                        <div class="col-12 col-md-6">  
                                        <label for="inputCanP"></span> email: <br> <span class="font-weight-bold"> <?php echo$rowMPC[13];?></span></label>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                if($direccion !="" || $comentario!=""){
                                ?>
                                    <div class="col-12 col-md-12">                                        
                                        <div class="row">
                                            <?php 
                                            if($comentario==""){
                                            ?>
                                                <div class="col-12 col-md-6">  
                                               <!-- <label for="inputCanP"></span> Entrega: <br> <span class="font-weight-bold"> <?php echo$rowMPC[8];?></span></label>-->
                                               <label for="inputCanP"></span> Entrega: <br> <span class="font-weight-bold"> Éste producto será entregado por la paqueteria Fedex</span></label>
                                                </div>
                                            <?php
                                            }
                                            else if($direccion==""){
                                            ?>  
                                                <div class="col-12 col-md-6">  
                                                <label for="inputCanP">comentario: <br> <span class="font-weight-bold"><?php echo  $rowMPC[9];?></span></label>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <!--Fin Datos del vendedor-->
                                <!--formulario-->
                                <form action="" method="post">
                                    <input type="hidden" name="idenProd" id="" value="<?php echo openssl_encrypt($idpmc,COD,KEY); ?>">
                                    <input type="hidden" name="nombre" id="" value="<?php echo openssl_encrypt($rowMPC[1],COD,KEY);?>">
                                    <input type="hidden" name="Precio" id="" value="<?php echo openssl_encrypt($rowMPC[3],COD,KEY); ?>">
                                    <!--<input type="hidden" name="cantidad" id="" value="<?php// echo openssl_encrypt(1,COD,KEY); ?>">-->                                                                
                                <div class="col-12 col-md-12">                                 
                                    <div class="row p-3 mb-2 bg-light">
                                        <div class="col-12 col-md-12 text-center"> 
                                            <label for="inputProductCan" class="text-success font-weight-bold">Cantidad a comprar:</label>        
                                            <select id="inputProductCan" class="btn btn-success dropdown-toggle" name="cantidad">                                
                                                    <?php 
                                                        $stockR = $rowMPC[6];
                                                        for($i=1; $i <= $stockR; $i++){                    
                                                            ?>                                                                                                                
                                                                <option value="<?php echo $i?>"><?php echo $i?></option>                         
                                                        <?php
                                                        }
                                                    ?>                                                                                                                 
                                            </select>
                                            
                                        </div>                                    
                                        <br><br>
                                        <div class="col-12 col-md-12 text-center"> 
                                            <input type="hidden" name="usuventa" id="" value="<?php echo openssl_encrypt($row[6],COD,KEY); ?>">
                                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">
                                            Agregar a carrito</button>
                                        </div>
                                    </div>                                
                                </div>                                
                                </form>     
                                <!-- fin formulario-->                                                           
                            </div>                                                          
                        </div>  
                                                            
                    <?php
                        }
                        mysqli_close($conect); 
                    ?>      
            </div>
        </div>                             
<br>
    
<div class="container">
        <!--Seccion de Comentarios-->               
    <div class="row">          
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="jumbotron jumbotron-fluid">                                
                <div class="container">                                   
                    <!--Formulario-->
                        <?php
                        if(isset($_SESSION["Email"])) {
                        ?>
                    <div class="row">
                        <div class="container">
                            <form action="modelcomen.php" method="post">
                                <h1 class="display-4">Agregar Comentario </h1>
                                <div class="form-group">
                                    <!--<label for="exampleFormControlTextarea1">Example textarea</label>-->                            
                                    <textarea class="form-control" name="desComentario" id="exampleFormControlTextarea1" rows="6"></textarea>
                                </div>     
                                <input type="hidden" name="txtipProducto" id="" value="<?php echo $idpmc; ?>">
                                <input type="hidden" name="txtipUsuario" id="" value="<?php echo $ideUsu; ?>">
                                <!--<i class="far fa-comment-dots"><input type="submit" class="btn  btn-info left" name="enviar" value="Publicar"></i>-->
                                <button type="submit" class="btn  btn-info left" name="enviar" value="Publicar">
                                <i class="far fa-comment-dots"></i> Publicar
                                </button>
                                <input class="btn btn-secondary text-white left" type="reset" name="" value="Cancelar">                            
                            </form>
                        </div>
                    </div>
                        <?php
                        }else if(isset($_SESSION["Email"]) == '') {   
                                echo '<a class="nav-link active cerrar" aria-current="page" href="../login/login.php">Si deseas agregar comentarios, es necesario que inicies sesión</a> ';                  
                            }
                        ?>
                    <!--Fin Formulario-->
                    <!--Mostrar Comentarios-->
                    <div class="row">
                        <div class="container col-sm-9 col-md-9 col-lg-9">
                            <h1>Comentarios</h1>        
                            <?php 
                                    include("../model/conexion.php");                
                                    $sqlMPCE="CALL psMosComenProdu('$idpmc');";
                                    $resultadosqlMPCE=mysqli_query($conect,$sqlMPCE);                                                                                                     
                                    while($rowMPCE=mysqli_fetch_row($resultadosqlMPCE)){  
                                        ?>                                    
                                                                                                                      
                            <div class="card">
                                <div class="card-header">  
                                    <div class="row">
                                        <img class="rounded-circle" src="<?php echo '../crudperfilusuario/'.$rowMPCE[2];?>" alt=".." width="50" height="50">
                                        <p class="card-text"><?php echo $rowMPCE[0];?></p>                                                                                                                                        
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                <p class="card-text"><?php echo $rowMPCE[1];?> </p>
                                </div>
                                <div class="card-footer text-muted">
                                <?php echo $rowMPCE[3];?>
                                </div>                                
                            </div>
                            <br>
                            <?php 
                                        }                                                            
                                        mysqli_close($conect);                                          
                                        ?>   
                        </div>
                    </div>
                    <!--Fin Mostrar Comentarios-->
                </div>
            </div>                                 
        </div>        
        <!--Fin Seccion de Comentarios-->
    </div>    
</div>    
<!--Fin del Cuerpo de la pagina-->    

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
</body>
</html>


