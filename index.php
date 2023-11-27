<?php
    // session_start();
    // if(!isset($_SESSION['id'])){
    //     header('Location: login.html');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/style.css">    
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <link rel="stylesheet" href="assets/css/Home.css">
    <script src="assets/js/slider.js"></script>
    <title>Home</title>
</head>
<body>
    
    <?php
        require 'assets/components/mainHeader.php';
    ?>

    <main id="main_Home">
        <?php
            require_once('assets/php/conexion.php');

            if (isset($_POST['searchHeader'])){
                //realizo una busqueda y tiene que aparecer
            }
            else{
                // $mainid = $_SESSION['id'];
                // $usuario = $_SESSION['tipo'];

                // $mainid = '';
                // $usuario = '3';

                // $mainid = '6';
                // $usuario = '2';

                $mainid = '34';
                $usuario = '';
    
                if($usuario == 3){
                    ?>
                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODAS LAS DISQUERAS -->
                            <h1>Disqueras</h1>
                            <article class="box_Covers_Container">
                                <?php
                                    $disqueras = "SELECT * FROM usuarios WHERE Tipo_Usuario = '2'";
                                    $envioD = mysqli_query($conn, $disqueras);
                                    if(mysqli_num_rows($envioD) > 0){
                                        while($mostrarD = mysqli_fetch_assoc($envioD)){
                                            $id = $mostrarD['Id'];
                                            $img = $mostrarD['Foto'];
                                            $nom = $mostrarD['Nombre'];
                                            ?>
                                                <a href="/disquera.php?id=<?php echo $id ?>" class="box_Covers round_Covers">
                                                    <img src="<?php echo $img ?>">
                                                    <p><?php echo $nom ?></p>
                                                </a>
                                            <?php
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </article>
                            <a class="add_Playlists" href="">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_prev"><</button>
                                <button class="slider_next">></button>
                            </div>
                        </section>


                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS ARTISTAS -->
                            <h1>Artistas</h1>
                            <article class="box_Covers_Container">
                                <?php
                                    $disqueras = "SELECT * FROM artistas";
                                    $envioD = mysqli_query($conn, $disqueras);
                                    if(mysqli_num_rows($envioD) > 0){
                                        while($mostrarD = mysqli_fetch_assoc($envioD)){
                                            $id = $mostrarD['Id'];
                                            $img = $mostrarD['Foto'];
                                            $nom = $mostrarD['Nombre'];
                                            ?>
                                                <a href="/artista.php?id=<?php echo $id ?>" class="box_Covers round_Covers">
                                                    <img src="<?php echo $img ?>">
                                                    <p><?php echo $nom ?></p>
                                                </a>
                                            <?php
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </article>
                            <a class="add_Playlists" href="">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_prev"><</button>
                                <button class="slider_next">></button>
                            </div>
                        </section>


                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS USUARIOS SUSCRITOS -->
                            <h1>Usuarios Suscritos</h1>
                            <article class="box_Covers_Container">
                                <?php
                                    $disqueras = "SELECT * FROM usuarios WHERE Tipo_Usuario = '1'";
                                    $envioD = mysqli_query($conn, $disqueras);
                                    if(mysqli_num_rows($envioD) > 0){
                                        while($mostrarD = mysqli_fetch_assoc($envioD)){
                                            $id = $mostrarD['Id'];
                                            $img = $mostrarD['Foto'];
                                            $nom = $mostrarD['Nombre'];
                                            ?>
                                                <a href="/usuario.php?id=<?php echo $id ?>" class="box_Covers round_Covers">
                                                    <img src="<?php echo $img ?>">
                                                    <p><?php echo $nom ?></p>
                                                </a>
                                            <?php
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </article>
                            <a class="add_Playlists" href="">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_prev"><</button>
                                <button class="slider_next">></button>
                            </div>
                        </section>


                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS USUARIOS NO SUSCRITOS -->
                            <h1>Usuarios No Suscritos</h1>
                            <article class="box_Covers_Container">
                                <?php
                                    $disqueras = "SELECT * FROM usuarios WHERE Tipo_Usuario = '0'";
                                    $envioD = mysqli_query($conn, $disqueras);
                                    if(mysqli_num_rows($envioD) > 0){
                                        while($mostrarD = mysqli_fetch_assoc($envioD)){
                                            $id = $mostrarD['Id'];
                                            $img = $mostrarD['Foto'];
                                            $nom = $mostrarD['Nombre'];
                                            ?>
                                                <a href="/usuario.php?id=<?php echo $id ?>" class="box_Covers round_Covers">
                                                    <img src="<?php echo $img ?>">
                                                    <p><?php echo $nom ?></p>
                                                </a>
                                            <?php
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </article>
                            <a class="add_Playlists" href="">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_prev"><</button>
                                <button class="slider_next">></button>
                            </div>
                        </section>
                    <?php
                }
                elseif($usuario == 2){
                    ?>
                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS ARTISTAS -->
                            <h1>Artistas</h1>
                            <article class="box_Covers_Container">
                                <?php
                                    $artistas = "SELECT * FROM artistas WHERE Id_Disquera = '$mainid'";
                                    $envio = mysqli_query($conn, $artistas);
                                    if(mysqli_num_rows($envio) > 0){
                                        while($mostrar = mysqli_fetch_assoc($envio)){
                                            $id1 = $mostrar['Id'];
                                            $img1 = $mostrar['Foto'];
                                            $nom1 = $mostrar['Nombre'];
                                            ?>
                                                <a href="/artista.php?id=<?php echo $id1 ?>" class="box_Covers round_Covers">
                                                    <img src="<?php echo $img1 ?>">
                                                    <p><?php echo $nom1 ?></p>
                                                </a>
                                            <?php
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </article>
                            <a class="add_Playlists" href="">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_prev"><</button>
                                <button class="slider_next">></button>
                            </div>
                        </section>


                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS ALBUMES -->
                            <h1>Albumes</h1>
                            <article class="box_Covers_Container">
                                <?php
                                    $artistas = "SELECT * FROM artistas WHERE Id_Disquera = '$mainid'";
                                    $envioA = mysqli_query($conn, $artistas);
                                    if(mysqli_num_rows($envioA) > 0){
                                        while ($mostrarA = mysqli_fetch_array($envioA)){ 
                                            $idA = $mostrarA['Id'];

                                            $albumes = "SELECT * FROM albumes WHERE Id_Artista = '$idA'";
                                            $envioAL = mysqli_query($conn, $albumes);

                                            while($mostrarAL = mysqli_fetch_array($envioAL)){
                                                $id1 = $mostrarAL['Id'];
                                                $img1 = $mostrarAL['Portada'];

                                                ?>
                                                    <a href="/album.php?id=<?php echo $id1 ?>" class="box_Covers square_Covers">
                                                        <img src="<?php echo $img1 ?>">
                                                    </a>
                                                <?php
                                            }
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </article>
                            <a class="add_Playlists" href="">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_prev"><</button>
                                <button class="slider_next">></button>
                            </div>
                        </section>


                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS CANCIONES -->
                            <h1>Canciones</h1>
                            <article class="box_Covers_Container">
                                <?php
                                    $artistas = "SELECT * FROM artistas WHERE Id_Disquera = '$mainid'";
                                    $envioA = mysqli_query($conn, $artistas);
                                    if(mysqli_num_rows($envioA) > 0){
                                        while ($mostrarA = mysqli_fetch_array($envioA)){ 
                                            $idA = $mostrarA['Id'];

                                            $albumes = "SELECT * FROM albumes WHERE Id_Artista = '$idA'";
                                            $envioAL = mysqli_query($conn, $albumes);

                                            while($mostrarAL = mysqli_fetch_array($envioAL)){
                                                $idAL = $mostrarAL['Id'];
                                                $img1 = $mostrarAL['Portada'];

                                                $canciones = "SELECT * FROM canciones WHERE Id_Album = '$idAL'";
                                                $envioC = mysqli_query($conn, $canciones);

                                                while($mostrarC = mysqli_fetch_array($envioC)){
                                                    $id1 = $mostrarC['Id'];
                                                    // $img1 = $mostrarC['Portada'];
                                                    ?>
                                                        <a href="/cancion.php?id=<?php echo $id1 ?>" class="box_Covers square_Covers">
                                                            <img src="<?php echo $img1 ?>">
                                                            <i class='bx bx-play-circle' ></i>
                                                        </a>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </article>
                            <a class="add_Playlists" href="">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_prev"><</button>
                                <button class="slider_next">></button>
                            </div>
                        </section>
                    <?php
                }
                else{
                    ?>
                        <section id="playlists_Container"> <!-- CONTENEDOR DE TODAS LAS PLAYLISTS -->
                            <h1>Playlists</h1>
                            <a class="playlist_Container" href="/likes.php">
                                <img src="assets/img/meGusta.jpeg">
                                <div class="text_Container">
                                    <h2>Mis me gusta</h2>
                                    <p>Playlist</p>
                                </div>
                            </a>
                            <?php
                                $playlists = "SELECT * FROM playlists WHERE Id_Usuario = '$mainid'";
                                $envioPL = mysqli_query($conn, $playlists);
                                while($mostrarPL = mysqli_fetch_array($envioPL)){
                            ?>
                                <a class="playlist_Container" href="/playlist.php?id=<?php echo $mostrarPL['Id']; ?>">
                                    <img src="<?php echo $mostrarPL['Foto']; ?>">
                                    <div class="text_Container">
                                        <h2><?php echo $mostrarPL['Nombre']; ?></h2>
                                        <p>Playlist</p>
                                    </div>
                                </a>   
                            <?php
                                }
                            ?>

                            <a class="add_Playlists" href="">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                        </section>


                        <section class="containers_Home user_Container_Home"> <!-- CONTENEDOR DE ALBUMES FAVORITOS O RECOMENDADOS -->
                            <?php
                                $albumesU = "SELECT * FROM favoritos_albumes WHERE Id_Usuario = '$mainid'";
                                $envioALU = mysqli_query($conn, $albumesU);
                                if(mysqli_num_rows($envioALU) > 0){
                                    ?>
                                        <h1>Albumes Favoritos</h1>
                                    <?php
                                }
                                else{
                                    ?>
                                        <h1>Albumes Recomendados</h1>
                                    <?php
                                }
                            ?>
                            <article class="box_Covers_Container">
                                <?php
                                    if (mysqli_num_rows($envioALU) > 0){ //el usuario SI tiene albumes favoritos
                                        while ($mostrarAlU = mysqli_fetch_array($envioALU)){ 
                                            $id1 = $mostrarAlU['Id_Album'];
                                            
                                            $albumesU2 = "SELECT * FROM albumes WHERE Id = '$id1'";
                                            $envioU2 = mysqli_query($conn, $albumesU2);

                                            while($mostrarU2 = mysqli_fetch_array($envioU2)){
                                                $id = $mostrarU2['Id'];
                                                $img = $mostrarU2['Portada'];
                                            ?>
                                                <a href="/album.php?id=<?php echo $id ?>" class="box_Covers square_Covers">
                                                    <img src="<?php echo $img ?>">
                                                </a>
                                            <?php
                                            }
                                        }
                                    }
                                    else{ //el usuario NO tiene albumes favoritos
                                        $allIds = "SELECT id FROM albumes";
                                        $idResult = mysqli_query($conn, $allIds);
                                        
                                        if(mysqli_num_rows($idResult) <= 0){
                                            
                                        }
                                        else{
                                            $ids = array();
                                            while ($row = mysqli_fetch_assoc($idResult)) {
                                                $ids[] = $row['id'];
                                            }

                                            shuffle($ids);

                                            for($i = 0; $i < 5; $i++){ 
                                                $randomId = $ids[$i];

                                                $query = "SELECT * FROM albumes WHERE id = '$randomId'";
                                                $resultadoId = mysqli_query($conn, $query);

                                                while($RandMostrar = mysqli_fetch_array($resultadoId)){
                                                    $id = $RandMostrar['Id'];
                                                    $img = $RandMostrar['Portada'];  
                                                }
                                            ?>
                                                <a href="/album.php?id=<?php echo $id ?>" class="box_Covers square_Covers">
                                                    <img src="<?php echo $img ?>">
                                                </a>
                                            <?php
                                            }
                                        }
                                    }
                                ?>
                            </article>
                            <div class="slider_Container">
                                <button class="slider_prev"><</button>
                                <button class="slider_next">></button>
                            </div>
                        </section>


                        <section class="containers_Home user_Container_Home"> <!-- CONTENEDOR DE ARTISTAS FAVORITOS O RECOMENDADOS -->
                            <?php
                                $artistasUS = "SELECT * FROM favoritos_artistas WHERE Id_Usuario = '$mainid'";
                                $envioARU = mysqli_query($conn, $artistasUS);
                                if(mysqli_num_rows($envioARU) > 0){
                                    ?>
                                        <h1>Artistas Favoritos</h1>
                                    <?php
                                }
                                else{
                                    ?>
                                        <h1>Artistas Recomendados</h1>
                                    <?php
                                }
                            ?>
                            <article class="box_Covers_Container">
                            <?php
                                    if (mysqli_num_rows($envioARU) > 0){ //el usuario SI tiene artistas favoritos
                                        while ($mostrarARU = mysqli_fetch_array($envioARU)){ 
                                            $idAF = $mostrarARU['Id_Artista'];

                                            $artistasFAV = "SELECT * FROM artistas WHERE Id = '$idAF'";
                                            $envioARFAV = mysqli_query($conn, $artistasFAV);

                                            while($mostrarARFAV = mysqli_fetch_array($envioARFAV)){
                                                $id = $mostrarARFAV['Id'];
                                                $img = $mostrarARFAV['Foto'];
                                                $nom = $mostrarARFAV['Nombre'];

                                                ?>
                                                    <a href="/artista.php?id=<?php echo $id ?>" class="box_Covers round_Covers">
                                                        <img src="<?php echo $img ?>">
                                                        <p><?php echo $nom ?></p>
                                                    </a>
                                                <?php
                                            }
                                        }
                                    }
                                    else{ //el usuario NO tiene artistas favoritos
                                        $allIds2 = "SELECT Id FROM artistas";
                                        $idResult2 = mysqli_query($conn, $allIds2);
                                        
                                        if(mysqli_num_rows($idResult2) <= 0){
                                            
                                        }
                                        else{
                                            $ids2 = array();
                                            while ($row2 = mysqli_fetch_assoc($idResult2)) {
                                                $ids2[] = $row2['Id'];
                                            }

                                            shuffle($ids2);

                                            for($i = 0; $i < 5; $i++){ 
                                                $randomId2 = $ids2[$i];

                                                $query2 = "SELECT * FROM artistas WHERE Id = '$randomId2'";
                                                $resultadoId2 = mysqli_query($conn, $query2);

                                                while($RandMostrar2 = mysqli_fetch_array($resultadoId2)){
                                                    $id2 = $RandMostrar2['Id'];
                                                    $img2 = $RandMostrar2['Foto'];
                                                    $nom2 = $RandMostrar2['Nombre']; 
                                                }
                                            ?>
                                                <a href="/artista.php?id=<?php echo $id2 ?>" class="box_Covers round_Covers">
                                                    <img src="<?php echo $img2 ?>">
                                                    <div class="control_Overflow_Name">
                                                        <p><?php echo $nom2 ?></p>
                                                    </div>
                                                </a>
                                            <?php
                                            }
                                        }
                                    }
                                ?>
                            </article>
                            <div class="slider_Container">
                                <button class="slider_prev"><</button>
                                <button class="slider_next">></button>
                            </div>
                        </section>


                        <section class="containers_Home user_Container_Home"> <!-- CONTENEDOR DE CANCIONES FAVORITOS O RECOMENDADOS -->
                            <?php
                                $cacnionesU = "SELECT Id_Cancion FROM favoritos_canciones WHERE Id_Usuario = '$mainid'";
                                $envioCU = mysqli_query($conn, $cacnionesU);
                                if(mysqli_num_rows($envioCU) > 0){
                                    ?>
                                        <h1>Canciones Favoritas</h1>
                                    <?php
                                }
                                else{
                                    ?>
                                        <h1>Canciones Recomendadas</h1>
                                    <?php
                                }
                            ?>
                            <article class="box_Covers_Container">
                            <?php
                                    if (mysqli_num_rows($envioCU) > 0){ //el usuario SI tiene canciones favoritos
                                        while ($mostrarCU = mysqli_fetch_array($envioCU)){ 
                                            $id1 = $mostrarCU['Id_Cancion'];

                                            $cacnionesU2 = "SELECT * FROM canciones WHERE Id = '$id1'";
                                            $envioCU2 = mysqli_query($conn, $cacnionesU2);

                                            while($mostrarCU2 = mysqli_fetch_array($envioCU2)){
                                                $id = $mostrarCU2['Id'];

                                                $id3 = $mostrarCU2['Id_Album'];
                                                $portadaC = "SELECT Portada FROM albumes WHERE Id = '$id3'";
                                                $envioCU3 = mysqli_query($conn, $portadaC);
                                                $mostrarCU3 = mysqli_fetch_assoc($envioCU3);

                                                $img = $mostrarCU3['Portada'];

                                                ?>
                                                    <a href="/cancion.php?id=<?php echo $id ?>" class="box_Covers square_Covers">
                                                        <img src="<?php echo $img ?>">
                                                        <i class='bx bx-play-circle' ></i>
                                                    </a>
                                                <?php
                                            }
                                        }
                                    }
                                    else{ //el usuario NO tiene canciones favoritos
                                        $allIds3 = "SELECT id FROM canciones";
                                        $idResult3 = mysqli_query($conn, $allIds3);
                                        
                                        if(mysqli_num_rows($idResult3) <= 0){
                                            
                                        }
                                        else{
                                            $ids3 = array();
                                            while ($row3 = mysqli_fetch_assoc($idResult3)) {
                                                $ids3[] = $row3['id'];
                                            }

                                            shuffle($ids3);

                                            for($i = 0; $i < 5; $i++){ 
                                                $randomId3 = $ids3[$i];

                                                $query3 = "SELECT * FROM canciones WHERE id = '$randomId3'";
                                                $resultadoId3 = mysqli_query($conn, $query3);

                                                while($RandMostrar3 = mysqli_fetch_array($resultadoId3)){
                                                    $id = $RandMostrar3['Id'];

                                                    $id3 = $RandMostrar3['Id_Album'];
                                                    $portadaC = "SELECT Portada FROM albumes WHERE Id = '$id3'";
                                                    $envioCU3 = mysqli_query($conn, $portadaC);
                                                    $mostrarCU3 = mysqli_fetch_assoc($envioCU3);

                                                    $img = $mostrarCU3['Portada']; 
                                                }
                                            ?>
                                                <a href="/cancion.php?id=<?php echo $id ?>" class="box_Covers square_Covers">
                                                    <img src="<?php echo $img ?>">
                                                    <i class='bx bx-play-circle' ></i>
                                                </a>
                                            <?php
                                            }
                                        }
                                    }
                                ?>
                            </article>
                            <div class="slider_Container">
                                <button class="slider_prev"><</button>
                                <button class="slider_next">></button>
                            </div>
                        </section>
                    <?php
                }
            }
        ?>
        <div>
            <!-- <section id="playlists_Container">
            <h1>Playlists</h1>
            <a class="playlist_Container">
                <img src="assets/img/cat.jpeg">
                <div class="text_Container">
                    <h2>Mis me gusta</h2>
                    <p>Playlist</p>
                </div>
            </a>
            <a class="playlist_Container">
                <img src="assets/img/cat.jpeg">
                <div class="text_Container">
                    <h2>Música clásica</h2>
                    <p>Playlist</p>
                </div>
            </a>
            <a class="playlist_Container">
                <img src="assets/img/cat.jpeg">
                <div class="text_Container">
                    <h2>El ghostic</h2>
                    <p>Playlist</p>
                </div>
            </a>
            <a class="playlist_Container">
                <img src="assets/img/cat.jpeg">
                <div class="text_Container">
                    <h2>Mix para llorar</h2>
                    <p>Playlist</p>
                </div>
            </a>

            <a class="add_Playlists" href="">
                <i class='bx bxs-plus-circle'></i>
            </a>
            </section>



            <section class="containers_Home">
                <h1>Favoritos</h1>
                <article class="box_Covers_Container">
                    <a href="" class="box_Covers square_Covers">
                        <img src="assets/img/cat.jpeg">
                    </a>
                </article>
                <div class="slider_Container">
                    <button class="slider_prev"><</button>
                    <button class="slider_next">></button>
                </div>
            </section>



            <section class="containers_Home">
                <h1>Artistas seguidos</h1>
                <article class="box_Covers_Container">
                    <a href="" class="box_Covers round_Covers">
                        <img src="assets/img/wallhaven-e7qx3k.jpg">
                        <p>Cuarteto de Nos</p>
                    </a>
                </article>
                <div class="slider_Container">
                    <button class="slider_prev"><</button>
                    <button class="slider_next">></button>
                </div>
            </section>



            <section class="containers_Home">
                <h1>Canciones</h1>
                <article class="box_Covers_Container">
                    <a href="" class="box_Covers square_Covers">
                        <img src="assets/img/wallhaven-e7qx3k.jpg">
                        <i class='bx bx-play-circle' ></i>
                    </a>
                </article>
                <div class="slider_Container">
                    <button class="slider_prev"><</button>
                    <button class="slider_next">></button>
                </div>
            </section> -->
        </div>
    </main>


    <?php
        require 'assets/components/mainFooter.php';
    ?>
</body>
</html>