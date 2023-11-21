<?php
    session_start();
    
    if(!isset($_SESSION['logueado'])|| !$_SESSION['logueado']){
        header('Location: login.html');
    }
    
    require_once('assets/php/conexion.php');
    mysqli_set_charset($conn,'utf8');
    $usuario=$_SESSION['emailUs'];
    if($_POST){
        $active=$_POST['nombre'];
        $sql="UPDATE usuarios SET Esta_Suscrito='1' WHERE Correo ='$usuario'";
        $env=mysqli_query($conn,$sql);
        echo '<script> alert("Su pago se realizo con exito") </script>';
        header("Location: index.php");
    }

?>
