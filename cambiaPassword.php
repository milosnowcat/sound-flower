<?php
    require_once('conexion.php');

    $correo=$_POST['cambiaCorreo'];
    $contra=$_POST['cambiaPass'];
    $confirme=$_POST['CambiaConfirm'];
    $sql1="SELECT * FROM usuarios WHERE Correo='$correo'";
    $envio1=mysqli_query($conexion, $sql1);
    if($contra==$confirme){
        if($envio1){
            $has=password_hash($contra,PASSWORD_DEFAULT,['cost'=>5]);
            $sql2="UPDATE `usuarios` SET Contraseña='$has' WHERE Correo='$correo'";
            $envio2=mysqli_query($conexion, $sql2);
            header('location: login.html');
        }
        else{
            echo'<script> alert("Datos no encontrados") </script>';
            echo'<script> window.location.href("cambiaPassword.html") </script>';
        }
    }
    else{
        echo'<script> alert("contraseña incorrecta") </script>';
        echo'<script> window.location.href("cambiaPassword.html") </script>';
    }

?>
