<?php
//Inicio de La sesion
session_start();              
if(isset($_SESSION["Email"])) {  
    echo session_id();

    // echo "<h3 class='center green-text text-darken-4'>" . ($_SESSION["Email"]) ."</h3> </br>" ;
    // echo "<h3 class='center green-text text-darken-4'>" . ($_SESSION["Nombre"]) ."</h3> </br>" ;
   //  echo "<h3 class='center green-text text-darken-4'>" . ($_SESSION["Iden"] ) ."</h3> </br>" ;  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
    <title>Alojar Producto</title> 
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
                <p  class="navbar-brand"><H2>Alojar producto</H2></p>         
            </div>
            <div class="col-sm-5">
                <ul class="nav text-white">
                    <li class="nav-item">
                    <a class="nav-link active  text-light" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active cerrar" aria-current="page" href="../login\cerrarSesion.php">Cerrar Sesion</a>                    
                    </li>
                    <li class="nav-item">                    
                    <a class="nav-link active  text-info" aria-current="page" href="#"><?php echo "<h5 class='center green-text text-darken-4'>" . ($_SESSION["Nombre"]) ."</h5> </br>" ; ?></a>
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

            <div class="card-body text-info">
            <!--Inicio del formulario-->
                <form class="text-dark" action="../controlador\altaproductocontroller.php" method="POST" enctype="multipart/form-data">                
                <!--onsubmit="return validarAltaProducto();"-->
                    <!--Titulo-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="inputNombreP">Titulo Producto:</label>
                            <input type="text" class="form-control" id="inputNombreP" name="txtNonProduc" placeholder="Producto" require>
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
                            <textarea class="form-control" id="inputDes" name="txtDesProduct" rows="10" cols="40" placeholder="Descripción"></textarea>
                            <!--<input type="text" class="form-control" id="inputDes" name="txtDesProduct" placeholder="Descripción">-->
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
                            <select id="inputStateMP" class="form-control" name="cmbMarcaP">                                
                                <option value="0" disabled selected> -Seleccione Marca- </option>
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
                            <select id="inputStateCP" class="form-control" name="cmbCategoriaP">                                
                                <option value="0" disabled selected> -Seleccione Categoría- </option>
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
                            <input type="number" class="form-control" id="inputCanP" name="txtCanP" placeholder="1">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPU">Precio Unitario:</label>
                            <input type="number" class="form-control" id="inputPU" name="txtPrecioU" placeholder="$0.0">
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
                            <div class="photo">
                                <label for="foto"><i class="fas fa-image fa-2x "></i>  Imagen Producto:</label>                                
                                    <div class="prevPhoto">
                                    <span class="delPhoto notBlock">X</span>
                                    <label for="foto"></label>
                                    </div>
                                    <div class="upimg">
                                    <input type="file" name="foto" id="foto">
                                    </div>
                                    <div id="form_alert"></div>
                            </div>
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
                            <!--<button type="button" class="btn btn-info">   Crear  </button>-->
                            <!--<input  type="submit" class="btn boton_crear text-white" name="enviar" value="Alojar Producto">-->                            
                            <button type="submit" class="btn boton_crear text-white" name="enviar"><i class="far fa-save"></i>  Alojar Producto</button>
                            
                            <!--<td><input class="btn btn-danger" type="submit"  value="Enviar" name="enviar" onClick="comprobarClave()"></td>-->
                        </div>
                        <div class="form-group col-md-3">
                            <!--<button type="button" class="btn btn-dark">  Cancelar  </button>-->                            
                            <!--<input class="btn btn-dark text-white right" type="reset" name="" value="Cancelar"> -->  
                            <button class="btn btn-dark text-white right" type="reset" name=""><i class="far fa-window-close"></i>  Cancelar</button>                         
                            
                        </div>                                                
                    </div>    
                    
                    </form>
            </div>
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
        
</body>
</html>



<?php
//Fin de la condicion de la sesion
}else{
    echo "Sesion Incorrecta";
    }
//Fin de la condicion de la sesion
?>