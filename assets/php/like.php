<?php
session_start();
if(!isset($_SESSION['id']) || !isset($_GET['cancion'])){
    header('Location: /login.html');
}

require_once 'conexion.php';

$id = $_SESSION['id'];

if(isset($_GET['cancion'])){
    $cancion = $_GET['cancion'];
    
    $sql_verificacion = "SELECT Id FROM favoritos_canciones WHERE Id_Usuario = $id AND Id_Cancion = $cancion";
    $query_verificacion = $conn->query($sql_verificacion);
    
    if ($query_verificacion->num_rows == 0) {
        $sql = "INSERT INTO favoritos_canciones (Id_Usuario, Id_Cancion)
        VALUES ($id, $cancion)";
    
        $conn->query($sql);
    } else {
        $sql = "DELETE FROM favoritos_canciones WHERE Id_Usuario = $id AND Id_Cancion = $cancion";
        $conn->query($sql);
    }
    header("Location: /likes.php");
} else {
    if(isset($_GET['album'])) {
        $album = $_GET['album'];
    
        $sql_verificacion = "SELECT Id FROM favoritos_albumes WHERE Id_Usuario = $id AND Id_Album = $album";
        $query_verificacion = $conn->query($sql_verificacion);
        
        if ($query_verificacion->num_rows == 0) {
            $sql = "INSERT INTO favoritos_albumes (Id_Usuario, Id_Album)
            VALUES ($id, $album)";
        
            $conn->query($sql);
        } else {
            $sql = "DELETE FROM favoritos_albumes WHERE Id_Usuario = $id AND Id_Album = $album";
            $conn->query($sql);
        }
    }
    header("Location: /");
}

