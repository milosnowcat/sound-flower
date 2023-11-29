<?php
session_start();

if(!isset($_SESSION['id'])) {
    header("Location: /login.html");
} else {
  include_once 'conexion.php';
  $cancion = $_POST['cancion'];
  $playlist = $_POST['playlist'];

  $sql = "INSERT INTO cancion_playlist (Id_Playlist, Id_Cancion)
    VALUES ($playlist, $cancion)";
  $conn->query($sql);

  header("Location: /playlist.php?id=$playlist");
}
