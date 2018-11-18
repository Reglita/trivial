<?php
require_once 'libreria.php';
session_start();
//Recuperamos los datos
$idUsuario= $_SESSION['idUsuario'];
$idPregunta= filter_input(INPUT_POST, 'idPregunta');
$puntos= filter_input(INPUT_POST, 'puntos');
//Y guardamos el resultado
$puntos=guardaResultado($idUsuario,$idPregunta,$puntos);
//Devolvemos los puntos
echo $puntos;