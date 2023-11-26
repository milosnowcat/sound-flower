<?php
session_start();

if(!isset($_SESSION['id']) || $_SESSION['tipo'] < 2) {
?>
    <script>
    alert("Inicia sesión como disquera para entrar");
    location.href = "/login.html";
    </script>
<?php
} else {
    require_once 'conexion.php';

    $path = '/assets/img/albums/';

    $nombre = $_POST['nombre'];
    $foto = $_FILES['foto'];
    $artista = $_POST['artista'];

    $sql_verificacion = "SELECT Id FROM albumes WHERE Nombre = '$nombre' AND Id_Artista = $artista";
    $resultado_verificacion = $conn->query($sql_verificacion);

    if ($resultado_verificacion->num_rows > 0) {
        echo '<script>window.alert("Este artista ya tiene asignado a este album.");
        location.href="/crear-album.php";</script>';
    } else {
        if (is_uploaded_file($foto['tmp_name'])) {
            $foto_path = $path . $nombre . '.jpg';
            move_uploaded_file($foto['tmp_name'], '../..' . $foto_path);
            $sql = "INSERT INTO albumes (Nombre, Portada, Id_Artista)
            VALUES ('$nombre', '$foto_path', $artista)";
        } else {
            $sql = "INSERT INTO albumes (Nombre, Id_Artista)
                VALUES ('$nombre', $artista)";
        }

        if ($conn->query($sql)) {
            header("Location: /crear-album.php");
        } else {
            echo 'Ha ocurrido un error al insertar los datos >:3 <img src="/assets/img/cat.jpeg" alt="gato">';
        }
    }
}
