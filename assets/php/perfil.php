<?php
    session_start();
    if(!isset($_SESSION['id'])|| !$_SESSION['id']){
        header('Location: login.html');
    } else {
        require_once('conexion.php');
        $usuario=$_SESSION['id'];

        $archivo = $_FILES['foto_usuario'];
        $rut = "/assets/img/users/";
        $bd =  $rut . $usuario . ".jpg";
        if (is_uploaded_file($archivo['tmp_name'])) {
            move_uploaded_file($archivo['tmp_name'], '../..' . $bd);
            $sqlfoto="UPDATE usuarios SET Foto='$bd' WHERE Id ='$usuario'";
            $envio=mysqli_query($conn,$sqlfoto);
        }
    }
