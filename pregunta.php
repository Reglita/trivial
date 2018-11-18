
<?php
 
require_once 'libreria.php';
session_start();
//Obtenemos una pregunta de la base de datos
$fila = getPregunta($_SESSION['idUsuario']);
 
//La fila que recuperamos la organizamos de una manera más amigable para el JS
$res['pregunta'] = $fila['pregunta'];
$res['id'] = $fila['idpreguntas'];
$res['correcta'] = $fila['respuesta1'];
$res['respuestas'] = [$fila['respuesta1'], $fila['respuesta2'], $fila['respuesta3'], $fila['respuesta4']];
shuffle($res['respuestas']);
 
//Lo codificamos en JSON
echo json_encode($res);
          
          
   