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

    $path = '/assets/audio/';

    $nombre = $_POST['nombre'];
    $archivo = $_FILES['archivo'];
    $duracion = $_POST['duracion'];
    $album = $_POST['album'];
    $artistas = $_POST['artistas'];

    $sql_verificacion = "SELECT Id FROM canciones WHERE Nombre = '$nombre' AND Id_Album = $album";
    $resultado_verificacion = $conn->query($sql_verificacion);

    $sql_numero = "SELECT Id FROM canciones WHERE Id_Album = $album";
    $resultado_numero = $conn->query($sql_numero);
    $numero = $resultado_numero->num_rows++;

    if ($resultado_verificacion->num_rows > 0) {
        echo '<script>window.alert("Este album ya tiene asignada esta canción.");
        location.href="/crear-cancion.php";</script>';
    } else {
        if (is_uploaded_file($archivo['tmp_name'])) {
            $audio_path = $path . $nombre . '.mp3';
            move_uploaded_file($archivo['tmp_name'], '../..' . $audio_path);
            $sql = "INSERT INTO canciones (Nombre, Archivo, Duracion, Numero, Id_Album)
                VALUES ('$nombre', '$audio_path', '$duracion', '$numero', $album)";
        } else {
            $sql = "INSERT INTO canciones (Nombre, Duracion, Numero, Id_Album)
                VALUES ('$nombre', '$duracion', '$numero', $album)";
        }

        if ($conn->query($sql)) {
            header("Location: /crear-cancion.php");
        } else {
            echo 'Ha ocurrido un error al insertar los datos >:3 <img src="/assets/img/cat.jpeg" alt="gato">';
        }

        $resultado_verificacion = $conn->query($sql_verificacion);
        $row_verificacion = $resultado_verificacion->num_rows;

        foreach ($artistas as $artista) {
            // TODO hacer un insert a cacion_artista por cada artista
        }
    }
}
