<?php
require_once("../includes/db.php");
//require_once("validar.php");

$operacion = $_GET["operaciones"];

if ( $operacion == "NEW" ) { 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $texto = $_POST["texto"];
    $id_categoria = $_POST["id_categoria"];
    $id_usuario = $_POST["id_usuario"];
    $imagen = $_POST["imagen"];
    $fecha = $_POST["fecha"];
    $sentencia = $conx->prepare("INSERT INTO noticias (titulo, descripcion, texto, id_categoria, id_usuario, imagen, fecha) VALUES (?, ?, ?, ?, ?, ?, ?) ");
    $sentencia->bind_param("sssiiss", $titulo,$descripcion, $texto, $id_categoria, $id_usuario, $imagen, $fecha);
    $sentencia->execute();
      
} else if( $operacion == "EDIT" ) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $id = $_POST['id'];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $texto = $_POST["texto"];
    $id_categoria = $_POST["id_categoria"];
    $id_usuario = $_POST["id_usuario"];
    $imagen = $_POST["imagen"];
    $fecha = $_POST["fecha"];
    $sentencia = $conx->prepare("UPDATE noticias SET titulo = ?, descripcion = ?, texto = ?, id_categoria = ?, id_usuario = ?, imagen = ?, fecha = ? WHERE id = ? ");
    $sentencia->bind_param("sssiissi", $titulo, $descripcion, $texto, $id_categoria, $id_usuario, $imagen, $fecha);
    $sentencia->execute();

} else if( $operacion == "DELETE" ) {

    $id = $_GET["id"];
    $sentencia = $conx->prepare("DELETE FROM noticias WHERE id = ? ");
    $sentencia->bind_param("i", $id);
    $sentencia->execute();

}


header("Location: ../views/noticias/listado.php");


