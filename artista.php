<?php
    session_start();
    if(!isset($_SESSION['id'])|| !$_SESSION['id']){
        header('Location: login.html');
    }
    require_once('assets/php/conexion.php');
    if(isset($_GET['nombre'])) {
        $artista = $_GET['nombre'];
    } else {
        header("Location: /");
    }
    $sql="SELECT * FROM artistas WHERE Nombre = '$artista'";
    $envio=mysqli_query($conn,$sql);
    $mostrar = mysqli_fetch_array($envio);
    $sqlcancion="SELECT DISTINCT alb.Id, alb.Nombre, alb.Portada, alb.Id_Artista
    FROM albumes alb
    JOIN canciones can ON alb.Id = can.Id_Album
    JOIN cancion_artista ca ON can.Id = ca.Id_Cancion
    JOIN artistas art ON ca.Id_Artista = art.Id
    WHERE art.Nombre = '$artista'";
    
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
                    <label for="fot"><img src="<?php echo $mostrar['Foto']; ?>" alt=""></label>
                </form>
            </article>
            <article class="nombre_perfil">
                <h1><?php echo $mostrar['Nombre']; ?></h1>
            </article>
        </section>
        
        <section class="body_perfil">
            <h2>Descripccion</h2>
            <textarea name="" id="desc" cols="30" rows="10"><?php echo $mostrar['Descripcion'] ?></textarea>
            <br>
            <br>
            <br>
            <section class="playlist">
                <div>
                <?php while($playlist = mysqli_fetch_array($enviocnacion)){ ?>
                    <a href="/album.php?id=<?php echo $playlist['Id']; ?>" class="cancion">
                        <img class="play-foto" src="<?php echo $playlist['Portada']; ?>" alt="">
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
