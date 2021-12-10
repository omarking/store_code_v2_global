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
            <p  class="navbar-brand"><H4>Configuraciones generales de la aplicación </H4></p>         
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
        <!--Inicio de las pestañas-->
        <ul class="nav nav-tabs">
            <li class="nav-item active">
                <a class="nav-link" aria-current="page" href="#primero" data-toggle="tab"><i class="fas fa-users">  ¡Clientes de la tienda online!</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#segundo" data-toggle="tab"><i class="fas fa-copyright">  Marcas</i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#tercero" data-toggle="tab"><i class="fas fa-sitemap">  Categorías</i></a>
            </li>            
        </ul>
        <!-- Fin de las pestañas-->
        <!--Prueba datatables-->
        <div class="container">
            <div class="row">  
                        
            </div>
        </div>
        <!--Fin Prueba datatables-->
        <br>
        <br>
        <!--Contenedores-->
        <div class="tab-content">
            <div class="tab-pane fade active in" id="primero">
                <div class="col-lg-12">
                    <div class="table-responsive">  
                        <table id="example" class="table table-striped table-bordered" style="width:100%">                                                
                            <thead>                    
                                <tr>    
                                    <th >No.</th>
                                    <th >Nombre</th>
                                    <th >Correo</th>                        
                                    <th>Fecha de Registro</th>
                                    <th>Estado del Cliente</th>
                                    <th>Eliminar Cliente</th>                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php                        
                                    include("../model\conexion.php");
                                    $consulta ="CALL psSelectClientes;";
                                    $ejeconsulta= mysqli_query($conect,$consulta);
                                    while($regSolicitud = mysqli_fetch_assoc($ejeconsulta)){
                                        echo "<tr>
                                        <th scope='row'>". $regSolicitud["No."] . "</th>
                                        <td>" . $regSolicitud["Nombre"] . "</td>
                                        <td>" . $regSolicitud["Correo"] . "</td>
                                        <td>" . $regSolicitud["Fecha de Registro"] . "</td>
                                        <td>" . $regSolicitud["Estado del Cliente"] . "</td>                                              
                                        <td><a class='text-center' href='modelelimcliente.php?idElimU=".$regSolicitud["No."]."'><i class='fas fa-user-times'></i></a></td>
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
            <div class="tab-pane fade" id="segundo">                
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalmarca">
                    <i class="fas fa-plus-circle">  Agregar Marcas</i>
                </button>
                <br><br>
                <!---Tabla Marcas -->
                <div class="col-lg-12">
                    <div class="table-responsive">  
                        <table id="example" class="table table-striped table-bordered" style="width:100%">                                                
                            <thead style="background: #0B3861;"     class="text-white">                    
                                <tr>    
                                    <th >No.</th>
                                    <th >Marca</th>
                                    <th >Estatus</th>                        
                                    <th >Actualizar</th>                        
                                    <th >Eliminar</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php                        
                                    include("../model\conexion.php");
                                    $conM ="SELECT idMarca,desMarca,IF(statusMarca = '1', 'Activo','Inactivo') AS 'Estado' FROM marca;";
                                    $ejeMM = mysqli_query($conect,$conM);
                                    mysqli_close($conect); 
                                    //while($rowMoIDS=mysqli_fetch_row($resultadoMoIDS)){  
                                    while($rowMM = mysqli_fetch_row($ejeMM)){
                                        echo "<tr>
                                        <th scope='row'>". $rowMM[0] . "</th>
                                        <td>" . $rowMM[1] . "</td>
                                        <td>" . $rowMM[2] . "</td>                                                                                
                                        <td><a class='text-center' href='modelactuamarca.php?actmarca=".$rowMM[0]."'><button type='button' class='btn btn-info'><i class='fas fa-edit'></i>  Actualizar</button></a></td>
                                        <td><a class='text-center' href='modelelimimarca.php?elimar=".$rowMM[0]."'><button type='button' class='btn btn-danger'><i class='fas fa-trash'></i>  Eliminar</button></a></td>
                                        </tr>";
                                        
                                    }                                    
                                ?>
                            </tbody>
                            <tfoot>

                            </tfoot>

                        </table>
                    </div>                    
                </div>  
                <!---Fin Tabla Marcas -->
            </div>
            <div class="tab-pane fade" id="tercero">                
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalcategoria">
                    <i class="fas fa-plus-circle">  Agregar Categoría</i>
                </button>
                <br><br>
                <!---Tabla Categorías-->
                <div class="col-lg-12">
                    <div class="table-responsive">  
                        <table id="example" class="table table-striped table-bordered" style="width:100%">                                                
                            <thead style="background: #0B3861;"     class="text-white">                    
                                <tr>    
                                    <th >No.</th>
                                    <th >Categorías</th>
                                    <th >Estatus</th>                        
                                    <th >Actualizar</th>                        
                                    <th >Eliminar</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <?php                        
                                    include("../model\conexion.php");
                                    $conM ="SELECT idCategoria,desCategoria,IF(statusCategoria = '1', 'Activo','Inactivo') AS 'Estado' FROM categoria";
                                    $ejeMM = mysqli_query($conect,$conM);
                                    mysqli_close($conect);                                     
                                    while($rowMM = mysqli_fetch_row($ejeMM)){
                                        echo "<tr>
                                        <th scope='row'>". $rowMM[0] . "</th>
                                        <td>" . $rowMM[1] . "</td>
                                        <td>" . $rowMM[2] . "</td>                                                                                
                                        <td><a class='text-center' href='modelactualizacategoria.php?actucatego=".$rowMM[0]."'><button type='button' class='btn btn-info'><i class='fas fa-edit'></i>  Actualizar</button></a></td>
                                        <td><a class='text-center' href='modelelicategoria.php?elicatego=".$rowMM[0]."'><button type='button' class='btn btn-danger'><i class='fas fa-trash'></i>  Eliminar</button></a></td>
                                        </tr>";
                                        
                                    }                                    
                                ?>
                            </tbody>
                            <tfoot>

                            </tfoot>

                        </table>
                    </div>                    
                </div>  
                <!---Fin Tabla Marcas -->

            </div>
        </div>        
        <!--fIN Contenedores-->
    </div>

<!-- Modal Marca-->
<div class="modal fade" id="modalmarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #0B3861;">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Nueva Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">        
        <form action="modelinsmarca.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Marca</label>
                <input type="text" class="form-control" name="txtMarcaN">                
            </div>                                
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-primary" style="background: #0B3861;">Agregar</button>
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>        
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Fin Marca-->
<!-- Modal Categoria-->
<div class="modal fade" id="modalcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #0B3861;">
        <h5 class="modal-title text-white" id="exampleModalLongTitle">Nueva Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">        
        <form action="modelinscategoria.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Categoría</label>
                <input type="text" class="form-control" name="txtCategoriN">                
            </div>                                
      </div>
      <div class="modal-footer">
            <button type="submit" class="btn btn-primary" style="background: #0B3861;">Agregar</button>
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>        
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal Categoria-->



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