<?php          
if(isset($_SESSION["Email"])) {                
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
    <title></title>             
    <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>    
</head>
<body>
<!--NAV-->
<!-- <nav class="navbar navbar-dark bg-dark text-white"> -->
    <nav class="navbar  text-white" style="background: #0B3861;">
        <div class="container-fluid p-7">        
            <div class="col-sm-2">                
                <center><a href="../index.php"><img src="../img\utilidades\storetransblan.png" width="100" height="100" class="img-fluid" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Home"></a></center>
            </div>   
            <div class="col-sm-3">     
                <ul class="nav text-white ">
                    <li class="nav-item">
                    <a class="nav-link active  text-light" aria-current="page" href="../index.php" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Home"><h5><i class="fas fa-home"></i>  Home</h5></a>
                    </li>                                    
                </ul>
            </div>
            
            <div class="col-sm-7">
                <p class="text-right">
                <ul class="nav text-white ">                       
                    <li class="nav-item">
                        <a class="nav-link active cerrar" aria-current="page" href="../login/cerrarSesion.php" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Cerrar"><h5 style="color: #FE2E2E;"><i class="far fa-times-circle"></i>  Cerrar Sesion</h5></a>                    
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
                                            <div class="col-md-8">                                                                                            
                                                <a class="nav-link active  text-info" aria-current="page" href="#" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Perfil"><h5><?php echo ($_SESSION["Nombre"]);?></h5></a>                                                 
                                            </div>
                                            <div class="col-md-3">
                                                <img class="rounded-circle" src="<?php echo '../crudperfilusuario/'.$row[0];?>" alt=".." width="50" height="50" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Perfil">  
                                            </div>              
                                            <div class="col-md-1">
                                            </div>                                            
                                        </div>
                        <?php                
                            }
                            mysqli_close($conect);                                          
                        ?>                                                                                   
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link active  text-info" aria-current="page" href="../crudperfilusuario/perfil.php" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Regresar"><h5><i class="fas fa-undo-alt"></i>   Regresar</h5></a>                        
                    </li>                                                    
                    
                </ul>
                </p>
            </div>
        </div>
    </nav>
<!--FIN NAV-->    




        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script>
            $(function () {
                $('[data-toggle="popover"]').popover()
            })
        </script>
</body>
</html>

<?php 
}
?>