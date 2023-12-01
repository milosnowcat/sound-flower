<?php
    require_once('conexion.php');
    if($_POST){
        $correo=$_POST['loginCorreo'];
        $contra=$_POST['loginContra'];
        $sql="SELECT * FROM usuarios WHERE Correo='$correo'";
        $env=mysqli_query($conn,$sql);
        
        if($env){
            if(mysqli_num_rows($env) > 0){
                $indic=mysqli_fetch_assoc($env);
                $contras=$indic['Pass'];
                if(password_verify($contra, $contras))
                {
                    session_start();
                    $_SESSION['id']=$indic['Id'];
                    $_SESSION['nombre']=$indic['Nombre'];
                    $_SESSION['tipo']=$indic['Tipo_Usuario'];
                    header("location: /");
                }
                else{
                    echo'<script> alert("Escribiste mal la contraseña :b") </script>';
                    echo'<script> window.location.href = "/login.html" </script>';

                }
            }
            else{
                echo'<script> alert("Escribiste mal el usuario :b") </script>';
                echo'<script> window.location.href = "/login.html" </script>';
            }
        }else{
            echo'<script> alert("ERROR :b") </script>';
        }
    }
?>
