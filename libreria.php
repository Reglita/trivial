<?php
 
function conectar() {
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "trivial";
    try {
        $conn = new PDO("mysql:host=$server;dbname=$db", $user, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
 
function getPregunta($idUsuario) {
    try {
        $conn = conectar();
        //Buscamos una pregunta que no se haya hecho a este usuario al azar
        $sql = "SELECT * FROM preguntas where idpreguntas not in (select idpreguntas from resultados where idusuarios=$idUsuario) order by rand() limit 1";
        $resul = $conn->query($sql);
        $fila = $resul->fetch();
        return $fila;
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
 
function getPuntuacion($idUsuario) {
    try {
        $conn = conectar();
        $sql = "SELECT ifnull(sum(puntos),0) puntuacion FROM resultados where idusuarios=:id";
        $st = $conn->prepare($sql);
        $st->execute(['id' => $idUsuario]);
        $fila = $st->fetch();
        return $fila['puntuacion'];
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
 
function comprobarUsuario($nombre, $password) {
    try {
        $conn = conectar();
        //Buscamos un usuario con el nombre solicitado
        $sql = "select * from usuarios where nombre=:nombre";
        $st = $conn->prepare($sql);
        $st->execute(['nombre' => $nombre]);
        $usuario = $st->fetch();
        //Si no existe es un alta, lo insertamos en la BD
        if (!$usuario) {
            $st = $conn->prepare("insert into usuarios (nombre,password) values (:nombre,:password)");
            $st->execute(['nombre' => $nombre, 'password' => md5($password)]);
            //Y devolvemos el id del usuario insertado
            return $conn->lastInsertId();
        } else {
            //Si el usuario existe miramos si la contrasela coincide, si es así devolvemos el id
            if (md5($password) == $usuario['password']) {
                return $usuario['idusuarios'];
            }
        }
        //Si no se da ninguna de las condiciones devolvemos falso
        return false;
    } catch (Exception $ex) {
        echo $ex->getMessage();
        return false;
    }
}
 
function guardaResultado($idUsuario, $idPregunta, $puntos) {
    try {
        $conn = conectar();
        $sql = "insert into resultados (idusuarios,idpreguntas,puntos) values (:idu,:idp,:puntos)";
        $st = $conn->prepare($sql);
        $st->execute(['idu' => $idUsuario, 'idp' => $idPregunta, 'puntos' => $puntos]);
        return getPuntuacion($idUsuario);
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}