<?php

require_once("../includes/db.php");
//require_once("validar.php");


$operacion = $_GET["operacion"];

if ( $operacion == "NEW" ) { 

    $nombres = $_POST['nombre'];
    $id_usuarios = $_POST["id_usuario"];
    $sentencia = $conx->prepare("INSERT INTO categorias (nombre, id_usuario) VALUES (?, ?) ");
    $sentencia->bind_param("si", $nombre, $id_usuario);
    $sentencia->execute();
    
} else if( $operacion == "EDIT" ) {
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $id_usuario = $_POST["id_usuario"];
    $sentencia = $conx->prepare("UPDATE categorias SET nombre = ?, id_usuario = ? WHERE id = ? ");
    $sentencia->bind_param("sii", $nombres, $id_usuarios, $id);
    $sentencia->execute();

} else if( $operacion == "DELETE" ) {

    $id = $_GET["id"];
    $sentencia = $conx->prepare("DELETE FROM categorias WHERE id = ? ");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();

}


header("Location: ../views/categorias/listado.php");



