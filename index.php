<?php
session_start();
//Si no está definida la variable de sesión es que no se ha logueado, lo mandamos al login
if (empty($_SESSION['idUsuario'])){
    header("location:login.php");
}
require_once("libreria.php");
//Recuperamos la puntuación para mostrarla
$puntuacion= getPuntuacion($_SESSION['idUsuario']);
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
 
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
 
       <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <title>Trivial</title>
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
        <h5>Bienvenido <?=$_SESSION['nombre']?></h5>
        </div>
       
        <div class="d-flex justify-content-center">
        <p>¿Cual es tu cultura general? Puntuación: <span id="puntuacion"><?=$puntuacion?></span></p>
        </div>
       
       
         <div class="tablero">
            <div class="d-flex justify-content-center">
  
           
                <div class="d-flex justify-content-center">
                <h5 id="pregunta">...</h5>
                </div>
            </div>
            <br/>
            Respuesta 1:<button type="button" id="res1" class="btn btn-primary btn-block" value="">.</button> 
            Respuesta 2:<button type="button" id="res2" class="btn btn-primary btn-block" value="">.</button> 
            Respuesta 3:<button type="button" id="res3" class="btn btn-primary btn-block" value="">.</button> 
            Respuesta 4:<button type="button" id="res4" class="btn btn-primary btn-block" value="">.</button> 
            
            <br/>
            
            <div class="row">
                <div class="col-12" id="mensaje" style="min-height: 70px;"></div>
            </div>
            
           </div>
            
         
            
           
        
        <script src="trivial.js" type="text/javascript"></script>
    </body>
</html>


<!--<!DOCTYPE html>
 
<html>
    <head>
        <title>Trivial informático</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
         
    </head>
    <body>
        <div class="container" >
            <div class="jumbotron">
                <h1 class="display-1">Trivial. Bienvenido <?=$_SESSION['nombre']?></h1>
                <p>¿Cual es tu cultura general? Puntuación: <span id="puntuacion"><?=$puntuacion?></span></p>
            </div>
            <div class="row">
                <div class="col-12" id="mensaje" style="min-height: 70px;"></div>
            </div>
            <div class="row tablero">
                <div class="col-12"><h1 id="pregunta" class="text-center">Bienvenido al trivial. Muy pronto preguntas</h1></div>
            </div>
            <div class="row my-4 tablero">
 
                <div class="col-6 text-center"><button id="res1" class="btn btn-lg btn-success">.</button></div>
                <div class="col-6 text-center"><button id="res2" class="btn btn-lg btn-success">.</button></div>
 
            </div>
 
            <div class="row tablero">
 
                <div class="col-6 text-center"><button id="res3" class="btn btn-lg btn-success">.</button></div>
                <div class="col-6 text-center"><button id="res4" class="btn btn-lg btn-success">.</button></div>
 
            </div>
        </div>
        <script src="trivial.js" type="text/javascript"></script>
 
    </body>
</html>-->
