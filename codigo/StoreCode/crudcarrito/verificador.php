<?php
//Inicio de La sesion
session_start();        
include("encriptacion.php"); 
include("mostrarcarrito.php");                          
if(isset($_SESSION["Email"])) {   
    unset($_SESSION['CARRITO']);    
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
            
                <img src="../img\utilidades\storetransblan.png" width="200" height="200" class="img-fluid" >
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
                    <li class="nav-item">                    
                        <a class="nav-link active  text-info" aria-current="page" href="../crudcarrito/vistaaltacarrito.php"><i class="fas fa-cart-plus fa-3x "></i>Carrito(<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?>)</a>
                    </li>                    
                </ul>
            </div>
        </div>
    </nav>
<!--FIN NAV-->


<div class="container">
    <?php
    //print_r(@$_GET);
    @$idVenta = $_GET['idVenta'];
    //echo "<br> ". $idVenta;
    //metodo*/
    //
        
    ?>
     
    <!--Card-->                             
        <div class="card w-75">
            <div class="card-header">
                <h5 class="card-title">TICKET</h5>
            </div>
            <div class="card-body">                
                <?php    
                //Cliente                    
                include("../model\conexion.php");                
                $sqlSelectVNC ="CALL psMosNomCliente($idVenta);";           
                $ejeconsultaSqlVNC=mysqli_query($conect,$sqlSelectVNC);                                                       
                while($regNC = mysqli_fetch_row($ejeconsultaSqlVNC)){
                ?>
                    <p class="card-text">Cliente: <?php echo $regNC[0];?></p>
                    <hr class="my-4"></hr>
                <?php 
                    }
                    mysqli_close($conect);
                ?> 
                <?php  
                //Productos                      
                include("../model\conexion.php");
                $sqlSelectVPro ="CALL psMosTicketProductos($idVenta);";           
                $ejeconsultaSqlVPro=mysqli_query($conect,$sqlSelectVPro);                                                       
                while($regNPro = mysqli_fetch_row($ejeconsultaSqlVPro)){
                ?>                     
                    <p class="card-text">Producto: <?php echo $regNPro[0];?></p>
                    <p class="card-text">Precio Unitario: <?php echo $regNPro[1];?></p>
                    <p class="card-text">Cantidad de Productos: <?php echo $regNPro[2];?></p>
                    <hr class="my-4"></hr>
                <?php 
                    }
                    mysqli_close($conect);
                ?> 
                <?php  
                //Total
                include("../model\conexion.php");
                $sqlSelectTotal ="CALL psMosTotalVenta($idVenta);";           
                $ejeconsultaSqlTotal=mysqli_query($conect,$sqlSelectTotal);                                                       
                while($regNTotal = mysqli_fetch_row($ejeconsultaSqlTotal)){
                ?> 
                    <p class="card-text">Total: <?php echo $regNTotal[0];?></p>  
                <?php 
                    }
                    mysqli_close($conect);
                ?>                                                         
            </div>
            <div class="card-footer text-muted">
            <form action="factura.php" method="post">                                                                                        
                    <input type="hidden" name="txtFactura" value="<?php echo $idVenta;?>">
            <button type="submit" class="btn btn-primary"> <i class="fas fa-print"></i> Imprimir </button>
            </form>
            
            </div>            
        </div>                                                
    <!--Fin Card-->

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
</body>
</html>


<?php
//Fin de la condicion de la sesion
}else{
    echo "Sesion Incorrecta";
    }
//Fin de la condicion de la sesion
?>