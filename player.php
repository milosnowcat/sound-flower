<?php 
    require_once('assets/php/conexion.php');
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['tipo'] == 0){
        header('Location: /pago.php');
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/player.css"> 
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <script defer type="text/javaScript" src="player.js"></script>
    <title>Reproductor</title>
</head>
<body> 
    <?php
        require 'assets/components/mainHeader.php';
    ?>    
    <main id="mainPlayer">
        <?php
            // Verifica si se ha proporcionado 'id' y 't' en la URL
            if (isset($_GET['id']) && isset($_GET['t'])) {
                $songId = $_GET['id'];
                $type = $_GET['t'];
                $songNumber = isset($_GET['n']) ? $_GET['n'] : 1;

                switch ($type) {
                    case 'c':
                        $sql = "SELECT canciones.*, artistas.Nombre AS NombreArtista, albumes.Portada
                                FROM canciones
                                LEFT JOIN cancion_artista ON canciones.Id = cancion_artista.Id_Cancion
                                LEFT JOIN artistas ON cancion_artista.Id_Artista = artistas.Id
                                LEFT JOIN albumes ON canciones.Id_Album = albumes.Id
                                WHERE canciones.id = '$songId'";
                        break;
                    case 'p':
                        $sql = "SELECT canciones.*, artistas.Nombre AS NombreArtista, albumes.Portada
                                FROM canciones
                                LEFT JOIN cancion_playlist ON canciones.Id = cancion_playlist.Id_Cancion
                                LEFT JOIN artistas ON canciones.Id_Artista = artistas.Id
                                LEFT JOIN albumes ON canciones.Id_Album = albumes.Id
                                WHERE cancion_playlist.Id_Playlist = '$songId' AND cancion_playlist.Numero >= '$songNumber'
                                ORDER BY cancion_playlist.Numero";
                        break;
                    case 'a':
                        $sql = "SELECT canciones.*, artistas.Nombre AS NombreArtista, albumes.Portada
                                FROM canciones
                                LEFT JOIN cancion_artista ON canciones.Id = cancion_artista.Id_Cancion
                                LEFT JOIN artistas ON cancion_artista.Id_Artista = artistas.Id
                                LEFT JOIN albumes ON canciones.Id_Album = albumes.Id
                                WHERE canciones.Id_Album = '$songId' AND canciones.Numero >= '$songNumber'
                                ORDER BY canciones.Numero";
                        break;
                    case 'u':
                        $songNumber = isset($_GET['n']) ? $_GET['n'] : 1;
                        $sql = "SELECT canciones.*, artistas.Nombre AS NombreArtista, albumes.Portada
                                FROM canciones
                                LEFT JOIN cancion_artista ON canciones.Id = cancion_artista.Id_Cancion
                                LEFT JOIN artistas ON cancion_artista.Id_Artista = artistas.Id
                                LEFT JOIN albumes ON canciones.Id_Album = albumes.Id
                                WHERE canciones.id IN (SELECT Id_Cancion FROM favoritos_canciones WHERE Id_Usuario = $songId)
                                GROUP BY canciones.Id";
                        break;
                    default:
                        echo "Este tipo de reproducción no se reconoce";
                        exit();
                }

                if ($type == 'p') {

                    $prueba = "SELECT * FROM cancion_playlist WHERE Id_Playlist = $songId";
                    $mandar = mysqli_query($conn, $prueba);
                    $info = mysqli_fetch_array($mandar);
                    if ($info) {
                        $idpc = $info['Id_Cancion'];
                        $contador_cancion = 1;

                        while($row = $mandar->fetch_array()){
                            $contador_cancion++;
                            if($contador_cancion==$songNumber) {
                                $idpc=$row['Id_Cancion'];
                            }
                        }
                        
                        $query = "SELECT canciones.*, artistas.Nombre AS NombreArtista, albumes.Portada, canciones.Archivo
                                FROM canciones
                                LEFT JOIN cancion_artista ON canciones.Id = cancion_artista.Id_Cancion
                                LEFT JOIN artistas ON cancion_artista.Id_Artista = artistas.Id
                                LEFT JOIN albumes ON canciones.Id_Album = albumes.Id
                                WHERE canciones.id = '$idpc'";

                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $cancion = mysqli_fetch_assoc($result);
                            // Obtén la información necesaria
                            $nombreCancion = $cancion['Nombre'];
                            $nombreArtista = $cancion['NombreArtista'];
                            $imagenPortada = $cancion['Portada'];
                            $duracion = $cancion['Duracion'];
                            $archivoAudio = $cancion['Archivo'];
                        }
                    }
                }  
                // Ejecuta la consulta SQL
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $cancion = mysqli_fetch_assoc($result);

                    $nombreCancion = $cancion['Nombre'];
                    $nombreArtista = $cancion['NombreArtista'];
                    $imagenPortada = $cancion['Portada'];
                    $duracion = $cancion['Duracion'];
                    $archivoAudio = $cancion['Archivo'];
                        
                    $contador_like=1;

                    while($row = mysqli_fetch_array($result)){
                        $contador_like++;
                            
                        if($contador_like==$songNumber) {
                            $nombreCancion = $row['Nombre'];
                            $nombreArtista = $row['NombreArtista'];
                            $imagenPortada = $row['Portada'];
                            $duracion = $row['Duracion'];
                            $archivoAudio = $row['Archivo'];
                        }
                    }
                }
            } else {
                echo "No se ha proporcionado un ID o tipo de reproducción";
            }
        ?>
        <!-- __________________parte del reproductor__________________ -->
        <section class="songPlayer">
            <article class="currentSong">
                <!-- imagen de la canción que se está reproduciendo -->
                <div class="currentSongImg">
                    <img class="songImg" src="<?php echo $imagenPortada; ?>" alt="">
                </div>

                <!-- nombre de la canción y el artista -->
                <div class="namesContainer">
                    <p class="namesSong" href="#"><?php echo $nombreCancion; ?></p>
                    <p class="namesArtist" href="#"><?php echo $nombreArtista; ?></p>
                </div>

                <!-- reproductor de audio -->
                <div class="audioContainer">
                    <audio id="player" autoplay preload="metadata" 
                        src="<?php echo $archivoAudio; ?>">
                    </audio>
                    <div class="audioContainer__bar">
                        <span id="currentBar" class="audioContainer__bar-time">
                        </span>
                        <span class="audioContainer__bar-progress">
                            <span id="progress" class="audioContainer__bar-progress-range">
                            </span>
                        </span>
                        <span id="durationBar" class="audioContainer__bar-time">
                        </span>
                    </div>
                    <div class="audioContainer__buttons">
                        <button onclick="document.getElementById('player').volume -= 0.1"
                            class="audioContainer__buttons-volumen">
                            <img class="audioContainer__buttons-volumen-img" src="/assets/img/player/volume-low-solid.svg" alt="">
                        </button>
                        <button id="before__button" class="audioContainer__buttons-change" onclick="reproducirCancion(<?php echo ($songId . ', \'' . $type. '\', ' . ($songNumber-1)); ?>)">
                            <img class="audioContainer__buttons-change-img" src="/assets/img/player/forward-solid.svg" alt="">
                        </button>
                        <button id="buttonAudio" class="audioContainer__buttons-play">
                            <img id="jajawe" class="audioContainer__buttons-play-img" src="" alt="">
                        </button>
                        <button id="next__button" class="audioContainer__buttons-change" onclick="reproducirCancion(<?php echo ($songId . ', \'' . $type. '\', ' . ($songNumber+1)); ?>)">
                            <img class="audioContainer__buttons-change-img" src="/assets/img/player/forward-solid.svg" alt="">
                        </button>
                        <button onclick="document.getElementById('player').volume += 0.1"
                            class="audioContainer__buttons-volumen">
                            <img class="audioContainer__buttons-volumen-img" src="/assets/img/player/volume-high-solid.svg" alt="">
                        </button>
                    </div>
                </div>
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
                        // Verifica si se proporciona la información de la URL
                        if (isset($_GET['id']) && isset($_GET['t'])) {
                            $songId = $_GET['id'];
                            $type = $_GET['t'];

                            // Verifica si es una playlist y se proporciona el número de canción
                            if ($type === 'p' && isset($_GET['n'])) {
                                $playlistId = $songId;
                                $songNumber = $_GET['n'];

                                // Obtén las canciones restantes de la playlist
                                $numero_cancion = 0;
                                $sql1 = "SELECT * FROM Cancion_Playlist WHERE Id_Playlist = '$playlistId'";
                                $env1 = mysqli_query($conn, $sql1);

                                if ($env1) {
                                    while ($mos1 = mysqli_fetch_array ($env1)) {
                                        $sql2 = "SELECT * FROM canciones WHERE Id = '{$mos1['Id_Cancion']}'";
                                        $env2 = mysqli_query($conn, $sql2); 
                    
                                        while ($mos2 = mysqli_fetch_array($env2)) {
                                            $sql3 = "SELECT * FROM albumes WHERE Id ='{$mos2['Id_Album']}'";
                                            $env3 = mysqli_query($conn, $sql3);
                    
                                            while ($mos3 = mysqli_fetch_array($env3)) {
                                                $sql4 = "SELECT * FROM cancion_artista WHERE Id_Cancion ='{$mos2['Id']}'";
                                                $env4 = mysqli_query($conn, $sql4); 
                                                $mos4 = mysqli_fetch_array($env4);
                    
                                                // aquí obtengo todos los artistas de la canción y los almaceno en un array
                                                $artistas = array();
                                                $sql5 = "SELECT artistas.Nombre
                                                         FROM cancion_artista
                                                         INNER JOIN artistas ON cancion_artista.Id_Artista = artistas.Id
                                                         WHERE cancion_artista.Id_Cancion = '{$mos2['Id']}'";
                                                $env5 = mysqli_query($conn, $sql5); 
                    
                                                while ($mos5 = mysqli_fetch_array($env5)) {
                                                    $artistas[] = $mos5['Nombre'];
                                                }
                    
                                                $id = $mos2['Id'];
                                                $nom = $mos2['Nombre'];
                                                $idAlbum = $mos3['Id'];
                                                $duracion = $mos2['Duracion'];
                                                $numero_cancion++;
                                                ?>
                                                    <div class="songQueueContainer">
                                                        <!-- contenedor imagen/nombre/artista -->
                                                        <section class="artistInfo">
                                                            <button onclick="reproducirCancion(<?php echo ($songId . ', \'' . $type. '\', ' . $numero_cancion); ?>)" class="imgContainer">
                                                                <img class="albumImg" src="<?php echo $mos3['Portada']; ?>" alt="">
                                                            </button>
                            
                                                            <div class="nameSongNArtist">
                                                                <p class="nameSong"><?php echo $nom; ?></p>
                                                                <p class="nameArtist"><?php echo implode(", ", $artistas); ?></p>
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
                                    }
                                }
                            } elseif($type === 'u' && isset($_GET['n'])) {
                                $songNumber = $_GET['n'];

                                // se obtienen las canciones restantes de la playlist
                                $numero_cancion = 0;
                                $sql1 = "SELECT canciones.*, artistas.Nombre AS NombreArtista, albumes.Portada
                                    FROM canciones
                                    LEFT JOIN cancion_artista ON canciones.Id = cancion_artista.Id_Cancion
                                    LEFT JOIN artistas ON cancion_artista.Id_Artista = artistas.Id
                                    LEFT JOIN albumes ON canciones.Id_Album = albumes.Id
                                    WHERE canciones.id IN (SELECT Id_Cancion FROM favoritos_canciones WHERE Id_Usuario = $songId)
                                    GROUP BY canciones.Id";
                                $env1 = mysqli_query($conn, $sql1);

                                if ($env1) {
                                    while ($mos2 = mysqli_fetch_array ($env1)) {
                                        $sql3 = "SELECT * FROM albumes WHERE Id ='{$mos2['Id_Album']}'";
                                        $env3 = mysqli_query($conn, $sql3);
                    
                                        while ($mos3 = mysqli_fetch_array($env3)) {
                                            $sql4 = "SELECT * FROM cancion_artista WHERE Id_Cancion ='{$mos2['Id']}'";
                                            $env4 = mysqli_query($conn, $sql4); 
                                            $mos4 = mysqli_fetch_array($env4);
                    
                                            // Obtén todos los artistas de la canción y almacénalos en un array
                                            $artistas = array();
                                            $sql5 = "SELECT artistas.Nombre
                                                    FROM cancion_artista
                                                    INNER JOIN artistas ON cancion_artista.Id_Artista = artistas.Id
                                                    WHERE cancion_artista.Id_Cancion = '{$mos2['Id']}'";
                                            $env5 = mysqli_query($conn, $sql5); 
                    
                                            while ($mos5 = mysqli_fetch_array($env5)) {
                                                $artistas[] = $mos5['Nombre'];
                                            }
                    
                                            $id = $mos2['Id'];
                                            $nom = $mos2['Nombre'];
                                            $idAlbum = $mos3['Id'];
                                            $duracion = $mos2['Duracion'];
                                            $numero_cancion++;
                                            ?>
                                                <div class="songQueueContainer">
                                                    <!-- contenedor imagen/nombre/artista -->
                                                    <section class="artistInfo">
                                                        <button onclick="reproducirCancion(<?php echo ($songId . ', \'' . $type. '\', ' . $numero_cancion); ?>)" class="imgContainer">
                                                            <img class="albumImg" src="<?php echo $mos3['Portada']; ?>" alt="">
                                                        </button>
                        
                                                        <div class="nameSongNArtist">
                                                            <p class="nameSong"><?php echo $nom; ?></p>
                                                            <p class="nameArtist"><?php echo implode(", ", $artistas); ?></p>
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
                                }
                            } else {
                                // Obtiene canciones aleatorias si no es una playlist
                                $randomSongsQuery = "SELECT Id, Nombre, Id_Album, Duracion
                                                        FROM canciones
                                                        WHERE Id != '$songId'
                                                        ORDER BY RAND()";
                                $randomSongsResult = mysqli_query($conn, $randomSongsQuery);

                                if ($randomSongsResult) {
                                    while ($row = mysqli_fetch_assoc($randomSongsResult)) {
                                        // Procesa y muestra la información de cada canción
                                        $id = $row['Id'];
                                        $nom = $row['Nombre'];
                                        $art = '';
                                        $idAlbum = $row['Id_Album'];
                                        $duracion = $row['Duracion'];

                                        $sql_artistas_cancion = "SELECT * FROM cancion_artista WHERE Id_Cancion = $id";
                                        $query_artistas_cancion = mysqli_query($conn, $sql_artistas_cancion);

                                        while($result_artistas_cancion = mysqli_fetch_array($query_artistas_cancion)){
                                            $id_artista = $result_artistas_cancion['Id_Artista'];
                                            $sql_artistas = "SELECT * FROM artistas WHERE Id = $id_artista";
                                            $query_artistas = mysqli_query($conn, $sql_artistas);

                                            while($result_artistas = mysqli_fetch_array($query_artistas)){
                                                $art .= $result_artistas['Nombre'] . ", ";
                                            }

                                        }

                                        $sql_album = "SELECT Portada FROM albumes WHERE Id = $idAlbum";
                                        $query_album = mysqli_query($conn, $sql_album);
                                        $result_album = mysqli_fetch_array($query_album);

                                        $portada_album = $result_album['Portada'];

                                        $art = rtrim($art, ", ");
                                        ?>
                                            <div class="songQueueContainer">
                                                <!-- contenedor imagen/nombre/artista -->
                                                <section class="artistInfo">
                                                    <button onclick="reproducirCancion(<?php echo (($id - 1) . ', \'c\', 1'); ?>)" class="imgContainer">
                                                        <!-- Ajusta las rutas y formatos según tu aplicación -->
                                                        <img class="albumImg" src="<?php echo $portada_album; ?>" alt="">
                                                    </button>

                                                    <div class="nameSongNArtist">
                                                        <p class="nameSong"><?php echo $nom; ?></p>
                                                        <p class="nameArtist"><?php echo $art; ?></p>
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
                            }
                        }
                    ?>
                </article> <!-- ___ final del contenedor principal de la cancion siguiente__ -->
            </section>
        </section>
    </main>
</body>
</html>