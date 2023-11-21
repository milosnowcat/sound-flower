<?php
    session_start();
    
    if(!isset($_SESSION['id']) || $_SESSION['tipo'] != 0){
        header('Location: login.html');
    }
    
    require_once('conexion.php');
    mysqli_set_charset($conn,'utf8');
    $usuario=$_SESSION['id'];
    if($_POST){
        $active=$_POST['nombre'];
        $sql="UPDATE usuarios SET Tipo_Usuario=1 WHERE Id ='$usuario'";
        $env=mysqli_query($conn,$sql);
        echo '<script> alert("Su pago se realizo con exito");
        location.href = "/" </script>';
    }

?>
