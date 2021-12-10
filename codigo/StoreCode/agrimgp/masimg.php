<?php
//Inicio de La sesion
session_start();
if(isset($_SESSION["Email"])) {
   $idenmasPro = ($_SESSION["Iden"] ) ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Agregar más imágenes al producto</title>
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
                <a href="../index.php"><img src="../img\utilidades\storetransblan.png" width="200" height="200" class="img-fluid" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Home"></a>
            </div>
            <div class="col-sm-5 text-wrap">
                <p  class="navbar-brand"><H2>Agregar más imágenes al producto</H2></p>
            </div>
            <div class="col-sm-5">
                <ul class="nav text-white">
                    <li class="nav-item">
                    <a class="nav-link active  text-light" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active cerrar" aria-current="page" href="../login/cerrarSesion.php">Cerrar Sesion</a>
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
                    <a class="nav-link active  text-light" aria-current="page" href="../crudperfilusuario/perfil.php"><i class="fas fa-undo-alt"></i>   Regresar</a>
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
    <!--Car Agregar Imagenes-->
    <div class="card">
        <div class="card-header text-center" style="background: #0097a7;" >
            <h4  class="font-weight-normal">Agregar más imágenes al producto</h4>
        </div>
        <div class="card-body">
            <!---Inicio tabla Productos vendidos-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <!--<table id="example" class="table table-striped table-bordered" style="width:100%">                                                -->
                        <table class="table table-striped">
                            <thead class="text-white" style="background: #4db6ac;">
                                <tr>
                                <th >Nombre</th>
                                <th ><i class="far fa-images"></i>  Imagen</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include("../model/conexion.php");
                                    $sqlPV ="CALL psMosProdImgAgregar('$idenmasPro');";
                                    $ejePV= mysqli_query($conect,$sqlPV);
                                    while($rowPV = mysqli_fetch_row($ejePV)){
                                        echo "<tr>
                                        <th>". $rowPV[1] . "</th>
                                        <td> <img src='../". $rowPV[2] ."' width='100' height='100' class='img-fluid'></td>
                                        <td><a class='text-center' href='agreimgpro4.php?idagre=".$rowPV[0]."'><button type='button' class='btn btn-success'><i class='fas fa-plus-circle'>  </i><i class='far fa-images'></i>  Agregar Imágenes</button></a>
                                        </tr>";
                                    }
                                    mysqli_close($conect);
                                ?>
                            </tbody>
                            <tfoot>

                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
            <!---Fin tabla Productos vendidos-->
        </div>
    </div>
    <!--FinCar Agregar Imagenes-->
<br><br>
    <!--Car Actualizar Imagenes-->
    <div class="card">
        <div class="card-header text-center" style="background: #66bb6a ;" >
            <h4  class="font-weight-normal">Actualizar imágenes al producto</h4>
        </div>
        <div class="card-body">
            <!---Inicio tabla Productos vendidos-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <!--<table id="example" class="table table-striped table-bordered" style="width:100%">                                                -->
                        <table class="table table-striped">
                            <thead class="text-white" style="background: #81c784;">
                                <tr>
                                <th >Nombre</th>
                                <th ><i class="far fa-images"></i>  Imagen</th>
                                <th ><i class="far fa-images"></i>  Imagen 2</th>
                                <th ><i class="far fa-images"></i>  Imagen 3</th>
                                <th ><i class="far fa-images"></i>  Imagen 4</th>
                                <th ><i class="far fa-images"></i>  Imagen 5</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include("../model/conexion.php");
                                    $sqlPVImgA ="CALL psActuImgs('$idenmasPro');";
                                    $ejePVImgA= mysqli_query($conect,$sqlPVImgA);
                                    while($rowPVImgA = mysqli_fetch_row($ejePVImgA)){
                                        echo "<tr>
                                        <th>". $rowPVImgA[1] . "</th>
                                        <td> <img src='../". $rowPVImgA[2] ."' width='100' height='50' class='img-fluid'></td>
                                        <td> <img src='../". $rowPVImgA[3] ."' width='100' height='50' class='img-fluid'></td>
                                        <td> <img src='../". $rowPVImgA[4] ."' width='100' height='50' class='img-fluid'></td>
                                        <td> <img src='../". $rowPVImgA[5] ."' width='100' height='50' class='img-fluid'></td>
                                        <td> <img src='../". $rowPVImgA[6] ."' width='100' height='50' class='img-fluid'></td>
                                        <td><a class='text-center' href='../actimgpc/actimgproc.php?idact=".$rowPVImgA[0]."'><button type='button' class='btn btn-info'><i class='fas fa-edit'></i>  Actualizar</button></a>
                                        </tr>";
                                    }
                                    mysqli_close($conect);
                                ?>
                            </tbody>
                            <tfoot>

                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
            <!---Fin tabla Productos vendidos-->
        </div>
    </div>

    <!--Fin Car Actualizar Imagenes-->
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
        <script>
            $(function () {
                $('[data-toggle="popover"]').popover()
            })
        </script>
</body>
</html>



<?php
//Fin de la condicion de la sesion
}else{
    echo "Sesion Incorrecta";
    }
//Fin de la condicion de la sesion
?>
