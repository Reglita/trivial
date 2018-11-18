<?php
require_once 'libreria.php';
$error="";
session_start();
//Recuperamos el valor de nombre y password
$nombre= filter_input(INPUT_POST, 'nombre');
$password= filter_input(INPUT_POST, 'password');
 
//Si no están vacíos es porque hay un registro o login, lo comprobamos en la BD
if (!empty($nombre) && !empty($password)){
    //La función comprobar Usuario nos devuelve el id del usuario si existe
    $idUsuario=comprobarUsuario($nombre,$password);
    //Si existe el usuario guardamos la información en la BD y redirigimos al index
    if ($idUsuario){
        $_SESSION['idUsuario']=$idUsuario;
        $_SESSION['nombre']=$nombre;
        header("location:index.php");
    } else{
        $error="Usuario o contraseña incorrecta";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Trivial</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 
    </head>
    <body style="margin : 3em;">
        <br/>
          <br/>
        <div class="d-flex justify-content-center">
         <img src="img/s-l300_1.jpg" alt="carita" height="150px"/>
         </div>
           
            
        <br/>
        <div class="d-flex justify-content-center">
           
           
        <h1>Trivial</h1>
        </div>
        <br/>
        <div class="d-flex justify-content-center">
            <h5>Introduce tu usuario y contraseña</h5>
            </div>
     
        <div class="d-flex justify-content-center">
            <h7>Si no estás en el sistema se creará tu usuario</h7>
            </div>
            <h5 class="text-danger"><?=$error?></h5>
            </div>
            <form method="post">
                <div class="form-group">
                    <label for="nombre">Usuario:</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </body>
</html>