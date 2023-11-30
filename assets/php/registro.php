<?php
    require_once('conexion.php');

    $user = $_POST['nombre'];
    $email = $_POST['correo'];

    $pass1 = $_POST['contra'];
    $pass2 = $_POST['confirmcontra'];

    $verificarCorreo = "SELECT 'Id' FROM usuarios WHERE Correo = '$email'";
    $resultadoVC = mysqli_query($conn, $verificarCorreo);

    if (mysqli_num_rows($resultadoVC) > 0){
        echo'<script> alert("El correo que pusiste ya esta siendo usado.") </script>';
        echo'<script> window.location.href = "/registro.html" </script>';
        //aqui el mensajede que ya hay una cuenta con ese correo
    }
    elseif ($pass1 == $pass2){
        $pass = password_hash($pass1, PASSWORD_DEFAULT, ['cost' => 15]);
        $preparacion = "INSERT INTO usuarios (Nombre, Correo, Pass) VALUES ('$user', '$email', '$pass')";
            
        $envio = mysqli_query($conn, $preparacion);
        header('Location: /login.html');
    }
    else{
        echo'<script> alert("Las contraseñas son diferentes.") </script>';
        echo'<script> window.location.href = "/registro.html" </script>';
        //aqui el mensaje de que las  contraseñas son distintas
    }
?>
