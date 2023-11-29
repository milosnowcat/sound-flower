<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: login.html');
    }

    $search = false;

    if(isset($_GET['search'])) {
        $search = true;
        $buscar = $_GET['search'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/popi.css">    
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <link rel="stylesheet" href="assets/css/Home.css">
    <script src="assets/js/slider.js" defer></script>
    <script src="assets/js/redirecciones.js" defer></script>
    <script src="/assets/js/popi.js" defer></script>
    <title>Home</title>
</head>
<body>
    
    <?php
        require 'assets/components/mainHeader.php';
    ?>

    <main id="main_Home">
        <?php
            require_once('assets/php/conexion.php');

            $mainid = $_SESSION['id'];
            $usuario = $_SESSION['tipo'];

            // $mainid = '';
            // $usuario = '3';

            // $mainid = '1';
            // $usuario = '2';

            // $mainid = '34';
            // $usuario = '';
            
            if (isset($_POST['searchHeader'])){
                //realizo una busqueda y tiene que aparecer
            }
            else{
    
                if($usuario == 3){
                    ?>
                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODAS LAS DISQUERAS -->
                            <h1>Disqueras</h1>
                            <ul class="box_Covers_Container">
                                <?php
                                    $disqueras = "SELECT * FROM usuarios WHERE Tipo_Usuario = '2'";
                                    if($search) {
                                        $disqueras .= " AND Nombre LIKE '%$buscar%'";
                                    }
                                    $envioD = mysqli_query($conn, $disqueras);
                                    if(mysqli_num_rows($envioD) > 0){
                                        while($mostrarD = mysqli_fetch_assoc($envioD)){
                                            $id = $mostrarD['Id'];
                                            $img = $mostrarD['Foto'];
                                            $nom = $mostrarD['Nombre'];
                                            ?>
                                                <li onclick="redireccionUsuario(<?php echo $id ?>)" class="box_Covers round_Covers">
                                                    <div class="img_Container_BoxCovers">
                                                        <img src="<?php echo $img ?>" draggable = "false">
                                                    </div>
                                                    <p><?php echo $nom ?></p>
                                                </li>
                                            <?php
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </ul>
                            
                            <a class="add_Playlists" href="crear-disquera.php">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                          
                            <div class="slider_Container">
                                <button class="slider_button button_left"><</button>
                                <button class="slider_button button_right">></button>
                            </div>
                        </section>


                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS ARTISTAS -->
                            <h1>Artistas</h1>
                            <ul class="box_Covers_Container">
                                <?php
                                    $disqueras = "SELECT MIN(Id) as Id, Nombre, MIN(Foto) as Foto FROM artistas GROUP BY Nombre";
                                    if($search) {
                                        $disqueras .= " HAVING Nombre LIKE '%$buscar%'";
                                    }
                                    
                                    $envioD = mysqli_query($conn, $disqueras);
                                    
                                    if(mysqli_num_rows($envioD) > 0){
                                        while($mostrarD = mysqli_fetch_assoc($envioD)){
                                            $id = $mostrarD['Id'];
                                            $img = $mostrarD['Foto'];
                                            $nom = $mostrarD['Nombre'];
                                            ?>
                                            <li onclick="redireccionArtista('<?php echo $nom ?>')" class="box_Covers round_Covers">
                                                <div class="img_Container_BoxCovers">
                                                    <img src="<?php echo $img ?>" draggable="false">
                                                </div>
                                                <p><?php echo $nom ?></p>
                                            </li>
                                            <?php
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </ul>
                            <a class="add_Playlists" href="crear-artista.php">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_button button_left"><</button>
                                <button class="slider_button button_right">></button>
                            </div>

                        </section>


                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS USUARIOS SUSCRITOS -->
                            <h1>Usuarios Suscritos</h1>
                            <ul class="box_Covers_Container">
                                <?php
                                    $disqueras = "SELECT * FROM usuarios WHERE Tipo_Usuario = '1'";
                                    if($search) {
                                        $disqueras .= " AND Nombre LIKE '%$buscar%'";
                                    }
                                    $envioD = mysqli_query($conn, $disqueras);
                                    if(mysqli_num_rows($envioD) > 0){
                                        while($mostrarD = mysqli_fetch_assoc($envioD)){
                                            $id = $mostrarD['Id'];
                                            $img = $mostrarD['Foto'];
                                            $nom = $mostrarD['Nombre'];
                                            ?>
                                                <li onclick="redireccionUsuario(<?php echo $id ?>)" class="box_Covers round_Covers">
                                                    <div class="img_Container_BoxCovers">
                                                        <img src="<?php echo $img ?>" draggable = "false">
                                                    </div>
                                                    <p><?php echo $nom ?></p>
                                                </li>
                                            <?php
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </ul>
                            <div class="slider_Container">
                                <button class="slider_button button_left"><</button>
                                <button class="slider_button button_right">></button>
                            </div>

                        </section>


                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS USUARIOS NO SUSCRITOS -->
                            <h1>Usuarios No Suscritos</h1>
                            <ul class="box_Covers_Container">
                                <?php
                                    $disqueras = "SELECT * FROM usuarios WHERE Tipo_Usuario = '0'";
                                    if($search) {
                                        $disqueras .= " AND Nombre LIKE '%$buscar%'";
                                    }
                                    $envioD = mysqli_query($conn, $disqueras);
                                    if(mysqli_num_rows($envioD) > 0){
                                        while($mostrarD = mysqli_fetch_assoc($envioD)){
                                            $id = $mostrarD['Id'];
                                            $img = $mostrarD['Foto'];
                                            $nom = $mostrarD['Nombre'];
                                            ?>
                                                <li onclick="redireccionUsuario(<?php echo $id ?>)" class="box_Covers round_Covers">
                                                    <div class="img_Container_BoxCovers">
                                                        <img src="<?php echo $img ?>" draggable = "false">
                                                    </div>
                                                    <p><?php echo $nom ?></p>
                                                </li>
                                            <?php
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </ul>
                            <div class="slider_Container">
                                <button class="slider_button button_left"><</button>
                                <button class="slider_button button_right">></button>
                            </div>

                        </section>
                    <?php
                }
                elseif($usuario == 2){
                    ?>
                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS ARTISTAS -->
                            <h1>Artistas</h1>
                            <ul class="box_Covers_Container">
                                <?php
                                    $artistas = "SELECT * FROM artistas WHERE Id_Disquera = '$mainid'";
                                    if($search) {
                                        $artistas .= " AND Nombre LIKE '%$buscar%'";
                                    }
                                    $envio = mysqli_query($conn, $artistas);
                                    if(mysqli_num_rows($envio) > 0){
                                        while($mostrar = mysqli_fetch_assoc($envio)){
                                            $id1 = $mostrar['Id'];
                                            $img1 = $mostrar['Foto'];
                                            $nom1 = $mostrar['Nombre'];
                                            ?>
                                                <li onclick="redireccionArtista('<?php echo $nom1 ?>')" class="box_Covers round_Covers">
                                                    <div class="img_Container_BoxCovers">
                                                        <img src="<?php echo $img1 ?>">
                                                    </div>
                                                    <p><?php echo $nom1 ?></p>
                                                </li>
                                            <?php
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </ul>
                            <a class="add_Playlists" href="crear-artista.php">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_button button_left"><</button>
                                <button class="slider_button button_right">></button>
                            </div>
                        </section>


                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS ALBUMES -->
                            <h1>Albumes</h1>
                            <ul class="box_Covers_Container">
                                <?php
                                    $artistas = "SELECT * FROM artistas WHERE Id_Disquera = '$mainid'";
                                    $envioA = mysqli_query($conn, $artistas);
                                    if(mysqli_num_rows($envioA) > 0){
                                        while ($mostrarA = mysqli_fetch_array($envioA)){ 
                                            $idA = $mostrarA['Id'];

                                            $albumes = "SELECT * FROM albumes WHERE Id_Artista = '$idA'";
                                            if($search) {
                                                $albumes .= " AND Nombre LIKE '%$buscar%'";
                                            }
                                            $envioAL = mysqli_query($conn, $albumes);

                                            while($mostrarAL = mysqli_fetch_array($envioAL)){
                                                $id1 = $mostrarAL['Id'];
                                                $img1 = $mostrarAL['Portada'];
                                                $nom1 = $mostrarAL['Nombre'];

                                                ?>
                                                    <li onclick="redireccionAlbum(<?php echo $id1 ?>)" class="box_Covers square_Covers">
                                                        <div class="img_Container_BoxCovers">
                                                            <img src="<?php echo $img1 ?>">
                                                        </div>
                                                        <p><?php echo $nom1 ?></p>
                                                    </li>
                                                <?php
                                            }
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </ul>
                            <a class="add_Playlists" href="crear-album.php">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_button button_left"><</button>
                                <button class="slider_button button_right">></button>
                            </div>
                        </section>


                        <section class="containers_Home superiors_Container_Home"> <!-- CONTENEDOR DE TODOS LOS CANCIONES -->
                            <h1>Canciones</h1>
                            <ul class="box_Covers_Container">
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
                                                if($search) {
                                                    $canciones .= " AND Nombre LIKE '%$buscar%'";
                                                }
                                                $envioC = mysqli_query($conn, $canciones);

                                                while($mostrarC = mysqli_fetch_array($envioC)){
                                                    $id1 = $mostrarC['Id'];
                                                    $nom1 = $mostrarC['Nombre']
                                                    // $img1 = $mostrarC['Portada'];
                                                    ?>
                                                        <li onclick="redireccionCancion(<?php echo $id1 ?>)" class="box_Covers square_Covers">
                                                            <div class="img_Container_BoxCovers">
                                                                <img src="<?php echo $img1 ?>">
                                                                <i class='bx bx-play-circle' ></i>
                                                            </div>
                                                            <p><?php echo $nom1 ?></p>
                                                        </li>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    else{

                                    }
                                ?>
                            </ul>
                            <a class="add_Playlists" href="crear-cancion.php">
                                <i class='bx bxs-plus-circle'></i>
                            </a>
                            <div class="slider_Container">
                                <button class="slider_button button_left"><</button>
                                <button class="slider_button button_right">></button>
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
                                if($search) {
                                    $playlists .= " AND Nombre LIKE '%$buscar%'";
                                }
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

                            <input class="abrir-popup" class="add_Playlists" id="abrir-popup" type="submit" >
                            <label class="add_Playlists" for="abrir-popup"><i class='bx bxs-plus-circle'></i></label>
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
                            <ul class="box_Covers_Container">
                                <?php
                                    if (mysqli_num_rows($envioALU) > 0 && !$search){ //el usuario SI tiene albumes favoritos
                                        while ($mostrarAlU = mysqli_fetch_array($envioALU)){ 
                                            $id1 = $mostrarAlU['Id_Album'];
                                            
                                            $albumesU2 = "SELECT * FROM albumes WHERE Id = '$id1'";
                                            $envioU2 = mysqli_query($conn, $albumesU2);

                                            while($mostrarU2 = mysqli_fetch_array($envioU2)){
                                                $id = $mostrarU2['Id'];
                                                $img = $mostrarU2['Portada'];
                                                $nom = $mostrarU2['Nombre'];
                                            ?>
                                                <li onclick="redireccionAlbum(<?php echo $id ?>)" class="box_Covers square_Covers">
                                                    <div class="img_Container_BoxCovers">
                                                        <img src="<?php echo $img ?>">
                                                    </div>
                                                    <p><?php echo $nom ?></p>
                                                </li>
                                            <?php
                                            }
                                        }
                                    }
                                    else{ //el usuario NO tiene albumes favoritos
                                        $allIds = "SELECT id FROM albumes";
                                        if($search) {
                                            $allIds .= " WHERE Nombre LIKE '%$buscar%'";
                                        }
                                        $idResult = mysqli_query($conn, $allIds);
                                        
                                        if(mysqli_num_rows($idResult) <= 0){
                                            
                                        }
                                        else{
                                            $ids = array();
                                            while ($row = mysqli_fetch_assoc($idResult)) {
                                                $ids[] = $row['id'];
                                            }

                                            shuffle($ids);

                                            for($i = 0; $i < 10; $i++){ 
                                                $randomId = $ids[$i];

                                                $query = "SELECT * FROM albumes WHERE id = '$randomId'";
                                                $resultadoId = mysqli_query($conn, $query);

                                                while($RandMostrar = mysqli_fetch_array($resultadoId)){
                                                    $id = $RandMostrar['Id'];
                                                    $img = $RandMostrar['Portada'];  
                                                    $nom = $RandMostrar['Nombre'];
                                                }
                                            ?>
                                                <li onclick="redireccionAlbum(<?php echo $id ?>)" class="box_Covers square_Covers">
                                                    <div class="img_Container_BoxCovers">
                                                        <img src="<?php echo $img ?>">
                                                    </div>
                                                    <p><?php echo $nom ?></p>
                                                </li>
                                            <?php
                                            }
                                        }
                                    }
                                ?>
                            </ul>
                            <div class="slider_Container">
                                <button class="slider_button button_left"><</button>
                                <button class="slider_button button_right">></button>
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
                            <ul class="box_Covers_Container">
                            <?php
                                    if (mysqli_num_rows($envioARU) > 0 && !$search){ //el usuario SI tiene artistas favoritos
                                        while ($mostrarARU = mysqli_fetch_array($envioARU)){ 
                                            $idAF = $mostrarARU['Id_Artista'];

                                            $artistasFAV = "SELECT * FROM artistas WHERE Id = '$idAF'";
                                            $envioARFAV = mysqli_query($conn, $artistasFAV);

                                            while($mostrarARFAV = mysqli_fetch_array($envioARFAV)){
                                                $id = $mostrarARFAV['Id'];
                                                $img = $mostrarARFAV['Foto'];
                                                $nom = $mostrarARFAV['Nombre'];

                                                ?>
                                                    <li onclick="redireccionArtista('<?php echo $nom ?>')" class="box_Covers round_Covers">
                                                        <div class="img_Container_BoxCovers">
                                                            <img src="<?php echo $img ?>">
                                                        </div>
                                                        <p><?php echo $nom ?></p>
                                                    </li>
                                                <?php
                                            }
                                        }
                                    }
                                    else{ //el usuario NO tiene artistas favoritos
                                        $allIds2 = "SELECT DISTINCT Id FROM artistas";
                                        if($search) {
                                            $allIds2 .= " WHERE Nombre LIKE '%$buscar%'";
                                        }
                                        $idResult2 = mysqli_query($conn, $allIds2);

                                        if(mysqli_num_rows($idResult2) <= 0){

                                        }
                                        else{
                                            $ids2 = array();
                                            while ($row2 = mysqli_fetch_assoc($idResult2)) {
                                                $ids2[] = $row2['Id'];
                                            }

                                            shuffle($ids2);

                                            for($i = 0; $i < 10 && $i < count($ids2); $i++){ 
                                                $randomId2 = $ids2[$i];

                                                $query2 = "SELECT * FROM artistas WHERE Id = '$randomId2'";
                                                $resultadoId2 = mysqli_query($conn, $query2);

                                                while($RandMostrar2 = mysqli_fetch_array($resultadoId2)){
                                                    $id2 = $RandMostrar2['Id'];
                                                    $img2 = $RandMostrar2['Foto'];
                                                    $nom2 = $RandMostrar2['Nombre']; 
                                                    ?>
                                                    <li onclick="redireccionArtista('<?php echo $nom2 ?>')" class="box_Covers round_Covers">
                                                        <div class="img_Container_BoxCovers">
                                                            <img src="<?php echo $img2 ?>">
                                                        </div>
                                                        <p><?php echo $nom2 ?></p>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                        }
                                    }
                                ?>
                            </ul>
                            <div class="slider_Container">
                                <button class="slider_button button_left"><</button>
                                <button class="slider_button button_right">></button>
                            </div>
                        </section>


                        <section class="containers_Home user_Container_Home"> <!-- CONTENEDOR DE CANCIONES FAVORITOS O RECOMENDADOS -->
                            <h1>Canciones Recomendadas</h1>
                            <ul class="box_Covers_Container">
                                <?php
                                    $allIds3 = "SELECT id FROM canciones";
                                    if($search) {
                                        $allIds3 .= " WHERE Nombre LIKE '%$buscar%'";
                                    }
                                    $idResult3 = mysqli_query($conn, $allIds3);
                                    
                                    if(mysqli_num_rows($idResult3) <= 0){
                                        
                                    }
                                    else{
                                        $ids3 = array();
                                        while ($row3 = mysqli_fetch_assoc($idResult3)) {
                                            $ids3[] = $row3['id'];
                                        }

                                        shuffle($ids3);


                                        for($i = 0; $i < 10; $i++){ 
                                            $randomId3 = $ids3[$i];

                                            $query3 = "SELECT * FROM canciones WHERE id = '$randomId3'";
                                            $resultadoId3 = mysqli_query($conn, $query3);

                                            while($RandMostrar3 = mysqli_fetch_array($resultadoId3)){
                                                $id = $RandMostrar3['Id'];
                                                $nom = $RandMostrar3['Nombre'];

                                                $id3 = $RandMostrar3['Id_Album'];
                                                $portadaC = "SELECT Portada FROM albumes WHERE Id = '$id3'";
                                                $envioCU3 = mysqli_query($conn, $portadaC);
                                                $mostrarCU3 = mysqli_fetch_assoc($envioCU3);

                                                $img = $mostrarCU3['Portada']; 
                                            }
                                        ?>
                                            <li onclick="redireccionCancion(<?php echo $id ?>)" class="box_Covers square_Covers">
                                                <div class="img_Container_BoxCovers">
                                                    <img src="<?php echo $img ?>">
                                                    <i class='bx bx-play-circle' ></i>
                                                </div>
                                                <p><?php echo $nom ?></p>
                                            </li>
                                        <?php
                                        }
                                    }
                                ?>
                            </ul>
                            <div class="slider_Container">
                                <button class="slider_button button_left"><</button>
                                <button class="slider_button button_right">></button>
                            </div>
                        </section>
                    <?php
                }
            }
        ?>
    </main>

    <div class="overlay" id="overlay">
        <div class="popup" id="popup">
            <div class="icon">
                <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i id="cerrar" class='bx bx-x'></i></a>
            </div>
            <h1>Crea tu playlist</h1>
            <form action="assets/php/crear-playlist.php" method='post' class="separado" enctype="multipart/form-data">

                <div class="input-field" id="nombre">
                    <label>Nombre de la playlist</label>
                    <input type="text" name='nombre_play' required>   
                </div>

                <div  class="input-field">
                    <label class="foto" for="imag">Sube aqui tu foto</label>
                    <input type="file" id="imag" class="ayuda" name="foto">
                    
                </div>
                <br>
                <div  class="input-field">
                    <label>Hacer pública</label>
                    <input type="checkbox" name="publica">
                </div>

                <div id="terminar" >
                    <input class="cerrar-popup" type="submit"value="continuar">
                </div>

            </form>   
        </div>
    </div>
    

    <?php
        require 'assets/components/mainFooter.php';
    ?>
</body>
</html>
