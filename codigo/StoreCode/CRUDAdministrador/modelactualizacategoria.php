<?php
session_start();
if(isset($_SESSION["nombreUsuario"])) {        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.bootstrap4.min.css"/>

    <title>¡Bienvenido administrador!</title>    
    <link rel="shortcut icon" href="../img\utilidades\logo tienda online transparente .png" />
    <link rel="stylesheet" href="../css\estiloGeneral.css" type="text/css">
    <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">
    
</head>
<body>    
<!--NAV-->
<!-- <nav class="navbar navbar-dark bg-dark text-white"> -->
    <nav class="navbar  text-white">
        <div class="container-fluid p-7">        
            <div class="col-sm-2">
                <img src="../img/utilidades/logo tienda online .png" width="200" height="200" class="img-fluid" >
            </div>    
            <div class="col-sm-5 text-wrap">
            <p  class="navbar-brand"><H4> <i class="fas fa-plus-circle">  Actualizar Categoría </i></H4></p>         
            </div>
            <div class="col-sm-5">
                <ul class="nav text-white">
                    <li class="nav-item">
                    <a class="nav-link active  text-light" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active cerrar" aria-current="page" href="./cerrarSesionAdmin.php">Cerrar Sesión </a>                    
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active  text-info" aria-current="page" href="#">¡Bienvenido administrador!</a>
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
    <div class="row">
        
        <br>
        <div class="col-lg-2"></div>
        <div class="col-lg-8  col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #0B3861;">Actualizar Categoría</h5>    
                        <?php             
                        $idMosCate =$_GET["actucatego"];                            
                        include("../model/conexion.php");                                 
                        $sqlMoCA="SELECT * FROM categoria WHERE categoria.idCategoria = '$idMosCate';";
                        $resMosCa=mysqli_query($conect,$sqlMoCA);
                        mysqli_close($conect); 
                        while($rowMoCa=mysqli_fetch_row($resMosCa)){                        

                                ?>                        
                    <form action="controladoractualizacategoria.php" method="post">
                            <input type="hidden" name="txtIdCategoria" value="<?php echo $rowMoCa[0];?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Categoría</label>
                            <input type="text" class="form-control" name="txtCategoriN" value="<?php echo $rowMoCa[1];?>">                
                        </div>
                        <div class="form-group">
                            <p>Estatus:</p>
                                <div>                                                                                                
                                    <input type="radio" id="huey" name="rbestatus" value="1" checked>
                                    <label for="huey">Activo</label>
                                </div>                                                                
                                <div>                                
                                    <input type="radio" id="dewey" name="rbestatus" value="0">                                    
                                    <label for="dewey">Inactivo</label>
                                </div>                                
                        </div>                                      
                        <?php
                            }
                        ?> 
                        <button type="submit" class="btn btn-primary" style="background: #0B3861;">Actualizar</button>            
                    </form>                                
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>        
    </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>

<script type="text/javascript" src="main.js"></script>
</body>
</html>

<?php        
}else{
    echo'<script type="text/javascript">alert("Iniciar Sesión; (");</script>';
    echo'<script type="text/javascript">window.location.href="./loginAdm.php";</script>';      
    exit();
}
?>