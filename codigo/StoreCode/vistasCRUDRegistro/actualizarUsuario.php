<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
    <title>Registro Usuario</title>    
    <link rel="shortcut icon" href="../img\utilidades\logo tienda online transparente .png" />
</head>
<body>    
<!--NAV-->
    <nav class="navbar navbar-dark bg-dark text-white">
        <div class="container-fluid p-7">        
            <div class="col-sm-2">
                <img src="../img/utilidades/logo tienda online .png" width="100" height="100" class="img-fluid" >
            </div>    
            <div class="col-sm-5 text-wrap">
            <p  class="navbar-brand"><H4>Bienvenido!!!, Crea tu cuenta en STORECODE</H4></p>         
            </div>
            <div class="col-sm-5">
                <ul class="nav text-white">
                    <li class="nav-item">
                    <a class="nav-link active  text-light" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active  text-danger " aria-current="page" href="#">Cerrar Sesión </a>                    
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active  text-info" aria-current="page" href="#">¿Aun no cuentas con una cuenta?, Créala Aquí!!!</a>
                    </li>                    
                </ul>
            </div>
        </div>
    </nav>
<!--FIN NAV-->
    <br>
    <br>

    <div class="container">
        <div class="card border-info " >
            <div class="card-header row">
                <div class="col-sm-2">
                    <img src="../img\utilidades\logo tienda online transparente .png" width="100" height="100" class="img-fluid border" >    
                </div>
                <div class="col-sm-10 text-center">
                    <h1>Datos esenciales para tu perfil!!!</h1>
                </div>
            </div>

            <div class="card-body text-info">
                <form class="text-dark">
                    <!--Nombre-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Nombre:</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Solo Nombre">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Teléfono:</label>
                            <input type="number" class="form-control" id="inputAddress" placeholder="Teléfono">
                        </div>
                    </div>
                    <!--Apellidos-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Apellido Paterno">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Apellido Materno:</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Apellido Materno">
                        </div>
                    </div>
                    <!--Email e Imagen-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Imagen</label>               
                            <input type="file" class="custom-file-input" id="inputGroupFile02" accept="image/gif, image/jpeg, image/png">                            
                        </div>
                        <div class="form-group col-md-2">
                        </div>
                    </div>
                    <!--Direccion y Codigo Postal-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Dirección: </label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Dirección">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress2">Código Postal: </label>
                            <input type="number" class="form-control" id="inputAddress2" placeholder="Código Postal">
                        </div>
                    </div>    
                    <!--PASS-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                    </div>    
                    <!--Botones-->
                    <div class="form-row">
                        <div class="form-group col-md-2">
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-info">   Iniciar Sesión   </button>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-info">   Crear  </button>
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-dark">  Cancelar  </button>
                        </div>
                    </div>    
                    
                    </form>
            </div>
        </div>
    </div>
<br>
<br>
<div class="container-fluid bg-dark text-white text-center p-5">
    <p>&copy; Todos los derechos reservados :: Empresa CODEWAY 2020</p>
</div>
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>