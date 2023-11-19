<?php
require_once 'conexion.php';

$path = '/assets/img/artists/';

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$foto = $_FILES['foto'];
$disquera = $_POST['disquera'];

$sql_verificacion = "SELECT Id FROM artistas WHERE Nombre = '$nombre' AND Id_Disquera = $disquera";
$resultado_verificacion = $conn->query($sql_verificacion);

if ($resultado_verificacion->num_rows > 0) {
    echo '<script>window.alert("Esta disquera ya tiene asignado a este artista.");
    location.href="/crear-artista.php";</script>';
} else {
    if (is_uploaded_file($foto['tmp_name'])) {
        $foto_path = $path . $nombre . '.jpg';
        move_uploaded_file($foto['tmp_name'], '../..' . $foto_path);
        $sql = "INSERT INTO artistas (Nombre, Descripcion, Foto, Id_Disquera)
        VALUES ('$nombre', '$descripcion', '$foto_path', $disquera)";
    } else {
        $sql = "INSERT INTO artistas (Nombre, Descripcion, Id_Disquera) VALUES ('$nombre', '$descripcion', $disquera)";
    }

    if ($conn->query($sql)) {
        header("Location: /crear-artista.php");
    } else {
        echo('Ha ocurrido un error al insertar los datos >:3 <img src="/assets/img/cat.jpeg" alt="gato">'); 
    }
}
