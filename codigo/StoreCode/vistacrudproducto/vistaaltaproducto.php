<?php
//Inicio de La sesion
session_start();
if(isset($_SESSION["Email"])) {
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
    <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css" media="screen"/>
    <script type="text/javascript" src="../js/sweetalert2.all.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="../js/funciones.js" charset="utf-8"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<script type="text/javascript">
		function muestraselect(str){ //funcion para crear la conexion asincronica
			var conexion;

			if(str==""){
				document.getElementById("txtHint").innerHTML=""; // si la variable a enviar viene vacia retornamos a nada la funcion
				return;
			}
			if (window.XMLHttpRequest){
				conexion = new XMLHttpRequest();  // creamos una nueva instacion del obejeto XMLHttpRequest
			}

			// verificamos el onreadystatechange verifando que el estado sea de 4 y el estatus 200
			conexion.onreadystatechange=function(){  
				if(conexion.readyState==4 && conexion.status==200){
					//especificamos que en el elemento HTML cuyo id esa el de "div" vacie todos los datos de la respuesta 
					document.getElementById("textarea").innerHTML=conexion.responseText; 
				}
			}
			//abrimos una conexion asincronica usando el metodo GET y le enviamos la variable c
			conexion.open("GET", "funcion.php?c="+str, true);
			//por ultimo enviamos la conexion
			conexion.send();
		}
	</script>
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
                <p  class="navbar-brand"><H2>Alojar producto</H2></p>
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
                <form  action="../controlador\altaproductocontroller.php" method="POST" enctype="multipart/form-data">
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
                            <label for="inputPU"><i class="fas fa-dollar-sign"></i>  Precio Unitario:</label>
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
                        
                    </div>
                
                    <br>

                    <h4 style="text-align:center">En caso de ser vendido su producto ¿desea que  la paqueteria respectiva pasen por su producto a su domicilio?</h4>
                    <div >
                        <input type="checkbox" id="cbox1" value="1" onchange="javascript:showContent(this)" > 
                        <label for="cbox1">SI</label>
                        <br>
                        <input type="checkbox" id="cbox2" value="1" onchange="javascript:showContent(this)" > 
                        <label for="cbox2">NO</label>
                    </div>
                    
                    <div id="content" style="display: none;">
                        <div class="block-heading">
                            <h4 style="text-align:center">Tus direcciónes disponibles</h4>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                            </div>
                            <div class="form-group col-md-5">
                                <br>
                                <br>
                                <br>
                                <select style="width:380px;" name="DireccionVendedor" id="DireccionVendedor" class="custom-select mb-15" onclick="muestraselect(this.value)">
                                <option style="text-align:center" value="selecciona una dirección" disabled selected>Selecciona la dirección</option>
                                    <?php 
                                    $idUsua = ($_SESSION["Iden"]);
                                    include("../model\conexion.php");                                 
                                    $optionDireccion = "SELECT  * FROM direccion WHERE idUsuario='$idUsua';";                                                                            
                                    $direccion = mysqli_query($conect,$optionDireccion);                                                                         
                                    mysqli_close($conect); 
                                    while(  $rowss    = mysqli_fetch_array($direccion)){
                                        $codiPost     = $rowss["codigoPostalUsuario"];
                                        $estadou      = $rowss["estado"];
                                        $municipios   = $rowss["municipio"];
                                        $colonias     = $rowss["colonia"];
                                        $calles       = $rowss["callePrincipal"];
                                        $numeros      = $rowss["numeroExterior"];

                                        $direcciones = "CP:".$codiPost." - "."Estado: ".$estadou." - "."Municipio: ".$municipios." - "."Col: ".$colonias." - "."Calle: ".$calles." - "."Núm: ".$numeros;
                                    ?>
                                        <option value="<?php echo $direcciones?>"> <?php echo $direcciones?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <br>
                                <br>
                                <!--<div class="form-row">
                                    <div class="form-group col-md-2">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button style="width:250px;" id="DirecciónVen"  name="DirecciónVen" type="button" class="btn boton_crear text-white" onclick="insertar()">Selecciona tú dirección</button>
                                    </div>
                                </div>-->
                            </div>
                            <div class="form-group col-md-4">
                                <textarea type="text" name="textarea" id="textarea" rows="6" cols="50" readonly="readonly"></textarea>
                            </div>
                            <div class="form-group col-md-2">
                            </div>
                        </div>
                        <br>
                        <center>
                            <caption>
                                <button type="button" <i class="btn boton_crear text-white" data-toggle="modal" data-target="#exampleModal">Agregar una nueva dirección</i></button>
                            </caption>                           
                            
                        </center>
                    </div>
                    <br>
                    <div id="coment" style="display: none;">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            </div>
                            <div class="form-group col-md-5"> 
                                <h4 style="text-align:center">Describe el motivo del porque no se mandara por paqueteria</h4>
                                <textarea class="form-control" name="razon" id="razon" cols="60" rows="6"></textarea>
                            </div>     
                            <div class="form-group col-md-2">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            </div>
                            <div class="form-group col-md-4">   
                                <input class="btn btn-secondary text-white left" type="reset" name="" value="Cancelar"> 
                            </div>
                            <div class="form-group col-md-4">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        </div>
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn boton_crear text-white" name="alojar"><i class="far fa-save"></i>  Alojar Producto</button>
                        </div>
                        <div class="form-group col-md-3">
                            <button class="btn btn-dark text-white right" type="reset" name="cancelar"><i class="far fa-window-close"></i>  Cancelar</button>
                        </div>
                                
                    </div>
                </form>

                <!--Modal ingresar direcion-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ingresa tu dirección</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                                <div class="modal-body">
                                    <!--Inicio de formulario dirección-->
                                    <form class="text-dark" action="./nuevadireccion.php" method="POST"> 
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Código postal</label>
                                                <input type="text" class="form-control" name="CodigoPostalUsuario" id="CodigoPostalUsuario" maxlength="5" required="required">  
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
                                            <div class="form-group col-md-6">
                                                <label for="inputState">Numero exterior</label>
                                                <input type="number" id="numeroExterior" class="form-control"  name="numeroExterior" id="numeroExterior">                 
                                            </div>
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

                                        <div class="form-group">
                                            <label for="inputAddress">Referencia</label>
                                            <input type="text" class="form-control" name="referencia" id="referencia">      
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-primary">Guardar dirección</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </form> 
                                </div>   
                            </div> 
                        </div>
                </div>
                <script type="text/javascript">
                    function showContent(checkbox) {
                        
                        element = document.getElementById("content");
                        check = document.getElementById("cbox1");
                        elemento = document.getElementById("coment");
                        check2   = document.getElementById("cbox2");
                        otro = checkbox.parentNode.querySelector("[type=checkbox]:not(#" + checkbox.id + ")");
                        if (check.checked) {
                            element.style.display='block';
                            otro.checked = false;
                        }
                        else {
                            element.style.display='none';
                        }
                            
                        if (check2.checked) {
                            elemento.style.display='block';
                        }
                        else {
                            elemento.style.display='none';
                        }
                    }
                </script>
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

