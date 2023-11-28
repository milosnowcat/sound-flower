<?php
    session_start();
    require_once('conexion.php');
    $usua=$_SESSION['emailUs'];
    $sql2="SELECT * FROM usuarios WHERE Correo='$usua'";
    $env2=mysqli_query($conn, $sql2);
    $us=mysqli_fetch_array($env2);
    $ids=$us['Id'];
    $nombre=$_POST['nombre_play'];
    $foto_play=$_POST['foto'];
    $archivo=$_FILES['foto']['tmp_name'];
    $rud="../img/foto-playlist/$foto_play";
    $db="/assets/img/foto-playlist/$foto_play";
    move_uploaded_file($archivo, $rud);
    $sql="INSERT INTO playlists (Nombre, Foto, Id_Usuario) VALUES ('$nombre', '$db', '$ids')";
    $env=mysqli_query($conn, $sql);
    header('Location: /');
?>