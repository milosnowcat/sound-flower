<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/popi.css">    
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
        <section id="playlists_Container">
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




            <input class="abrir-popup" class="add_Playlists" id="abrir-popup" type="submit" >
            <label class="add_Playlists" for="abrir-popup"><i class='bx bxs-plus-circle'></i></label>

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
        </section>

        <div class="overlay" id="overlay">
                <div class="popup" id="popup">
                    <div class="icon">
                        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"> <i id="cerrar" class='bx bx-x'></i></a>
                    </div>
                    <h1>Crea tu playlist</h1>
                    <form action="assets/php/crear-playlist.php" method='post' class="separado">


                    
                        <div class="input-field" id="nombre">
                            <label>Nombre de la playlist</label>
                            <input type="text" name='nombre_play' required>   
                        </div>

                        <div  class="input-field">
                            <label class="foto" for="imag">Sube aqui tu foto</label>
                            <input type="file" id="imag" class="ayuda" name="foto">
                          
                        </div>
                        <div id="terminar" >
                            <input class="cerrar-popup" type="submit"value="continuar">
                        </div>
                    </form>   
                </div>
        </div>
    
       
    </main>
    <script src="/assets/js/popi.js"></script>

    <?php
        require 'assets/components/mainFooter.php';
    ?>
</body>
</html>