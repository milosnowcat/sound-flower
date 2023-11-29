<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: login.html');
    }
    require_once('assets/php/conexion.php');
    $id=$_SESSION['id'];
    $creador=$_SESSION['nombre'];
    $nCanciones=0;
    $play1 = "SELECT * FROM favoritos_canciones WHERE Id_Usuario = '$id'";
    $env1=mysqli_query($conn,$play1);
    while($mostrarPlay1 = mysqli_fetch_array($env1)){
            $can1 = "SELECT * FROM canciones WHERE Id= '{$mostrarPlay1['Id_Cancion']}'";
            $envcancion1=mysqli_query($conn,$can1);
            
            while($mostrarCan1 = mysqli_fetch_array($envcancion1)){
                $nCanciones=$nCanciones+1;
             }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/lista.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php
        require 'assets/components/mainHeader.php';
    ?>
    <main>
        <?php
            $canPlay = "SELECT * FROM favoritos_canciones WHERE Id_Usuario = '$id'";
            $envcan=mysqli_query($conn,$canPlay);
        ?>

        <section class="hed-list">
            <article class="foto-titu">
                <img src="/assets/img/meGusta.jpeg" alt="">
            </article>
            <article class="titu">
                <h1>Likes</h1>
                <br>
                <a href="#" class="c1">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    Play
                    <i class='bx bx-play-circle'></i>
                </a>
                <h5>N.Canciones <?php echo $nCanciones?> </h5>
                <article class="nomm">
                    <h5> <?php echo $creador ?> </h5>
                </article>
            </article>
        </section>
        <section class="body-list">
            <?php
           
                while($mostrarCanPlay = mysqli_fetch_array($envcan)){
                    $can = "SELECT * FROM canciones WHERE Id= '{$mostrarCanPlay['Id_Cancion']}'";
                    $envcancion=mysqli_query($conn,$can);
                    while($mostrarCan = mysqli_fetch_array($envcancion)){
                        $sql_album = "SELECT * FROM albumes WHERE Id='{$mostrarCan['Id_Album']}'";
                        $query_album = mysqli_query($conn, $sql_album);
                        $result_album = mysqli_fetch_array($query_album);
                        ?>
                        
                        <article class="cancion">
                            <span id="span3"></span>
                            <article class="dody-img">
                                <img src=" <?php echo $result_album['Portada'] ?> " alt="">
                            </article>
                            <article class="body-contenido">
                                <article class="body-likes">
                                    <em><?php echo $mostrarCan['Duracion'] ?>:00</em>
                                    <div></div>
                                    <a href="assets/php/like.php?cancion=<?php echo $mostrarCan['Id'] ?>"><i class='bx bx-like'></i></a>
                                </article>
                                <article class="nomm">
                                    <h1><?php echo $mostrarCan['Nombre']; ?></h1>
                                </article>
                                <em>
                                    <?php
                                        $sqlAr = "SELECT * FROM cancion_artista WHERE Id_Cancion = '{$mostrarCan['Id']}'";
                                        $envAr=mysqli_query($conn,$sqlAr);
                                        $mosAr=mysqli_fetch_array($envAr);

                                        $sqlAr2 = "SELECT * FROM artistas WHERE Id = '{$mosAr['Id_Artista']}'";
                                        $envAr2=mysqli_query($conn,$sqlAr2);
                                        $mosAr2=mysqli_fetch_array($envAr2);
                                    ?>
                                    <?php echo $mosAr2['Nombre'] ?><br>
                                </em> 
                            </article>
                        </article>

                    <?php } ?>
                <?php } ?>

        </section>
    </main>
    <?php
        require 'assets/components/mainFooter.php';
    ?>
</body>
</html>
