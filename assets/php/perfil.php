<?php
    require_once('conexion.php');
    mysqli_set_charset($conn,'utf8');
    $usuario=$_SESSION['id'];

    $foto=$_POST['foto_usuario'];
    $archivo = $_FILES['foto_usuario']['tmp_name'];
    $rut = "../img/users/$foto";
    $bd = "/assets/img/users/$foto";
    move_uploaded_file($archivo,$rut);
    $sqlfoto="UPDATE usuarios SET Foto='$bd' WHERE Id ='$usuario'";
    $env=$envio=mysqli_query($conn,$sqlfoto);
    header('Location: perfil.php');

?>