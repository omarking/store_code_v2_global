<?php
//Inicio de La sesion
session_start();              
if(isset($_SESSION["Email"])) {         
    $idProduct = $_GET['mod'];                    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
    <title>Modificar producto</title>     
    <link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>         
    <link rel="stylesheet" href="stiloactuproducto.css" type="text/css">
    <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="producto.js"></script>                                   
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
                <p  class="navbar-brand"><H2>Modificar producto</H2></p>         
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
                    <a class="nav-link active  text-light" aria-current="page" href="perfil.php"><i class="fas fa-undo-alt"></i>   Regresar</a>
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

        <div class="card border-info" >            
            <div class="card-header row">
                <div class="col-sm-4 text-center" >
                    <img src="../img\utilidades\logostorewayblanco.png" width="100" height="100" class="img-fluid" >                                    
                </div>
                <div class="col-sm-8 text">
                    <h1>Datos del Producto!!!</h1>
                </div>
            </div>
                <?php 
                    //$idProduct = $_GET['mod'];
                    //echo $idProduct."<br>">;
                    $ideUAct=($_SESSION["Iden"]);
                    //echo $ideUAct."<br>">;
                    //CALL psMosActProducto('$idProduct','$ideUAct');
                    include("../model/conexion.php");          
                    $sqlMosMarc ="CALL psMosActProducto('$idProduct','$ideUAct');";                                      
                    $ejecuMosMarc=mysqli_query($conect,$sqlMosMarc);       
                    mysqli_close($conect);                                                                            
                    while($rowMosMarc = mysqli_fetch_row($ejecuMosMarc)){
                        
                        ?>                
            <div class="card-body text-info">
            <!--Inicio del formulario-->
                <form class="text-dark" action="modeleactpro.php" method="POST" enctype="multipart/form-data">                
                    <input type="hidden"  name="txtidProducto" value='<?php echo $rowMosMarc[0]; ?>'>
                    <!--Titulo-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="inputNombreP">Titulo Producto:</label>
                            <input type="text" class="form-control" id="inputNombreP" name="txtNomActPr" placeholder="Producto" value="<?php echo $rowMosMarc[1];?>" require>
                        </div>                        
                        <div class="form-group col-md-2">
                        </div>
                    </div>
                    <!--
                        Name  -> name="txtNonProduc", name="txtDesProduct"
                        ID ->id="inputNombreP", id="inputDes"                 
                    -->
                    <!--Descripcion-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="inputDes">Descripción Producto:</label>
                            <textarea class="form-control" id="inputDes" name="txtDesActPr" rows="10" cols="40" placeholder="Descripción" value="<?php echo $rowMosMarc[2];?>"><?php echo $rowMosMarc[2];?></textarea>                            
                        </div>
                        <div class="form-group col-md-2">
                        </div>
                    </div>
                                        
                    <!--2 combos Marca Categoria-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputStateMP">Marca:</label>        
                            <?php                            
                                include("../model/conexion.php");          
                                $conMarc ="CALL psMarcaAct;";   
                                $ejeconsultaMarc=mysqli_query($conect,$conMarc);                                                               
                                $result_proveedor = mysqli_num_rows($ejeconsultaMarc);
                                mysqli_close($conect);
                            ?>                                                
                            <select id="inputStateMP" class="form-control notItemOne" name="cmbMarcaActPr">                                                                
                            <option value="<?php echo $rowMosMarc[6];?>"><?php echo $rowMosMarc[7];?></option>                                
                                <?php
                                    if($result_proveedor > 0){
                                        while($marca = mysqli_fetch_array($ejeconsultaMarc)){
                                ?>                                                                       
                                    <option value="<?php echo $marca['idMarca']?>"><?php echo $marca['desMarca']?></option>
                                <?php
                                        }
                                    }
                                ?>                                                                
                            </select>
                        </div>  
                        <div class="form-group col-md-4">
                            <label for="inputStateCP">Categoría:</label>
                            <?php                            
                                include("../model/conexion.php");          
                                $conCate ="CALL psCateAct();";   
                                $ejeconsultaCate=mysqli_query($conect,$conCate);                                                               
                                $result_categoria = mysqli_num_rows($ejeconsultaCate);
                                mysqli_close($conect);
                            ?>
                            <select id="inputStateCP" class="notItemOne form-control" name="cmbCategoriaActPr">                                
                                    <option value="<?php echo $rowMosMarc[8];?>"><?php echo $rowMosMarc[9];?></option>
                                    <?php
                                        if($result_categoria > 0){
                                            while($categoria = mysqli_fetch_array($ejeconsultaCate)){
                                    ?>                                       
                                        <option value="<?php echo $categoria['idCategoria']?>"><?php echo $categoria['desCategoria']?></option>
                                    <?php
                                            }
                                        }
                                    ?>     
                            </select>
                        </div>                        
                        <div class="form-group col-md-2">
                        </div>
                    </div>
                    <!--
                        Name  -> name="cmbCategoriaP",name="cmbMarcaP"
                        ID -> id="inputStateCP",id="inputStateMP" 
                    -->
                    
                    <!--Precio y Cantidad-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCanP">Cantidad de Productos:</label>
                            <input type="number" class="form-control" id="inputCanP" name="txtCanActPr" placeholder="1" value="<?php echo $rowMosMarc[5];?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPU"><i class="fas fa-dollar-sign"></i>  Precio Unitario:</label>
                            <input type="number" class="form-control" id="inputPU" name="txtPrecioActPr" placeholder="$0.0" value="<?php echo $rowMosMarc[3];?>">
                        </div>
                        <div class="form-group col-md-2">
                        </div>
                        <!--
                        Name  -> name="txtCanP", name="txtPrecioU"
                        ID -> id="inputCanP", id="inputPU" 
                        -->
                    </div> 

                    <!--Imagen-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-4">    

                                                <?php								            	  											
                                                $foto ='';
                                                $classRemove ='notBlock'; 
                                                $imagen = "../" . $rowMosMarc[4];                                                 
                                                if( $imagen != '../img/productos/productodefault.jpg'){
                                                    $classRemove ='';
                                                    $foto='<img id="img" src="'.$imagen.'" alt="Imagen Producto" >';//Ruta ->Imprimir en la imagen 												                                                    
                                                    }                                            
                                                ?> 

                            <input type="hidden" id="foto_actual" name="foto_actual" value='<?php echo $imagen; ?>'>
                            <input type="hidden" id="foto_remove" name="foto_remove" value='<?php echo $imagen; ?>'>
                        
                            <div class="photo">
                                <label for="foto"><i class="fas fa-image fa-2x "></i>  Actualizar Imagen del producto:</label>                                
                                <div class="prevPhoto">
                                    <span class="delPhoto <?php echo $classRemove;?>">X</span>
                                    <label for="foto"></label>
                                    <?php echo $foto;?>
                                </div>
                                <div class="upimg">
                                    <input type="file" name="foto" id="foto">
                                </div>
                                <div id="form_alert"></div>
                            </div>	
                            <br>                            	                            
                        </div>
                        <div class="form-group col-md-4">                            
                        </div>                                                  
                        <!--
                        Name  -> name="txtCanP", name="txtPrecioU"
                        ID -> id="inputCanP", id="inputPU" 
                        -->
                    </div>                     
                    <!--Botones-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        
                        <div class="form-group col-md-5">                            
                            <button type="submit" class="btn boton_crear text-white" name="enviar"><i class="far fa-save"></i>  Actualizar Producto</button>                                                        
                        </div>
                        <div class="form-group col-md-3">                            
                            <a href="perfil.php" class="btn btn-dark text-white right" type="reset"><i class="far fa-window-close"></i>  Cancelar</a>
                        </div>                                                
                    </div>                        
                </form>
            </div>
            <?php
                                }
                                
                            ?>                             
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