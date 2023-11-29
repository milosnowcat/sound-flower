<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: login.html');
    }
    require_once('assets/php/conexion.php');
    
    if(isset($_GET['id'])){
        $numeroPlay = $_GET['id'];
    } else {
        header('Location: /');
    }

    $id=$_SESSION['id'];
    $nCanciones=0;
    $can1 = "SELECT * FROM canciones WHERE Id_Album= $numeroPlay";
    $envcancion1=mysqli_query($conn,$can1);
    
    while($mostrarCan1 = mysqli_fetch_array($envcancion1)){
        $nCanciones=$nCanciones+1;
        }

        $sql_album = "SELECT * FROM albumes WHERE Id = $numeroPlay";
        $query_album = mysqli_query($conn, $sql_album);
        $result_album =mysqli_fetch_array($query_album);

        $sql_artista = "SELECT Nombre FROM artistas WHERE Id = '{$result_album['Id_Artista']}'";
        $query_artista = mysqli_query($conn, $sql_artista);
        $result_artista =mysqli_fetch_array($query_artista);
        $creador=$result_artista['Nombre'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist</title>
    <link rel="stylesheet" href="assets/css/lista.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <?php
        require 'assets/components/mainHeader.php';
    ?>
    
    <main>
        <section class="hed-list">
            <article class="foto-titu">
                <img src=" <?php echo $result_album['Portada'] ?> " alt="">
            </article>
            <article class="titu">
                <h1> <?php echo $result_album['Nombre'] ?> </h1>
                <br>
                <a href="/player.php?id=<?php echo $result_album['Id'] ?>&t=a&n=1" class="c1">
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
                $envcancion=mysqli_query($conn,$can1);
                $numero = 0;
                while($mostrarCan = mysqli_fetch_array($envcancion)){
                    $numero++;
                    ?>
                    <a href="/player.php?id=<?php echo $result_album['Id'] ?>&t=a&n=<?php echo $numero ?>">
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
                                    <div></div>
                                    <a href="/agregar.php?id=<?php echo $mostrarCan['Id'] ?>"><i class='bx bxs-playlist'></i></i></a>  
                                </article>
                                <article class="nomm">
                                    <h1><?php echo $mostrarCan['Nombre'] ?></h1>
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
                    </a>

                <?php } ?>
        </section>
    </main>
    <?php
        require 'assets/components/mainFooter.php';
    ?>
</body>
</html>
