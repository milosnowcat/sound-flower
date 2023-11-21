<?php
    session_start();
    /*
    if(!isset($_SESSION['logeado'])|| !$_SESSION['logeado']){
        header('Location: login.html');
    }
    */
    require_once('assets/php/conexion.php');
    mysqli_set_charset($conn,'utf8');
    $usuario=$_SESSION['emailUs'];
    $sql="SELECT * FROM usuarios WHERE Correo = '$usuario'";
    $envio=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="perfil.css">
</head>
<body>
    <main>
        <section class="head_perfil">
            <article class="foto_perfil">
                <img src="assets/img/cat.jpeg" alt="">
            </article>
            <article class="nombre_perfil">
                <h1> <?php echo $sql['Nombre']; ?> </h1>
            </article>
        </section>
        
        <section class="body_perfil">
            <br>
            <h2>Descripccion</h2>
            <textarea name="" id="desc" cols="30" rows="10">
            </textarea>    
            <br>
            <a class="hov" href="">cambiar contraseña</a>
            <br><br>
            <a class="hov" href="">Renovar suscripción</a>
            <section class="playlist">
                <div>
                    <a href="" class="cancion">
                        <img class="play-foto" src="assets/img/cat.jpeg" alt="">
                    </a>
                    <a href="" class="cancion">
                        <img class="play-foto" src="assets/img/cat.jpeg" alt="">
                    </a>
                    <a href="" class="cancion">
                        <img class="play-foto" src="assets/img/cat.jpeg" alt="">
                    </a>
                </div>
                <div>
                    <a href="" class="cancion">
                        <img class="play-foto" src="assets/img/cat.jpeg" alt="">
                    </a>
                    <a href="" class="cancion">
                        <img class="play-foto" src="assets/img/cat.jpeg" alt="">
                    </a>
                    <a href="" class="cancion">
                        <img class="play-foto" src="assets/img/cat.jpeg" alt="">
                    </a>
                </div>
                <div>
                    <a href="" class="cancion">
                        <img class="play-foto" src="assets/img/cat.jpeg" alt="">
                    </a>
                    <a href="" class="cancion">
                        <img class="play-foto" src="assets/img/cat.jpeg" alt="">
                    </a>
                    <a href="" class="cancion">
                        <img class="play-foto" src="assets/img/cat.jpeg" alt="">
                    </a>
                </div>
            </section>
        </section>
    </main>
</body>
</html>