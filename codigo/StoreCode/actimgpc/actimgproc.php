<?php
session_start();
if(isset($_SESSION["Email"])) {
    //print_r($_GET);
    $idProMos4 =$_GET['idact'];    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Actulizar imágenes al producto</title>
    <link rel="shortcut icon" href="..\img\utilidades\tiendaonlineico.ico"/>
    <link rel="stylesheet" href="stileact.css" type="text/css">
    <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>
    <?php
    include("../nav/nav.php");
    ?>
    <div class="container jumbotron">
    <?php
                //$identificador = ($_SESSION["Iden"]);
                include("../model/conexion.php");                            
                $sqlMosPD="CALL psMosActuImgsc('$idProMos4');";
                $resultadarrayMPD=mysqli_query($conect,$sqlMosPD);
                while($row=mysqli_fetch_row($resultadarrayMPD)){
                                ?>
        <h3 class="text-center" style="color: #00838f;"><i class="far fa-images"></i>  Actualizar imágenes</h3> <br>
        <h3 class="text-center" style="color: #00838f;"><img src="<?php echo "../". $row[6];?>" width="150" height="150" class="rounded-circle" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Producto"> <?php echo $row[5];?></h3>
        <br>

        <!--Inicio del formulario-->
        <form class="text-dark" action="controladoractimgc.php" method="POST" enctype="multipart/form-data">
            <!--onsubmit="return validarAltaProducto();"-->
            
            <!--Titulo-->
            <div class="form-row">
                <div class="form-group col-md-2">
                    <input type="hidden" name="txtIdProducto" value="<?php echo $row[0];?>">
                </div>
                
                <div class="form-group col-md-2">
                </div>
            </div>
            
                    <!--Imagen-->
                    <h4 class="text-center">Seleccione imagen a cargar</h4>
                    <center><img src="<?php echo "../". $row[1];?>" width="100" height="100" class="img-fluid" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Imagen 1"></center>
                    <div class="form-row">
                        <div class="col-sm-2"></div>
                        <h6><span class="col-sm-2" style="color: #006064;">Archivos</span></h6>
                        <div class="col-sm-6">
                            <div class="form-group">                            
                            <?php // campo IMAGEN NATURAL ?>
                            <div class="col-sm-10"><input type="file" id="img_natural" name="img_natural1" accept="image/jpeg" data-validation-allowing="jpg, png, gif" data-validation-error-msg="Elija una imagen con formato JPG." data-validation="required"/>
                            <input type="hidden" name="txtImgAnte1" value="<?php echo "../". $row[1];?>">
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <!--Fin Imagen 1-->
                    <hr>
                    <!--Imagen 2-->
                    <h4 class="text-center">Seleccione imagen a cargar</h4>
                    <center><img src="<?php echo "../". $row[2];?>" width="100" height="100" class="img-fluid" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Imagen 2"></center>
                    <div class="form-row">
                    <div class="col-sm-2"></div>
                        <h6><span class="col-sm-2" style="color: #006064;">Archivos</span></h6>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <?php // campo IMAGEN NATURAL ?>
                            <div class="col-sm-10"><input type="file" id="img_natural" name="img_natural2" accept="image/jpeg" data-validation-allowing="jpg, png, gif" data-validation-error-msg="Elija una imagen con formato JPG." data-validation="required"/>
                            <input type="hidden" name="txtImgAnte2" value="<?php echo "../". $row[2];?>">

                            </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <!--Fin Imagen 2-->
                    <hr>
                    <br>
                    <!--Imagen 3-->
                    <h4 class="text-center">Seleccione imagen a cargar</h4>
                    <center><img src="<?php echo "../". $row[3];?>" width="100" height="100" class="img-fluid" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Imagen 3"></center>
                    <div class="form-row">
                        <div class="col-sm-2"></div>
                        <h6><span class="col-sm-2" style="color: #006064;">Archivos</span></h6>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <?php // campo IMAGEN NATURAL ?>
                            <div class="col-sm-10"><input type="file" id="img_natural" name="img_natural3" accept="image/jpeg" data-validation-allowing="jpg, png, gif" data-validation-error-msg="Elija una imagen con formato JPG." data-validation="required"/>
                            <input type="hidden" name="txtImgAnte" value="<?php echo "../". $row[3];?>">
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <!--Fin Imagen 3-->
                    <hr >
                    <br>
                    <!--Imagen 4-->
                    <h4 class="text-center">Seleccione imagen a cargar</h4>
                    <center><img src="<?php echo "../". $row[4];?>" width="100" height="100" class="img-fluid" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Imagen 4"></center>
                    <div class="form-row">
                        <div class="col-sm-2"></div>
                        <h6><span class="col-sm-2" style="color: #006064;">Archivos</span></h6>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <?php // campo IMAGEN NATURAL ?>
                            <div class="col-sm-10"><input type="file" id="img_natural" name="img_natural4" accept="image/jpeg" data-validation-allowing="jpg, png, gif"  data-validation-error-msg="Elija una imagen con formato JPG." data-validation="required"/>
                            <input type="hidden" name="txtImgAnte4" value="<?php echo "../". $row[4];?>">
                            </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <!--Fin Imagen 4-->
                    <hr>
                    <br>
                    <?php }
                    ?>


            <!--Botones-->
            <div class="form-row">
                <div class="form-group col-md-4">
                </div>

                <div class="form-group col-md-5">
                    <button type="submit" class="btn text-white" name="enviar" style="background-color:#004aad;"><i class="far fa-save"></i>  Alojar Imagenes</button>
                </div>
                <div class="form-group col-md-3">
                    <button class="btn btn-dark text-white right" type="reset" name=""><i class="far fa-window-close"></i>  Cancelar</button>

                </div>
            </div>
        </form>
    </div>

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
        <script>
           $ .validate({
                modules: 'file'
            });
        </script>

</body>
</html>

<?php
}
?>
