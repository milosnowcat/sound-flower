<?php
    // session_start();
    // if(!isset($_SESSION['id'])){
    //     header('Location: login.php');
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
    <title>Home</title>
</head>
<body>
    <script src="assets/js/slider.js"></script>
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
                $_SESSION['emailUs'] = 'usuario1@gmail.com';
                $email = $_SESSION['emailUs'];
                $buscarUsuario = "SELECT * FROM usuarios WHERE Correo = '$email'";
                
                $resultadoBU = mysqli_query($conn, $buscarUsuario);
                $filaRBU = mysqli_fetch_assoc($resultadoBU);
    
                $id = $filaRBU['Id'];
                $usuario = $filaRBU['Tipo_Usuario'];
                $usuario = '3';

                // no suscrito = 0
                // suscrito = 1
                // disquera = 2
                // admin = 3
    
                if($usuario == 3){
                    ?>
                        <section class="containers_Home superiors_Container_Home">
                            <h1>Disqueras</h1>
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



                        <section class="containers_Home superiors_Container_Home">
                            <h1>Artistas</h1>
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



                        <section class="containers_Home superiors_Container_Home">
                            <h1>Albumes</h1>
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
                    <?php
                }
                elseif($usuario == 2){
                    ?>
                        
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
                                $playlists = "SELECT * FROM playlists WHERE Id_Usuario = '$id'";
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
                                $albumesU = "SELECT * FROM favoritos_albumes WHERE Id_Usuario = '$id'";
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
                                            $id = $mostrarAlU['Id'];
                                            $img = $mostrarAlU['Portada'];
                                        ?>
                                            <a href="/album.php?id=<?php echo $id ?>" class="box_Covers square_Covers">
                                                <img src="<?php echo $img ?>">
                                            </a>
                                        <?php
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
                                $artistasUS = "SELECT * FROM favoritos_artistas WHERE Id_Usuario = '$id'";
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
                                $cacnionesU = "SELECT * FROM favoritos_canciones WHERE Id_Usuario = '$id'";
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
                                            $id = $mostrarCU['Id'];
                                            $img = $mostrarCU['Portada'];
                                        ?>
                                            <a href="/cancion.php?id=<?php echo $id ?>" class="box_Covers square_Covers">
                                                <img src="<?php echo $img ?>">
                                                <i class='bx bx-play-circle' ></i>
                                            </a>
                                        <?php
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
                                                    $id3 = $RandMostrar3['Id'];
                                                    $img3 = $RandMostrar3['Portada'];  
                                                }
                                            ?>
                                                <a href="/cancion.php?id=<?php echo $id3 ?>" class="box_Covers square_Covers">
                                                    <img src="<?php echo $img3 ?>">
                                                    <i class='bx bx-play-circle' ></i>
                                                </a>
                                            <?php
                                            }
                                        }
                                    }
                                ?>
                                <!-- <a href="" class="box_Covers square_Covers">
                                    <img src="assets/img/wallhaven-e7qx3k.jpg">
                                    <i class='bx bx-play-circle' ></i>
                                </a> -->
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