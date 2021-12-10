<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">       
</head>
<body>
    <div class="container">
        <!--Seccion de Comentarios-->
        <div class="row">  
        <div class="col-sm-2 col-md-2 col-lg-2"></div>
        <div class="col-sm-8 col-md-8 col-lg-8">
            <div class="jumbotron jumbotron-fluid">                
                <div class="container">                    
                    <!--Formulario-->
                    <div class="row">
                        <div class="container">
                            <form action="" method="post">
                                <h1 class="display-4">Agragar Comentario </h1>
                                <div class="form-group">
                                    <!--<label for="exampleFormControlTextarea1">Example textarea</label>-->                            
                                    <textarea class="form-control" name="desComentario" id="exampleFormControlTextarea1" rows="6"></textarea>
                                </div>                                                  
                                <input type="submit" class="btn  btn-info left" name="enviar" value="Publicar">
                                <input class="btn btn-secondary text-white left" type="reset" name="" value="Cancelar">                            
                            </form>
                        </div>
                    </div>
                    <!--Fin Formulario-->
                    <!--Mostrar Comentarios-->
                    <div class="row">
                        <div class="container">
                            <h1>Comentarios</h1>
                            <div class="card text-center">
                                <div class="card-header">
                                    correo del que lo pubico
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Comentario</h5>                                                                        
                                </div>
                                <div class="card-footer text-muted">
                                    fecha publicacion 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Fin Mostrar Comentarios-->
                </div>
            </div>            
        </div>
        <div class="col-sm-2 col-md-2 col-lg-2"></div>        
        </div>        
        <!--Fin Seccion de Comentarios-->
    </div>    


<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>