<?php
    require_once('conexion.php');

    $user = $_POST['nombre'];
    $email = $_POST['correo'];

    $pass1 = $_POST['contra'];
    $pass2 = $_POST['confirmcontra'];

    $verificarUsuario = "SELECT * FROM usuarios WHERE Nombre = '$user' AND Correo = '$email'";
    $resultadoVU = mysqli_query($conn, $verificarUsuario);

    if (mysqli_num_rows($resultadoVU) > 0){
        echo'<script> alert("El usuario que pusiste ya es existente.") </script>';
        echo'<script> window.location.href("registro.html") </script>';
        //aqui poner el mensaje de que ya existe el usuario y que redirija nuevamente al registro
    }
    else{
        $verificarCorreo = "SELECT * FROM usuarios WHERE Correo = '$email";
        $resultadoVC = mysqli_query($conexion, $verificarCorreo);

        if (mysqli_num_rows($resultadoVC) > 0){
            echo'<script> alert("El correo que pusiste ya esta siendo usado.") </script>';
            echo'<script> window.location.href("/registro.html") </script>';
            //aqui el mensajede que ya hay una cuenta con ese correo
        }
        elseif ($pass1 == $pass2){
            $pass = password_hash($pass1, PASSWORD_DEFAULT, ['cost' => 15]);
            $preparacion = "INSERT INTO usuarios(Nombre, Correo, Contraseña) 
            VALUE ('$user', '$email', '$pass')";
            
            $envio = mysqli_query($conexion, $preparacion);
            header('Location: login.html');
        }
        else{
            echo'<script> alert("Las contraseñas son diferentes.") </script>';
            echo'<script> window.location.href("/registro.html") </script>';
            //aqui el mensaje de que las  contraseñas son distintas
        }
    }




    // $has=password_hash($contrasea,PASSWORD_DEFAULT,['cost'=>5]);
    // if($contrasea==$confirme){
    //     $sql="INSERT INTO usuarios(Nombre, Correo, Contraseña) VALUES ('$usuario', '$correo', '$has')";
    //     $envio=mysqli_query($conexion, $sql);
    //     header('location: login.html');
    // }
    // else{
    //     echo '<script> alert("Error en tu confirmacion de contraseña") </script>';
    //     echo'<script> window.location.href("registro.html") </script>';
    // }
?>