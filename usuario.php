<?php
    session_start();
    if(!isset($_SESSION['id'])|| !$_SESSION['id']){
        header('Location: login.html');
    }
    require_once('assets/php/conexion.php');
    $usuario=$_SESSION['id'];
    $current = true;
    if(isset($_GET['id'])) {
        $usuario = $_GET['id'];
        $current = false;
    }
    $sql="SELECT * FROM usuarios WHERE Id = '$usuario'";
    $envio=mysqli_query($conn,$sql);
    $mostrar = mysqli_fetch_array($envio);
    $sqlcancion="SELECT * FROM playlists WHERE Id_Usuario = $usuario AND Id_Publica = 1";
    $enviocnacion=mysqli_query($conn,$sqlcancion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="assets/css/perfil.css">
</head>
<body>
    <?php
        require 'assets/components/mainHeader.php';
    ?>
    <main>
        <section class="head_perfil">
            <article class="foto_perfil">
                <form id="fotoUsuario" enctype="multipart/form-data">
                    <input type="file" name="foto_usuario" id="fot" accept="image/*" >
                    <label for="fot"><img src="<?php echo $mostrar['Foto']; ?>" alt="" id="preview"></label>
                </form>
            </article>
            <article class="nombre_perfil">
                <h1><?php echo $mostrar['Nombre']; ?></h1>
            </article>
        </section>
        
        <section class="body_perfil">
            <h2>Descripccion</h2>
            <textarea name="" id="desc" cols="30" rows="10">
            </textarea>
            <br>
            <?php
                if($current) {
            ?>
                <a class="hov" href="password.html">cambiar contraseña</a>
                <br><br>
                <a class="hov" href="pago.php">Renovar suscripción</a>
            <?php
                }
            ?>
            <section class="playlist">
                <div>
                <?php while($playlist = mysqli_fetch_array($enviocnacion)){ ?>
                    <a href="/playlist.php?id=<?php echo $playlist['Id']; ?>" class="cancion">
                        <img class="play-foto" src="<?php echo $playlist['Foto']; ?>" alt="">
                    </a>
                <?php } ?>
                </div>
            </section>
        </section>
    </main>
    <script type="module" src="assets/js/perfil.js"></script>
    <?php
        require 'assets/components/mainFooter.php';
    ?>
</body>
</html>
