<?php
    //Inicio de La sesion
session_start();  
if(isset($_SESSION["Email"])) {             

?>
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">        
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
            <title>Agregar tu dirección</title> 
            <link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>                                        
            <link rel="stylesheet" href="../css\estiloproducto.css" type="text/css">
            <link rel="stylesheet" type="text/css" href="../css/index.css">
            <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">      
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css" media="screen"/>
            <script type="text/javascript" src="../js/sweetalert2.all.min.js" charset="utf-8"></script>
            <script type="text/javascript" src="../js/validation.js" charset="utf-8"></script>
        </head>
        <body>
            <main>
                <nav class="navbar  text-white">
                    <div class="container-fluid p-7">        
                        <div class="col-sm-2">
                        
                            <img src="../img\utilidades\storetransblan.png" width="200" height="200" class="img-fluid" >
                        </div>                
                        <div class="col-sm-5 text-wrap">             
                            <p  class="navbar-brand"><H2>Agregar una nueva dirección</H2></p>         
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
                                                    $idUsuDireciontificador = ($_SESSION["Iden"]);
                                                    //$idUsuDireciontificador = 11;
                                                    //echo ; 
                                                    include("../model/conexion.php");                
                                                    $sqlimgP="CALL psImagenUsuarioPerfil('$idUsuDireciontificador');";
                                                    $resultadosqlimgP=mysqli_query($conect,$sqlimgP);                                                             
                                                    while($row=mysqli_fetch_row($resultadosqlimgP)){
                                                        //CALL psImagenUsuarioPerfil(20);
                                            ?>  
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <img class="rounded-circle" src="<?php echo './crudperfilusuario/'.$row[0];?>" alt=".." width="50" height="50">  
                                                        </div>
                                                        <div class="col-md-9">
                                                        <a class="nav-link active  text-info" aria-current="page" href="#"> <?php echo ($_SESSION["Nombre"]);?></a> 
                                                        </div>
                                                    </div>
                                    <?php                
                                        }
                                        mysqli_close($conect);                                          
                                    ?>                                                                                   
                                </li>
                                <!--href="./crudcarrito\vistaaltacarrito.php"-->   
                                <li class="nav-item">   
                                    
                                                <?php
                                                $aux = 0;
                                                $contCarrito1=0;
                                                $contCarrito2=0;
                                                    //Si el carrito1 esta vacio
                                                    if(!isset($_SESSION['CARRITO'])){
                                                        //Si el carrito2 esta vacio
                                                        $contCarrito1= 0;
                                                        if(!isset($_SESSION['CARRITO2'])){
                                                            $contCarrito2= 0;   
                                                        }else{
                                                            $contCarrito2= count($_SESSION['CARRITO2']);  
                                                        }
                                                    }else{
                                                        $contCarrito1= count($_SESSION['CARRITO']);
                                                        //Si el carrito2 esta vacio
                                                        if(!isset($_SESSION['CARRITO2'])){
                                                            $contCarrito2 = 0;
                                                        }else{
                                                            $contCarrito2= count($_SESSION['CARRITO2']);
                                                        }
                                                    }
                                                    $aux = $contCarrito1 + $contCarrito2;
                                                ?>        

                                            <a class="nav-link active  text-info" aria-current="page">
                                                <i class="fas fa-cart-plus fa-3x "></i>Carrito(<?php 
                                                echo($aux);
                                                //echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);
                                                ?>)</a>
                                </li>
                                <li class="nav-item">
                            <!-- <a class="nav-link active  text-light" aria-current="page" href="../pruebasecion.php"><i class="fas fa-undo-alt"></i>   Regresar</a>-->
                                </li>              
                            </ul>
                        </div>
                    </div>
            </nav>
            <section class="payment-form dark">
                <div class="jumbotron text-center">                                    
                    <div class="form-payment">
                        <div class="block-heading">
                            <h1>Datos de tu Direccion</h1>
                        </div>
                        <div class="payment-details">
                            <form class="text-dark" action="Direccion.php" method="POST"> 
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
            </section>
            <footer>
                <div class="container-fluid  text-white text-center p-5">
                    <p>&copy; Todos los derechos reservados :: Empresa CODEWAY 2020</p>
                </div>
            </footer>
        </body>
    </html>

    <?php
    if (isset($_POST["submit"])){
        
        include("../model\conexion.php"); 
        $idUsuDireccion      = ($_SESSION["Iden"]);
        $codigoPostalUsuario = $_POST["CodigoPostalUsuario"];
        $estado              = $_POST["estado"];
        $municipio           = $_POST["municipio"];
        $colonia             = $_POST["colonia"];
        $callePrincipal      = $_POST["callePrincipal"];
        $numeroExterior      = $_POST["numeroExterior"];
        $calle1              = $_POST["calle1"];
        $calle2              = $_POST["calle2"];
        $referencia          = $_POST["referencia"];
        
        $consultarDirec = "SELECT * FROM direccion";                                                                            
        $consultaDireccion = mysqli_query($conect,$consultarDirec);                                                                         
        while($rows             = mysqli_fetch_array($consultaDireccion)){
            $idUsuDirec         = $rows["idUsuario"];
            $CodigoPost         = $rows["codigoPostalUsuario"]; 
            $EstadoUsu          = $rows["estado"];
            $municipioUsu       = $rows["municipio"];
            $coloniaUsu         = $rows["colonia"];
            $callePrincipalUsu  = $rows["callePrincipal"];
            $numeroExteriorUsu  = $rows["numeroExterior"];
            $calle1Usu          = $rows["calle1"];
            $calle2Usu          = $rows["calle2"];
        } 

        if($idUsuDirec == $idUsuDireccion  && $CodigoPost == $codigoPostalUsuario && $EstadoUsu == $estado && $municipioUsu == $municipio && $coloniaUsu == $colonia && $callePrincipalUsu == $callePrincipal && $numeroExteriorUsu == $numeroExterior && $calle1Usu == $calle1 && $calle2Usu == $calle2 ){
            
            echo'<script type="text/javascript">Swal.fire("Error","Ya existe esta dirección", "error");</script>';

        }elseif($codigoPostalUsuario == "" || $estado  == "" || $municipio == "" || $colonia == "" || $callePrincipal == "" || $numeroExterior == "" || $calle1 == "" || $calle2 == "" || $referencia == ""){
            
            echo'<script type="text/javascript">Swal.fire("Error","Alguno de los campos está vacio", "error");</script>';

        }else{
            
            $sentencias="INSERT INTO direccion(idUsuario,codigoPostalUsuario,estado,municipio,colonia,callePrincipal,numeroExterior,calle1,calle2,referencia,statusDireccion)
            VALUES($idUsuDireccion,'$codigoPostalUsuario','$estado','$municipio','$colonia','$callePrincipal','$numeroExterior','$calle1','$calle2','$referencia','1')"; 

            if (mysqli_query($conect, $sentencias)) {

                echo'<script type="text/javascript">Swal.fire("Success","Se ingreso tu nueva dirección", "success");</script>';

            }else {
                echo "Error: " . $sentencias . "<br>" . mysqli_error($conect);
                    
            }
        }
        mysqli_close($conect);
    }
    ?>
<?php
//Fin de la condicion de la sesion
}else{
    echo "Sesion Incorrecta";
    }
//Fin de la condicion de la sesion
?>             