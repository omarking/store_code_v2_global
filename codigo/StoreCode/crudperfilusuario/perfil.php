<?php
session_start();              
if(isset($_SESSION["Email"])) {    
    $ideU=($_SESSION["Iden"] );       
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>                                        
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
    <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    		
	<title>Perfil Usuario</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap-5.0.1/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">	
    <link rel="stylesheet" href="librerias/bootstrap-5.0.1/css/bootstrap.css">
	<link rel="stylesheet" href="styleperfil.css" type="text/css">
    <link rel="stylesheet" href="alertify\css\alertify.css" type="text/css">
    <link rel="stylesheet" href="alertify\css\alertify.css\themes\default.css" type="text/css">

    <script src="librerias/bootstrap-5.0.1/js/bootstrap.js"></script>
    <script src="librerias/select2/js/select2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="perfil.js"></script> 
    <script src="alertify/alertify.js"></script>
    <script src="https://kit.fontawesome.com/069e0037ae.js" crossorigin="anonymous"></script>              
    <script type="text/javascript" src="../js/funciones.js" defer></script>     
  </head>  
<body>
    <!--NAV-->
<!-- <nav class="navbar navbar-dark bg-dark text-white"> -->
<nav class="navbar  text-white" style="background: #0B3861;">
        <div class="container-fluid p-7">        
            <div class="col-sm-2">                
                <center><a href="../index.php"><img src="../img\utilidades\storetransblan.png" width="100" height="100" class="img-fluid" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Home"></a></center>
            </div>   
            <div class="col-sm-5">     
                <ul class="nav text-white ">
                    <li class="nav-item">
                        <a class="nav-link active  text-light" aria-current="page" href="../index.php" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Home"><h5><i class="fas fa-home"></i>  Home</h5></a>
                    </li>      
                    <li class="nav-item">
                        <a class="nav-link active  text-light" aria-current="page" href="#"><h2>Menú Usuario</h2></a>
                    </li>                          
                </ul>
            </div>
            
            <div class="col-sm-5">
                <p class="text-right">
                <ul class="nav text-white ">                                           
                    <li class="nav-item">                                        
                            <?php
                                            $identificadorNav = ($_SESSION["Iden"]);																					
                                            include("../model/conexion.php");                
                                            $sqlimgP="CALL psImagenUsuarioPerfil('$identificadorNav');";
											$resultadosqlimgP=mysqli_query($conect,$sqlimgP);  											
                                            while($rowNav=mysqli_fetch_row($resultadosqlimgP)){                                                
                                            $imagen=$rowNav[0];                                               
                                    ?>  
                                            <div class="row">
                                                <div class="col-md-3" data-toggle="modal" data-target="#ventanaModalImagen">
                                                    <img  src="<?php echo $imagen;?>" class="rounded-circle" alt=".." width="50" height="50" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Cambiar Imagen de Perfil">  
                                                </div>
                                                <div class="col-md-9" data-toggle="modal" data-target="#ventanaModal">
                                                    <a class="nav-link active  text-info" aria-current="page" href="#" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Cerrar Sesión!"><?php echo ($_SESSION["Nombre"]);?></a> 
                                                </div>
                                            </div>
                            <?php                
                                }
                                mysqli_close($conect);                                          
                            ?>                                                                                     
                    </li>                      
                </ul>
                </p>
            </div>
        </div>
    </nav>
<!--FIN NAV-->  

<!-- Inicio del Modal Cerrar Sesion -->
<div class="modal fade" id="ventanaModal" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true"><!--Fade animacion de Pantalla tenue detras-->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="tituloVentana">¡Cerrar Sesión¡</h5>
                <button class="close" data-dismiss="modal" arial-label="Cerrar">
                    <span arial-hiddeen="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<?php echo ($_SESSION["Nombre"]);?> deseas <a class="cerrar" aria-current="page" href="../login\cerrarSesion.php">Cerrar Sesion</a>                    
            </div>
            <div class="modal-footer">
            <button class="btn btn-warning" typr="button" data-dismiss="modal">        
				Cancelar
            </button>            
            </div>
        </div>
    </div>
</div>
<!-- Fin del Modal-->

<!-- Inicio del Modal Cambiar Imagen -->
<div class="modal fade" id="ventanaModalImagen" tabindex="-1" role="dialog" aria-labelledby="tituloImagenP" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="tituloImagenP"><i class="far fa-images"></i>¡Agregar Imagen¡</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <?php								            	  											
                $foto ='';

                $classRemove ='notBlock';                                                                                                                                                
                if($imagen != 'img\clientes\defaultp.PNG'){
                    $classRemove ='';
                    $foto='<img id="img" src="'.$imagen.'" alt="Imagen Perfil" >';//Ruta ->Imprimir en la imagen 												                                                    
                }                                            
            ?>   
            <form class="text-dark" action="../controlador\updatefotousucontroller.php" method="POST" enctype="multipart/form-data">                      									                                               																		 
                <input type="hidden" id="foto_actual" name="foto_actual" value='<?php echo $imagen; ?>'>
                <input type="hidden" id="foto_remove" name="foto_remove" value='<?php echo $imagen; ?>'>
            
				<div class="photo">
                <label for="foto"><i class="fas fa-image fa-2x "></i>  Actualizar Imagen de Perfil::</label>                                
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
                <div class="container">
                    <div class="row">
                        <div class="col align-self-start"></div>
                        <div class="col align-self-center">
                        <button type="submit" class="btn boton_crear text-white" name="enviar"><i class="far fa-save"></i> Guardar Cambios</button>
                        </div>
                        <div class="col align-self-end"></div>
                    </div>
                </div>							 			
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>        
      </div>
    </div>
  </div>
</div>                    
<!-- Fin  del Modal Cambiar Imagen -->

<!-----cuerpo--->
    <div class="container-fluid">        
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <!-- Completar Perfil-->
        <li class="nav-item active">
            <a class="nav-link" data-toggle="tab" href="#completarperfil"><i class="fas fa-tasks">  Completar Perfil</i> </a>        
        </li>
        <!-- Modificar Perfil-->
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#perfilconfig"><i class="fas fa-user-edit"> Modificar Perfil</i></a>            
        </li>
        <!-- Clien Id Paypal-->
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#agregarpaypa"><i class="fab fa-paypal"> Pay Pal</i></a>            
        </li>
        <!-- Nuevo producto-->
        <li class="nav-item">
            <a class="nav-link"  href="../vistacrudproducto/vistaaltaproducto.php"><i class="fas fa-external-link-square-alt">  Alojar nuevo producto</i></a>            
        </li>
        <!-- Productos en Venta-->
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#productosenventa"><i class="fas fa-share-square">  Productos en Venta</i></a>            
        </li>
        <!-- Agregar Imagenes a Productos en Venta-->
        <li class="nav-item">
            <a class="nav-link" href="../agrimgp/masimg.php"><i class="far fa-images">  Agregar más imágenes a los productos</i></a>            
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#creditcardconfig"><i class="fas fa-credit-card"> Agregar Tarjeta de cobro</i></a>            
        </li>
        <!-- Productos Comprados -->
        <li class="nav-item">
            <?php 
                        $emailConpc = ($_SESSION["Email"]);
                        include("../model/conexion.php");
                        //$sqlConPC ="SELECT COUNT(venta.FolioVenta) FROM carrito INNER JOIN venta ON venta.FolioVenta = carrito.FolioVenta  WHERE venta.correo = '$emailConpc';";
                        $sqlConPC = "SELECT COUNT(venta.FolioVenta)  FROM venta where venta.correo= '$emailConpc';";
                        $ejeConPc = mysqli_query($conect,$sqlConPC);                                                    
                        mysqli_close($conect);
                        while($rowConPC = mysqli_fetch_row($ejeConPc)){
                                $conPCE = $rowConPC[0];
                            }                        
                            
                ?>
            <a class="nav-link" data-toggle="tab" href="#productoscomprados"><i class="fas fa-cart-arrow-down">  Productos comprados <?php echo "  ( ".$conPCE." )";?></i></a>           			
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="completarperfil" class="container tab-pane active"><br>
            <!--Fin Completar Perfil--->
            <div class="card card-body border-info">
                <h4 class="text-primary text-center"><i class="fas fa-tasks"></i>    Completar perfil </h4>
                <br>
                    <!---------------------------------Inicio de Formulario configuracion de perfil--------------------------------------------------> 
                <form class="text-dark" action="../controlador/modeldatosfal.php" method="post" onsubmit="">                           
                    <?php
                                        $identificador = ($_SESSION["Iden"]);                                                                                
                                        include("../model/conexion.php");                
                                        $sqlarraycu="CALL psUpdateDaFa('$identificador');";
                                        $resultadarraycu=mysqli_query($conect,$sqlarraycu);                                                             
                                        //$posicionarraycu=mysqli_fetch_assoc($resultadarraycu);
                                        while($row=mysqli_fetch_row($resultadarraycu)){
                                        //mysqli_close($conect);   
                                                                                   
                                ?>                                          
                    <!--Apellido-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="inputApellido2">Segundo apellido:</label>
                            <input type="text" class="form-control" id="inputApellido2" name="txtApellido2U" value="<?php echo $row[1];?>" require>
                        </div>
                        <div class="form-group col-md-2">                            
                        </div>
                    </div>                                        
                    <!--Dirección y Código Postal-->
                    <!--<div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDireccion">Dirección:</label>                            
                            <input type="text" class="form-control" name="txtDireccionUsu"  id="inputDireccion" value="<?php echo $row[2];?>" require>
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="inputCodiPostal">Código Postal:</label>                            
                            <input type="text" class="form-control" name="txtCodiPostalU"  id="inputCodiPostal" value="<?php echo $row[3]?>" require>
                        </div>                        
                        <div class="form-group col-md-2">
                        </div>
                    </div>  -->                  
                    <!--Teléfono y RFC-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="inputTelefono">Teléfono:</label>                            
                            <input type="text" class="form-control" name="txtTelefonoU"  id="inputTelefono" value="<?php echo $row[4];?>" require>                            
                        </div>                                        
                        <div class="form-group col-md-4">                                                                                                              
                            <label for="inputRFC">RFC:</label>                            
                            <input type="text" class="form-control" name="txtRFCU"  id="inputRFC" value="<?php echo$row[3];?>" require>                            
                        </div>
                        <div class="form-group col-md-2">
                        </div>                        
                    </div>  
                    <!--Fecha de Nacimiento-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>                        
                        <div class="form-group col-md-8">
                            <label for="inputFechaNaCU">Fecha de Nacimiento:</label>                                                        
                            <center><input type="date" min="1920-01-01" max="2021-01-08" name="txtFechaNaCU"  id="inputFechaNaCU" value="<?php echo$row[6];?>"></center>
                        </div>                                                                
                        <div class="form-group col-md-2">
                        </div>                        
                    </div>  
                    <?php                
                            }
                            mysqli_close($conect);                                          
                        ?>    
                        <!--Botones-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>                        
                        <div class="form-group col-md-3">                            
                            <input type="submit" class="btn boton_crear text-white" name="enviar" value="Aceptar">                            
                        </div>
                        <div class="form-group col-md-3">                            
                            <input class="btn btn-dark text-white right" type="reset" name="" value="Cancelar">                            
                        </div>                        
                        <div class="form-group col-md-3">
                        </div>    
                </form> 
                <br>
                <br>
<!-------------------------------------------------INGRESA TU DIRECCION--------------------------------------------------------------->   
                       
    <!--Modal ingresar direcion-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresa tu dirección</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
        </div>
    <div class="modal-body">

                            <!--Inicio de formulario dirección-->
                            <!--conexion base de datos-->

        <form class="text-dark" action= "../crudperfilusuario/altaDireccion.php" method="post" onsubmit="">
               <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Código postal</label>
                        <input type="codigo postal" class="form-control" name="CodigoPostalUsuario" id="CodigoPostalUsuario">  
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Estado</label>
                        <input type="estado" class="form-control" name="estado" id="estado">  
                    </div>
                </div>
                <div class="form-group">
                        <label for="inputAddress">Municipio</label>
                        <input type="text" class="form-control" name="municipio" id="municipio">  
                </div>
                <div class="form-group">
                        <label for="inputAddress2">Colonia</label>
                        <input type="text" class="form-control" name="colonia" id="inputColonia">
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Calle principal</label>
                        <input type="text" class="form-control" name="callePrincipal" id="callePrincipal"> 
                </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Numero exterior</label>
                        <select id="numeroExterior" class="form-control"  name="numeroExterior" id="numeroExterior">   
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">calle1</label>
                        <input type="codigo postal" class="form-control" name="calle1" id="calle1">   
                </div>
                <div class="form-group col-md-6">
                        <label for="inputEmail4">calle2</label>
                        <input type="estado" class="form-control" name="calle2" id="calle2">   
                    </div>
                </div>
             </div>
                <div class="form-group">
                        <label for="inputAddress">Referencia</label>
                        <input type="text" class="form-control" name="referencia" id="referencia">      
                    </div>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar dirección</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <br>
                
        </form>   
            </div>
        </div>   
   </div> 
   </div> 
   <!---------------------------------------------FIN MODAL 1 -------------------------------------------------------------------->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Datos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
        </div>
    <div class="modal-body">
                            <!--Inicio de formulario dirección-->
                            <!--conexion base de datos-->

            <form class="text-dark" action="../crudperfilusuario/actuDireccion.php" method="post" onsubmit="">
               <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Código postal</label>
                        <input type="hidden" class="form-control" name="IdDireccionu" id="IdDireccionu">
                     
                        <input type="text" class="form-control" name="CodigoPostalUsuariou" id="CodigoPostalUsuariou">  
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Estado</label>
                        <input type="text" class="form-control" name="estadou" id="estadou">  
                    </div>
                </div>
                <div class="form-group">
                        <label for="inputAddress">Municipio</label>
                        <input type="text" class="form-control" name="municipiou" id="municipiou">  
                </div>
                <div class="form-group">
                        <label for="inputAddress2">Colonia</label>
                        <input type="text" class="form-control" name="coloniau" id="coloniau">
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Calle principal</label>
                        <input type="text" class="form-control" name="callePrincipalu" id="callePrincipalu"> 
                </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Numero exterior</label>
                        <select  class="form-control"  name="numeroExterioru" id="numeroExterioru">   
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputEmail4">calle1</label>
                        <input type="text" class="form-control" name="calle1u" id="calle1u">   
                </div>
                <div class="form-group col-md-6">
                        <label for="inputEmail4">calle2</label>
                        <input type="text" class="form-control" name="calle2u" id="calle2u">   
                    </div>
                </div>
             </div>
                <div class="form-group">
                        <label for="inputAddress">Referencia</label>
                        <input type="text" class="form-control" name="referenciau" id="referenciau">      
                    </div>
                </div>
            <div class="modal-footer">
                <button type="submit" id="actualizadatos2" class="btn btn-warning">Actualizar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <br>
            </form>   
        </div>
    </div>   
</div> 
</div> 
<!---------------------------------------------FIN MODAL 2 -------------------------------------------------------------------->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">¿Deseas activar o desactivar esta direccion?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
        </div>
    <div class="modal-body">
        <!--Inicio de formulario dirección-->
        <!--conexion base de datos-->
        <form class="text-dark" action="../crudperfilusuario/bajaDireccion.php" method="post" onsubmit="">
               <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for=""></label>  
                        <input type="hidden" class="form-control" name="IdDirecciond" id="IdDirecciond">
                        <input type="hidden" class="form-control" name="estatus" id="estatus">
                      
                    </div>
                </div>
            </div>
        <div class="modal-footer">
                <button type="submit" class="btn btn-danger" id="bajaDatos" class="btn btn-warning">Desactivar direccion</button>
                <button type="submit" class="btn btn-success" id="bajaDatos" class="btn btn-info">Activar direccion</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <br> 
        </form>   
            </div>
        </div>   
   </div> 
</div> 
<!---Fin modal 3----------------------------------------------------------------------------------------------------------->
   <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
        </div>
    <div class="modal-body">
        <!--Inicio de formulario dirección-->
        <!--conexion base de datos-->
        <form class="text-dark" action="../crudperfilusuario/busDireccion.php" method="post" onsubmit="">
               <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="">Es este:</label>  
                        <input type="text" class="form-control" name="IdDirecciond" id="IdDirecciond">
                        <input type="text" class="form-control" name="estatus" id="estatus">
                      </div>
                </div>
            </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Buscar dirección</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <br>
        </form>   
                     </div>
                </div>   
            </div> 
        </div> 
<!-----------Tabla direccion---------------------------------------------------------------------------------------------->

        <?php
             $identificador = ($_SESSION["Iden"]);                                                                                
             include("../model/conexion.php"); 
        ?>
              <div class="row">
	          <div class="col-sm-12">
              <div class="container"> 
              
	    <table id= "datatable" class="table table-striped">
        <h4 class= "navbar navbar-dark text-center text-white">DIRECCIONES</h4>
                <caption>
                  
            <!---<form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button> 
            </form>------------------------>
                    <button type="button" <i class="far fa-address-card btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal"> 
                    Agregar</i></button>
                    </nav>
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3"> 
                Buscar dirección
                </button>-->
                </caption>
            <thead>    
			<tr>
				<td>Código Postal</td>
				<td>Estado</td>
				<td>Municipio</td>
				<td>Colonia</td>
				<td>Calle 
                Principal</td>
                <td>Numero
                 Exterior</td>
				<td>Calle 1</td>
                <td>Calle 2</td>
                <td>Referencia</td>
                <td>Editar</td>
                <td>Estatus</td>
			</tr>
            </thead> 
            <tbody>
            <?php
            $sql="SELECT idDireccion,codigoPostalUsuario,estado,municipio,colonia,callePrincipal,numeroExterior,calle1,calle2,referencia,statusDireccion FROM direccion";
            $result=mysqli_query($conect,$sql);
            while($ver=mysqli_fetch_row($result)){
            
            $datos=$ver[0]."||".
                $ver[1]."||".
                $ver[2]."||".
                $ver[3]."||".
                $ver[4]."||".
                $ver[5]."||".
                $ver[6]."||".
                $ver[7]."||".
                $ver[8]."||".
                $ver[9]."||". 
                $ver[10];
            ?>
            <tr>
                  
                <td><?php echo $ver[1] ?></td>
                <td><?php echo $ver[2] ?></td>
                <td><?php echo $ver[3] ?></td>
                <td><?php echo $ver[4] ?></td>
                <td><?php echo $ver[5] ?></td>
                <td><?php echo $ver[6] ?></td>
                <td><?php echo $ver[7] ?></td>
                <td><?php echo $ver[8] ?></td>
                <td><?php echo $ver[9] ?></td>
                <td>
                  <button type="button" <i class="fas fa-edit btn btn-warning " data-toggle= "modal"  data-target="#exampleModal2" onclick="agregaform('<?php echo $datos ?>')">Actualizar
                  </i></button>
                </td>
                <td>
                <button type="button"  data-toggle="modal" data-target="#exampleModal3" <?php if($ver[10]==1){?>  class="btn btn-success fas fa-calendar-check btn-lg"  onclick="baja2('<?php echo $datos ?>')"<?php }else{?><i class="btn btn-danger fas fa-calendar-times btn-lg" onclick="alta2('<?php echo $datos ?>')"</i><?php } ?> 
                  </button>
                </td>
            </tr>
                  <?php   
                        }
                  ?>
            </tbody>
        </table>
        <br>
        <br>
    </div> 
</div>  


                    
<!----------------------------------------------------------Fin de tabla direccion----------------------------------------------------------------------------------------------------------------------------------------------------------------> 

<!--MODAL AGREGAR METODO PAGO --------------------------------------------------------------------------------------------------------------->

<div class="modal fade" id="exampleModa4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingresa tu metodo de pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
        </div>
    <div class="modal-body">

                            <!--Inicio de formulario dirección-->
                            <!--conexion base de datos-->

        <form class="text-dark" action= "../crudperfilusuario/altaPago.php" method="post" onsubmit="">
               <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Numero de tarjeta</label>
                        <input type="text" class="form-control" name="numTarjeta" id="numTarjeta"> 
                <small id="passwordHelpBlock" class="form-text text-muted">
                clave de seguridad de 16 digitos.
                </small>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Año</label>
                        <input type="text" class="form-control" name="expYear" id="expYear" placeholder="(2 digitos)">   
                    </div>
                </div>
                <div class="form-group">
                <label for="inputState">Mes</label>
                    <select  class="form-control"  name="expMonth" id="expMonth">   
                            <option selected>...</option>
                            <option>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>  
                </div>
                <div class="form-group">
                <label for="inputAddress2">Codigo de seguridad</label>
                <input type="password" class="form-control" name="codigoSeguridad" id="codigoSeguridad" placeholder="(3 digitos)">
                </div>
                
                          
                    
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <br>
                
        </form>   
            </div>
        </div>   
   </div> 
   </div> 
<!-----------------------------------------FIN MODAL AGREGAR PAGO------------------------------------------------------>

<!--MODAL ACUALIZAR PAGO----------------------------------------------------------------------------------------------->

<div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar metodo de pago</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
        </div>
    <div class="modal-body">
                            <!--Inicio de formulario dirección-->
                            <!--conexion base de datos-->

            <form class="text-dark" action="../crudperfilusuario/actuPago.php" method="post" onsubmit="">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Numero de tarjeta</label>
                        <input type="hidden" class="form-control" name="idMetodoPagou" id="idMetodoPagou" >

                        <input type="text" class="form-control" name="numTarjetau" id="numTarjetau"> 
                <small id="passwordHelpBlock" class="form-text text-muted">
                clave de seguridad de 16 digitos.
                </small>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Año</label>
                        <input type="text" class="form-control" name="expYearu" id="expYearu" placeholder="(2 digitos)">   
                    </div>
                </div>
                <div class="form-group">
                <label for="inputState">Mes</label>
                    <select  class="form-control"  name="expMonthu" id="expMonthu">   
                            <option selected>01</option>
                            <option>02</option>
                            <option>03</option>
                            <option>04</option>
                            <option>05</option>
                            <option>06</option>
                            <option>07</option>
                            <option>08</option>
                            <option>09</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>  
                </div>
                <div class="form-group">
                <label for="inputAddress2">Codigo de seguridad</label>
                <input type="password" class="form-control" name="codigoSeguridadu" id="codigoSeguridadu" placeholder="(3 digitos)">
                </div>
                    
                </div>
            <div class="modal-footer">
                <button type="submit" id="actualizadatos" class="btn btn-warning">Actualizar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <br>
            </form>   
        </div>
    </div>   
</div> 
</div> 

<!-----------------------MODAL STATUS PAGO------------------------------------------------------------------------------->

<div class="modal fade" id="exampleModal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">¿Deseas eliminar este metodo de pago?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
        </div>
    <div class="modal-body">
                            <!--Inicio de formulario dirección-->
                            <!--conexion base de datos-->
        <form class="text-dark" action="../crudperfilusuario/bajaPago.php" method="post" onsubmit="">
               <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for=""></label>  
                        <input type="hidden" class="form-control" name="idMetodoPagod" id="idMetodoPagod">
                        <input type="hidden" class="form-control" name="statusM" id="statusM">
                        
                      
                    </div>
                </div>
            </div>
        <div class="modal-footer">
                <button type="submit" class="btn btn-danger" id="bajaDatos2" class="btn btn-warning">Desactivar</button>
                <button type="submit" class="btn btn-success" id="bajaDatos2" class="btn btn-info">Activar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <br> 
        </form>   
            </div>
        </div>   
   </div> 
</div> 


<!--------------------------------------------------------- TABLA MODULO METODO DE PAGO------------------------------------------------------------------------------------>
<?php
             $identificador = ($_SESSION["Iden"]);                                                                                
             include("../model/conexion.php"); 
        ?>
<div class="row">
	          <div class="col-sm-12">
              <div class="container"> 
              
	    <table id= "datatable2" class="table table-striped">
        <h4 class= "navbar navbar-dark text-center text-white">METODO DE PAGO</h4>
                <caption>
                  
            
                    <button type="button" <i class="far fa-address-card btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModa4"> 
                    Agregar</i></button>
                    </nav>
                </caption>
            <thead>    
			<tr>
				<td>Numero de tarjeta</td>
				<td>Año</td>
				<td>Mes</td>
			
				<td>Editar</td>
                <td>Estatus de pago</td>
			</tr>
            </thead> 
            <tbody>
            <?php
            $sql="SELECT idMetodoPago,numTarjeta,expYear,expMonth,codigoSeguridad,statusMetodoPago
                  FROM metodopago";
            $result=mysqli_query($conect,$sql);
            while($ver=mysqli_fetch_row($result)){
            
            $datos=$ver[0]."||".
                $ver[1]."||".
                $ver[2]."||".
                $ver[3]."||".
                $ver[4]."||".
                $ver[5];
                
            ?>
            <tr>
                  
                <td><?php echo $ver[1] ?></td>
                <td><?php echo $ver[2] ?></td>
                <td><?php echo $ver[3] ?></td>
                <td>
                <button type="button" <i class="fas fa-edit btn btn-warning " data-toggle= "modal"  data-target="#exampleModal5" onclick="agregaformPago('<?php echo $datos ?>')">Actualizar
                  </i></button>
                </td>
                <td>
                <button type="button"  data-toggle="modal" data-target="#exampleModal6" <?php if($ver[5]==1){?>  class="btn btn-success fas fa-calendar-check btn-lg"  onclick="baja2P('<?php echo $datos ?>')"<?php }else{?><i class="btn btn-danger fas fa-calendar-times btn-lg" onclick="alta2P('<?php echo $datos ?>')" </i> <?php } ?> 
                  </button>
                </td>
            </tr>
                  <?php   
                        }
                  ?>
            </tbody>
        </table>
        <br>
        <br>
    </div> 
</div>  











            
<!----------------------------------------Fin de Formulario configuracion de perfil--------------------------------------------------------------------------------------------------------------------------------------------------------------> 
            
        <!--- Actualizacion Perfil-->
        <div id="perfilconfig" class="container tab-pane fade"><br>
            <div class="card card-body border-info">
                <h4 class="text-primary text-center"><i class="fas fa-user-cog"></i>    Configuracion de perfil </h4>
                <!----------------- Inicio del Formulario perfil Actualizacion ---------------------------------------------------------------------->  
                <form class="text-dark" action="../controlador/modelactdatosfal.php" method="post" onsubmit="">                           
                    <?php
                                        $identificadorAct = $_SESSION["Iden"];                                                                                
                                        include("../model/conexion.php");                
                                        //$sqlMosDaUsuT="CALL psActDatFalUsu('$identificadorAct');";
                                        $sqlMosDaUsuT = "SELECT * FROM usuario WHERE idUsuario = '$identificadorAct';";
                                        $resulMosDaUsuT=mysqli_query($conect,$sqlMosDaUsuT);                                                             
                                        mysqli_close($conect);
                                        //$posicionarraycu=mysqli_fetch_assoc($resultadarraycu);
                                        while($rowMosDaUsuT=mysqli_fetch_row($resulMosDaUsuT)){
                                        //mysqli_close($conect);                                                                                   
                                ?>                                          
                    <!--Nombre-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-8">                            
                            <label for="NombreAct">Nombre :</label>
                            <input type="text" class="form-control" id="NombreAct" name="txtNombreActU" value="<?php echo $rowMosDaUsuT[1];?>" require>
                        </div>
                        <div class="form-group col-md-2">                            
                        </div>
                    </div>                                        
                    <!--Appillos-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Apellido1ActU">Apellido 1 :</label>                            
                            <input type="text" class="form-control" name="txtApellido1ActU"  id="Apellido1ActU" value="<?php echo $rowMosDaUsuT[2];?>" require>
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="Apellido2ActU">Apellido 2 :</label>                            
                            <input type="text" class="form-control" name="txtApe2ActU"  id="Apellido2ActU" value="<?php echo $rowMosDaUsuT[3]?>" require>
                        </div>                        
                        <div class="form-group col-md-2">
                        </div>
                    </div>                    
                    <!-- Contraseñas-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="inputPassword">Contraseña:</label>    
                                <div class="row">                                    
                                        <div class="col-md-8">                                        
                                            <input type="password" class="form-control" name="txtcontraActU"  id="inputPassword" value="<?php echo $rowMosDaUsuT[4];?>" require>                            
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn boton_crear text-white" type="button" onclick="mostrarContrasena()"><i class="fas fa-eye"></i></button>                                                                                      
                                        </div>
                                        <div class="col-md-2">                                            
                                        </div>
                                </div>                                                    
                        </div>                                        
                        <div class="form-group col-md-4">                                                                                                              
                            <label for="inputRFC">Confirma tu contraseña:</label>                                                        
                                <div class="row">
                                        <div class="col-md-8">
                                        <input type="password" class="form-control" name="txtconfirmacontraActU" id="inputPasswordC" value="<?php echo $rowMosDaUsuT[5];?>" require>
                                        </div>
                                        <div class="col-md-2">
                                        <button class="btn boton_crear text-white" type="button" onclick="mostrarContrasenaC()"><i class="fas fa-eye"></i></button>                                                                                      
                                        </div>
                                        <div class="col-md-2"></div>
                                </div>
                        </div>
                        <div class="form-group col-md-2">
                        </div>                        
                    </div>  
                    <!-- Fin Contraseñas-->
                    <!-- Telefono y rfc-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="inputTelefono">Teléfono:</label>                            
                            <input type="text" class="form-control" name="txtTelefonoActU"  id="inputTelefono" value="<?php echo $rowMosDaUsuT[8];?>" require>                            
                        </div>                                        
                        <div class="form-group col-md-4">                                                                                                              
                            <label for="inputRFC">RFC:</label>                            
                            <input type="text" class="form-control" name="txtRFCActU"  id="inputRFC" value="<?php echo $rowMosDaUsuT[9];?>" require>                            
                        </div>
                        <div class="form-group col-md-2">
                        </div>                        
                    </div>                      
                    <!-- Fin Telefono y rfc-->

                    <!--Dirección y Código Postal-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDireccionAct">Dirección:</label>                            
                            <input type="text" class="form-control" name="txtDireccionActUsu"  id="inputDireccionAct" value="<?php echo $rowMosDaUsuT[6];?>" require>
                        </div>                        
                        <div class="form-group col-md-4">
                            <label for="inputCodiPostalAct">Código Postal:</label>                            
                            <input type="text" class="form-control" name="txtCodiPostalActU"  id="inputCodiPostalAct" value="<?php echo $rowMosDaUsuT[7]?>" require>
                        </div>                        
                        <div class="form-group col-md-2">
                        </div>
                    </div>      
                    <!-- fin Dirección y Código Postal-->
                    <!--Fecha de Nacimiento-->                    
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>        
                        <?php                             
                            include("../model/conexion.php");
                            $sqlActuImgPro ="CALL  psFeActD();";
                            $ejecutaFac = mysqli_query($conect,$sqlActuImgPro);                            
                            mysqli_close($conect);  
                            while($rowFACU=mysqli_fetch_row($ejecutaFac)){                          
                                                         
                        ?>                                                                  
                        <div class="form-group col-md-8">
                            <label for="inputFechaNaCU">Fecha de Nacimiento:</label>                                                        
                            <center><input type="date" min="<?php echo "1920-01-01";?>" max="<?php echo $rowFACU[0];?>" name="txtFechaNaCU"  id="inputFechaNaCU" value="<?php echo $rowMosDaUsuT[10];?>"></center>
                            <?php                               
                            } 
                            ?>
                        </div>                                                                
                        <div class="form-group col-md-2">
                        </div>                        
                    </div>  
                    <?php                
                                       
                        }                                             
                                                                      
                        ?>    
                    <!--Botones-->
                    <div class="form-row">
                        <div class="form-group col-md-3">
                        </div>                        
                        <div class="form-group col-md-3">                            
                            <input type="submit" class="btn boton_crear text-white" name="enviar" value="Aceptar">                            
                        </div>
                        <div class="form-group col-md-3">                            
                            <input class="btn btn-dark text-white right" type="reset" name="" value="Cancelar">                            
                        </div>                        
                        <div class="form-group col-md-3">
                        </div>                                                
                    </div>  
                    
                    <!--Fin Botones-->                      
                </form>                     
                                                                           
                <!------------------------ Fin del Formulario perfil Actualizacion ------------------------------------------------------------------------>  
            </div>        
        </div>
        
        <!--- Actualizacion Perfil-->
        <!---Cuenta paypal-->
        <div id="agregarpaypa" class="container tab-pane fade"><br>
            <div class="card card-body border-info">
                <h4 class="text-primary text-center"><i class="fab fa-cc-paypal"></i>   Pay Pal </h4>
                <br>
                <?php $ideUConPay =($_SESSION["Iden"]);                                        
                    include("../model/conexion.php");
                    $sqlConUCIPL ="CALL psSelectConCiplU('$ideUConPay');";
                    $ejecutaConUCIP = mysqli_query($conect,$sqlConUCIPL);                            
                    mysqli_close($conect);
                    $orienCVcmb=mysqli_fetch_assoc($ejecutaConUCIP);                            
                    if ($orienCVcmb['contador'] == 1){                                                                                    
                        ?>
                        <?php 
                        include("../model/conexion.php");
                        $sqlMosUCIPLAct ="CALL psMosCliidU('$ideUConPay');";
                        $ejecutaMosUCIPLAct = mysqli_query($conect,$sqlMosUCIPLAct);                                                    
                        while($rowMosCIDUAct = mysqli_fetch_row($ejecutaMosUCIPLAct)){
                            $mosCIDAct=$rowMosCIDUAct[0];
                            }                        
                            mysqli_close($conect);
                        ?>
                            <form class="text-dark" action="../controlador/modelActualizrIdPaypal.php" method="post" onsubmit="">                                                                    
                                <!--Cuenta Clien_id-->
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                        </div>
                                        <div class="form-group col-md-8">
                                                <?php $ideUPay =($_SESSION["Iden"]);?>    
                                            <input type="hidden" name="txtidUsuPayAct" value="<?php echo $ideUPay;?>">
                                            <label for="clienid"> <i class="fab fa-paypal"></i>  Actualizar tu Clien_id de paypal:</label>
                                            <input type="text" class="form-control" id="clienid" name="txtclienIdAct" value="<?php echo $mosCIDAct;?>" require>
                                        </div>
                                        <div class="form-group col-md-2">                            
                                        </div>
                                    </div>                                        
                                    
                                    <!--Botones-->
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                        </div>                        
                                        <div class="form-group col-md-3">                                                                                    
                                            <button type="submit" class="btn boton_crear text-white" name="enviar" value="Aceptar"><i class="fab fa-paypal"></i>  Actualizar</button>                                            
                                        </div>
                                        <div class="form-group col-md-3">                            
                                            <input class="btn btn-dark text-white right" type="reset" name="" value="Cancelar">                            
                                        </div>                        
                                        <div class="form-group col-md-3">
                                        </div>                                                
                                    </div>  
                                    <!--Fin Botones-->                      
                                </form>   
                    <?php }elseif($orienCVcmb['contador'] == 0){                                 
                        ?>                        
                        <form class="text-dark" action="../controlador/modelinsIdPaypal.php" method="post">                                                                    
                            <!--Cuenta Clien_id-->
                                <div class="form-row">
                                    <div class="form-group col-md-2">
                                    </div>
                                    <div class="form-group col-md-8">
                                            <?php $ideUPay =($_SESSION["Iden"]);?>    
                                        <input type="hidden" name="txtidUsuPay" value="<?php echo $ideUPay;?>">
                                        <label for="clienid"> <i class="fab fa-paypal"></i>  Inserta tu Clien_id de paypal:</label>
                                        <input type="text" class="form-control" id="clienid" name="txtclienId" value="" require>
                                    </div>
                                    <div class="form-group col-md-2">                            
                                    </div>
                                </div>                                        
                                
                                <!--Botones-->
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                    </div>                        
                                    <div class="form-group col-md-3">                            
                                                    
                                        <button type="submit" class="btn boton_crear text-white" name="enviar" value="Aceptar"><i class="fab fa-paypal"></i>  Aceptar</button>
                                        
                                    </div>
                                    <div class="form-group col-md-3">                            
                                        <input class="btn btn-dark text-white right" type="reset" name="" value="Cancelar">                            
                                    </div>                        
                                    <div class="form-group col-md-3">
                                    </div>                                                
                                </div>  
                                <!--Fin Botones-->                      
                            </form>                                        
                    <?php } ?>                                                                                                                                                  
            </div>        
        </div>
        <!--- Fin Cuenta paypal-->

        <!---Productos en venta-->
        <div id="productosenventa" class="container tab-pane fade"><br>            
            <div class="card card-body border-info">                
                <h4 class="text-primary text-center">Productos en Venta</h4>
                <!--CALL psMosProdaUsuario('11');-->
                    <!---Inicio tabla Productos vendidos-->
                    <div class="row">  
                        <div class="col-lg-12">
                            <div class="table-responsive">  
                                <!--<table id="example" class="table table-striped table-bordered" style="width:100%">                                                -->
                                <table class="table table-striped">
                                    <thead class="text-white" style="background: #0B3861;"> 
                                        <tr>                                                
                                        <th >Nombre</th>
                                        <th >Descripción</th>
                                        <th >$ Unitario</th>
                                        <th >Imagen</th>
                                        <th >Fecha</th>
                                        <th >Stock</th>
                                        <th >Estatus</th>
                                        <th >Marca</th>
                                        <th >Categoría</th>
                                        <th>Acciones</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>                                    
                                        <?php                        
                                            include("../model/conexion.php");
                                            $sqlPV ="CALL psMosProdaUsuario('$ideU');";
                                            $ejePV= mysqli_query($conect,$sqlPV);
                                            while($rowPV = mysqli_fetch_row($ejePV)){
                                                echo "<tr>
                                                <th scope='row'>". $rowPV[1] . "</th>
                                                <td>" . $rowPV[2] . "</td>
                                                <td>" . $rowPV[3] . "</td>
                                                <td> <img src='../". $rowPV[4] ."' width='100' height='100' class='img-fluid'></td>
                                                <td>" . $rowPV[5] . "</td> 
                                                <td>" . $rowPV[6] . "</td>                                              
                                                <td>" . $rowPV[7] . "</td>                                                                                           
                                                <td>" . $rowPV[8] . "</td>
                                                <td>" . $rowPV[9] . "</td>
                                                <td><a class='text-center' href='actuaproduc.php?mod=".$rowPV[0]."'><button type='button' class='btn btn-info'><i class='fas fa-edit'></i>  Actualizar</button></a><br><br>
                                                <a class='text-center' href='elimiproduc.php?eli=".$rowPV[0]."'><button type='button' class='btn btn-danger'><i class='fas fa-trash'></i>  Eliminar</button></a></td>
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
        <!--- Fin Productos en venta-->
        
        <!---Productos comprados-->
        <div id="productoscomprados" class="container tab-pane fade"><br>            
            <div class="card card-body border-info">
                <h4 class="text-primary text-center"><i class="fas fa-shopping-cart fa-2x"></i>  Productos Comprados</h4>
                <br>
                <div class="row">  
                        <div class="col-lg-12">
                            <div class="table-responsive">  
                                <!--<table id="example" class="table table-striped table-bordered" style="width:100%">                                                -->
                                <form name="subida-imagenes" method="POST" action="datoscomprobante.php" enctype="multipart/form-data" id=“uploadForm”>
                                    <table class="table table-striped">
                                        <thead class="text-white" style="background: #0B3861;"> 
                                            <tr>                                                
                                            <th>N. Venta</th>
                                            <th>Fecha</th>
                                            <th>Total</th>
                                            <th>Direccion de entrega</th>
                                            <th>Estado</th>
                                            <th>Subir Archivo</th>
                                            <th></th>

                                            </tr>
                                        </thead>
                                        <tbody>                                    
                                            <?php     
                                                $emailSC = ($_SESSION["Email"]);                   
                                                include("../model/conexion.php");
                                                $sqlMPCA ="SELECT FolioVenta, fechaVenta, totalVendido, direccionEntrega, statusVenta FROM venta where correo='$emailSC';";
                                                $ejeMpcaa= mysqli_query($conect,$sqlMPCA);
                                                mysqli_close($conect);
                                                while($rowPMPC = mysqli_fetch_row($ejeMpcaa)){
                                                    $ventacom = "";
                                                    if ($rowPMPC[4]== 1){
                                                    $ventacom = "Venta completada"; 
                                                    }
                                                    else if ($rowPMPC[4]== 2){
                                                        $ventacom = "Venta en proceso";
                                                    }
                                            ?>
                                                    <tr>
                                                        <input type="hidden" id="foliovent" name="foliovent" value="<?php echo $rowPMPC[0];?>"/>
                                                        <th scope='row'>"<?php echo $rowPMPC[0];?>"</th>
                                                        <td>"<?php echo $rowPMPC[1];?>"</td>
                                                        <td>"<?php echo $rowPMPC[2];?>"</td>
                                                        <td>"<?php echo $rowPMPC[3];?>"</td>                                                
                                                        <td>"<?php echo $ventacom;?>"</td>
                                                        <td><input type="file" name="comprobante" id="comprobante" accept=".jpg , .png,  .bmp , .tif"></td> 
                                                        <td><button type="submit" name="enviarf" id ="enviarf" class="btn btn-secondary" data-dismiss="modal">ENVIAR</button></td>                                                                                                                     
                                                    </tr>
                                            <?php                                              
                                                }
                                                
                                            ?>
                                        </tbody>
                                        <tfoot>

                                        </tfoot>

                                    </table>
                                </form>
                            </div>
                        </div>          
                    </div>
                </div>
            </div>                            
        </div>
        <!--- Fin Productos comprados-->
        <div id="creditcardconfig" class="container tab-pane fade"><br>
            <div class="card card-body border-info">
                <h4 class="text-primary text-center"><i class="fas fa-credit-card"></i>    Datos de tu tarjeta</h4>
                <!----------------- Inicio del Formulario perfil Tarjeta de cobro ---------------------------------------------------------------------->                          
                <form class="text-dark" method ="POST" action ="../transferenciaCobro/datos.php" onsubmit="">
                            <br>
                            <br>
                            <div class="card-body text-info">
                                <b>
                                    <label for="inputNombre">Nombre completo:</label>
                                </b>
                                <input type="text" class="form-control" id="inputNombre" name="txtNombreU" placeholder="Nombre(s) y apellidos" >
                                <br>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <b>
                                            <label for="claveInterbanc">Clave interbancaria:</label>
                                        </b>
                                        <input type="text" class="form-control" id="claveInterbanc" name="txtclaveInterb" placeholder="Clave interbancaria" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <b>
                                            <label for="inputnumTarjeta">Número de tarjeta:</label>
                                        </b>
                                        <input type="numeTarjeta" class="form-control" name="txtnumTarjeta"  id="inputnumTarjeta" placeholder="Número de tarjeta" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <b>
                                            <label for="inputnomBanco">Nombre del banco:</label>
                                        </b>
                                        <input type="nomBanc" class="form-control" name="txtnomBanco" id="inputnomBanco" placeholder="Nombre del Banco">
                                    </di>
                                </div>
                                <b>
                                    <label for="numcuenta">Numero de Cuenta:</label>
                                </b>
                                <input type="text" class="form-control" id="numC" name="numC" placeholder="Número de Cuenta" >
                                <br>
                                <br>
                                <!--Botones-->
                                <div class="form-group col-md-12">
                                    <input type="submit" class="btn boton_crear text-black nav1" name="guardar" value="Guardar">
                                </div>   
                                <div class="img">
                                </div>
                            </div>

                </form>                     
                                                                           
                <!------------------------ Fin del Formulario tarjeta Cobro ------------------------------------------------------------------------>  
            </div>        
        </div>
    </div>
</div>
</div>
    
<br>
<!--Inicio Fin Piede de pagina-->  	
<footer>
    <!--<div class="container-fluid bg-dark text-white text-center p-5">-->
    <div class="container-fluid  text-white text-center p-5">
        <p>&copy; Todos los derechos reservados :: Empresa CODEWAY 2020</p>
    </div>
</footer>
<!-- Fin Piede de pagina-->  
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>

    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("inputPassword");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
    </script>

    <script>
    function mostrarContrasenaC(){
        var tipo = document.getElementById("inputPasswordC");
        if(tipo.type == "password"){
            tipo.type = "text";
        }else{
            tipo.type = "password";
        }
    }
    </script>
</body>

<!--funciones generales-->
<script src="funciones.js"></script>
<script src="funcionesPago.js"></script>
<!--funciones buscador-->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<script type="text/javascript">
$(document).ready( function () {
    $('#datatable,#datatable2').DataTable({
    language: {
        processing:     "Traitement en cours...",
        search:         "Buscar:",
        lengthMenu:    "Mostrar_MENU_ Registros",
        info:           "Mostrando 10 registros",
        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
        infoPostFix:    "",
        loadingRecords: "Chargement en cours...",
        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
        emptyTable:     "Aucune donnée disponible dans le tableau",
        paginate: {
            first:      "Premier",
            previous:   "Anterior",
            next:       "Siguente",
            last:       "Dernier"
        },
        aria: {
            sortAscending:  ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant"
        }
    }
   
        

    
});
    } );

</script>


</html>

<?php
//Fin de la condicion de la sesion
}else{
    echo "Sesion Incorrecta";
    }
//Fin de la condicion de la sesion
?>