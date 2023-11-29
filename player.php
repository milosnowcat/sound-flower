<?php 
    require_once('assets/php/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/player.css"> 
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <script type="text/javaScript" src="player.js"></script>
    <title>Reproductor</title>
</head>
<body> 
    <?php
        require 'assets/components/mainHeader.php';
    ?>    

    <main id="mainPlayer">
        <!-- __________________parte del reproductor__________________ -->
        <section class="songPlayer">
            <article class="currentSong">
                <!-- imagen de la cancion que se esta repr -->
                <div class="currentSongImg">
                    <img class="songImg" src="" alt="">
                </div>

                <!-- nombre de la cancion y el artista -->
                <div class="namesContainer" >
                    <a  class="namesSong" href="#">Heaven</a>
                    <a  class="namesArtist" href="#">Mitski</a>
                </div>
                <audio controls autoplay preload="metadata" src="cancionEjemplo/Laufey.mp3"></audio>
            </article>
        </section>

        <!-- _______________________fila de reproducción______________  -->
        <section class="playQueue">
            <!-- recuadro blanco -->
            <section class="queueContainer">
                <h1 class="containerTittle">Cola de reproducción</h1>

                <!-- canciones en la fila -->
                <article class="provisionalSongContainer">
                    <!-- ___contenedor principal de la cancion siguiente__ -->  
                    <?php
                        $allIds3 = "SELECT id FROM canciones";
                        $idResult3 = mysqli_query($conn, $allIds3);
                                            
                        if(mysqli_num_rows($idResult3) <= 0){
  
                        }
                        else{
                            $ids3 = array();
                            while ($row3 = mysqli_fetch_assoc($idResult3)) {
                                $ids3[] = $row3['id'];
                            }
                            //shuffle($ids3);
                            $totalIds = count($ids3);

                            for($i = 0; $i < $totalIds; $i++){ 
                                
                                $randomId3 = $ids3[$i];

                                $query3 = "SELECT canciones.Id, canciones.Nombre, canciones.Id_Album, canciones.Duracion, artistas.Nombre AS NombreArtista
                                FROM canciones
                                LEFT JOIN cancion_artista ON canciones.Id = cancion_artista.Id_Cancion
                                LEFT JOIN artistas ON cancion_artista.Id_Artista = artistas.Id
                                WHERE canciones.id = '$randomId3'";
                                //$query3 = "SELECT * FROM canciones WHERE id = '$randomId3'";
                                $resultadoId3 = mysqli_query($conn, $query3);
                                $RandMostrar3 = mysqli_fetch_array($resultadoId3);

                                //while(){
                                    $id = $RandMostrar3['Id'];
                                    $nom = $RandMostrar3['Nombre'];
                                    $idAlbum = $RandMostrar3['Id_Album'];
                                    $duracion = $RandMostrar3['Duracion'];

                                    $id3 = $RandMostrar3['Id_Album'];

                                    $portadaC = "SELECT Portada FROM albumes WHERE Id = '$id3'";
                                    $envioCU3 = mysqli_query($conn, $portadaC);
                                    $mostrarCU3 = mysqli_fetch_assoc($envioCU3);

                                    $img = $mostrarCU3['Portada']; 
                                //}

                                if (isset($idAlbum)) {
                                    $artistaQuery = "SELECT artistas.Nombre AS NombreArtista
                                                    FROM artistas
                                                    INNER JOIN cancion_artista ON artistas.Id = cancion_artista.Id_Artista
                                                    WHERE cancion_artista.Id_Cancion = '$id'";
                                    //echo "Consulta: $artistaQuery"; 

                                    $artistaResult = mysqli_query($conn, $artistaQuery);

                                    if ($artistaResult) {
                                        $artistas = array(); 
                                        while ($artistaMostrar = mysqli_fetch_assoc($artistaResult)) {
                                            $artistas[] = $artistaMostrar['NombreArtista'];
                                        }

                                        if (!empty($artistas)) {
                                            $nombreArtista = implode(', ', $artistas); 
                                        }
                                    }
                                }
                            ?>
                                <div class="songQueueContainer">
                                    <!-- contenedor imagen/nombre/artista -->
                                    <section class="artistInfo">
                                        <button onclick="anotherSong()" class="imgContainer">
                                            <img class="albumImg" src="<?php echo $img; ?>" alt="">
                                        </button>
                                        
                                        <div class="nameSongNArtist">
                                            <p class="nameSong"><?php echo $nom; ?></p>
                                            <p class="nameArtist"><?php echo $nombreArtista; ?></p>
                                        </div>
                                    </section>
                                    
                                    <!-- contenedor duracion/like -->
                                    <section class="songInfo">
                                        <div class="songInfoContainer">
                                            <p class="time"><?php echo $duracion; ?>:00</p>
                                            <img class="like" src="" alt="">
                                        </div>
                                    </section>   
                                </div>
                            <?php
                            }
                        }
                    ?>
                </article> <!-- ___contenedor principal de la cancion siguiente__ -->
            </section>
        </section>
    </main>
    
</body>
</html>