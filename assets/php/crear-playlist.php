<?php
    session_start();
    require_once('conexion.php');
    $ids=$_SESSION['id'];
    $nombre=$_POST['nombre_play'];
    $archivo=$_FILES['foto'];
    $publica=$_POST['publica'];
    $es_publica = false;

    if($publica) {
        $es_publica = true;
    }

    $rud="/assets/img/playlists/";
    $db=$rud . $ids . $nombre . ".jpg";
    $sql="INSERT INTO playlists (Nombre, Id_Usuario, Id_Publica) VALUES ('$nombre', '$ids', $es_publica)";
    if(is_uploaded_file($archivo['tmp_name'])) {
        move_uploaded_file($archivo['tmp_name'], '../..' . $db);
        $sql="INSERT INTO playlists (Nombre, Foto, Id_Usuario, Id_Publica) VALUES ('$nombre', '$db', '$ids', $es_publica)";
    }
    $env=mysqli_query($conn, $sql);
    header('Location: /');
?>