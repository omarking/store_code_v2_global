<?php
    //Inicio de La sesion
    session_start(); 
    if(isset($_SESSION["Email"])) {

?>
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">        
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
                <title>Datos StoreCodeWay</title> 
                <link rel="shortcut icon" href="../img/utilidades/tiendaonlineico.ico"/>                                        
                <link rel="stylesheet" href="../css\estiloproducto.css" type="text/css">
                <link rel="stylesheet" href="../fontawesome\css\all.css" type="text/css">      
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <script type="text/javascript" src="../js/funciones.js" defer></script>
                <link rel="stylesheet" type="text/css" href="../css/sweetalert2.min.css" media="screen"/>
                <script type="text/javascript" src="../js/sweetalert2.all.min.js" charset="utf-8"></script>
                <link rel="stylesheet" href="../css\index.css" type="text/css">
                
            </head>
            <body>    
                <!--NAV-->
                <!-- <nav class="navbar navbar-dark bg-dark text-white"> -->
                    <nav class="navbar  text-white">
                        <div class="container-fluid p-7">        
                            <div class="col-sm-2">            
                            <a href="../index.php"><img src="../img\utilidades\storetransblan.png" width="200" height="200" class="img-fluid"></a>
                            </div>                
                            <div class="col-sm-5 text-wrap">             
                                <p class="navbar-brand"><H2>Datos StoreCodeWay</H2></p>
                                        
                            </div>
                            <div class="col-sm-5">
                                <ul class="nav text-white">
                                    <li class="nav-item">
                                    <a class="nav-link active  text-light" aria-current="page" href="../index.php">Home</a>
                                    </li>
                                    <?php
                                    if(isset($_SESSION["Email"]) == '') {   
                                        echo '<a class="nav-link active cerrar" aria-current="page" href="../login\login.php">Iniciar Sesión </a> ';                  
                                    }else if(isset($_SESSION["Email"])) { 
                                        ?>
                                    <li class="nav-item">
                                    <a class="nav-link active cerrar" aria-current="page" href="../login\cerrarSesion.php">Cerrar Sesion</a>                    
                                    </li>
                                    <li class="nav-item">
                                        <?php
                                        $identificador = ($_SESSION["Iden"]);
                                        //$identificador = 11;
                                        //echo ; 
                                        include("../model/conexion.php");
                                        $sqlimgP="CALL psImagenUsuarioPerfil('$identificador');";
                                        $resultadosqlimgP=mysqli_query($conect,$sqlimgP);
                                        while($row3=mysqli_fetch_row($resultadosqlimgP)){
                                            //CALL psImagenUsuarioPerfil(20);
                                        ?>  
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img class="rounded-circle" src="<?php echo '../crudperfilusuario/'.$row3[0];?>" alt=".." width="50" height="50">  
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
                                    <?php 
                                    }else{
                                        echo "Sesion Incorrecta";
                                    }
                                    ?> 
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
                                    <!--href="./crudcarrito\vistaaltacarrito.php"-->                    
                                    <a class="nav-link active  text-info" aria-current="page">
                                    <i class="fas fa-cart-plus fa-3x "></i>Carrito(<?php 
                                    echo ($aux);
                                    //echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO'])+count($_SESSION['CARRITO2']);
                                    ?>
                                    )
                                    </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active  text-light" aria-current="page" href="../index.php"><i class="fas fa-undo-alt"></i> Regresar</a>
                                    </li>              
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div class="container-fluid">
                        <br>
                        <br>
                        <br>
                        <br>
                        <!--Inicio de formulario dirección-->
                        <form class="text-dark" action="updateTarjeta.php" method="post">
                            <table class='table table-dark'>
                                <tr>
                                    <th>ID Tarjeta</th>
                                    <th>Compañia</th>
                                    <th>Clave intervancaria</th>
                                    <th>Número de tarjeta</th>
                                    <th>Número de cuenta</th>
                                    <th>Nombre del banco</th>
                                    <td>Editar</td>
                                    <td>Eliminar</td>
                                </tr>
                            <?php 

                                include("../model\conexion.php"); 
                                $consultaCobro          = "SELECT * FROM transfCobroStoreCode;";                                                                            
                                $consulTransferencia    = mysqli_query($conect,$consultaCobro);                                                                         
                                while($row3             = mysqli_fetch_array($consulTransferencia)){
                                    $idTransferencia    = $row3["idTransferencia"];
                                    $nombreEmpresa      = $row3["nombreEmpresa"];
                                    $claveIntervancaria = $row3["claveInterbancaria"];
                                    $numerotarjeta      = $row3["numeroTarjeta"];
                                    $numeroCuenta       = $row3["numeroCuenta"];
                                    $nombreBanco        = $row3["nombreBanco"];

                                    print("<tr>");
                                        print("<td>".$idTransferencia."</td>");
                                        print("<td>".$nombreEmpresa."</td>");
                                        print("<td>".$claveIntervancaria."</td>");
                                        print("<td>".$numerotarjeta."</td>");
                                        print("<td>".$numeroCuenta."</td>");
                                        print("<td>".$nombreBanco."</td>");
                                        print("<td><a href='updateTarjeta.php?idTransferencia=".$idTransferencia."'>Actualizar</a></td>");
                                        //print("<td><button type='button' <i class='fas fa-edit btn btn-warning' data-toggle='modal'  data-target='#exampleModal2'>Actualizar</button></td>");
                                        print("<td><a href='deleteTarjeta.php?idTransferencia=".$idTransferencia."'>Eliminar</a></td>");
                                    print("</tr>");
                                }
                                print("</table>");
                                print("<center><button type='button' <i class='fas fa-edit btn btn-warning' data-toggle='modal'  data-target='#exampleModal2'>Insertar un nuevo registro</button></center>");
                        
                            ?> 

                        </form> 
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Insertar Datos StoreCodeWay </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                        </div>
                                    <div class="modal-body">
                                        <!--Inicio de formulario dirección-->
                                        <!--conexion base de datos-->
                                        <form class="text-dark" action="datos_tarjetaCodeway.php" method="post" onsubmit="">
                                            <div class="form-row">

                                                <div class="form-group col-md-6">
                                                    <label for="nombreCompañia">Nombre Compañia</label>
                                                    <input type="text" class="form-control" name="nombreCompañia" id="nombreCompañia" value="">  
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nombreBanco">Nombre del Banco</label>
                                                    <input type="text" class="form-control" name="nombreBanco" id="nombreBanco" value=""> 
                                                </div>
                                                
                                    
                                                <div class="form-group col-md-6">
                                                    <label for="numeroTarjeta">Número de Tarjeta</label>
                                                    <input type="text" class="form-control" name="numeroTarjeta" id="numeroTarjeta" value="">  
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="NumeroCuenta">Número de Cuenta</label>
                                                    <input type="text" class="form-control" name="NumeroCuenta" id="NumeroCuenta" value="">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div class="form-group col-md-">
                                                        <label for="claveInter">Clave Intervancaria</label>
                                                        <input type="text" class="form-control" name="ClaveInter" id="ClaveInter" value="">  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" id="insertar" name="insertar" class="btn btn-warning">Insertar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <br>
                                            </div>
                                            
                                        </form>   
                                </div>
                            </div>
                        </div>
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
            </body>
        </html>
<?php

            if (isset($_POST['insertar'])){
                $nombreCompañias     = $_POST['nombreCompañia'];
                $nombreBancos        = $_POST['nombreBanco'];
                $numeroTarjetas      = $_POST['numeroTarjeta'];
                $numeroCuentas       = $_POST['NumeroCuenta'];
                $ClaveInters         = $_POST['ClaveInter'];
                        

                if($nombreCompañias != "" && $nombreBancos != "" && $numeroTarjetas != "" && $numeroCuentas != "" && $ClaveInters != ""){
                        
                    include("../model/conexion.php");
                    $consultaInsert ="INSERT INTO transfCobroStoreCode (nombreEmpresa,claveInterbancaria,numeroTarjeta,numeroCuenta,nombreBanco)VALUES('$nombreCompañias','$ClaveInters','$numeroTarjetas','$numeroCuentas','$nombreBancos')";           
                    if(mysqli_query($conect,$consultaInsert)){
                        echo'<script type="text/javascript">                        
                                Swal.fire({
                                    title: "¡¡Hecho!!",
                                    text: "¡¡Los datos se han Insertado correctamente!!",
                                    type: "success",
                                    showCancelButton: true,
                                    confirmButtonText: "ok",
                                    cancelButtonText: "cancel",
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.dismiss !== "cancel") {
                                        window.location.href="datos_tarjetaCodeWay.php";
                                    }
                                    if (result.dismiss == "cancel") {
                                        window.location.href="datos_tarjetaCodeWay.php";
                                    }
                                })
                            </script>';
                            exit();
                    }else{
                        echo'<script type="text/javascript">Swal.fire("¡¡Lo siento!!","¡¡Fallo al Insertar los datos de la tarjeta!!", "error");window.location.href="datos_tarjetaCodeWay.php";</script>';
                        exit();
                        echo "Error: " . $consultaInsert . "<br>" . mysqli_error($conect);
                    }                                       
                    mysqli_close($conect); 
                }else if($nombreCompañias == ""|| $nombreBancos == "" || $numeroTarjetas == "" || $numeroCuentas == "" || $ClaveInters == ""){
                    echo'<script type="text/javascript">
                        //Swal.fire("¡¡Ocrrio un error!!","¡¡Algúno de los campos esta vacío!!", "error");
                        //window.location.href="datos_tarjetaCodeWay.php";
                        Swal.fire({
                            title: "¡¡Ocrrio un error!!",
                            text: "¡¡Algúno de los campos esta vacío!!",
                            type: "error",
                            showCancelButton: true,
                            confirmButtonText: "ok",
                            cancelButtonText: "cancel",
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.dismiss !== "cancel") {
                                window.location.href="datos_tarjetaCodeWay.php";
                            }
                            if (result.dismiss == "cancel") {
                                window.location.href="datos_tarjetaCodeWay.php";
                            }
                        })
                    </script>';
                        
                    exit();
                }else{
                    echo'<script type="text/javascript">Swal.fire("¡¡Lo siento!!","¡¡Fallo al actualizar!!", "error");window.location.href="datos_tarjetaCodeWay.php";</script>';
                    exit();
                } 
            }


    }else{
       // echo '<script type="text/javascript">Swal.fire("¡¡Lo siento!!","¡¡Aún no has iniciado sesión seras dirijido al login", "error");window.location.href="../login/login.php";</script>';
       echo '<script type="text/javascript">
        Swal.fire({
            title: "¡¡Lo siento!!",
            text: "¡¡Aún no has iniciado sesión serás dirigido al Login!!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "ok",
            cancelButtonText: "cancel",
            allowOutsideClick: false
        }).then((result) => {
            if (result.dismiss !== "cancel") {
                window.location.href="../login/login.php";
            }
            if (result.dismiss == "cancel") {
                window.location.href="../index.php";
            }
        })
            
        </script>';
    }
?>
