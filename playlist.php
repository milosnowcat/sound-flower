<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['tipo'] != 0){
        header('Location: login.html');
    }
    require_once('assets/php/conexion.php');
    
    if(isset($_GET['id'])){
        $numeroPlay = $_GET['id'];
    } else {
        // Si no se proporciona, establece un valor predeterminado
        $numeroPlay = 1;
    }

    $id=$_SESSION['id'];
    $nCanciones=0;
    $play1 = "SELECT * FROM playlists WHERE Id = '$numeroPlay'";
    $env1=mysqli_query($conn,$play1);
    while($mostrarPlay1 = mysqli_fetch_array($env1)){
        $canPlay1 = "SELECT * FROM cancion_playlist WHERE Id_Playlist= '{$mostrarPlay1['Id']}'";
        $envcan1=mysqli_query($conn,$canPlay1);
        $mostrarCanPlay1 = mysqli_fetch_array($envcan1);
        // while($mostrarCanPlay1 = mysqli_fetch_array($envcan1)){
            $can1 = "SELECT * FROM canciones WHERE Id= '{$mostrarCanPlay1['Id_Cancion']}'";
            $envcancion1=mysqli_query($conn,$can1);
            
            while($mostrarCan1 = mysqli_fetch_array($envcancion1)){
                $nCanciones=$nCanciones+1;
             }

             if($mostrarPlay1['Id_Usuario'] != $id && !$mostrarPlay1['Id_Publica']) {
                header('Location: /');
             }

             $query_usuario = "SELECT Nombre FROM usuarios WHERE Id = '{$mostrarPlay1['Id_Usuario']}'";
             $result = mysqli_query($conn, $query_usuario);
             $array_usuario =mysqli_fetch_array($result);
             $creador=$array_usuario['Nombre'];
        //  }
    }
    $play = "SELECT * FROM playlists WHERE Id = '$numeroPlay'";
    $env=mysqli_query($conn,$play);
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
                <a href="#" class="c1">
                    <span id="span1"></span>
                    <span id="span2"></span>
                    <span id="span3"></span>
                    <span id="span4"></span>
                    Play
                    <i class='bx bx-play-circle'></i>
                </a>
                <h5>N.Canciones <?php echo $nCanciones?> </h5>
                <h5> <?php echo $creador ?> </h5>
            </article>
        </section>
        <section class="body-list">
            <?php
           
                while($mostrarCanPlay = mysqli_fetch_array($envcan)){
                    $can = "SELECT * FROM canciones WHERE Id= '{$mostrarCanPlay['Id_Cancion']}'";
                    $envcancion=mysqli_query($conn,$can);
                    while($mostrarCan = mysqli_fetch_array($envcancion)){
                        ?>
                        
                        <article class="cancion">
                            <span id="span3"></span>
                            <article class="dody-img">
                                <img src=" <?php echo $mostrarCan['Portada'] ?> " alt="">
                            </article>
                            <article class="body-contenido">
                                <article class="body-likes">
                                    <a href="#"><i class='bx bx-like'></i></a>
                                    <div></div>
                                    <a href="##"><i class='bx bx-dislike'></i></a>
                                </article>
                                <h1><?php echo $mostrarCan['Nombre'] ?></h1>
                                <em>
                                    ID: <?php echo $mostrarCan['Id'] ?><br>
                                    Tiempo: <?php echo $mostrarCan['Duracion'] ?>min
                                </em> 
                            </article>
                        </article>

                    <?php } ?>
                <?php } ?>
            <?php } ?>

        </section>
        
    </main>
</body>
</html>
