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
    $play1 = "SELECT * FROM playlists WHERE Id = '$numeroPlay'";
    $env1=mysqli_query($conn,$play1);
    while($mostrarPlay1 = mysqli_fetch_array($env1)){
        $canPlay1 = "SELECT * FROM cancion_playlist WHERE Id_Playlist= '{$mostrarPlay1['Id']}'";
        $envcan1=mysqli_query($conn,$canPlay1);
        $mostrarCanPlay1 = mysqli_fetch_array($envcan1);
        while($mostrarCanPlay1 = mysqli_fetch_array($envcan1)){
            $can1 = "SELECT * FROM canciones WHERE Id= '{$mostrarCanPlay1['Id_Cancion']}'";
            $envcancion1=mysqli_query($conn,$can1);
            
            while($mostrarCan1 = mysqli_fetch_array($envcancion1)){
                $nCanciones=$nCanciones+1;
            }

            if($mostrarPlay1['Id_Usuario'] != $id && !$mostrarPlay1['Id_Publica']) {
                header('Location: /');
            }
        }

        $query_usuario = "SELECT Nombre FROM usuarios WHERE Id = '{$mostrarPlay1['Id_Usuario']}'";
        $result = mysqli_query($conn, $query_usuario);
        $array_usuario =mysqli_fetch_array($result);
        $creador=$array_usuario['Nombre'];
    }
    
    $play = "SELECT * FROM playlists WHERE Id = '$numeroPlay'";
    $env=mysqli_query($conn,$play);
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
        <?php
         while($mostrarPlay = mysqli_fetch_array($env)){
            $canPlay = "SELECT * FROM cancion_playlist WHERE Id_Playlist= '{$mostrarPlay['Id']}'";
            $envcan=mysqli_query($conn,$canPlay);
        ?>

        <section class="hed-list">
            <article class="foto-titu">
                <img src=" <?php echo $mostrarPlay['Foto'] ?> " alt="">
            </article>
            <article class="titu">
                <h1> <?php echo $mostrarPlay['Nombre'] ?> </h1>
                <br>
                <a href="/player.php?id=<?php echo $numeroPlay ?>&t=p&n=1" class="c1">
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
            $numero = 0;
           
                while($mostrarCanPlay = mysqli_fetch_array($envcan)){
                    $can = "SELECT * FROM canciones WHERE Id= '{$mostrarCanPlay['Id_Cancion']}'";
                    $envcancion=mysqli_query($conn,$can);
                    while($mostrarCan = mysqli_fetch_array($envcancion)){
                        $sql_album = "SELECT * FROM albumes WHERE Id='{$mostrarCan['Id_Album']}'";
                        $query_album = mysqli_query($conn, $sql_album);
                        $result_album = mysqli_fetch_array($query_album);
                        $numero++;
                        ?>
                        <a href="/player.php?id=<?php echo $numeroPlay ?>&t=p&n=<?php echo $numero ?>">
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
                <?php } ?>
            <?php } ?>
        </section>  
    </main>
    <?php
        require 'assets/components/mainFooter.php';
    ?>
</body>
</html>
