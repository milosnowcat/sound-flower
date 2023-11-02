<?php
require_once 'conexion.php';

$nombre = $_POST['nombre'];
$mail = $_POST['mail'];
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

$sql_verificacion = "SELECT Id FROM usuarios WHERE Correo = '$mail'";
$resultado_verificacion = $conn->query($sql_verificacion);

if ($resultado_verificacion->num_rows > 0) {
    echo '<script>window.alert("El correo electrónico ya está en uso. Por favor, elige otro.");
    location.href="/crear-disquera.html";</script>';
} else {
    $sql = "INSERT INTO usuarios (Nombre, Correo, Contraseña, Esta_Suscrito, Es_Disquera)
        VALUES ('$nombre', '$mail', '$pass' , 1, 1)";

    if ($conn->query($sql)) {
        header("Location: /crear-disquera.html");
    } else {
        echo 'Ha ocurrido un error al insertar los datos >:3 <img src="/assets/img/cat.jpeg" alt="gato">';
    }
}

$conn->close();
