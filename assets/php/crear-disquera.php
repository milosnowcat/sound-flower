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

    $nombre = $_POST['nombre'];
    $mail = $_POST['mail'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $sql_verificacion = "SELECT Id FROM usuarios WHERE Correo = '$mail'";
    $resultado_verificacion = $conn->query($sql_verificacion);

    if ($resultado_verificacion->num_rows > 0) {
        echo '<script>window.alert("El correo electrónico ya está en uso. Por favor, elige otro.");
        location.href="/crear-disquera.php";</script>';
    } else {
        $sql = "INSERT INTO usuarios (Nombre, Correo, Pass, Tipo_Usuario)
            VALUES ('$nombre', '$mail', '$pass' , 2)";

        if ($conn->query($sql)) {
            header("Location: /crear-disquera.php");
        } else {
            echo 'Ha ocurrido un error al insertar los datos >:3 <img src="/assets/img/cat.jpeg" alt="gato">';
        }
    }

    $conn->close();
}
